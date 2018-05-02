<?php
/**
 * Created by PhpStorm.
 * User: TOSHIBA-PC
 * Date: 01.05.2018
 * Time: 23:38
 */

namespace frontend\widgets\modal;


use common\widgets\AbstractWidget;

class Widget extends AbstractWidget
{
    public $id;
    public $classes;
    public $title;
    public $body;
    public $params = [];

    public function init()
    {
        parent::init();

        if($this->id){
            $this->setId($this->id);
        }
    }

    public function run()
    {

        $id = $this->getId();
        $classes = $this->classes;
        $title = $this->title;
        $body = $this->body;
        $params = $this->params;

        return $this->render('index', compact('id', 'classes', 'title', 'body', 'params'));
    }

    public function registerAssets(){}
}