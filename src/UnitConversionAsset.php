<?php

/**
 * @copyright Copyright &copy; Daniel Orton, 2021
 * @package yii2-unit-conversion
 * @version 0.0.1
 */

namespace dan8551\components\unit_conversion;

use yii\web\AssetBundle;

class UnitConversionAsset extends AssetBundle
{
    public $sourcePath = '@vendor/dan8551/yii2-unit-conversion/src/assets';
    
    public $js = [
        'js/unit/BaseUnit.js',
        'js/unit/Energy.js',
        'js/UnitConversion.js',
    ];
    
    public $css = [
    ];
    
    public $depends = [
        
    ];
}
