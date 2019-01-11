<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\Report */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Отчёт';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .table_blur {
        background: #f5ffff;
        border-collapse: collapse;
        text-align: left;
    }
    .table_blur th {
        border-top: 1px solid #e3eef7;
        border-bottom: 1px solid #e3eef7;
        box-shadow: inset 0 1px 0 #999999, inset 0 -1px 0 #999999;
        /*background: linear-gradient(#9595b6, #5a567f);*/
        background: #f5e79e;
        padding: 10px 15px;
        position: relative;
    }
    .table_blur th:after {
        content: "";
        display: block;
        position: absolute;
        left: 0;
        top: 25%;
        height: 25%;
        width: 100%;
        background: linear-gradient(rgba(255, 255, 255, 0), rgba(255,255,255,.08));
    }
    .table_blur tr:nth-child(odd) {
        background: #ebf3f9;
    }
    .table_blur th:first-child {
        border-left: 1px solid #e3eef7;
        border-bottom:  1px solid #e3eef7;
        box-shadow: inset 1px 1px 0 #999999, inset 0 -1px 0 #999999;
    }
    .table_blur th:last-child {
        border-right: 1px solid #ebf3f9;
        border-bottom:  1px solid #ebf3f9;
        box-shadow: inset -1px 1px 0 #999999, inset 0 -1px 0 #999999;
    }
    .table_blur td {
        border: 1px solid #e3eef7;
        padding: 10px 15px;
        position: relative;
        transition: all 0.5s ease;
    }

</style>
<div>
    <h1>Отчёт о заявках</h1>
    <?php
    echo "<table class=\"table_blur\">
                <tr>
                    <th>ФИО родителя</th>
                    <th>Номер телефона</th>
                    <th>Электронная почта</th>
                </tr>
                "?>
    <?php
    $request_array = \app\models\Request::find()->all();
    $ancestor_array = \app\models\Ancestor::find()->all();
    foreach ($request_array as $one){

        if (\app\models\Ancestor::find()->where(['NAME' => $one->NAME_PARENT])->one()){
            echo '<tr style="background: #c2f0d6">';
        }
        else{
            echo '<tr style="background: #eed3d7">';

        }
        echo '<td>'.$one['NAME_PARENT'];
        echo '<td>'.$one['NUMBER_PHONE'];
        echo '<td>'.$one['EMAIL'];
        echo '<tr/>';
        /*foreach ($ancestor_array as $two){

            if ($one->NAME_PARENT == $two->NAME){
                echo '<tr style="background: #c2f0d6">';

            }
            else{
                echo '<tr style="background: #eed3d7">';

            }
            echo '<td>'.$one['NAME_PARENT'];
            echo '<td>'.$one['NUMBER_PHONE'];
            echo '<td>'.$one['EMAIL'];
            echo '<tr/>';

        }*/

    }
    ?>
    <?php echo"
            </table>
            ";
    ?>
</div>
