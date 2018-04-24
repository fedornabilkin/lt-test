<?php

namespace common\models;

use dektrium\user\models\User;
use fedornabilkin\binds\behaviors\BindBehavior;
use fedornabilkin\binds\behaviors\SeoBehavior;
use fedornabilkin\binds\models\base\BindModel;
use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property string $uid
 * @property string $name
 * @property string $phones
 * @property string $address
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Vacancy[] $vacancies
 */
class Customer extends BindModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
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
            [['uid', 'status'], 'integer'],
            [['title', 'phones', 'email'], 'required'],
            [['address'], 'string'],
            [['title', 'phones', 'email'], 'string', 'max' => 255],
            ['email', 'email'],
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
            'title' => Yii::t('app', 'Title'),
            'phones' => Yii::t('app', 'Phones'),
            'address' => Yii::t('app', 'Address'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * модели hasOne, указать для удаления дочерней модели
     * если она связана с родительской один-к-одному
     */
    public function getChildModels()
    {
        return array_merge(parent::getChildModels(), [
            'Vacancy' => Vacancy::class,
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies()
    {
        return $this->hasMany(Vacancy::class, ['customer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
