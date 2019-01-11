<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Collectives".
 *
 * @property int $C
 * @property int $fk_CH
 * @property int $fk_CR
 *
 * @property Course $fkCR
 * @property Child $fkCH
 */
class Collective extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Collectives';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_CH', 'fk_CR'], 'integer'],
            [['fk_CR'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['fk_CR' => 'C']],
            [['fk_CH'], 'exist', 'skipOnError' => true, 'targetClass' => Child::className(), 'targetAttribute' => ['fk_CH' => 'C']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'C' => 'ID связи',
            'fk_CH' => 'ID ребёнока',
            'fk_CR' => 'ID курса',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkCR()
    {
        return $this->hasOne(Course::className(), ['C' => 'fk_CR']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkCH()
    {
        return $this->hasOne(Child::className(), ['C' => 'fk_CH']);
    }

    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['C' => 'fk_CR']);
    }

    public function getChild()
    {
        return $this->hasOne(Child::className(), ['C' => 'fk_CH']);
    }
}
