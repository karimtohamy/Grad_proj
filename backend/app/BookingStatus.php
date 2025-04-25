<?php

namespace App;

enum BookingStatus
{
    case Pending = 'pending';
    case Canceled = 'cancled';
    case Approved = 'approved';
    case Declined = 'declined';
}
