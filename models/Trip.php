<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Trip".
 *
 * @property int $id
 * @property int $VehicleID
 * @property int $DriverID
 * @property string $TripDate
 * @property string $DispatchRefNo
 * @property int $SourceStationID
 * @property int $DestinationStationID
 * @property int $CreatedBy
 * @property string $CreatedDate
 *
 * @property Stations $destinationStation
 * @property Drivers $driver
 * @property Stations $sourceStation
 * @property TripDetails[] $tripDetails
 * @property Vehicles $vehicle
 */
class Trip extends \yii\db\ActiveRecord
{
    public $LoadWeight;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Trip';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['VehicleID', 'DriverID', 'TripDate', 'DispatchRefNo', 'SourceStationID', 'DestinationStationID', 'CreatedBy', 'CreatedDate'], 'required'],
            [['VehicleID', 'DriverID', 'SourceStationID', 'DestinationStationID', 'CreatedBy'], 'integer'],
            [['TripDate', 'CreatedDate'], 'safe'],
            [['DispatchRefNo'], 'string', 'max' => 50],
            [['VehicleID'], 'exist', 'skipOnError' => true, 'targetClass' => Vehicles::class, 'targetAttribute' => ['VehicleID' => 'id']],
            [['DriverID'], 'exist', 'skipOnError' => true, 'targetClass' => Drivers::class, 'targetAttribute' => ['DriverID' => 'id']],
            [['SourceStationID'], 'exist', 'skipOnError' => true, 'targetClass' => Stations::class, 'targetAttribute' => ['SourceStationID' => 'id']],
            [['DestinationStationID'], 'exist', 'skipOnError' => true, 'targetClass' => Stations::class, 'targetAttribute' => ['DestinationStationID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'VehicleID' => 'Vehicle',
            'DriverID' => 'Driver',
            'TripDate' => 'Trip Date',
            'DispatchRefNo' => 'Dispatch Ref No',
            'SourceStationID' => 'Source Station',
            'DestinationStationID' => 'Destination Station',
            'CreatedBy' => 'Created By',
            'CreatedDate' => 'Created Date',
            'LoadWeight'=>'Weight of Load',
        ];
    }

    /**
     * Gets query for [[DestinationStation]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDestinationStation()
    {
        return $this->hasOne(Stations::class, ['id' => 'DestinationStationID']);
    }

    /**
     * Gets query for [[Driver]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDriver()
    {
        return $this->hasOne(Drivers::class, ['id' => 'DriverID']);
    }

    /**
     * Gets query for [[SourceStation]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSourceStation()
    {
        return $this->hasOne(Stations::class, ['id' => 'SourceStationID']);
    }

    /**
     * Gets query for [[TripDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTripDetails()
    {
        return $this->hasMany(TripDetails::class, ['TripID' => 'id']);
    }

    /**
     * Gets query for [[Vehicle]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehicle()
    {
        return $this->hasOne(Vehicles::class, ['id' => 'VehicleID']);
    }

    public function generateRefNo()
    {
        $prefix = 'DISPATCH'; // Prefix for the reference number
        $date = date('Ymd'); // Current date in YYYYMMDD format
        $randomNumber = mt_rand(1000, 9999); // Generate a random 4-digit number
        
        $string = $prefix . '-' . $date . '-' . $randomNumber;
        $count = Trip::find()->where(['DispatchRefNo' => $string])->count();
        
        if ($count) {
            return $this->generateRefNo();
        }
        
        return $string;
    }

    public function getWeight(){

        $sql="select sum(td.Quantity*p.SizeID)LoadWeight  
                    from TripDetails td
                    join Products p on p.id=td.ProductID
                    where TripID=".$this->id."
                    group by td.TripID"; 

        $result=self::findBySql($sql)->one();

        return empty($result)?0:$result->LoadWeight;

    }

}
