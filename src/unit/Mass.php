<?php

namespace dan8551\components\unit_conversion\unit;

class Mass extends BaseUnit
{
    const MASS_UNIT_G = 1;
    const MASS_UNIT_KG = 2;
    const MASS_UNIT_IB = 3;
    
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
            self::MASS_UNIT_G => [
                'name' => 'gram',
                'abbr' => 'g',
                'conversionToBase' => ['*',1],
                'conversionFromBase' => ['*',1],
            ],
            self::MASS_UNIT_KG => [
                'name' => 'kilogram',
                'abbr' => 'kg',
                'conversionToBase' => ['/',1000],
                'conversionFromBase' => ['*',1000],
            ],
            self::MASS_UNIT_IB => [
                'name' => 'pound',
                'abbr' => 'Ib',
                'conversionToBase' => ['*', 453.59237],
                'conversionFromBase' => ['/',453.59237]
            ]
        ];
        return $unit == null ? $unitArr : $unitArr[$unit];
    }
}