<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game2_kuku extends Model
{
    use HasFactory;

    protected $table = "game2_kukus";
    protected $primaryKey = "id";
    protected $fillable = ['compound', 'category'];
    protected $hidden = ['created_at', "updated_at"];

    // en caso de que la tabla no tenga timestamps
    // public $timestamps = false;
}
