<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "RoleCenters".
 *
 * @property int $ID
 * @property string $RoleCenterName
 * @property int|null $CreatedBy
 * @property string $CreatedDate
 * @property int $SuperUser
 *
 * @property UserRoles[] $userRoles
 */
class RoleCenters extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'RoleCenters';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['RoleCenterName'], 'required'],
            [['CreatedBy', 'SuperUser'], 'integer'],
            [['CreatedDate'], 'safe'],
            [['RoleCenterName'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'RoleCenterName' => 'Role Center Name',
            'CreatedBy' => 'Created By',
            'CreatedDate' => 'Created Date',
            'SuperUser' => 'Super User',
        ];
    }

    /**
     * Gets query for [[UserRoles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserRoles()
    {
        return $this->hasMany(UserRoles::class, ['RoleCenterID' => 'ID']);
    }
}
