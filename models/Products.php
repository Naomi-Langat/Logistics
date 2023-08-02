<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Products".
 *
 * @property int $id
 * @property int $ProductName
 * @property int $SizeID
 * @property int $CreatedBy
 * @property string $CreatedDate
 *
 * @property TripDetails[] $tripDetails
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['id', 'SizeID', 'CreatedBy'], 'required'],
            [['id', 'SizeID', 'CreatedBy'], 'integer'],
            [['CreatedDate'], 'safe'],
            [['ProductName'], 'string'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ProductName' => 'Product Name',
            'SizeID' => 'Product Size(KG)',
            'CreatedBy' => 'Created By',
            'CreatedDate' => 'Created Date',
        ];
    }

    /**
     * Gets query for [[TripDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTripDetails()
    {
        return $this->hasMany(TripDetails::class, ['ProductID' => 'id']);
    }

    
}
