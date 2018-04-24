<?php

namespace common\models;

use common\traits\BaseModelTrait;
use fedornabilkin\binds\behaviors\BindBehavior;
use fedornabilkin\binds\behaviors\SeoBehavior;
use fedornabilkin\binds\models\base\BindModel;
use fedornabilkin\binds\models\Bind;
use fedornabilkin\binds\models\Catalog;
use fedornabilkin\binds\models\Seo;
use Yii;

/**
 * This is the model class for table "vacancy".
 *
 * @property int $id
 * @property string $uid
 * @property int $customer
 * @property string $name
 * @property string $content
 * @property int $age_min
 * @property int $age_max
 * @property string $phones
 * @property string $address
 * @property int $salary_min
 * @property int $salary_max
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Customer
 */
class Vacancy extends BindModel
{
    use BaseModelTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vacancy';
    }

    public function behaviors()
    {
        return array_merge_recursive(parent::behaviors(), [
            'SeoBehavior' => [
                'class' => SeoBehavior::class,
            ],
            'BindsBehavior' => [
                'class' => BindBehavior::class,
                'tree' => [
                    // никнэймы корневых узлов дерева каталога
                    'nicknames' => [
                        'sex' => [
                            'multiple' => false,
                        ],
                        'industry' => [
                            'multiple' => false,
                        ],
                    ],
                ],
            ],
        ]);
    }

    public function beforeSave($insert)
    {
        $this->uid_content = $this->customer->uid;
        return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'customer_id', 'age_min', 'age_max', 'salary_min', 'salary_max'], 'integer'],
            [['title', 'phones'], 'required'],
            [['content', 'address'], 'string'],
            [['title', 'phones'], 'string', 'max' => 255],
//            [['customer'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer' => 'id']],
//            [['uid'], 'exist', 'skipOnError' => true, 'targetClass' => BindUids::className(), 'targetAttribute' => ['uid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'uid' => Yii::t('app', 'Uid'),
            'customer_id' => Yii::t('app', 'Customer'),
            'title' => Yii::t('app', 'Title'),
            'content' => Yii::t('app', 'Content'),
            'age_min' => Yii::t('app', 'Age Min'),
            'age_max' => Yii::t('app', 'Age Max'),
            'phones' => Yii::t('app', 'Phones'),
            'address' => Yii::t('app', 'Address'),
            'salary_min' => Yii::t('app', 'Salary Min'),
            'salary_max' => Yii::t('app', 'Salary Max'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::class, ['id' => 'customer_id']);
    }

    /**
     * Возвращает всех клиентов
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getCustomers()
    {
        $rows = Customer::find()->all();
        return $rows;
    }

    /**
     * Возвращает всех клиентов, прикрепленных к пользователю
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getCustomersByUser()
    {
        $rows = Customer::find()
            ->where(['user_id' => self::getUserId()])
            ->all();
        return $rows;
    }


    public static function getModelByAlias($alias)
    {
        $model = self::find()->filterAvailable()
            ->joinWith('seo')
            ->where(['alias' => $alias])
            ->one();
        return $model;
    }
}
