<?php

use app\models\Belanja;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BelanjaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pagu Indikatif';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="belanja-index px-2">

    <div class="d-flex mt-4">
        <?= Html::a('Tambah Pagu Indikatif', ['create'], ['class' => 'btn btn-success align-self-start mr-3']) ?>
        <div class="ml-auto justify-content-center">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items} {pager}',
        'rowOptions' => ['class' => 'text-capitalize'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'header' => 'Tahun RBA',
                'value' => 'rba.rba_tahun'
            ],
            'jbelanja.jenis_belanja',
            [   
                'header' => 'Pagu Indikatif',
                'value' => function($model) {
                    $pagu = $model->pagu_indikatif;
                    $pagu_f = number_format($pagu, '2', ',', '.');
                    return $pagu_f;
                }
            ],
            [
                'class' => ActionColumn::className(),
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function($url, $model) {
                        $url = Url::to(['update', 'belanja_id' => $model->belanja_id]);
                        return Html::a('<i class="fas fa-pencil-alt"></i>', $url, [
                            'title' => "Edit",
                            'class' => 'btn btn-warning'
                        ]);
                    },
                    'delete' => function($url, $model) {
                        $url = Url::to(['delete', 'belanja_id' => $model->belanja_id]);
                        return Html::a('<i class="fas fa-trash-alt"></i>', $url, [
                            'title' => "Hapus",
                            'data-confirm' => Yii::t('yii', 'Ingin menghapus data?'),
                            'data-method' => 'post',
                            'class' => 'btn btn-danger ml-1'
                        ]);
                    }
                ],
            ],
        ],
    ]); ?>


</div>
