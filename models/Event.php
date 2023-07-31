<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Event".
 *
 * @property int $id
 * @property string $EventType
 * @property string|null $VehicleInformation
 * @property string|null $Location
 * @property string|null $timestamp
 *
 * @property Vehicles[] $vehicles
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['EventType'], 'required'],
            [['timestamp'], 'safe'],
            [['EventType'], 'string', 'max' => 100],
            [['VehicleInformation'], 'string', 'max' => 150],
            [['Location'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'EventType' => 'Event Type',
            'VehicleInformation' => 'Vehicle Information',
            'Location' => 'Location',
            'timestamp' => 'Timestamp',
        ];
    }

    /**
     * Gets query for [[Vehicles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehicles()
    {
        return $this->hasMany(Vehicles::class, ['EventID' => 'id']);
    }
}
