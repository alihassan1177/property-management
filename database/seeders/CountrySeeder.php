<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use Illuminate\Support\Facades\File;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(resource_path("data/countries.json"));
        $countries = json_decode($json);
        $data = [];
        foreach ($countries as $key => $value) {
            $data[] = [
                "name" => $value->name,
                "code" => $value->code,
                "dial_code" => $value->dial_code,
                "flag" => $value->flag
            ];
        }

        Country::insert($data);
    }
}
