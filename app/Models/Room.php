<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table ="rooms";

    protected $fillable = ['building_id','name'];

    public function buildings(){
        return $this->belongsTo(Building::class);
    }

    public function transactions(){
        return $this->hasOne(Transaction::class);
    }
}
