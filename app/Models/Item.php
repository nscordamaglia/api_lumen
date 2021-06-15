<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //TODO properties (fillable, hidden, connection, timestamp, cast)
    /*TODO models relationship property_type,transaction_type,currency,city,state,country
         $this->hasOne(City::class);
         $this->hasOne(State::class);
         $this->hasOne(Country::class);
        $this->hasMany(TransactionType::class);
        $this->hasOne(PropertyType::class);
    */

    use HasFactory;

    protected $fillable = ['status'];
}