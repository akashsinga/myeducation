<?php

use Illuminate\Database\Seeder;
use App\Models\Management;
class ManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Management::class,100)->create();
    }
}
