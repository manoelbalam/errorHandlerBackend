<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    use HasFactory;

    public function error_logs()
    {
        return $this->hasOne(ErrorLog::class);
    }
}
