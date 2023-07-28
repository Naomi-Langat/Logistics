<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Transporters".
 *
 * @property int $id
 * @property string $Surname
 * @property string $OtherNames
 * @property float $IdNumber
 * @property float $MobileNo
 * @property string $HomeOfResidence
 * @property string $CurrentResidence
 * @property int $CreatedBy
 * @property string $CreatedDate
 *
 * @property Vehicles[] $vehicles
 */
class Transporters extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Transporters';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Surname', 'OtherNames', 'IdNumber', 'MobileNo', 'HomeOfResidence', 'CurrentResidence', 'CreatedDate'], 'required'],
            [['IdNumber', 'MobileNo'], 'number'],
            [['CreatedBy','Rating'], 'integer'],
            [['CreatedDate'], 'safe'],
            [['Surname', 'OtherNames', 'HomeOfResidence', 'CurrentResidence'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Surname' => 'Surname',
            'OtherNames' => 'Other Names',
            'IdNumber' => 'Id Number',
            'MobileNo' => 'Mobile No',
            'Rating' => 'Transporter Rating',
            'HomeOfResidence' => 'Home Of Residence',
            'CurrentResidence' => 'Current Residence',
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
        return $this->hasMany(Vehicles::class, ['TransporterID' => 'id']);
    }
}
