<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::insert([
            ['name' => 'Visakhapatnam', 'state_id' => 1], 
            ['name' => 'Vijayawada', 'state_id' => 1],
            ['name' => 'Itanagar', 'state_id' => 2], 
            ['name' => 'Tawang', 'state_id' => 2],
            ['name' => 'Guwahati', 'state_id' => 3],
            ['name' => 'Silchar', 'state_id' => 3],
            ['name' => 'Patna', 'state_id' => 4], 
            ['name' => 'Gaya', 'state_id' => 4],
            ['name' => 'Raipur', 'state_id' => 5],
            ['name' => 'Bilaspur', 'state_id' => 5],
            ['name' => 'Panaji', 'state_id' => 6], 
            ['name' => 'Vasco da Gama', 'state_id' => 6],
            ['name' => 'Ahmedabad', 'state_id' => 7], 
            ['name' => 'Surat', 'state_id' => 7],
            ['name' => 'Chandigarh', 'state_id' => 8], 
            ['name' => 'Faridabad', 'state_id' => 8],
            ['name' => 'Shimla', 'state_id' => 9], 
            ['name' => 'Dharamshala', 'state_id' => 9],
            ['name' => 'Ranchi', 'state_id' => 10],
            ['name' => 'Jamshedpur', 'state_id' => 10],
            ['name' => 'Bengaluru', 'state_id' => 11], 
            ['name' => 'Mysuru', 'state_id' => 11],
            ['name' => 'Thiruvananthapuram', 'state_id' => 12], 
            ['name' => 'Kochi', 'state_id' => 12],
            ['name' => 'Bhopal', 'state_id' => 13],
            ['name' => 'Indore', 'state_id' => 13],
            ['name' => 'Mumbai', 'state_id' => 14], 
            ['name' => 'Pune', 'state_id' => 14],
            ['name' => 'Imphal', 'state_id' => 15], 
            ['name' => 'Thoubal', 'state_id' => 15],
            ['name' => 'Shillong', 'state_id' => 16], 
            ['name' => 'Tura', 'state_id' => 16],
            ['name' => 'Aizawl', 'state_id' => 17],
            ['name' => 'Lunglei', 'state_id' => 17],
            ['name' => 'Kohima', 'state_id' => 18],
            ['name' => 'Dimapur', 'state_id' => 18],
            ['name' => 'Bhubaneswar', 'state_id' => 19], 
            ['name' => 'Cuttack', 'state_id' => 19],
            ['name' => 'Amritsar', 'state_id' => 20], 
            ['name' => 'Ludhiana', 'state_id' => 20],
            ['name' => 'Jaipur', 'state_id' => 21], 
            ['name' => 'Jodhpur', 'state_id' => 21],
            ['name' => 'Gangtok', 'state_id' => 22], 
            ['name' => 'Namchi', 'state_id' => 22],
            ['name' => 'Chennai', 'state_id' => 23], 
            ['name' => 'Coimbatore', 'state_id' => 23],
            ['name' => 'Hyderabad', 'state_id' => 24], 
            ['name' => 'Warangal', 'state_id' => 24],
            ['name' => 'Agartala', 'state_id' => 25], 
            ['name' => 'Udaipur', 'state_id' => 25],
            ['name' => 'Lucknow', 'state_id' => 26], 
            ['name' => 'Kanpur', 'state_id' => 26],
            ['name' => 'Dehradun', 'state_id' => 27], 
            ['name' => 'Haridwar', 'state_id' => 27],
            ['name' => 'Kolkata', 'state_id' => 28], 
            ['name' => 'Darjeeling', 'state_id' => 28],
        ]);
    }
}
