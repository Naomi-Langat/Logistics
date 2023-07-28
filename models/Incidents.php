<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Incidents".
 *
 * @property int $id
 * @property int $TripID
 * @property int $IncidentTypeID
 * @property string $Description
 * @property int $Status
 *
 * @property IncidentTypes $incidentType
 * @property Trip $trip
 */
class Incidents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Incidents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TripID', 'IncidentTypeID', 'Description'], 'required'],
            [['TripID', 'IncidentTypeID', 'Status'], 'integer'],
            [['Description'], 'string'],
            [['IncidentTypeID'], 'exist', 'skipOnError' => true, 'targetClass' => IncidentTypes::class, 'targetAttribute' => ['IncidentTypeID' => 'id']],
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
            'IncidentTypeID' => 'Incident Type ID',
            'Description' => 'Description',
            'Status' => 'Status',
        ];
    }

    /**
     * Gets query for [[IncidentType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIncidentType()
    {
        return $this->hasOne(IncidentTypes::class, ['id' => 'IncidentTypeID']);
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
