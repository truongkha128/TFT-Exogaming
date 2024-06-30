<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class DataTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = $this->dataType('slug', 'users');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'users',
                'display_name_singular' => __('voyager::seeders.data_types.user.singular'),
                'display_name_plural'   => __('voyager::seeders.data_types.user.plural'),
                'icon'                  => 'voyager-person',
                'model_name'            => 'TCG\\Voyager\\Models\\User',
                'policy_name'           => 'TCG\\Voyager\\Policies\\UserPolicy',
                'controller'            => 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'menus');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'menus',
                'display_name_singular' => __('voyager::seeders.data_types.menu.singular'),
                'display_name_plural'   => __('voyager::seeders.data_types.menu.plural'),
                'icon'                  => 'voyager-list',
                'model_name'            => 'TCG\\Voyager\\Models\\Menu',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'roles');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'roles',
                'display_name_singular' => __('voyager::seeders.data_types.role.singular'),
                'display_name_plural'   => __('voyager::seeders.data_types.role.plural'),
                'icon'                  => 'voyager-lock',
                'model_name'            => 'TCG\\Voyager\\Models\\Role',
                'controller'            => 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'watches');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'watches',
                'display_name_singular' => 'Watches',
                'display_name_plural'   => 'Watches',
                'icon'                  => 'voyager-list',
                'model_name'            => 'App\\Models\\watches',
                'controller'            => 'App\\Http\\Controllers\\Admin\\WatchesController',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'encounters');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'encounters',
                'display_name_singular' => 'Encounters',
                'display_name_plural'   => 'Encounters',
                'icon'                  => 'voyager-list',
                'model_name'            => 'App\\Models\\encounters',
                'controller'            => 'App\\Http\\Controllers\\Admin\\EncountersController',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'items');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'items',
                'display_name_singular' => 'Trang bị',
                'display_name_plural'   => 'Trang bị',
                'icon'                  => 'voyager-list',
                'model_name'            => 'App\\Models\\Items',
                'controller'            => 'App\\Http\\Controllers\\Admin\\ItemsController',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'traits');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'traits',
                'display_name_singular' => 'Ấn',
                'display_name_plural'   => 'Ấn',
                'icon'                  => 'voyager-list',
                'model_name'            => 'App\\Models\\Traits',
                'controller'            => 'App\\Http\\Controllers\\Admin\\TraitsController',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'augments');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'augments',
                'display_name_singular' => 'Lõi',
                'display_name_plural'   => 'Lõi',
                'icon'                  => 'voyager-list',
                'model_name'            => 'App\\Models\\Augments',
                'controller'            => 'App\\Http\\Controllers\\Admin\\AugmentsController',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'champions');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'champions',
                'display_name_singular' => 'Tướng',
                'display_name_plural'   => 'Tướng',
                'icon'                  => 'voyager-list',
                'model_name'            => 'App\\Models\\Champions',
                'controller'            => 'App\\Http\\Controllers\\Admin\\ChampionsController',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'tierlists');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'tierlists',
                'display_name_singular' => 'Đội hình tiêu biểu',
                'display_name_plural'   => 'Đội hình tiêu biểu',
                'icon'                  => 'voyager-list',
                'model_name'            => 'App\\Models\\Tierlists',
                'controller'            => 'App\\Http\\Controllers\\Admin\\TierlistsController',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'news');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'news',
                'display_name_singular' => 'News',
                'display_name_plural'   => 'News',
                'icon'                  => 'voyager-news',
                'model_name'            => 'App\\Models\\News',
                'controller'            => 'App\\Http\\Controllers\\Admin\\NewsController',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'pages');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'pages',
                'display_name_singular' => 'Page',
                'display_name_plural'   => 'Pages',
                'icon'                  => 'voyager-window-list',
                'model_name'            => 'App\\Models\\Page',
                'controller'            => 'App\\Http\\Controllers\\Admin\\PageController',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

    }

    /**
     * [dataType description].
     *
     * @param [type] $field [description]
     * @param [type] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}
