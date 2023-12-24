<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatAllocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_id',
        'trip_date',
        'name',
        'phone',
        'destination',
        'ticket_quantity',
        'price',
        'amount',
        'bus_start_time',
    ];



    // Define relationships
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
