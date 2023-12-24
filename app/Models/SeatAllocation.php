<?php

namespace App\Models;


use Illuminate\Support\Facades\Hash;
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

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::created(function ($seatAllocation) {
    //         // Create a corresponding user entry
    //         $user = User::create([
    //             'name' => $seatAllocation->name,
    //             'phone' => $seatAllocation->phone,
    //             // Add other user fields if needed
    //             'password' => Hash::make($seatAllocation->phone), // Default password based on phone number (you may want to change this)
    //         ]);

    //         // Associate the user with the seat allocation
    //         $seatAllocation->user_id = $user->id;
    //         $seatAllocation->save();
    //     });
    //}

    // Relationship with User model

}
