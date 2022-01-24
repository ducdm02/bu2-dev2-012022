<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producer;


class products extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'product_id ', 'product_name', 'product_quantity','category_id','producer_id','product_desc','product_price','product_image','product_status'
    ];
    protected $primaryKey = 'product_id';
 	protected $table = 'products';
    public function category()
    {
        return $this->belongsTo(category::class, 'category_id', 'category_id');
    }

    public function producer()
    {

        return $this->belongsTo(producer::class, 'producer_id','producer_id');
    }
}
