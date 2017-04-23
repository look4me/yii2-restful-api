<?php

namespace app\modules\v1\controllers;

/**
 * Created by PhpStorm.
 * User: look4me
 * Date: 2017/4/11
 * Time: 11:51
 */

use Yii;
use yii\rest\ActiveController;
use yii\filters\auth\HttpBasicAuth;
use yii\helpers\ArrayHelper;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;

class CityController extends ActiveController
{
    public $modelClass = 'app\modules\v1\models\City';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

//    public function behaviors()
//    {
//        return ArrayHelper::merge(parent::behaviors(), [
//            'authenticator' => [
//                #这个地方使用`ComopositeAuth` 混合认证
//                'class' => CompositeAuth::className(),
//                #`authMethods` 中的每一个元素都应该是 一种 认证方式的类或者一个 配置数组
//                'authMethods' => [
//                    HttpBasicAuth::className(),
//                    HttpBearerAuth::className(),
//                    QueryParamAuth::className(),
//                ]
//            ]
//        ]);
//    }


}