<?php

use Illuminate\Database\Seeder;
use App\Penerima;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $penerima = factory(Penerima::class, 10)->create();
    }
}
