<?php
namespace console\controllers;

use yii\console\controller;
use api\models\AppUser;
use Yii;

set_time_limit(0);
ini_set('memory_limit', -1);
class FakerController extends Controller
{
    public function actionSplit_table()
    {
        $db = Yii::$app->app;
        for ($i=1; $i <= 200; $i++) {
            $sn = $i;
            $en = $i * 10000;
            $sn = $en-9999;
            if ($i<10) {
                $sp = '00'.$i;
            } elseif ($i>=10 && $i<100) {
                $sp = '0'.$i;
            } else {
                $sp = $i;
            }
            $sql = 'SELECT * FROM app_user where id>='.$sn.' and id<='.$en;
            // echo $sql;
            // echo PHP_EOL;
            $command = $db->createCommand($sql);
            $posts = $command->queryAll();
            foreach ($posts as  $v) {
                $sql = 'INSERT INTO app_user_'.$sp.'  VALUES ("'.join('","', array_values($v)).'")';
                $bool = $db->createCommand($sql)->execute();
                echo $sql . '===='. $bool.PHP_EOL;
                // die;
            }
        }
    }
    /**
     * 添加假数据
     */
    public function actionRun()
    {
        $db = Yii::$app->app;
        $sql = 'SELECT
				count(*) AS num,
					phone
				FROM
					app_user
				GROUP BY
					phone
				ORDER BY
					num DESC';

        $command = $db->createCommand($sql);
        $posts = $command->queryAll();
        foreach ($posts as $v) {
            if ($v['num']>1) {
                $sql = 'DELETE FROM app_user where phone='.$v['phone'];
                $bool = $db->createCommand($sql)->execute();
                var_dump($bool);
            }
        }

        // try {
        //     $num = 0;
        //     while (true) {
        //         $faker = \Faker\Factory::create('zh_CN');
        //
        //         $model = new AppUser();
        //         $model->name = $faker->name;
        //         $model->phone = $faker->phoneNumber;
        //         $model->city =  $faker->city;
        //         $model->password = sha1($faker->phoneNumber);
        //         $model->auth_key = md5(Yii::$app->getSecurity()->generateRandomString());
        //         $model->company = $faker->Company;
        //         $model->email = $faker->email;
        //         $model->uuid = $faker->uuid;
        //         $model->date = $faker->date;
        //
        //         $model->save();
        //         echo $num."\n";
        //         $num++;
        //
        //     }
        //
        // } catch (\Exception $e) {
        //     echo $e->getMessage();
        // }
    }
}
