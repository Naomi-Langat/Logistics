<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "UserRoles".
 *
 * @property int $ID
 * @property int $UserID
 * @property int $RoleCenterID
 * @property int $CreatedBy
 * @property string $CreatedDate
 *
 * @property RoleCenters $roleCenter
 * @property Users $user
 */
class UserRoles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'UserRoles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['UserID', 'RoleCenterID', 'CreatedBy'], 'required'],
            [['UserID', 'RoleCenterID', 'CreatedBy'], 'integer'],
            [['CreatedDate'], 'safe'],
            [['RoleCenterID'], 'exist', 'skipOnError' => true, 'targetClass' => RoleCenters::class, 'targetAttribute' => ['RoleCenterID' => 'ID']],
            [['UserID'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['UserID' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'UserID' => 'User ID',
            'RoleCenterID' => 'Role Center ID',
            'CreatedBy' => 'Created By',
            'CreatedDate' => 'Created Date',
        ];
    }

    /**
     * Gets query for [[RoleCenter]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoleCenter()
    {
        return $this->hasOne(RoleCenters::class, ['ID' => 'RoleCenterID']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['ID' => 'UserID']);
    }
}
