<?php

namespace backend\models;

use fedornabilkin\binds\behaviors\BindBehavior;
use fedornabilkin\binds\behaviors\SeoBehavior;
use fedornabilkin\binds\models\base\BindModel;
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
//                        'vacancy_sex' => [
//                            'multiple' => false,
//                        ],
//                        'vacancy_industry' => [
//                            'multiple' => false,
//                        ],
                    ],
                ],
            ],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'customer', 'age_min', 'age_max', 'salary_min', 'salary_max'], 'integer'],
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
            'customer' => Yii::t('app', 'Customer'),
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
        return $this->hasOne(Customer::class, ['id' => 'customer']);
    }
}
