<?php namespace Shohabbos\Banner;

use Backend;
use Form;
use RainLab\Location\Models\Country;
use RainLab\Location\Models\State;
use System\Classes\PluginBase;

/**
 * Banner Plugin Information File
 */
class Plugin extends PluginBase
{


    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'shohabbos.banner::lang.plugin.name',
            'description' => 'shohabbos.banner::lang.plugin.description',
            'author'      => 'Shohabbos',
            'icon'        => 'icon-picture-o'
        ];
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Shohabbos\Banner\Components\Banners' => 'BannerBanners',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'shohabbos.banner.banners' => [
                'tab'   => 'shohabbos.banner::lang.plugin.name',
                'label' => 'shohabbos.banner::lang.permission.access'
            ],
            'shohabbos.banner.sizes'   => [
                'tab'   => 'shohabbos.banner::lang.plugin.name',
                'label' => 'shohabbos.banner::lang.permission.access_sizes'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'banner' => [
                'label'       => 'shohabbos.banner::lang.plugin.name',
                'url'         => Backend::url('shohabbos/banner/banners'),
                'iconSvg'     => 'plugins/shohabbos/banner/assets/images/icon.svg',
                'permissions' => ['shohabbos.banner.*'],
                'order'       => 500,

                'sideMenu' => [
                    'banners'  => [
                        'label'       => 'shohabbos.banner::lang.banners.menu_label',
                        'url'         => Backend::url('shohabbos/banner/banners'),
                        'icon'        => 'icon-picture-o',
                        'permissions' => ['shohabbos.banner.banners'],
                    ],
                    'sizes'    => [
                        'label'       => 'shohabbos.banner::lang.sizes.menu_label',
                        'url'         => Backend::url('shohabbos/banner/sizes'),
                        'icon'        => 'icon-crop',
                        'permissions' => ['shohabbos.banner.sizes'],
                    ]
                ]
            ],
        ];
    }
}
