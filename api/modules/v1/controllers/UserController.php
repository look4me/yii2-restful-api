<?php
/**
 * Created by PhpStorm.
 * User: look4me
 * Date: 2017/4/11
 * Time: 12:03
 */

namespace app\modules\v1\controllers;

use common\models\User;
use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
}