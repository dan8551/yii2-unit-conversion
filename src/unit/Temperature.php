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
                'name' => 'celsius',
                'abbr' => '°C',
                'conversionToBase' => ['*',1],
                'conversionFromBase' => ['*',1],
            ],
            self::TEMP_UNIT_F => [
                'name' => 'farenheit',
                'abbr' => '°F',
                'conversionToBase' => ['()',function(){
                    return ($this->value - 32) * (5/9);
                }],
                'conversionFromBase' => ['()',function(){
                    return ($this->value * (9/5)) + 32;
                }],
            ],
            self::TEMP_UNIT_R => [
                'name' => 'rankine',
                'abbr' => '°R',
                'conversionToBase' => ['()', function(){
                    return ($this->value - 491.67) * (5/9) ;
                }],
                'conversionFromBase' => ['()', function(){
                    return ($this->value + 273.15) * (9/5);
                }]
            ],
            self::TEMP_UNIT_K => [
                'name' => 'Kelvin',
                'abbr' => 'K',
                'conversionToBase' => ['+', 273.15],
                'conversionFromBase' => ['-', 273.15]
            ],
        ];
        return $unit == null ? $unitArr : $unitArr[$unit];
    }
}