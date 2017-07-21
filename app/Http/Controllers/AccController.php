<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Item;
use App\Acc;
use Carbon\Carbon;
use Redirect;


class AccController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indexDay = Carbon::today();
        $priceTotal = 0;
        $accs = Acc::whereYear('create',$indexDay->year)->whereMonth('create',$indexDay->month)->orderBy('create','ASC')->get();
        foreach ($accs as $key => $acc) {
            $priceTotal += $acc->price;
        }

        return view('acc.index',['indexYear'=>$indexDay->year,'indexMonth'=>$indexDay->month, 'accs'=>$accs, 'priceTotal'=>$priceTotal]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::orderBy('name','ASC')->get();

        return view('acc.create',['items'=>$items]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newacc = new Acc($request->all());
        $newacc->save();
        switch($request->submitButton) {

            case 'continue':
                return back();
            break;

            case 'once':
                $priceTotal = 0;
                $accs = Acc::whereYear('create',$newacc->create->year)->whereMonth('create',$newacc->create->month)->orderBy('create','ASC')->get();
                foreach ($accs as $key => $acc) {
                    $priceTotal += $acc->price;
                }
                return view('acc.index',['indexYear'=>$newacc->create->year, 'indexMonth'=>$newacc->create->month, 'accs'=>$accs, 'priceTotal'=>$priceTotal]);
            break;
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $acc = Acc::findOrFail($id);
        $items = Item::orderBy('name','ASC')->get();
        return view('acc.edit',[ 'acc'=>$acc ,'items'=>$items]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $acc = Acc::findOrFail($id);
        $acc->fill($request->all());
        $acc->save();
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $acc=Acc::findOrFail($id);
        $acc->delete();
        return back();
    }

    public function showByMonth($indexYear, $indexMonth)
    {
        $priceTotal = 0;
        $accs = Acc::whereYear('create',$indexYear)->whereMonth('create',$indexMonth)->orderBy('create','ASC')->get();
        foreach ($accs as $key => $acc) {
            $priceTotal += $acc->price;
        }

        return view('acc.index',['indexYear'=>$indexYear, 'indexMonth'=>$indexMonth, 'accs'=>$accs, 'priceTotal'=>$priceTotal]);
    }

    public function showByYear($indexYear)
    {
        $priceTotal = 0;
        $accs = Acc::whereYear('create',$indexYear)->orderBy('create','ASC')->get();
        $items = Item::orderBy('name','ASC')->get();

        foreach ($items as $key => $item) {
            $itemSta[$item->name] = 0;
        }

        foreach ($accs as $key => $acc) {
            $priceTotal += $acc->price;
            foreach ($itemSta as $item => $price) {
                if($item === $acc->items->name)  {
                    $itemSta[$item] += $acc->price; 
                }
            }
        }

        return view('acc.showByYear',['indexYear'=>$indexYear, 'accs'=>$accs, 'itemSta'=>$itemSta, 'priceTotal'=>$priceTotal]);
    }
}
