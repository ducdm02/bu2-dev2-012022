<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'product_id ', 'product_name', 'product_quantity','category_id','producer_id','product_desc','product_price','product_image','product_status'
    ];
    protected $primaryKey = 'product_id';
 	protected $table = 'Product';
    public function category()
    {
        return $this->belongsTo(category::class);
    }

}
