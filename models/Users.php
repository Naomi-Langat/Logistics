<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Users".
 *
 * @property int $ID
 * @property string|null $FirstName
 * @property string|null $MiddleName
 * @property string|null $LastName
 * @property string $UserName
 * @property string $Email
 * @property string $auth_key
 * @property string $verification_token
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $PhoneNo
 * @property int $StatusID
 * @property string $CreatedDate
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property UserDepartment[] $userDepartments
 * @property UserRoles[] $userRoles
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['UserName', 'Email', 'auth_key', 'password_hash', 'PhoneNo'], 'required'],
            [['StatusID', 'created_at', 'updated_at'], 'integer'],
            [['CreatedDate'], 'safe'],
            [['FirstName', 'MiddleName', 'LastName', 'UserName', 'Email', 'PhoneNo'], 'string', 'max' => 50],
            [['auth_key'], 'string', 'max' => 32],
            [['verification_token'], 'string', 'max' => 150],
            [['password_hash', 'password_reset_token'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'FirstName' => 'First Name',
            'MiddleName' => 'Middle Name',
            'LastName' => 'Last Name',
            'UserName' => 'User Name',
            'Email' => 'Email',
            'auth_key' => 'Auth Key',
            'verification_token' => 'Verification Token',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'PhoneNo' => 'Phone No',
            'StatusID' => 'Status ID',
            'CreatedDate' => 'Created Date',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[UserDepartments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserDepartments()
    {
        return $this->hasMany(UserDepartment::class, ['UserID' => 'ID']);
    }

    /**
     * Gets query for [[UserRoles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserRoles()
    {
        return $this->hasMany(UserRoles::class, ['UserID' => 'ID']);
    }
}
