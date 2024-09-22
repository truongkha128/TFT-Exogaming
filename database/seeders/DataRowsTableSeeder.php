<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;

class DataRowsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $userDataType = DataType::where('slug', 'users')->firstOrFail();
        $menuDataType = DataType::where('slug', 'menus')->firstOrFail();
        $roleDataType = DataType::where('slug', 'roles')->firstOrFail();
        $watchDataType = DataType::where('slug', 'watches')->firstOrFail();
        $encounterDataType = DataType::where('slug', 'encounters')->firstOrFail();
        $itemDataType = DataType::where('slug', 'items')->firstOrFail();
        $traitDataType = DataType::where('slug', 'traits')->firstOrFail();
        $augmentDataType = DataType::where('slug', 'augments')->firstOrFail();
        $championDataType = DataType::where('slug', 'champions')->firstOrFail();
        $titerlistDataType = DataType::where('slug', 'tierlists')->firstOrFail();
        $newsDataType = DataType::where('slug', 'news')->firstOrFail();
        $pageDataType = DataType::where('slug', 'pages')->firstOrFail();
        // $serviceDataType = DataType::where('slug', 'services')->firstOrFail();

        $dataRow = $this->dataRow($userDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 1,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'name');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.name'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 2,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'email');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.email'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 3,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'password');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'password',
                'display_name' => __('voyager::seeders.data_rows.password'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => 4,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'remember_token');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.remember_token'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 5,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.created_at'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 6,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 7,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'avatar');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'image',
                'display_name' => __('voyager::seeders.data_rows.avatar'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 8,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'user_belongsto_role_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => __('voyager::seeders.data_rows.role'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'details'      => [
                    'model'       => 'TCG\\Voyager\\Models\\Role',
                    'table'       => 'roles',
                    'type'        => 'belongsTo',
                    'column'      => 'role_id',
                    'key'         => 'id',
                    'label'       => 'display_name',
                    'pivot_table' => 'roles',
                    'pivot'       => 0,
                ],
                'order'        => 10,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'user_belongstomany_role_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => __('voyager::seeders.data_rows.roles'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'details'      => [
                    'model'       => 'TCG\\Voyager\\Models\\Role',
                    'table'       => 'roles',
                    'type'        => 'belongsToMany',
                    'column'      => 'id',
                    'key'         => 'id',
                    'label'       => 'display_name',
                    'pivot_table' => 'user_roles',
                    'pivot'       => '1',
                    'taggable'    => '0',
                ],
                'order'        => 11,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'settings');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'hidden',
                'display_name' => 'Settings',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 12,
            ])->save();
        }

        $dataRow = $this->dataRow($menuDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 1,
            ])->save();
        }

        $dataRow = $this->dataRow($menuDataType, 'name');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.name'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 2,
            ])->save();
        }

        $dataRow = $this->dataRow($menuDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.created_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 3,
            ])->save();
        }

        $dataRow = $this->dataRow($menuDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 4,
            ])->save();
        }

        $dataRow = $this->dataRow($roleDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 1,
            ])->save();
        }

        $dataRow = $this->dataRow($roleDataType, 'name');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.name'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 2,
            ])->save();
        }

        $dataRow = $this->dataRow($roleDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.created_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 3,
            ])->save();
        }

        $dataRow = $this->dataRow($roleDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 4,
            ])->save();
        }

        $dataRow = $this->dataRow($roleDataType, 'display_name');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.display_name'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 5,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'role_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.role'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 9,
            ])->save();
        }

        /**************** watch ********/
        $dataRow = $this->dataRow($watchDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 1,
            ])->save();
        }

        $dataRow = $this->dataRow($watchDataType, 'active');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'checkbox',
                'display_name' => 'Active',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 2,
                'details'      => [
                    "checked" => true
                ]
            ])->save();
        }

        $dataRow = $this->dataRow($watchDataType, 'title');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'text_area',
                'display_name' => 'Tiêu Đề',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 3,
            ])->save();
        }

        $dataRow = $this->dataRow($watchDataType, 'link');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Link',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 4,
            ])->save();
        }

        $dataRow = $this->dataRow($watchDataType, 'option');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => 'Type',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'default' => 'comps',
                    'options' => [
                        'in-too-deep' => 'in too deep',
                        'guides' => 'guides',
                        'featured' => 'featured',
                        'comps' => 'comps',
                    ],
                    'preserveFileUploadName' => true
                ],
                'order'        => 5,
            ])->save();
        }

        $dataRow = $this->dataRow($watchDataType, 'thumb');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'image',
                'display_name' => 'Hình',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'       => [
                    'validation'    => [
                        'rule'          => 'mimes:png,jpg,jpeg,webp',
                    ],
                    "resize" => [
                        "width" => "400",
                        "height" => null
                    ],
                    "quality" => "70%",
                ],
                'order'        => 6,
            ])->save();
        }

        $dataRow = $this->dataRow($watchDataType, 'created_at');
       if (!$dataRow->exists) {
           $dataRow->fill([
               'type'         => 'timestamp',
               'display_name' => __('voyager::seeders.data_rows.created_at'),
               'required'     => 0,
               'browse'       => 0,
               'read'         => 0,
               'edit'         => 0,
               'add'          => 0,
               'delete'       => 0,
               'order'        => 100,
           ])->save();
       }

       $dataRow = $this->dataRow($watchDataType, 'updated_at');
       if (!$dataRow->exists) {
           $dataRow->fill([
               'type'         => 'timestamp',
               'display_name' => __('voyager::seeders.data_rows.updated_at'),
               'required'     => 0,
               'browse'       => 0,
               'read'         => 0,
               'edit'         => 0,
               'add'          => 0,
               'delete'       => 0,
               'order'        => 101,
           ])->save();
       }

         /**************** encounters ********/
         $dataRow = $this->dataRow($encounterDataType, 'id');
         if (!$dataRow->exists) {
             $dataRow->fill([
                 'type'         => 'number',
                 'display_name' => __('voyager::seeders.data_rows.id'),
                 'required'     => 1,
                 'browse'       => 0,
                 'read'         => 0,
                 'edit'         => 0,
                 'add'          => 0,
                 'delete'       => 0,
                 'order'        => 1,
             ])->save();
         }
 
         $dataRow = $this->dataRow($encounterDataType, 'active');
         if (!$dataRow->exists or true) {
             $dataRow->fill([
                 'type'         => 'checkbox',
                 'display_name' => 'Active',
                 'required'     => 1,
                 'browse'       => 1,
                 'read'         => 1,
                 'edit'         => 1,
                 'add'          => 1,
                 'delete'       => 1,
                 'order'        => 2,
                 'details'      => [
                     "checked" => true
                 ]
             ])->save();
         }
 
         $dataRow = $this->dataRow($encounterDataType, 'name');
         if (!$dataRow->exists or true) {
             $dataRow->fill([
                 'type'         => 'text',
                 'display_name' => 'Tên',
                 'required'     => 1,
                 'browse'       => 1,
                 'read'         => 1,
                 'edit'         => 1,
                 'add'          => 1,
                 'delete'       => 1,
                 'order'        => 3,
             ])->save();
         }
 
         $dataRow = $this->dataRow($encounterDataType, 'content');
         if (!$dataRow->exists or true) {
             $dataRow->fill([
                 'type'         => 'rich_text_box',
                 'display_name' => 'Nội dung',
                 'required'     => 0,
                 'browse'       => 0,
                 'read'         => 1,
                 'edit'         => 1,
                 'add'          => 1,
                 'delete'       => 1,
                 'order'        => 4,
             ])->save();
         }
 
         $dataRow = $this->dataRow($encounterDataType, 'option');
         if (!$dataRow->exists or true) {
             $dataRow->fill([
                 'type'         => 'select_dropdown',
                 'display_name' => 'Option',
                 'required'     => 0,
                 'browse'       => 1,
                 'read'         => 1,
                 'edit'         => 1,
                 'add'          => 1,
                 'delete'       => 1,
                 'details'      => [
                     'default' => '1',
                     'options' => [
                         '1' => '1',
                         '2' => '2',
                         '3' => '3',
                         '4' => '4',
                         '5' => '5',
                     ],
                     'preserveFileUploadName' => true
                 ],
                 'order'        => 5,
             ])->save();
         }
 
         $dataRow = $this->dataRow($encounterDataType, 'thumb');
         if (!$dataRow->exists or true) {
             $dataRow->fill([
                 'type'         => 'image',
                 'display_name' => 'Hình',
                 'required'     => 0,
                 'browse'       => 1,
                 'read'         => 1,
                 'edit'         => 1,
                 'add'          => 1,
                 'delete'       => 1,
                 'details'       => [
                     'validation'    => [
                         'rule'          => 'mimes:png,jpg,jpeg,webp',
                     ],
                     "resize" => [
                         "width" => "200",
                         "height" => null
                     ],
                     "quality" => "60%",
                 ],
                 'order'        => 6,
             ])->save();
         }

         $dataRow = $this->dataRow($encounterDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.created_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 100,
            ])->save();
        }

        $dataRow = $this->dataRow($encounterDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 101,
            ])->save();
        }

         /**************** item ********/
        $dataRow = $this->dataRow($itemDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 1,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'active');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'checkbox',
                'display_name' => 'Active',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 2,
                'details'      => [
                    "checked" => true
                ]
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'name');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Tên',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 3,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'description');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'text_area',
                'display_name' => 'Tóm tắt',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 4,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'content');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'rich_text_box',
                'display_name' => 'Nội dung',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 5,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'type');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => 'Danh mục',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'default' => 'all',
                    'options' => [
                        'all' => 'All',
                        'component' => 'Component',
                        'craftable' => 'Craftable',
                        'emblem' => 'Emblem',
                        'radiant' => 'Radiant',
                        'ornm' => 'Ornm',
                    ],
                    'preserveFileUploadName' => true
                ],
                'order'        => 6,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'thumb');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'image',
                'display_name' => 'Hình',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'       => [
                    'validation'    => [
                        'rule'          => 'mimes:png,jpg,jpeg,webp',
                    ],
                    "resize" => [
                        "width" => "200",
                        "height" => null
                    ],
                    "quality" => "70%",
                ],
                'order'        => 8,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'news_belongsto_user_relationship');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'User',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => [
                    'model'       => 'TCG\\Voyager\\Models\\User',
                    'table'       => 'users',
                    'type'        => 'belongsTo',
                    'column'      => 'user_id',
                    'key'         => 'id',
                    'label'       => 'name',
                    'pivot_table' => 'users',
                    'pivot'       => 0,
                ],
                'order'        => 9,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'user_id');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'hidden',
                'display_name' => 'User',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 10,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.created_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 100,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 101,
            ])->save();
        }
        

        /**************** trait ********/
        $dataRow = $this->dataRow($traitDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 1,
            ])->save();
        }

        $dataRow = $this->dataRow($traitDataType, 'active');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'checkbox',
                'display_name' => 'Active',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 2,
                'details'      => [
                    "checked" => true
                ]
            ])->save();
        }

        $dataRow = $this->dataRow($traitDataType, 'name');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Tên',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 3,
            ])->save();
        }

        $dataRow = $this->dataRow($traitDataType, 'description');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'text_area',
                'display_name' => 'Tóm tắt',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 4,
            ])->save();
        }

        $dataRow = $this->dataRow($traitDataType, 'content');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'rich_text_box',
                'display_name' => 'Nội dung',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 5,
            ])->save();
        }

        $dataRow = $this->dataRow($traitDataType, 'type');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => 'Danh mục',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'default' => 'all',
                    'options' => [
                        'all' => 'All',
                        'classes' => 'Classes',
                        'origins' => 'Origins',
                    ],
                    'preserveFileUploadName' => true
                ],
                'order'        => 6,
            ])->save();
        }

        $dataRow = $this->dataRow($traitDataType, 'thumb');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'image',
                'display_name' => 'Hình',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'       => [
                    'validation'    => [
                        'rule'          => 'mimes:png,jpg,jpeg,webp',
                    ],
                    "resize" => [
                        "width" => "200",
                        "height" => null
                    ],
                    "quality" => "70%",
                ],
                'order'        => 8,
            ])->save();
        }

        $dataRow = $this->dataRow($traitDataType, 'news_belongsto_user_relationship');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'User',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => [
                    'model'       => 'TCG\\Voyager\\Models\\User',
                    'table'       => 'users',
                    'type'        => 'belongsTo',
                    'column'      => 'user_id',
                    'key'         => 'id',
                    'label'       => 'name',
                    'pivot_table' => 'users',
                    'pivot'       => 0,
                ],
                'order'        => 9,
            ])->save();
        }

        $dataRow = $this->dataRow($traitDataType, 'user_id');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'hidden',
                'display_name' => 'User',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 10,
            ])->save();
        }

        $dataRow = $this->dataRow($traitDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.created_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 100,
            ])->save();
        }

        $dataRow = $this->dataRow($traitDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 101,
            ])->save();
        }

        /**************** augment ********/
        $dataRow = $this->dataRow($augmentDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 1,
            ])->save();
        }

        $dataRow = $this->dataRow($augmentDataType, 'active');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'checkbox',
                'display_name' => 'Active',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 2,
                'details'      => [
                    "checked" => true
                ]
            ])->save();
        }

        $dataRow = $this->dataRow($augmentDataType, 'name');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Tên',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 3,
            ])->save();
        }

        $dataRow = $this->dataRow($augmentDataType, 'description');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'text_area',
                'display_name' => 'Tóm tắt',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 4,
            ])->save();
        }

        $dataRow = $this->dataRow($augmentDataType, 'content');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'rich_text_box',
                'display_name' => 'Nội dung',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 5,
            ])->save();
        }

        $dataRow = $this->dataRow($augmentDataType, 'type');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => 'Danh mục',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'default' => 'all',
                    'options' => [
                        'all' => 'All',
                        'tier1' => 'tier1',
                        'tier2' => 'tier2',
                        'tier3' => 'tier3',
                    ],
                    'preserveFileUploadName' => true
                ],
                'order'        => 6,
            ])->save();
        }

        $dataRow = $this->dataRow($augmentDataType, 'thumb');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'image',
                'display_name' => 'Hình',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'       => [
                    'validation'    => [
                        'rule'          => 'mimes:png,jpg,jpeg,webp',
                    ],
                    "resize" => [
                        "width" => "200",
                        "height" => null
                    ],
                    "quality" => "70%",
                ],
                'order'        => 8,
            ])->save();
        }

        $dataRow = $this->dataRow($augmentDataType, 'news_belongsto_user_relationship');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'User',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => [
                    'model'       => 'TCG\\Voyager\\Models\\User',
                    'table'       => 'users',
                    'type'        => 'belongsTo',
                    'column'      => 'user_id',
                    'key'         => 'id',
                    'label'       => 'name',
                    'pivot_table' => 'users',
                    'pivot'       => 0,
                ],
                'order'        => 9,
            ])->save();
        }

        $dataRow = $this->dataRow($augmentDataType, 'user_id');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'hidden',
                'display_name' => 'User',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 10,
            ])->save();
        }

        $dataRow = $this->dataRow($augmentDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.created_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 100,
            ])->save();
        }

        $dataRow = $this->dataRow($augmentDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 101,
            ])->save();
        }

        /**************** champion ********/
        $dataRow = $this->dataRow($championDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 1,
            ])->save();
        }

        $dataRow = $this->dataRow($championDataType, 'active');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'checkbox',
                'display_name' => 'Active',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 2,
                'details'      => [
                    "checked" => true
                ]
            ])->save();
        }

        $dataRow = $this->dataRow($championDataType, 'name');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Tên quản trị',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 3,
            ])->save();
        }

        $dataRow = $this->dataRow($championDataType, 'description');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'text_area',
                'display_name' => 'Tên giao diện',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 4,
            ])->save();
        }

        $dataRow = $this->dataRow($championDataType, 'content');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'rich_text_box',
                'display_name' => 'Nội dung',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 5,
            ])->save();
        }

        $dataRow = $this->dataRow($championDataType, 'skill');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'text_area',
                'display_name' => 'Skill',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 6,
            ])->save();
        }

        $dataRow = $this->dataRow($championDataType, 'image_skill');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'image',
                'display_name' => 'Hình kỹ năng',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'       => [
                    'validation'    => [
                        'rule'          => 'mimes:png,jpg,jpeg,webp',
                    ],
                    "resize" => [
                        "width" => "200",
                        "height" => null
                    ],
                    "quality" => "50%",
                ],
                'order'        => 7,
            ])->save();
        }

        $dataRow = $this->dataRow($championDataType, 'type');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => 'Giá trị tướng',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'default' => '1',
                    'options' => [
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                    ],
                    'preserveFileUploadName' => true
                ],
                'order'        => 8,
            ])->save();
        }

        $dataRow = $this->dataRow($championDataType, 'star');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => 'Tướng 3 sao',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'default' => '1',
                    'options' => [
                        '1' => '1',
                        '3' => '3',
                    ],
                    'preserveFileUploadName' => true
                ],
                'order'        => 9,
            ])->save();
        }

        $dataRow = $this->dataRow($championDataType, 'thumb');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'image',
                'display_name' => 'Hình to',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'       => [
                    'validation'    => [
                        'rule'          => 'mimes:png,jpg,jpeg,webp',
                    ],
                    "resize" => [
                        "width" => "400",
                        "height" => null
                    ],
                    "quality" => "70%",
                ],
                'order'        => 10,
            ])->save();
        }

        $dataRow = $this->dataRow($championDataType, 'thumbnail');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'image',
                'display_name' => 'Hình nhỏ',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'       => [
                    'validation'    => [
                        'rule'          => 'mimes:png,jpg,jpeg,webp',
                    ],
                    "resize" => [
                        "width" => "200",
                        "height" => null
                    ],
                    "quality" => "50%",
                ],
                'order'        => 11,
            ])->save();
        }
        $dataRow = $this->dataRow($championDataType, 'champions_belongstomany_item_relationship');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'Đồ',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'details'      => [
                    'model'       => 'App\\Models\\Items',
                    'table'       => 'items',
                    'type'        => 'belongsToMany',
                    'column'      => 'id',
                    'key'         => 'id',
                    'label'       => 'name',
                    'pivot_table' => 'champions_item',
                    'pivot'       => '1',
                    'taggable'    => '0',
                    'scope' => 'active',
                ],
                'order'        => 12,
            ])->save();
        }

        $dataRow = $this->dataRow($championDataType, 'champions_belongstomany_trait_relationship');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'Ấn',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'details'      => [
                    'model'       => 'App\\Models\\Traits',
                    'table'       => 'traits',
                    'type'        => 'belongsToMany',
                    'column'      => 'id',
                    'key'         => 'id',
                    'label'       => 'name',
                    'pivot_table' => 'champions_trait',
                    'pivot'       => '1',
                    'taggable'    => '0',
                    'scope' => 'active',
                ],
                'order'        => 13,
            ])->save();
        }

        $dataRow = $this->dataRow($championDataType, 'champions_belongstomany_augment_relationship');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'Lõi',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'details'      => [
                    'model'       => 'App\\Models\\Augments',
                    'table'       => 'augments',
                    'type'        => 'belongsToMany',
                    'column'      => 'id',
                    'key'         => 'id',
                    'label'       => 'name',
                    'pivot_table' => 'champions_augment',
                    'pivot'       => '1',
                    'taggable'    => '0',
                    'scope' => 'active',
                ],
                'order'        => 14,
            ])->save();
        }
        $dataRow = $this->dataRow($championDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.created_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 15,
            ])->save();
        }

        $dataRow = $this->dataRow($championDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 16,
            ])->save();
        }

        /**************** tierlists ********/
        $dataRow = $this->dataRow($titerlistDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 1,
            ])->save();
        }

        $dataRow = $this->dataRow($titerlistDataType, 'active');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'checkbox',
                'display_name' => 'Active',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 2,
                'details'      => [
                    "checked" => true
                ]
            ])->save();
        }

        $dataRow = $this->dataRow($titerlistDataType, 'name');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Tên Đội Hình',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 3,
            ])->save();
        }

        $dataRow = $this->dataRow($titerlistDataType, 'type_gold');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => 'Giá trị tướng chính',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'default' => '1',
                    'options' => [
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                    ],
                    'preserveFileUploadName' => true
                ],
                'order'        => 4,
            ])->save();
        }

        $dataRow = $this->dataRow($titerlistDataType, 'description');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'text_area',
                'display_name' => 'Tóm tắt',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 5,
            ])->save();
        }
        $dataRow = $this->dataRow($titerlistDataType, 'type');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => 'Rank đội hình',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'default' => 's',
                    'options' => [
                        's' => 'Rank S',
                        'a' => 'Rank A',
                        'b' => 'Rank B',
                        'c' => 'Rank C',
                    ],
                    'preserveFileUploadName' => true
                ],
                'order'        => 6,
            ])->save();
        }


        $dataRow = $this->dataRow($titerlistDataType, 'type_rank');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => 'Cập nhập tướng',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'default' => 'default',
                    'options' => [
                        'default' => 'Default',
                        'new' => 'New',
                        'rising' => 'Rising',
                        'falling' => 'Falling',
                    ],
                    'preserveFileUploadName' => true
                ],
                'order'        => 7,
            ])->save();
        }
        
        $dataRow = $this->dataRow($titerlistDataType, 'tip');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'text_area',
                'display_name' => 'Tip chơi',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 8,
            ])->save();
        }

        $dataRow = $this->dataRow($titerlistDataType, 'stage2');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Giai đoạn 2',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 9,
            ])->save();
        }

        $dataRow = $this->dataRow($titerlistDataType, 'stage3');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Giai đoạn 3',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 10,
            ])->save();
        }
        $dataRow = $this->dataRow($titerlistDataType, 'stage4');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Giai đoạn 4',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 11,
            ])->save();
        }
        $dataRow = $this->dataRow($titerlistDataType, 'thumb');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'image',
                'display_name' => 'Hình',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'       => [
                    'validation'    => [
                        'rule'          => 'mimes:png,jpg,jpeg,webp',
                    ],
                    "resize" => [
                        "width" => "200",
                        "height" => null
                    ],
                    "quality" => "70%",
                ],
                'order'        => 12,
            ])->save();
        }

        $dataRow = $this->dataRow($titerlistDataType, 'image_team');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'image',
                'display_name' => 'Vị trí đội hình',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'       => [
                    'validation'    => [
                        'rule'          => 'mimes:png,jpg,jpeg,webp',
                    ],
                    "resize" => [
                        "width" => "1080",
                        "height" => "550"
                    ],
                    "quality" => "100%",
                ],
                'order'        => 13,
            ])->save();
        }

        $dataRow = $this->dataRow($titerlistDataType, 'core');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'image',
                'display_name' => 'Core Chính',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'       => [
                    'validation'    => [
                        'rule'          => 'mimes:png,jpg,jpeg,webp',
                    ],
                    "resize" => [
                        "width" => "200",
                        "height" => null
                    ],
                    "quality" => "40%",
                ],
                'order'        => 14,
            ])->save();
        }

        // $dataRow = $this->dataRow($titerlistDataType, 'tierlists_belongsto_trait_relationship');
        // if (!$dataRow->exists or true) {
        //     $dataRow->fill([
        //         'type'         => 'relationship',
        //         'display_name' => 'Ấn chính',
        //         'required'     => 0,
        //         'browse'       => 0,
        //         'read'         => 1,
        //         'edit'         => 1,
        //         'add'          => 1,
        //         'delete'       => 1,
        //         'details'      => [
        //             'model'       => 'App\\Models\\Traits',
        //             'table'       => 'traits',
        //             'type'        => 'belongsTo',
        //             'column'      => 'traits_id',
        //             'key'         => 'id',
        //             'label'       => 'name',
        //             'pivot_table' => 'traits_id',
        //             'pivot'       => 0,
        //             "taggable"    => null
        //         ],
        //         'order'        => 15,
        //     ])->save();
        // }
        // $dataRow = $this->dataRow($titerlistDataType, 'traits_id');
        // if (!$dataRow->exists or true) {
        //     $dataRow->fill([
        //         'type'         => 'hidden',
        //         'display_name' => 'Trait',
        //         'required'     => 0,
        //         'browse'       => 0,
        //         'read'         => 0,
        //         'edit'         => 1,
        //         'add'          => 1,
        //         'delete'       => 1,
        //         'order'        => 16,
        //     ])->save();
        // }

        $dataRow = $this->dataRow($titerlistDataType, 'tierlists_belongstomany_champion_relationship');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'Bộ khung tướng',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'details'      => [
                    'model'       => 'App\\Models\\Champions',
                    'table'       => 'champions',
                    'type'        => 'belongsToMany',
                    'column'      => 'id',
                    'key'         => 'id',
                    'label'       => 'name',
                    'pivot_table' => 'tierlists_champion',
                    'pivot'       => '1',
                    'taggable'    => '0',
                    'scope' => 'active',
                ],
                'order'        => 17,
            ])->save();
        }

        $dataRow = $this->dataRow($titerlistDataType, 'tierlists_belongstomany_early_relationship');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'Bộ khung đầu trận',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'details'      => [
                    'model'       => 'App\\Models\\Champions',
                    'table'       => 'champions',
                    'type'        => 'belongsToMany',
                    'column'      => 'id',
                    'key'         => 'id',
                    'label'       => 'name',
                    'pivot_table' => 'tierlists_early',
                    'pivot'       => '1',
                    'taggable'    => '0',
                    'scope' => 'active',
                ],
                'order'        => 18,
            ])->save();
        }

        $dataRow = $this->dataRow($titerlistDataType, 'tierlists_belongstomany_between_relationship');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'Bộ khung giữa trận',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'details'      => [
                    'model'       => 'App\\Models\\Champions',
                    'table'       => 'champions',
                    'type'        => 'belongsToMany',
                    'column'      => 'id',
                    'key'         => 'id',
                    'label'       => 'name',
                    'pivot_table' => 'tierlists_between',
                    'pivot'       => '1',
                    'taggable'    => '0',
                    'scope' => 'active',
                ],
                'order'        => 19,
            ])->save();
        }

        $dataRow = $this->dataRow($titerlistDataType, 'tierlists_belongstomany_end_relationship');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'Tướng chủ lực cuối trận',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'details'      => [
                    'model'       => 'App\\Models\\Champions',
                    'table'       => 'champions',
                    'type'        => 'belongsToMany',
                    'column'      => 'id',
                    'key'         => 'id',
                    'label'       => 'name',
                    'pivot_table' => 'tierlists_end',
                    'pivot'       => '1',
                    'taggable'    => '0',
                    'scope' => 'active',
                ],
                'order'        => 20,
            ])->save();
        }

        $dataRow = $this->dataRow($titerlistDataType, 'tierlists_belongstomany_item_relationship');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'Trang bị cho đội hình',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'details'      => [
                    'model'       => 'App\\Models\\Items',
                    'table'       => 'items',
                    'type'        => 'belongsToMany',
                    'column'      => 'id',
                    'key'         => 'id',
                    'label'       => 'name',
                    'pivot_table' => 'tierlists_item',
                    'pivot'       => '1',
                    'taggable'    => '0',
                    'scope' => 'active',
                ],
                'order'        => 21,
            ])->save();
        }

        $dataRow = $this->dataRow($titerlistDataType, 'tierlists_belongstomany_augment_relationship');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'Lõi cho đội hình',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'details'      => [
                    'model'       => 'App\\Models\\Augments',
                    'table'       => 'augments',
                    'type'        => 'belongsToMany',
                    'column'      => 'id',
                    'key'         => 'id',
                    'label'       => 'name',
                    'pivot_table' => 'tierlists_augment',
                    'pivot'       => '1',
                    'taggable'    => '0',
                    'scope' => 'active',
                ],
                'order'        => 22,
            ])->save();
        }
        
        $dataRow = $this->dataRow($titerlistDataType, 'link');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Link hướng dẫn đội hình',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 23,
            ])->save();
        }

        $dataRow = $this->dataRow($titerlistDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.created_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 24,
            ])->save();
        }

        $dataRow = $this->dataRow($titerlistDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 25,
            ])->save();
        }

       

        /**************** news ********/
        $dataRow = $this->dataRow($newsDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 1,
            ])->save();
        }

        $dataRow = $this->dataRow($newsDataType, 'active');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'checkbox',
                'display_name' => 'Active',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 2,
                'details'      => [
                    "checked" => true
                ]
            ])->save();
        }

        $dataRow = $this->dataRow($newsDataType, 'title');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Title',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 3,
            ])->save();
        }

        $dataRow = $this->dataRow($newsDataType, 'description');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'text_area',
                'display_name' => 'Description',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 4,
            ])->save();
        }

        $dataRow = $this->dataRow($newsDataType, 'content');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'rich_text_box',
                'display_name' => 'Content',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 5,
            ])->save();
        }

        $dataRow = $this->dataRow($newsDataType, 'thumb');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'image',
                'display_name' => 'Thumb',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'       => [
                    'validation'    => [
                        'rule'          => 'mimes:png,jpg,jpeg,webp',
                    ],
                    "resize" => [
                        "width" => "400",
                        "height" => null
                    ],
                    "quality" => "70%",
                ],
                'order'        => 6,
            ])->save();
        }

        $dataRow = $this->dataRow($newsDataType, 'file');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'file',
                'display_name' => 'file',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'       => [
                    'validation'    => [
                        'rule'          => 'mimes:pdf',
                    ]
                ],
                'order'        => 6,
            ])->save();
        }

        $dataRow = $this->dataRow($newsDataType, 'category_id');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => 'Category',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 8,
            ])->save();
        }

        $dataRow = $this->dataRow($newsDataType, 'news_belongsto_user_relationship');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'User',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => [
                    'model'       => 'TCG\\Voyager\\Models\\User',
                    'table'       => 'users',
                    'type'        => 'belongsTo',
                    'column'      => 'user_id',
                    'key'         => 'id',
                    'label'       => 'name',
                    'pivot_table' => 'users',
                    'pivot'       => 0,
                ],
                'order'        => 9,
            ])->save();
        }

        $dataRow = $this->dataRow($newsDataType, 'user_id');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'hidden',
                'display_name' => 'User',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 10,
            ])->save();
        }

        $dataRow = $this->dataRow($newsDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.created_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 14,
            ])->save();
        }

        $dataRow = $this->dataRow($newsDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 15,
            ])->save();
        }


        /**************** pages ********/
        $dataRow = $this->dataRow($pageDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 1,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'active');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'checkbox',
                'display_name' => 'Active',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 2,
                'details'      => [
                    "checked" => true
                ]
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'title');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Title',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 3,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'slug');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Slug',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 4,
            ])->save();
        }


        $dataRow = $this->dataRow($pageDataType, 'description');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'text_area',
                'display_name' => 'Description',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 5,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'content');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'rich_text_box',
                'display_name' => 'Content',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 6,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'thumb');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'image',
                'display_name' => 'Thumb',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'       => [
                    'validation'    => [
                        'rule'          => 'mimes:png,jpg,jpeg,webp',
                    ]
                ],
                'order'        => 7,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'pages_belongsto_user_relationship');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'User',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => [
                    'model'       => 'TCG\\Voyager\\Models\\User',
                    'table'       => 'users',
                    'type'        => 'belongsTo',
                    'column'      => 'user_id',
                    'key'         => 'id',
                    'label'       => 'name',
                    'pivot_table' => 'users',
                    'pivot'       => 0,
                ],
                'order'        => 9,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'user_id');
        if (!$dataRow->exists or true) {
            $dataRow->fill([
                'type'         => 'hidden',
                'display_name' => 'User',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 10,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.created_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 14,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 15,
            ])->save();
        }

    }

    /**
     * [dataRow description].
     *
     * @param [type] $type  [description]
     * @param [type] $field [description]
     *
     * @return [type] [description]
     */
    protected function dataRow($type, $field)
    {
        return DataRow::firstOrNew([
            'data_type_id' => $type->id,
            'field'        => $field,
        ]);
    }
}
