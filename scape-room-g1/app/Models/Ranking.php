<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Player;

class Ranking extends Model
{
    use HasFactory;

    protected $table = "rankings";
    protected $primaryKey = "id";
    protected $fillable = ['difficulty', 'time', 'player_nickname'];
    protected $hidden = ['id'];

    // en caso de que la tabla no tenga timestamps
    // public $timestamps = false;


    public function player() {
        return $this->belongsTo(Player::class);
    }

}
