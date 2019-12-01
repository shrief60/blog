<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /********************************* */
        /*********** create Roles **********/

        $admin  = Role::create(['name' => 'admin'   ]);
        $user  = Role::create(['name' => 'user'    ]);
        $author  = Role::create(['name' => 'author'  ]);
        /********************************* */
        /***** Create Permissions  *********/

        $create_post = Permission::create(['name' => 'create post']);
        $edit_post = Permission::create(['name' => 'edit post']);
        $delete_post = Permission::create(['name' => 'delete post']);
        $author_permissions =[ $create_post , $edit_post , $delete_post];
        
        $add_comment = Permission::create(['name' => 'add comment']);
        $edit_comment = Permission::create(['name' => 'edit comment']);
        $delete_comment = Permission::create(['name' => 'delete comment']);
        $user_permissions = [ $add_comment , $edit_comment ,  $delete_comment ] ;

        /********************************************************* */
        /************* Assign Permissions to roles  ***************/
        
        $user->givePermissionTo( $user_permissions );
        $author->givePermissionTo( $author_permissions );
        $admin->givePermissionTo( $user_permissions );
        $admin->givePermissionTo( $author_permissions );
    }
}
