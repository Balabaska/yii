<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Ancestor extends ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    public $children_array;

    public static function tableName(){
        return '{{Ancestors}}';
    }

    public function rules(){
        return [
            [['NAME','NUMBER_PHONE','EMAIL'],'required'],
            ['NAME','string','length' => [2,64]],
            ['NUMBER_PHONE','string', 'length' => [11,20]],
            ['fk_u','integer'],
            [['children_array'],'safe']
        ];
    }

    public function attributeLabels()
    {
        return array(
            'A' => 'ID',
            'NAME' => 'Фамилия Имя Отчество',
            'NUMBER_PHONE' => 'Номер телефона',
            'EMAIL' => 'Электронный адрес',
            //'fk_u' => 'ID пользователя',
            'children_array' => 'Дети',
            'childrenAsString' =>'Дети',
            'children' =>'Дети'
        );
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'fk_u']);
    }

    public function getParentChild()
    {
        return $this->hasMany(ParentChild::className(), ['fk_PR' => 'A']);
    }

    public function getChildren()
    {
        return $this->hasMany(Child::className(), ['C' => 'fk_CH'])->via('parentChild');
    }

    public function getChildrenAsString()
    {
        $arr = ArrayHelper::map($this->children,'C','NAME');
        return implode(', ',$arr);
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()){
            ParentChild::deleteAll(['fk_PR'=>$this->A]);
            return true;
        }
        else {
            return false;
        }
    }

    public function afterFind()
    {
        $this->children_array = $this->children;
        parent::afterFind(); // TODO: Change the autogenerated stub
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub

        $arr = ArrayHelper::map($this->children,'C','C');
        $model = new ParentChild();

        if (!empty($this->children_array)) {
            foreach ($this->children_array as $one) {
                if (!in_array($one, $arr)) {
                    $model = new ParentChild();
                    $model->fk_PR = $this->A;
                    $model->fk_CH = $one;
                    $model->save();
                }
                if (isset($arr[$one])) {
                    unset($arr[$one]);
                }
            }
        }
        ParentChild::deleteAll(['fk_PR'=>$arr]);
    }

}