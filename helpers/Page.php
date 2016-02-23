<?php
namespace jacmoe\mdpages\helpers;

use yii\helpers\Url;
use yii\base\NotSupportedException;

class Page {

    /**
     * Returns a url to a page
     * @param  $id                  the page id to generate a link for
     * @param  string $module_id    if not passed the function will
     *                              try to get the module id by itself
     * @return string               the generated url
     */
    public static function url($id, $module_id = '') {
        if($module_id == '') {
            $module = \jacmoe\mdpages\Module::getInstance();
            if(!is_null($module)) {
                $module_id = $module->id;
            }
        }
        if($module_id != '') {
            return Url::to(array('/' . $module_id . '/page/view', 'id' => $id));
        }
    }

    /**
     * Returns the title of a page
     * @param  string $id the id of the page to get a title for
     * @return string     page title
     */
    public static function title($id) {
        $module = \jacmoe\mdpages\Module::getInstance();
        if(!is_null($module)) {
            $controller = \Yii::$app->controller;
            if(!is_null($controller)) {
                if($controller->id == 'page') {
                    $repo = $controller->getFlywheelRepo();
                    $page = $repo->query()->where('url', '==', $id)->execute();
                    $result = $page->first();

                    if($result != null) {
                        if(isset($result->title)) {
                            return $result->title;
                        }
                    }
                }
                throw new NotSupportedException("Can only be used when active controller is 'page'.");
            }
        }
        throw new NotSupportedException("Can't be called outside of jacmoe\mdpages module.");
    }

}
