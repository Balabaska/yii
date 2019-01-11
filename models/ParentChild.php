<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Parents_Children".
 *
 * @property int $PC
 * @property int $fk_PR
 * @property int $fk_CH
 *
 * @property Ancestor $fkPR
 * @property Child $fkCH
 */
class ParentChild extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Parents_Children';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_PR', 'fk_CH'], 'integer'],
            [['fk_PR'], 'exist', 'skipOnError' => true, 'targetClass' => Ancestor::className(), 'targetAttribute' => ['fk_PR' => 'A']],
            [['fk_CH'], 'exist', 'skipOnError' => true, 'targetClass' => Child::className(), 'targetAttribute' => ['fk_CH' => 'C']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PC' => 'ID записи',
            'fk_PR' => 'ID родителя',
            'fk_CH' => 'ID ребёнка',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkPR()
    {
        return $this->hasOne(Ancestor::className(), ['A' => 'fk_PR']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkCH()
    {
        return $this->hasOne(Child::className(), ['C' => 'fk_CH']);
    }

    public function getAncestor()
    {
        return $this->hasOne(Ancestor::className(), ['A' => 'fk_PR']);
    }

    public function getChild()
    {
        return $this->hasOne(Child::className(), ['C' => 'fk_CH']);
    }
}
