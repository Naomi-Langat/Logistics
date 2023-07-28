<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Vehicles".
 *
 * @property int $id
 * @property string $REG_No
 * @property int $MakeID
 * @property int $TypeID
 * @property float $Capacity
 * @property int $TransporterID
 * @property string $LogbookNo
 * @property int $CreateBy
 * @property string $CreatedDate
 *
 * @property VehicleMakes $make
 * @property Transporters $transporter
 * @property Trip[] $trips
 * @property VehicleTypes $type
 */
class Vehicles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Vehicles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['REG_No', 'MakeID', 'TypeID', 'Capacity', 'TransporterID', 'LogbookNo'], 'required'],
            [['MakeID', 'TypeID', 'TransporterID', 'CreateBy'], 'integer'],
            [['Capacity'], 'number'],
            [['CreatedDate'], 'safe'],
            [['REG_No', 'LogbookNo'], 'string', 'max' => 50],
            [['TransporterID'], 'exist', 'skipOnError' => true, 'targetClass' => Transporters::class, 'targetAttribute' => ['TransporterID' => 'id']],
            [['TypeID'], 'exist', 'skipOnError' => true, 'targetClass' => VehicleTypes::class, 'targetAttribute' => ['TypeID' => 'id']],
            [['MakeID'], 'exist', 'skipOnError' => true, 'targetClass' => VehicleMakes::class, 'targetAttribute' => ['MakeID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'REG_No' => 'Reg No',
            'MakeID' => 'Make',
            'TypeID' => 'Type',
            'Capacity' => 'Capacity',
            'TransporterID' => 'Transporter',
            'LogbookNo' => 'Logbook No',
            'CreateBy' => 'Create By',
            'CreatedDate' => 'Created Date',
        ];
    }

    /**
     * Gets query for [[Make]].
     *
     * @return \yii\db\ActiveQuery
     */

    public function getMake()
    {
        return $this->hasOne(VehicleMakes::class, ['id' => 'MakeID']);
    }

    /**
     * Gets query for [[Transporter]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransporter()
    {
        return $this->hasOne(Transporters::class, ['id' => 'TransporterID']);
    }

    /**
     * Gets query for [[Trips]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrips()
    {
        return $this->hasMany(Trip::class, ['VehicleID' => 'id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(VehicleTypes::class, ['id' => 'TypeID']);
    }
}
