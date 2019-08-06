<?php namespace Itmaker\Banner;

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
            'name'        => 'itmaker.banner::lang.plugin.name',
            'description' => 'itmaker.banner::lang.plugin.description',
            'author'      => 'Itmaker',
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
            'Itmaker\Banner\Components\Banners' => 'BannerBanners',
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
            'itmaker.banner.banners' => [
                'tab'   => 'itmaker.banner::lang.plugin.name',
                'label' => 'itmaker.banner::lang.permission.access'
            ],
            'itmaker.banner.sizes'   => [
                'tab'   => 'itmaker.banner::lang.plugin.name',
                'label' => 'itmaker.banner::lang.permission.access_sizes'
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
                'label'       => 'itmaker.banner::lang.plugin.name',
                'url'         => Backend::url('itmaker/banner/banners'),
                'iconSvg'     => 'plugins/itmaker/banner/assets/images/icon.svg',
                'permissions' => ['itmaker.banner.*'],
                'order'       => 500,

                'sideMenu' => [
                    'banners'  => [
                        'label'       => 'itmaker.banner::lang.banners.menu_label',
                        'url'         => Backend::url('itmaker/banner/banners'),
                        'icon'        => 'icon-picture-o',
                        'permissions' => ['itmaker.banner.banners'],
                    ],
                    'sizes'    => [
                        'label'       => 'itmaker.banner::lang.sizes.menu_label',
                        'url'         => Backend::url('itmaker/banner/sizes'),
                        'icon'        => 'icon-crop',
                        'permissions' => ['itmaker.banner.sizes'],
                    ]
                ]
            ],
        ];
    }
}
