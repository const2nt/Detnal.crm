<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Typeahead;

/* @var $this yii\web\View */
/* @var $model common\models\PatientsSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<h2 class="searchLabel"><?=Yii::t('app', 'Найти пациента')?></h2>

<div class="panel-body">
   <div class="searchInput pull-left"><?php
        $form = ActiveForm::begin();
        echo $form->field($model, 'search')->label(false)
            ->widget(Typeahead::classname(), [
            'options' => ['placeholder' => 'Введите ФИО, номер телефона или номер карточки'],
            'pluginOptions' => ['highlight'=>true],
            'dataset' => [
                [
                    'local' => $data,
                    'limit' => 10
                ]
            ]
        ]);
        ?>
   </div>
<div class="pull-right">
    <?php
   echo Html::submitButton(
       Yii::t('app', 'Найти'),
       ['class'=>'btn btn-primary btn-md']
   );
        ActiveForm::end();
    ?>
</div>
</div>


<?php
if(count($search)>0){
    echo "<h4 id='searchresult'>Результаты поиска:</h4>";
    foreach ($search as $item) {
        ?>

        <div class="panel panel-default" id="panel-result">
            <div class="panel-body">

                <?= Html::a('<b>'.$item->lastname .
                    ' ' .
                    $item->firstname .
                    ' ' .
                    $item->middlename .
                    '</b> №карточки ' .
                    $item->patient_card,
                    ['patient/view', 'id' => $item->id]) ?>
                <div class="pull-right">
                    <?= Html::a(Yii::t('app', 'подробнее'),
                        ['patient/view', 'id' => $item->id],
                        ['class' => 'btn btn-primary btn-xs']);
                    ?>
                    <?= Html::a(Yii::t('app', 'Записать на прием'),
                        ['timetable/create'],
                        [
                            'class' => 'btn btn-success btn-xs',
                            'data' => [
                                'method' => 'post',
                                'params' => [
                                    'patient_id' => $item->id,
                                    'phone' => $item->phone,
                                    'name' => $item->lastname." ".$item->firstname." ".$item->middlename,
                                    'create'=>'create'
                                ],
                            ],
                        ]
                        );
                    ?>
                </div>
            </div>
        </div>

        <?php
    }
}else{
    ?>
    <div class="alert alert-info">
        <?=Yii::t('app','Нет результатов поиска')?>
    </div>
    <?php
     }
     ?>

