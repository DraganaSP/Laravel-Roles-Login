<?php

use Illuminate\Database\Seeder;
use App\Role as Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['admin', 'editor', 'regular'];

        foreach($arr as $role){
            $r = new Role;
            $r->name = $role;
            $r->save();
        }
    }
}
