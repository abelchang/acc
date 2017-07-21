<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acc extends Model
{
    protected $table = 'accs';
    protected $dates = ['create'];

    protected $fillable = ['create','price','item'];

    public function items() {
    	return $this->belongsTo(Item::class,'item','id');
    }
}
