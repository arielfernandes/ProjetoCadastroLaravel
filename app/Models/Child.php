<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
   protected $primaryKey = 'id';
   protected $fillable = ['nome', 'idade', 'sexo', 'id_register'];
   protected $dates = ['date'];
   protected $guarded = [];
    public function registes(){
        return $this->belongsTo('App\Models\Register');
    }
}
