<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producer extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'producer_id', 'producer_name'
    ];
    protected $primaryKey = 'producer_id';
 	protected $table = 'producers';
    public function products(){
        return $this->hasMany(products::class);
    }
}
