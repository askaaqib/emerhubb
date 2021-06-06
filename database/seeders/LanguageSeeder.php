<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data = [
            [
            "name" => "English",
            "abbr" => "en",
            ],
            [
                "name" => "Malaysia",
                "abbr" => "mn",
            ],
             [
                 "name" => "Indonesian",
                 "abbr" => "id",
             ]
        ];
         Language::insert($data);
    }
}
