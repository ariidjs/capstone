<?php

use Illuminate\Database\Seeder;
use App\Penerima;
use App\Tracking;
use App\DetailTracking;

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
        $tracking = factory(Tracking::class, 10)->create();
        $detailtracking = factory(DetailTracking::class, 10)->create();
    }
}
