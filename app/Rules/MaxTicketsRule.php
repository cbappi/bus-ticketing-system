<?php

// app/Rules/MaxTicketsRule.php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\SeatAllocation;
use Illuminate\Support\Facades\DB;

class MaxTicketsRule implements Rule
{
    private $tripId;

    public function __construct($tripId)
    {
        $this->tripId = $tripId;
    }

    public function passes($attribute, $value)
    {
        // Calculate the sum of ticket_quantity for the given trip_id
        $totalTickets = SeatAllocation::where('trip_id', $this->tripId)->sum('ticket_quantity');

        // Check if the new ticket_quantity will exceed the limit (36)
        return ($totalTickets + $value) <= 36;
    }

    public function message()
    {
        return 'The total ticket quantity for this trip exceeds the limit of 36.';
    }
}

