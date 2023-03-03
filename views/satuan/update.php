<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Satuan $model */

$this->title = 'Update Satuan';
$this->params['breadcrumbs'][] = ['label' => 'Satuans', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="satuan-update px-2">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
