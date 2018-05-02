<?php

namespace common\models;

use fedornabilkin\binds\models\base\BindModel;
use Yii;

/**
 * This is the model class for table "candidate".
 *
 * @property int $id
 * @property string $uid
 * @property string $uid_content
 * @property int $vacancy_id
 * @property string $fname
 * @property string $iname
 * @property string $oname
 * @property string $email
 * @property string $phone
 * @property int $birthday
 *
 * @property Vacancy $vacancy
 */
class Candidate extends BindModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'candidate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fname', 'iname', 'phone'], 'required'],
            [['uid_content'], 'integer'],
            [['fname', 'iname', 'oname', 'email', 'phone', 'birthday'], 'string', 'max' => 30],
            ['email', 'email'],
            ['phone', 'match',
                'pattern' => '/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/i',
                'message' => 'Некорректный номер 8-___-___-__-__'
            ],

            /* Валидирует варианты ввода номеров
            +79262626266
            89262626266
            79262626266
            +7 926 262 62 66
            8(926)262-62-66
            262-62-66
            9262626266
            79262626266
            (495)2626266
            (495) 262 62 66
            89262626266
            8-926-262-62-66
            8 927 2626 266
            8 927 26 26 266
            8 927 26 262 66
            8 927 262 6 266
            */
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Id'),
            'fname' => Yii::t('app', 'Fname'),
            'iname' => Yii::t('app', 'Iname'),
            'oname' => Yii::t('app', 'Oname'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'birthday' => Yii::t('app', 'Birthday'),
        ];
    }

    public function beforeSave($insert)
    {
        $this->birthday = strtotime($this->birthday);
        return parent::beforeSave($insert);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancy()
    {
        return $this->hasOne(Vacancy::class, ['id' => 'vacancy_id']);
    }
}
