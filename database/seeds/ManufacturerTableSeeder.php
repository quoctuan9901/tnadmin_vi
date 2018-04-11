<?php

use Illuminate\Database\Seeder;

class ManufacturerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manufacturer')->insert(
        		[
					'name'        => 'Updating',
					'description' => 'Updating',
					'created_at'  => new \DateTime(),
                    'updated_at' => new \DateTime()
        		]
        	);
    }
}
