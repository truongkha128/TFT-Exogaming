<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::where('name', 'admin')->firstOrFail();

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('voyager::seeders.menu_items.dashboard'),
            'url'     => '',
            'route'   => 'voyager.dashboard',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-boat',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 1,
            ])->save();
        }

        $userMenuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'User',
            'url'     => '',
        ]);
        if (!$userMenuItem->exists or true) {
            $userMenuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-person',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 3,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('voyager::seeders.menu_items.users'),
            'url'     => '',
            'route'   => 'voyager.users.index',
        ]);
        if (!$menuItem->exists or true) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-person',
                'color'      => null,
                'parent_id'  => $userMenuItem->id,
                'order'      => 1,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('voyager::seeders.menu_items.roles'),
            'url'     => '',
            'route'   => 'voyager.roles.index',
        ]);
        if (!$menuItem->exists or true) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-lock',
                'color'      => null,
                'parent_id'  => $userMenuItem->id,
                'order'      => 2,
            ])->save();
        }

        $cmsMenuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'CMS',
            'url'     => '',
        ]);
        if (!$cmsMenuItem->exists or true) {
            $cmsMenuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-pie-chart',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 2,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Watches',
            'url'     => '',
            'route'   => 'voyager.watches.index',
        ]);
        if (!$menuItem->exists or true) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-documentation',
                'color'      => null,
                'parent_id'  => $cmsMenuItem->id,
                'order'      => 1,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Encounters',
            'url'     => '',
            'route'   => 'voyager.encounters.index',
        ]);
        if (!$menuItem->exists or true) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-documentation',
                'color'      => null,
                'parent_id'  => $cmsMenuItem->id,
                'order'      => 2,
            ])->save();
        }
        
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Items',
            'url'     => '',
            'route'   => 'voyager.items.index',
        ]);
        if (!$menuItem->exists or true) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-documentation',
                'color'      => null,
                'parent_id'  => $cmsMenuItem->id,
                'order'      => 3,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Traits',
            'url'     => '',
            'route'   => 'voyager.traits.index',
        ]);
        if (!$menuItem->exists or true) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-documentation',
                'color'      => null,
                'parent_id'  => $cmsMenuItem->id,
                'order'      => 4,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'augments',
            'url'     => '',
            'route'   => 'voyager.augments.index',
        ]);
        if (!$menuItem->exists or true) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-documentation',
                'color'      => null,
                'parent_id'  => $cmsMenuItem->id,
                'order'      => 5,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Champions',
            'url'     => '',
            'route'   => 'voyager.champions.index',
        ]);
        if (!$menuItem->exists or true) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-documentation',
                'color'      => null,
                'parent_id'  => $cmsMenuItem->id,
                'order'      => 6,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Tierlists',
            'url'     => '',
            'route'   => 'voyager.tierlists.index',
        ]);
        if (!$menuItem->exists or true) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-documentation',
                'color'      => null,
                'parent_id'  => $cmsMenuItem->id,
                'order'      => 7,
            ])->save();
        }


        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'News',
            'url'     => '',
            'route'   => 'voyager.news.index',
        ]);
        if (!$menuItem->exists or true) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-news',
                'color'      => null,
                'parent_id'  => $cmsMenuItem->id,
                'order'      => 8,
            ])->save();
        }

        // $menuItem = MenuItem::firstOrNew([
        //     'menu_id' => $menu->id,
        //     'title'   => 'News Categories',
        //     'url'     => '',
        //     'route'   => 'voyager.news_categories.index',
        // ]);
        // if (!$menuItem->exists or true) {
        //     $menuItem->fill([
        //         'target'     => '_self',
        //         'icon_class' => 'voyager-categories',
        //         'color'      => null,
        //         'parent_id'  => $cmsMenuItem->id,
        //         'order'      => 3,
        //     ])->save();
        // }

        // $menuItem = MenuItem::firstOrNew([
        //     'menu_id' => $menu->id,
        //     'title'   => 'Jobs',
        //     'url'     => '',
        //     'route'   => 'voyager.dfm_jobs.index',
        // ]);
        // if (!$menuItem->exists or true) {
        //     $menuItem->fill([
        //         'target'     => '_self',
        //         'icon_class' => 'voyager-study',
        //         'color'      => null,
        //         'parent_id'  => $cmsMenuItem->id,
        //         'order'      => 4,
        //     ])->save();
        // }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Pages',
            'url'     => '',
            'route'   => 'voyager.pages.index',
        ]);
        if (!$menuItem->exists or true) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-window-list',
                'color'      => null,
                'parent_id'  => $cmsMenuItem->id,
                'order'      => 9,
            ])->save();
        }

        // $menuItem = MenuItem::firstOrNew([
        //     'menu_id' => $menu->id,
        //     'title'   => 'Services',
        //     'url'     => '',
        //     'route'   => 'voyager.services.index',
        // ]);
        // if (!$menuItem->exists or true) {
        //     $menuItem->fill([
        //         'target'     => '_self',
        //         'icon_class' => 'voyager-treasure',
        //         'color'      => null,
        //         'parent_id'  => $cmsMenuItem->id,
        //         'order'      => 7,
        //     ])->save();
        // }

        $toolsMenuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('voyager::seeders.menu_items.tools'),
            'url'     => '',
        ]);
        if (!$toolsMenuItem->exists or true) {
            $toolsMenuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-tools',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 15,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('voyager::seeders.menu_items.menu_builder'),
            'url'     => '',
            'route'   => 'voyager.menus.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-list',
                'color'      => null,
                'parent_id'  => $toolsMenuItem->id,
                'order'      => 10,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('voyager::seeders.menu_items.media'),
            'url'     => '',
            'route'   => 'voyager.media.index',
        ]);
        if (!$menuItem->exists or true) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-images',
                'color'      => null,
                'parent_id'  => $toolsMenuItem->id,
                'order'      => 11,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('voyager::seeders.menu_items.database'),
            'url'     => '',
            'route'   => 'voyager.database.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-data',
                'color'      => null,
                'parent_id'  => $toolsMenuItem->id,
                'order'      => 12,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('voyager::seeders.menu_items.compass'),
            'url'     => '',
            'route'   => 'voyager.compass.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-compass',
                'color'      => null,
                'parent_id'  => $toolsMenuItem->id,
                'order'      => 12,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('voyager::seeders.menu_items.bread'),
            'url'     => '',
            'route'   => 'voyager.bread.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-bread',
                'color'      => null,
                'parent_id'  => $toolsMenuItem->id,
                'order'      => 13,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('voyager::seeders.menu_items.settings'),
            'url'     => '',
            'route'   => 'voyager.settings.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-settings',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 14,
            ])->save();
        }
    }
}
