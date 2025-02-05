<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $filleable = [
        'room_id',
        'nama',
        'email',
        'telpom',
        'start_date',
        'end_date'
    ];

    public function Room() {
        return $this->belongsTo(Room::class,'room_id');
    }
}
