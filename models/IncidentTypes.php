<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "IncidentTypes".
 *
 * @property int $id
 * @property string|null $IncidentType
 *
 * @property Incidents[] $incidents
 */
class IncidentTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'IncidentTypes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IncidentType'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'IncidentType' => 'Incident Type',
        ];
    }

    /**
     * Gets query for [[Incidents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIncidents()
    {
        return $this->hasMany(Incidents::class, ['IncidentTypeID' => 'id']);
    }
}
