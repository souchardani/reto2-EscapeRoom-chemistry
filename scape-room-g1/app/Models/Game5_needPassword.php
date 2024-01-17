<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mockery\HigherOrderMessage;

class Game5_needPassword extends Model
{
    use HasFactory;
    protected $table = "game5_need_password";
    protected $primaryKey = "id";
    protected $fillable = ['nombreCientifico','clave'];
    protected $hidden = ['created_at','updated_at'];
}
