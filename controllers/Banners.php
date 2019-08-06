<?php namespace Shohabbos\Banner\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Flash;
use Lang;
use Shohabbos\Banner\Models\Banner;

/**
 * Banners Back-end Controller
 */
class Banners extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public $bodyClass = 'compact-container';

    public function __construct()
    {
        parent::__construct();

        $this->addCss('/plugins/shohabbos/banner/assets/css/banner.css');
        $this->addCss('/themes/shohabbos-banner-store/assets/css/font-banner.css');

        BackendMenu::setContext('Shohabbos.Banner', 'banner', 'banners');
    }

    /**
     * Deleted checked banners.
     */
    public function index_onDelete()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {

            foreach ($checkedIds as $bannerId) {
                if (!$banner = Banner::find($bannerId)) continue;
                $banner->delete();
            }

            Flash::success(Lang::get('shohabbos.banner::lang.banners.delete_selected_success'));
        }
        else {
            Flash::error(Lang::get('shohabbos.banner::lang.banners.delete_selected_empty'));
        }

        return $this->listRefresh();
    }
}
