<?php

namespace api\controllers;

use Yii;
use api\models\AppUser;

class ExcelController extends BaseController
{
    public function actionIndex()
    {
        //ini_set('memory_limit',0);
        set_time_limit(0);

        // echo '<pre>';
        // $faker = \Faker\Factory::create('zh_CN');
        // print_r($faker);die;
        // echo '<pre>';
        // var_dump($data);die;
        try {
            $num = 0;
            while ($num<=10) {
                $faker = \Faker\Factory::create('zh_CN');
                // $data = [
                //     'name' => $faker->firstName,
                //     'phone' => $faker->phoneNumber,
                //     'city' => $faker->city,
                //     'password' => Yii::$app->getSecurity()->generatePasswordHash('password_' . $index),
                //     'auth_key' => Yii::$app->getSecurity()->generateRandomString(),
                //     'intro' => $faker->sentence(7, true),  // generate a sentence with 7 words
                // ];
                $model = new AppUser();
                $model->name = $faker->name;
                $model->phone = $faker->phoneNumber;
                $model->city = $faker->city;
                $model->password = Yii::$app->getSecurity()->generatePasswordHash('password_' . $index);
                $model->auth_key = Yii::$app->getSecurity()->generateRandomString();
                $model->intro = $faker->sentence(7, true);  // generate a sentence with 7 words
                $model->save();
                $num++;
            }

            // var_dump($model);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }



        // var_dump($data);die;
        // return self::Json(200,'获取成功！',Yii::$app->app_db);
    }
}
