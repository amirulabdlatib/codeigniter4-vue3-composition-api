<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class ProductSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            $this->db->table('products')->insert($this->generateProducts());
        }
    }

    private function generateProducts()
    {
        $faker = Factory::create();

        return [
            'name'        => $faker->word(),
            'description' => $faker->paragraph(),
            'price'       => $faker->numberBetween(10, 500),
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s'),
        ];
    }
}
