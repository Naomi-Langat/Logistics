<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "UserDepartment".
 *
 * @property int $ID
 * @property int $UserID
 * @property int $DepartmentID
 * @property int $CreatedBy
 * @property string $CreatedDate
 *
 * @property Users $user
 */
class UserDepartment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'UserDepartment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['UserID', 'DepartmentID', 'CreatedBy'], 'required'],
            [['UserID', 'DepartmentID', 'CreatedBy'], 'integer'],
            [['CreatedDate'], 'safe'],
            [['DepartmentID', 'UserID'], 'unique', 'targetAttribute' => ['DepartmentID', 'UserID']],
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
            'DepartmentID' => 'Department ID',
            'CreatedBy' => 'Created By',
            'CreatedDate' => 'Created Date',
        ];
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
