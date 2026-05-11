<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $fillable = [
        'policy_name',
        'description',
        'premium',
        'coverage_details',
        'payment_due_date',
    ];
}
