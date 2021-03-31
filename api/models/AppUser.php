<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "app_user".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $city
 * @property string $password
 * @property string $auth_key
 * @property string $intro
 */
class AppUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_user';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('app');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['name', 'phone', 'city', 'password', 'auth_key', 'intro'], 'required'],
            // [['name'], 'string', 'max' => 25],
            // [['phone'], 'string', 'max' => 11],
            // [['city'], 'string', 'max' => 100],
            // [['password'], 'string', 'max' => 32],
            // [['auth_key'], 'string', 'max' => 64],
            // [['intro'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'city' => 'City',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'intro' => 'Intro',
        ];
    }
}
