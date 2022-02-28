<?php

namespace Database\Seeders;

use App\Models\producer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Random;

class ProducersSeeder extends Seeder
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
        $address = ['Hà nội','Hải phòng','Hưng yên','Đà nẵng','HCM'];
        for ($i = 1; $i < $number; $i++) {
            $data[] = [
                'producer_name' => Arr::random($system_cate_name).'_'.$i,
                'phone_number' => '098765423'.$i,
                'address' => rand(1,0),
            ];
        }
        $chucks = array_chunk($data, 20);
        foreach ($chucks as $chuck) {
            producer::insert($chuck);
        }
    }
    
}
