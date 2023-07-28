<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "TripDetails".
 *
 * @property int $id
 * @property int $TripID
 * @property int $ProductID
 * @property int $Quantity
 *
 * @property Products $product
 * @property Trip $trip
 */
class TripDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TripDetails';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TripID', 'ProductID', 'Quantity'], 'required'],
            [['TripID', 'ProductID', 'Quantity'], 'integer'],
            [['ProductID'], 'exist', 'skipOnError' => true, 'targetClass' => Products::class, 'targetAttribute' => ['ProductID' => 'id']],
            [['TripID'], 'exist', 'skipOnError' => true, 'targetClass' => Trip::class, 'targetAttribute' => ['TripID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'TripID' => 'Trip ID',
            'ProductID' => 'Product',
            'Quantity' => 'Quantity',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::class, ['id' => 'ProductID']);
    }

    /**
     * Gets query for [[Trip]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrip()
    {
        return $this->hasOne(Trip::class, ['id' => 'TripID']);
    }
}
