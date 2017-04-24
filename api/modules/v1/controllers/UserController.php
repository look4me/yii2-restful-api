<?php
/**
 * Created by PhpStorm.
 * User: look4me
 * Date: 2017/4/11
 * Time: 12:03
 */

namespace app\modules\v1\controllers;

use Yii;
use app\modules\v1\models\LoginForm;
use common\models\User;
use yii\filters\auth\QueryParamAuth;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;
use yii\web\IdentityInterface;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    public function behaviors()
    {
        return ArrayHelper::merge (parent::behaviors(), [
            'authenticator' => [
                'class' => QueryParamAuth::className(),
                'optional' => [//过滤不需要验证的action
                    'login',
                    'signup-test'
                ],
            ]
        ] );
    }

    /**
     * 添加测试用户
     */
    public function actionSignupTest ()
    {
        $user = new User();
        $user->generateAuthKey();
        $user->setPassword('123456');
        $user->username = '111';
        $user->email = '111@111.com';
        $user->save(false);

        return [
            'code' => 0
        ];
    }

    /**
     * 登录
     */
    public function actionLogin ()
    {
        $model = new LoginForm();
        $model->setAttributes(Yii::$app->request->post());
        if ($user = $model->login()) {
            if ($user instanceof IdentityInterface) {
                return $user->access_token;
            } else {
                return $user->errors;
            }
        } else {
            return $model->errors;
        }
    }

    /**
     * 获取用户信息
     */
    public function actionUserProfile ()
    {
        // 到这一步，token都认为是有效的了
        // 下面只需要实现业务逻辑即可，下面仅仅作为案例，比如你可能需要关联其他表获取用户信息等等
        /** @var  $user User */
        $user = Yii::$app->user->identity;
        return [
            'id' => $user->id,
            'username' => $user->username,
            'email' => $user->email,
        ];

    }
}