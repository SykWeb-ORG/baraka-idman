<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsResponse extends Model
{
    use HasFactory;

    /**
     * The participant that own the SMS.
     */
    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }
}
