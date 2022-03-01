<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = ['nome', 'email', 'cpf','telefone', 'datanasci'];

    protected $dates = ['date'];
    protected $guarded = [];
    //refrencia tabela de 1 para 1
    
    public function child(){
        return $this->hasMany('App\Models\Child');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
