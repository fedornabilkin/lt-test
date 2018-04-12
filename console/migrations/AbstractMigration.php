<?php
/**
 * Created by PhpStorm.
 * User: TOSHIBA-PC
 * Date: 10.04.2018
 * Time: 23:02
 */

namespace console\migrations;

class AbstractMigration extends \yii\db\Migration
{
    public $tableOptions = null;
    public function init()
    {
        parent::init();

        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $this->tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
    }
}