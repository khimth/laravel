<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_name' => 'Laravel CMS',
            'contact_number' => '07445899787',
            'contact_email' => 'khim.thapa@outlook.com',
            'address' => 'Nuneaton'
        ]);
    }
}
