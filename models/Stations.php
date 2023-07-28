<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Stations".
 *
 * @property int $id
 * @property string $StationName
 * @property int $CreatedBy
 * @property string $CreatedDate
 *
 * @property Trip[] $trips
 * @property Trip[] $trips0
 */
class Stations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Stations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['StationName', 'CreatedBy'], 'required'],
            [['CreatedBy'], 'integer'],
            [['CreatedDate'], 'safe'],
            [['StationName'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'StationName' => 'Station Name',
            'CreatedBy' => 'Created By',
            'CreatedDate' => 'Created Date',
        ];
    }

    /**
     * Gets query for [[Trips]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrips()
    {
        return $this->hasMany(Trip::class, ['SourceStationID' => 'id']);
    }

    /**
     * Gets query for [[Trips0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrips0()
    {
        return $this->hasMany(Trip::class, ['DestinationStationID' => 'id']);
    }
}
