<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'producer_id', 'producer_name'
    ];
    protected $primary_key = 'producer_id';
    protected $table = 'producer';
}

