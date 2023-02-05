<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Listing;

class ListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();
        try{
            Listing::create(['user_id' => '1','area' => 'Αθήνα', 'availability' => 'ενοικίαση', 'size' => '75', 'price' => '300', 'active' => 1,]);
            Listing::create(['user_id' => '1','area' => 'Θεσσαλονίκη', 'availability' => 'πώληση', 'size' => '100', 'price' => '250000', 'active' => 0,]);
            Listing::create(['user_id' => '1','area' => 'Πάτρα', 'availability' => 'ενοικίαση', 'size' => '200', 'price' => '100', 'active' => 0,]);
            Listing::create(['user_id' => '1','area' => 'Ηράκλειο', 'availability' => 'πώληση', 'size' => '35', 'price' => '200000', 'active' => 0,]);
            Listing::create(['user_id' => '1','area' => 'Θεσσαλονίκη', 'availability' => 'ενοικίαση', 'size' => '90', 'price' => '35', 'active' => 1,]);
            Listing::create(['user_id' => '1','area' => 'Αθήνα', 'availability' => 'ενοικίαση', 'size' => '120', 'price' => '430', 'active' => 1,]);
            Listing::create(['user_id' => '1','area' => 'Ηράκλειο', 'availability' => 'πώληση', 'size' => '60', 'price' => '28000', 'active' => 1,]);
            Listing::create(['user_id' => '2','area' => 'Αθήνα', 'availability' => 'πώληση', 'size' => '67', 'price' => '29000', 'active' => 0,]);
            Listing::create(['user_id' => '2','area' => 'Θεσσαλονίκη', 'availability' => 'πώληση', 'size' => '52', 'price' => '310000', 'active' => 1,]);
            Listing::create(['user_id' => '2','area' => 'Πάτρα', 'availability' => 'ενοικίαση', 'size' => '34', 'price' => '150', 'active' => 0,]);

            DB::commit();
        } catch (\Throwable $th){
            DB::rollBack();
        }
    }
}
