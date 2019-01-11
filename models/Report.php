<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Reports".
 *
 * @property int $R
 */
class Report extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Reports';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'R' => 'R',
        ];
    }
}
