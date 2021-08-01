<?php


namespace admin\controllers;


use admin\models\form\Account;
use admin\models\User;
use Yii;
use admin\models\form\ChangePassword;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class AccountController extends Controller
{
    /**
     * Reset password
     * @return string | Response
     */
    public function actionChangePassword()
    {
        $model = new ChangePassword();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->change()) {
            return $this->goHome();
        }

        return $this->render('change-password', [
            'model' => $model,
        ]);
    }

    public function actionUpdate() {
        $model = new Account();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success', 'Update account success.');
            return $this->goHome();
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }
}