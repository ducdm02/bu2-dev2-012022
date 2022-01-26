<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'category_id', 'category_name', 'category_desc','category_status'
    ];
    protected $primaryKey = 'category_id';
 	protected $table = 'category';
}
