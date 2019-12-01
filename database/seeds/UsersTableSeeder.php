<?php

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Traits\HasRoles;

class UsersTableSeeder extends Seeder
{
    use HasRoles;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            [
                'name' => 'Admin',
                'email' => 'admin@user.com',
                'password' => bcrypt('123456'),
                'email_verified_at'  => Carbon::now()
            ],
            [
                'name' => 'Author',
                'email' => 'author@user.com',
                'password' => bcrypt('123456'),
                'email_verified_at'  => Carbon::now()
            ],
            [
                'name' => 'User',
                'email' => 'user@user.com',
                'password' => bcrypt('123456'),
                'email_verified_at'  => Carbon::now()
            ]
        );

        foreach ($users as $key => $user) 
        {
            $user = User::create($user);
            if( $key == 0){
                $user->assignRole('admin');
            }elseif( $key == 1 ){
                $user->assignRole('author');
            }else{
                $user->assignRole('user');
            }
            
        }
       
        
        
    }
}
