<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ledger extends Model
{
    use HasFactory;
    protected $fillable = ([
        'date',
        'head',
        'type',
        'details',
        'amount',
        'ref',
    ]);
}
