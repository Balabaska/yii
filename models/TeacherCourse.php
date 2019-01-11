<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "Teachers_Courses".
 *
 * @property int $TC
 * @property int $fk_T
 * @property int $fk_C
 *
 * @property Teacher $fkT
 * @property Course $fkC
 * @property string $courses
 */
class TeacherCourse extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Teachers_Courses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_T', 'fk_C'], 'integer'],
            [['fk_T'], 'exist', 'skipOnError' => true, 'targetClass' => Teacher::className(), 'targetAttribute' => ['fk_T' => 'T']],
            [['fk_C'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['fk_C' => 'C']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'TC' => 'ID связи',
            'fk_T' => 'ID преподавателя',
            'fk_C' => 'ID курса',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkT()
    {
        return $this->hasOne(Teacher::className(), ['T' => 'fk_T']);

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkC()
    {
        return $this->hasOne(Course::className(), ['C' => 'fk_C']);
    }

    public function getTeacher()
    {
        return $this->hasOne(Teacher::className(), ['T' => 'fk_T']);
    }

    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['C' => 'fk_C']);
    }

}
