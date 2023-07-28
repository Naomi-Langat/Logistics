<?php

namespace app\controllers;

use yii\helpers\ArrayHelper;
use yii\web\Controller;
use kartik\export\ExportMenu;

class ExportController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = /* ... Set up your data provider ... */
        $exportColumns = [/* ... List of columns to be exported ... */];
        
        return ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $exportColumns,
            'target' => ExportMenu::TARGET_SELF,
            'exportConfig' => [
                ExportMenu::FORMAT_PDF => false, // Set to `true` to enable PDF export
                ExportMenu::FORMAT_EXCEL => false, // Set to `true` to enable Excel export
            ],
            'filename' => 'exported_data',
        ]);
    }
}
