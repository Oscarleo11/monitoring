<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// app/Models/Reminder.php
class Reminder extends Model
{
    protected $fillable = ['contract_id', 'email', 'reminder_date'];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}

