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

    /**
     * Get all of the comments for the producer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(App\Models\products::class);
    }
}

