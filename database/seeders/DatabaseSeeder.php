<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pangkat;
use App\Models\Satker;
use App\Models\Status;
use App\Models\Tujuan;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Pangkat::truncate();
  
        $csvFile = fopen(base_path("database/data/pangkat-gol.csv"), "r");
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            Pangkat::create([
                "id_pangkat" => $data['0'],
                "nama_pangkat" => $data['1'],
                "golongan" => $data['2']
            ]);
        }
        fclose($csvFile);


        // satker
        Satker::truncate();
  
        $csvFile = fopen(base_path("database/data/satker.csv"), "r");
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            Satker::create([
                "id_satker" => $data['0'],
                "nama_satker" => $data['1']
            ]);
        }
        fclose($csvFile);
        
        // Status
        Status::truncate();
  
        $csvFile = fopen(base_path("database/data/status.csv"), "r");
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            Status::create([
                "id_status" => $data['0'],
                "nama_status" => $data['1']
            ]);
        }
        fclose($csvFile);
        
        // Tujuan
        Tujuan::truncate();
  
        $csvFile = fopen(base_path("database/data/tujuan.csv"), "r");
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            Tujuan::create([
                "id_tujuan" => $data['0'],
                "nama_tujuan" => $data['1'],
                "uang_harian" => $data['2']
            ]);
        }
        fclose($csvFile);
    }
}
