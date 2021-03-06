<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PatientsDiagnoses */

$this->title = Yii::t('app', 'Посещение');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patients Diagnoses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patients-diagnoses-create">

    <h2>Осмотр: <?= $_POST['name'] ?></h2>

    <?= $this->render('_form', [
        'diagnoses' => $diagnoses,
        'treatments' => $treatments,
        'services'=> $services,
        // 'patients' => $patients
    ]) ?>

</div>
