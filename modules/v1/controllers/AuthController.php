<?php

namespace app\modules\v1\controllers;

use Yii;
use yii\rest\Controller;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\web\UnauthorizedHttpException;
use app\helpers\BehaviorsFromParamsHelper;
use mdm\admin\components\Helper;
use app\models\LoginForm;
use app\models\User;

/**
 * Auth Controller API
 */
class AuthController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors = BehaviorsFromParamsHelper::behaviors($behaviors);
        $behaviors['authenticator'] = [
            'class' => \bizley\jwt\JwtHttpBearerAuth::class,
            'optional' => [
                'login',
            ],
        ];
        $behaviors['verbs'] = [
            'class' => VerbFilter::className(),
            'actions' => [
                'login' => ['post'],
            ],
        ];

        return $behaviors;
    }

    public function actionLogin()
    {
        $model = new LoginForm();
        if($model->load(Yii::$app->request->post(), '') && $model->login())
        {
            $user = Yii::$app->user->identity;

            return [
                'data' => [
                    'username' => $user->username,
                    'email' => $user->email,
                    'status_user' => $user->status,
                    'token' => User::generateJwtToken(Yii::$app->user->identity->id),
                ],
                'status' => 200,
                'message' => 'login success',
            ];
        }
        else
        {
            throw new UnauthorizedHttpException('Login Failed.');
        }
    }

    public function actionHelloWorld()
    {
        $this->checkAccess(Yii::$app->controller->action->id);

        return [
            'data' => 'hello world',
        ];
    }

    public function checkAccess($action, $model = null, $params = [])
    {
        $user = Yii::$app->getUser();
        if (Helper::checkRoute('/'.Yii::$app->controller->id.'/'.$action, Yii::$app->getRequest()->get(), $user)) {
            return true;
        }
        throw new ForbiddenHttpException('You are not allowed to perform this action.');
    }
}
