<?php

namespace Database\Seeders;

use App\Models\products;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        $product_name = ['メ キ シ コ', 'ﾛﾝﾄﾞ ﾝ', 'ﾊﾞｲｸ', 'あ さ'];
        $name = ['メ キ シ コ', 'ﾛﾝﾄﾞ ﾝ', 'ﾊﾞｲｸ', 'あ さ'];
        $number=20000;
        $all_cats = $this->getAllCat();
        $all_producers = $this->getAllProducer();
        foreach ($all_cats as $cat) {
           $producers=$all_producers->random();
                for ($i = 1; $i < $number; $i++) {
                    $data[] = [
                        'product_name' => Arr::random($product_name) . '_' . $i,
                        'product_quantity' => rand(50, 100),
                        'category_id' => $cat->category_id,
                        'producer_id' => $producers->producer_id,
                        'product_desc' => 'sản phẩm rất tuyệt by ' .'_'. Arr::random($name),
                        'product_price' => rand(20000,200000),
                        'product_image' =>'img'.rand(1,4).'.png',
                        'product_status' =>  rand(1,0),
                    ];
                }

        }
        $chucks = array_chunk($data, 200);
        foreach ($chucks as $chuck) {
            products::insert($chuck);
        }
    }
    public function getAllCat()
    {
        return DB::table('categories')
            ->select('category_id')
            ->get();
    }
    public function getAllProducer()
    {
        return DB::table('producer')
            ->select('producer_id')
            ->get();
    }
}
