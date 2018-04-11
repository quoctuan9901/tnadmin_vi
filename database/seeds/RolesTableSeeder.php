<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert(
        		[
					'name'        => 'Role Superadmin',
					'description' => 'This is Role for Superadmin',
					'role'        => '["list_cate","add_cate","edit_cate","delete_cate","list_news","add_news","edit_news","delete_news","list_post","add_post","edit_post","delete_post","list_tag","add_tag","edit_tag","delete_tag","list_attribute","add_attribute","edit_attribute","delete_attribute","list_manufacturer","add_manufacturer","edit_manufacturer","delete_manufacturer","list_product","add_product","edit_product","delete_product","list_position","add_position","edit_position","delete_position","list_banner","add_banner","edit_banner","delete_banner","list_user","add_user","edit_user","delete_user","list_role","add_role","edit_role","delete_role","list_contact","add_contact","edit_contact","delete_contact","config","mail","sent_mail","delete_mail","comment","reply_comment","delete_comment","list_action","delete_one_action","delete_all_action","list_login","delete_one_login","delete_all_login"]',
					'user_id'     => 1,
					'created_at'  => new \DateTime(),
                    'updated_at' => new \DateTime()
        		]
        	);
    }
}
