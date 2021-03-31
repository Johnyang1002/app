<?php
namespace api\controllers;
use Yii;
/**
 * Site controller
 */
class SiteController extends BaseController
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {


        
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {

    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {


    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {

    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {



    }


    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {



    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {

    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {


    }
}
