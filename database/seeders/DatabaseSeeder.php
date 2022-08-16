<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pangkat;
use App\Models\Golongan;
use App\Models\Satker;
use App\Models\Status;
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
  
        $csvFile = fopen(base_path("database/data/pangkat.csv"), "r");
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            Pangkat::create([
                "id_pangkat" => $data['0'],
                "nama_pangkat" => $data['1']
            ]);
        }
        fclose($csvFile);

        // golongan
        Golongan::truncate();
  
        $csvFile = fopen(base_path("database/data/gol.csv"), "r");
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            Golongan::create([
                "id_golongan" => $data['0'],
                "nama_golongan" => $data['1']
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
    }
}
