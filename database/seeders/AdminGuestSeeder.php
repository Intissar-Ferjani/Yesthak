<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminGuest;

class AdminGuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new AdminGuest();
        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('password');
        $user->save();
    }
}
