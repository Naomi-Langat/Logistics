<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Departments".
 *
 * @property int $id
 * @property string $DepartmentName
 *
 * @property Vehicles[] $vehicles
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Departments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['DepartmentName'], 'required'],
            [['DepartmentName'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'DepartmentName' => 'Department Name',
        ];
    }

    /**
     * Gets query for [[Vehicles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehicles()
    {
        return $this->hasMany(Vehicles::class, ['DepartmentID' => 'id']);
    }
}
