<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Drivers".
 *
 * @property int $id
 * @property string $Surname
 * @property string $Othernames
 * @property string|null $Email
 * @property string|null $Address
 * @property string $DrivingLicenceNo
 * @property string|null $LisenceType
 * @property float $MobileNo
 * @property float $IdNumber
 * @property int $Status
 * @property int|null $ExperienceID
 * @property int|null $DriverHistoryID
 * @property int|null $HealthID
 *
 * @property Event $driverHistory
 * @property DriverExperience $experience
 * @property HealthRecords $health
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
            [['Status', 'ExperienceID', 'DriverHistoryID', 'HealthID'], 'integer'],
            [['Surname', 'Othernames', 'Email', 'Address', 'DrivingLicenceNo', 'LisenceType'], 'string', 'max' => 50],
            [['HealthID'], 'exist', 'skipOnError' => true, 'targetClass' => HealthRecords::class, 'targetAttribute' => ['HealthID' => 'id']],
            [['DriverHistoryID'], 'exist', 'skipOnError' => true, 'targetClass' => Event::class, 'targetAttribute' => ['DriverHistoryID' => 'id']],
            [['ExperienceID'], 'exist', 'skipOnError' => true, 'targetClass' => DriverExperience::class, 'targetAttribute' => ['ExperienceID' => 'id']],
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
            'Email' => 'Email',
            'Address' => 'Address',
            'DrivingLicenceNo' => 'Driving Licence No',
            'LisenceType' => 'Lisence Type',
            'MobileNo' => 'Mobile No',
            'IdNumber' => 'Id Number',
            'Status' => 'Status',
            'ExperienceID' => 'Experience ID',
            'DriverHistoryID' => 'Driver History ID',
            'HealthID' => 'Health ID',
        ];
    }

    /**
     * Gets query for [[DriverHistory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDriverHistory()
    {
        return $this->hasOne(Event::class, ['id' => 'DriverHistoryID']);
    }

    /**
     * Gets query for [[Experience]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExperience()
    {
        return $this->hasOne(DriverExperience::class, ['id' => 'ExperienceID']);
    }

    /**
     * Gets query for [[Health]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHealth()
    {
        return $this->hasOne(HealthRecords::class, ['id' => 'HealthID']);
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
