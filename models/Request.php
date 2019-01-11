<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "Requests".
 *
 * @property int $R
 * @property string $NAME_PARENT
 * @property string $NUMBER_PHONE
 * @property string $EMAIL
 * @property int $fk_c
 *
 * @property Course $fkC
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Requests';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_c'], 'integer'],
            [['NAME_PARENT'], 'string', 'max' => 64],
            [['NUMBER_PHONE'], 'string', 'max' => 20],
            [['EMAIL'], 'string', 'max' => 64],
            [['fk_c'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['fk_c' => 'C']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'R' => 'ID заявки',
            'NAME_PARENT' => 'ФИО родителя',
            'NUMBER_PHONE' => 'Номер телефона',
            'EMAIL' =>'Электронная почта',
            'fk_c' => 'Курсы',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkC()
    {
        return $this->hasOne(Course::className(), ['C' => 'fk_c']);
    }

    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['C' => 'fk_c']);
    }


}
