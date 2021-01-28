<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErrorLog extends Model
{
    use HasFactory;

    public function user()
    {
        // return $this->belongsTo(User::class,'id');
        return $this->belongsTo(User::class,'id');

    }

    public function country()
    {
        return $this->belongsTo(Country::class,'id');
    }

    public function error()
    {
        return $this->belongsTo(Error::class,'id');
    }
}
