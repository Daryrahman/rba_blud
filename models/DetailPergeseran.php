<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detail_pergeseran".
 *
 * @property int $detail_pergeseran_id
 * @property int $pergeseran_id
 * @property int $detail_belanja_id
 * @property float $harga_belanja
 * @property int $jumlah_belanja
 * @property int $satuan_id
 *
 * @property DetailBelanja $detailBelanja
 * @property Pergeseran $pergeseran
 * @property Satuan $satuan
 */
class DetailPergeseran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_pergeseran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['harga_belanja', 'jumlah_belanja', 'satuan_id'], 'required'],
            [['pergeseran_id', 'detail_belanja_id', 'jumlah_belanja', 'satuan_id'], 'integer'],
            [['harga_belanja'], 'number'],
            [['satuan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Satuan::class, 'targetAttribute' => ['satuan_id' => 'satuan_id']],
            [['detail_belanja_id'], 'exist', 'skipOnError' => true, 'targetClass' => DetailBelanja::class, 'targetAttribute' => ['detail_belanja_id' => 'detail_belanja_id']],
            [['pergeseran_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pergeseran::class, 'targetAttribute' => ['pergeseran_id' => 'pergeseran_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'detail_pergeseran_id' => 'Detail Pergeseran ID',
            'pergeseran_id' => 'Pergeseran ID',
            'detail_belanja_id' => 'Detail Belanja ID',
            'harga_belanja' => 'Harga Belanja',
            'jumlah_belanja' => 'Jumlah Belanja',
            'satuan_id' => 'Satuan ID',
        ];
    }

    /**
     * Gets query for [[DetailBelanja]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetailBelanja()
    {
        return $this->hasOne(DetailBelanja::class, ['detail_belanja_id' => 'detail_belanja_id']);
    }

    /**
     * Gets query for [[Pergeseran]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPergeseran()
    {
        return $this->hasOne(Pergeseran::class, ['pergeseran_id' => 'pergeseran_id']);
    }

    /**
     * Gets query for [[Satuan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSatuan()
    {
        return $this->hasOne(Satuan::class, ['satuan_id' => 'satuan_id']);
    }
}
