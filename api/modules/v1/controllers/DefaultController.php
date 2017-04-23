<?php

namespace app\modules\v1\controllers;

use Yii;
use common\models\CitySearch;
use yii\rest\ActiveController;


/**
 * Default controller for the `v1` module
 */
class DefaultController extends ActiveController
{
    public $modelClass = 'common\models\City';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    public function actions()
    {
        $actions = parent::actions();
        //注销系统自带的实现方法
        unset(
            $actions['index'],
            $actions['create'],
            $actions['view'],
            $actions['update'],
            $actions['delete']
        );
        return $actions;
    }

    /**
     * Lists all ServiceComponent models.
     * @return mixed
     */
    public function actionList()
    {
        $searchModel = new CitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $dataProvider;
    }
}
