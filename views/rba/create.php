<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Rba $model */

$this->title = 'Tambah Tahun RBA';
$this->params['breadcrumbs'][] = ['label' => 'RBA', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rba-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
