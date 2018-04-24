<?php
/**
 * Created by PhpStorm.
 * User: TOSHIBA-PC
 * Date: 15.04.2018
 * Time: 18:03
 */

namespace common\models;


class User extends \dektrium\user\models\User
{
    public function getCustomers()
    {
        return $this->hasMany(Customer::class, ['user_id' => 'id']);
    }
}