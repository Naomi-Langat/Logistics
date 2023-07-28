<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "VehicleMakes".
 *
 * @property int $id
 * @property string $MakeName
 * @property int|null $Common
 *
 * @property Vehicles[] $vehicles
 */
class VehicleMakes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'VehicleMakes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MakeName'], 'required'],
            [['Common'], 'integer'],
            [['MakeName'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'MakeName' => 'Make Name',
            'Common' => 'Common',
        ];
    }

    /**
     * Gets query for [[Vehicles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehicles()
    {
        return $this->hasMany(Vehicles::class, ['MakeID' => 'id']);
    }
}
