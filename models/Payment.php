<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Payments".
 *
 * @property int $P
 * @property int $fk_CL
 * @property int $fk_CH
 * @property int $fk_CR
 * @property int $COST
 * @property int $STATUS
 *
 * @property Child $fkCH
 * @property Course $fkCR
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Payments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['DATA_OF_PAYMENT','date','format' => 'php:Y-m-d'],
            ['COST','integer'],
            [['fk_CH'], 'exist', 'skipOnError' => true, 'targetClass' => Child::className(), 'targetAttribute' => ['fk_CH' => 'C']],
            [['fk_CR'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['fk_CR' => 'C']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'P' => 'ID платежа',
            'fk_CH' => 'Ребёнок',
            'fk_CR' => 'Курс',
            'COST' => 'Сумма платежа',
            'DATA_OF_PAYMENT' => 'Дата платежа',
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkCH()
    {
        return $this->hasOne(Child::className(), ['fk_CH' => 'fk_CH']);
    }

    public function getChild()
    {
        return $this->hasOne(Child::className(), ['C' => 'fk_CH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkCR()
    {
        return $this->hasOne(Course::className(), ['fk_CR' => 'fk_CR']);
    }

    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['C' => 'fk_CR']);
    }
}
