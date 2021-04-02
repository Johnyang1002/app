<?php

namespace api\models;

use Yii;

class AppUser extends \yii\db\ActiveRecord
{
    private $uid;
    private $suffix;
    const TABLE_LONG = 10000;
    public function __construct($uid)
    {
        $this->uid = $uid;
        $this->suffix = ceil($uid/self::TABLE_LONG);
        parent::__construct();
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_user_' . $this->suffix;
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
            [['id', 'name', 'phone', 'city', 'password', 'auth_key', 'company', 'email', 'uuid', 'date'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 25],
            [['phone'], 'string', 'max' => 11],
            [['city', 'email', 'uuid'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 64],
            [['auth_key'], 'string', 'max' => 32],
            [['company'], 'string', 'max' => 255],
            [['date'], 'string', 'max' => 10],
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
            'name' => 'Name',
            'phone' => 'Phone',
            'city' => 'City',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'intro' => 'Intro',
        ];
    }
}
