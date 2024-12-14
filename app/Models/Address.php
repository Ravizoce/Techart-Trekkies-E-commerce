<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $table =  "delivery_addresses";

    protected $fillable=[
        'user_id',
        'address_type',
        'state',
        'zone',
        'city',
        'address',
        'phone_no',
        'landmark',
        "description"
    ];

    public function user(){
        return $this->belongsTo(User::class , 'user_id ', 'id');
    }
}
