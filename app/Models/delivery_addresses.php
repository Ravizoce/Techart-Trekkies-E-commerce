<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class delivery_addresses extends Model
{
    //
    protected $fillable=[
        'user_id',
        'address_type',
        'address_type',
        'state',
        'zone',
        'city',
        'address',
        'phone_no',
        'landmark',
        "description"
    ];
}
