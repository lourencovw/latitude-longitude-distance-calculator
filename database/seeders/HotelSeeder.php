<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mapHotel = function(array $value): array {
            return ["name" => $value[0],"latitude" => $value[1],"longitude" => $value[2],"price" => intval($value[3] * 100)];
        };

        $response1 = Http::get('https://xlr8-interview-files.s3.eu-west-2.amazonaws.com/source_1.json');
        $response2 = Http::get('https://xlr8-interview-files.s3.eu-west-2.amazonaws.com/source_2.json');

        $response = [...$response1->json()['message'],...$response2->json()['message']];
        
        for ($i=0; $i < count($response); $i++) { 
            try {
                if ($response[$i][0] && $response[$i][1] && $response[$i][2] && $response[$i][3]) {
                    DB::table('hotels')->insert($mapHotel($response[$i]));
                }
            } catch (\Throwable $th) {
            }
        }
    }
}
