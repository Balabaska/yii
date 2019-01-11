<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "Courses".
 *
 * @property int $C
 * @property string $NAME
 * @property string $DURATION
 * @property string $PLACE
 * @property int $fk_c
 * @property string $COST
 *
 *
 * @property Requests[] $requests
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Courses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NAME', 'DURATION', 'PLACE','COST'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'C' => 'ID курса',
            'NAME' => 'Наименование курса',
            'DURATION' => 'Длительность',
            'PLACE' => 'Место',
            'COST' => 'Стоимость'
        ];
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCOST()
    {
        return $this->COST;
    }
}
