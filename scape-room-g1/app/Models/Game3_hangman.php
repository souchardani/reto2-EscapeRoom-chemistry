<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game3_hangman extends Model
{
    use HasFactory;

    protected $table = "game3_hangmen";
    protected $primaryKey = "id";
    protected $fillable = ['word'];
    protected $hidden = ['id'];

    // en caso de que la tabla no tenga timestamps
    // public $timestamps = false;
}
