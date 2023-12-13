<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $table = "players";
    protected $primaryKey = "id";
    protected $fillable = ['nickname'];
    protected $hidden = ['id'];

    // en caso de que la tabla no tenga timestamps
    // public $timestamps = false;
}
