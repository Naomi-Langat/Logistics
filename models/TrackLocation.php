<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "TrackLocation".
 *
 * @property int $id
 * @property string|null $VehicleLocation
 * @property string|null $Time
 */
class TrackLocation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TrackLocation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['VehicleLocation'], 'string'],
            [['Time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'VehicleLocation' => 'Vehicle Location',
            'Time' => 'Time',
        ];
    }
}
