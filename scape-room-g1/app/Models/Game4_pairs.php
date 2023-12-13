<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game4_pairs extends Model
{
    use HasFactory;

    protected $table = "game4_pairs";
    protected $primaryKey = "id";
    protected $fillable = ['growth', 'caracteristics'];
    protected $hidden = ['id'];

    // en caso de que la tabla no tenga timestamps
    // public $timestamps = false;
}
