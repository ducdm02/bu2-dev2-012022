<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        $number=10;
        $system_cate_name = ['メ キ シ コ', 'ﾛﾝﾄﾞ ﾝ', 'ﾊﾞｲｸ', 'あ さ'];
        $user_name = ['メ キ シ コ', 'ﾛﾝﾄﾞ ﾝ', 'ﾊﾞｲｸ', 'あ さ'];
        for ($i = 1; $i < $number; $i++) {
           
            $data[] = [
                'category_name' => Arr::random($system_cate_name).'_'.$i,
                'category_desc' => 'Thuốc rất tuyệt by ' .'_'. Arr::random($system_cate_name),
                'category_status' => rand(1,0),
            ];
        }
        $chucks = array_chunk($data, 20);
        foreach ($chucks as $chuck) {
            category::insert($chuck);
        }
    }
}
