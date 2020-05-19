<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Productcategory;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([
            ['roletype'=>'Admin'],
            ['roletype'=>'Vendor'],
            ['roletype'=>'Customer'],


        ]);

//hardcoded admin

// DB::table('users')->insert([
// 'id'=>1,
// 'fname'=>'GTZ',
// 'lname'=>'Enterprise',
// 'email'=>'ourgtz@gmail.com',
// 'username'=>'gtz.enterprise',
// 'password'=>'gtzenterprise',
// 'mobileNumber'=>'9811111111',


// ]);
$user=User::create(['id'=>1,
'fname'=>'GTZ',
'lname'=>'Enterprise',
'email'=>'ourgtz@gmail.com',
// 'username'=>'gtz.enterprise',
'password'=>'gtzenterprise',
'mobileNumber'=>'9811111111',
]);
//assigining admin role
$user->roles()->attach(1);

        // $this->call(UsersTableSeeder::class);



        Productcategory::insert(


            [

                ['category'=>'Mobile'],
                ['category'=>'Computer'],
                ['category'=>'Bike'],
                ['category'=>'Suite'],
                ['category'=>'Laptop'],

                    
                    ]
            );
    }


}
