<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acc extends Model
{
    protected $table = 'accs';

    protected $fillable = ['create','price','item'];

    public function item() {
    	return $this->belongsTo(Item::class,'item','id');
    }
}
