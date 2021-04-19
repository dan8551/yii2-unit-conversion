<?php

namespace dan8551\components\unit_conversion\unit;

class Temperature extends BaseUnit
{
    const TEMP_UNIT_C = 1;
    const TEMP_UNIT_F = 2;
    const TEMP_UNIT_R = 3;
    const TEMP_UNIT_K = 4;
    
    /**
     * returns array of units that can be used in the format:
     * self::int => [
     *  'name',                 //name of the unit 
     *  'abbr',                 //abbreviation of the unit
     *  'conversionToBase',     //conversion applied to get to base unit
     * ];
     * @return array
     */
    public function units(?int $unit = null):array
    {
        $unitArr = [
            self::TEMP_UNIT_C => [
                'name' => 'Celsius',
                'abbr' => '°C',
                'conversionToBase' => ['*',1],
                'conversionFromBase' => ['*',1],
            ],
            self::TEMP_UNIT_F => [
                'name' => 'Farenheit',
                'abbr' => '°F',
                'conversionToBase' => ['()',function($value){
                    return ($value - 32) * (5/9);
                }],
                'conversionFromBase' => ['()', function($value):float{
                    return ($value * (9/5)) + 32;
                }],
            ],
            self::TEMP_UNIT_R => [
                'name' => 'Rankine',
                'abbr' => '°R',
                'conversionToBase' => ['()', function($value){
                    return ($value - 491.67) * (5/9) ;
                }],
                'conversionFromBase' => ['()', function($value){
                    return ($value + 273.15) * (9/5);
                }]
            ],
            self::TEMP_UNIT_K => [
                'name' => 'Kelvin',
                'abbr' => 'K',
                'conversionToBase' => ['-', 273.15],
                'conversionFromBase' => ['+', 273.15]
            ],
        ];
        return $unit == null ? $unitArr : $unitArr[$unit];
    }
}