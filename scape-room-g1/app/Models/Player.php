<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ranking;
class Player extends Model
{
    use HasFactory;
    protected $table='players';
    protected $primarykey='id';
    protected $fillable=['nombre'];


    public function rankings(){
        return $this->hasMany(Ranking::class);
    }
}
