<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BikeStatus extends Model
{
    use HasFactory;

    public $table = 'bike_status';

    protected $casts = [

    ];

    protected $fillable = [
        'bike_id',

    ];

    public $orderable = [
        'id',

    ];

    public $filterable = [
        'id',

    ];
}
