<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'category_id', 'category_name', 'category_desc','category_status'
    ];
    protected $primaryKey = 'category_id';
 	protected $table = 'categories';
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