<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Drivers".
 *
 * @property int $id
 * @property string $Surname
 * @property string $Othernames
 * @property string $DrivingLicenceNo
 * @property float $MobileNo
 * @property float $IdNumber
 *
 * @property Trip[] $trips
 */
class Drivers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Drivers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Surname', 'Othernames', 'DrivingLicenceNo', 'MobileNo', 'IdNumber'], 'required'],
            [['MobileNo', 'IdNumber'], 'number'],
            [['Surname', 'Othernames', 'DrivingLicenceNo'], 'string', 'max' => 50],
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
            'Othernames' => 'Othernames',
            'DrivingLicenceNo' => 'Driving Licence No',
            'MobileNo' => 'Mobile No',
            'IdNumber' => 'Id Number',
        ];
    }

    /**
     * Gets query for [[Trips]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrips()
    {
        return $this->hasMany(Trip::class, ['DriverID' => 'id']);
    }
}
