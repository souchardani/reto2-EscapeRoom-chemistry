<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game1_puzzle extends Model
{
    use HasFactory;

    protected $table = "game1_puzzles";
    protected $primaryKey = "id";
    protected $fillable = ['molecule', 'img_molecule'];

    // en caso de que la tabla no tenga timestamps
    // public $timestamps = false;
}
