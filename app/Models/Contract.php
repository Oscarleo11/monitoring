<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = ['client_name', 'client_email', 'title', 'description', 'start_date', 'end_date'];


    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}
