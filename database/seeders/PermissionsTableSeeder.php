<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $keys = [
            'browse_admin',
            'browse_bread',
            'browse_database',
            'browse_media',
            'browse_compass',
        ];

        foreach ($keys as $key) {
            Permission::firstOrCreate([
                'key'        => $key,
                'table_name' => null,
            ]);
        }

        Permission::generateFor('menus');

        Permission::generateFor('roles');

        Permission::generateFor('users');

        Permission::generateFor('settings');

        Permission::generateFor('watches');

        Permission::generateFor('encounters');

        Permission::generateFor('items');

        Permission::generateFor('traits');

        Permission::generateFor('augments');

        Permission::generateFor('champions');

        Permission::generateFor('tierlists');
        
        Permission::generateFor('news');

        // Permission::generateFor('news_categories');

        // Permission::generateFor('dfm_jobs');

        Permission::generateFor('pages');

        // Permission::generateFor('services');
    }
}
