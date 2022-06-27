<?php

namespace Database\Seeders;

use App\Models\Field;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields = [
            [
                "title" => "Country",
                "type" => "string"
            ],
            [
                "title" => "Age",
                "type" => "number"
            ],
            [
                "title" => "Delivery Date",
                "type" => "date"
            ],
            [
                "title" => "Delivered",
                "type" => "boolean"
            ],
        ];

        foreach ($fields as $field){
            Field::create($field);
        }
    }
}
