<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "VehicleTypes".
 *
 * @property int $id
 * @property string $Description
 * @property string|null $CreatedBy
 * @property string|null $CreatedDate
 *
 * @property Vehicles[] $vehicles
 */
class VehicleTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'VehicleTypes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Description'], 'required'],
            [['CreatedDate'], 'safe'],
            [['Description'], 'string', 'max' => 50],
            [['CreatedBy'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Description' => 'Description',
            'CreatedBy' => 'Created By',
            'CreatedDate' => 'Created Date',
        ];
    }

    /**
     * Gets query for [[Vehicles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehicles()
    {
        return $this->hasMany(Vehicles::class, ['TypeID' => 'id']);
    }
}
