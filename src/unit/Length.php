<?php

namespace dan8551\components\unit_conversion\unit;

class Length extends BaseUnit
{
    const LENGTH_UNIT_M = 1;
    const LENGTH_UNIT_CM = 2;
    const LENGTH_UNIT_DM = 3;
    const LENGTH_UNIT_KM = 4;
    const LENGTH_UNIT_MM = 5;
    const LENGTH_UNIT_FT = 6;
    const LENGTH_UNIT_IN = 7;
    const LENGTH_UNIT_MI = 8;
    const LENGTH_UNIT_NMI = 9;
    const LENGTH_UNIT_YD = 10;
    
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
            self::LENGTH_UNIT_M => [
                'name' => 'meter',
                'abbr' => 'm',
                'conversionToBase' => ['*',1],
                'conversionFromBase' => ['*',1],
            ],
            self::LENGTH_UNIT_CM => [
                'name' => 'centimeter',
                'abbr' => 'cm',
                'conversionToBase' => ['/',100],
                'conversionFromBase' => ['*',100],
            ],
            self::LENGTH_UNIT_DM => [
                'name' => 'decimeter',
                'abbr' => 'dm',
                'conversionToBase' => ['/', 10],
                'conversionFromBase' => ['*', 10]
            ],
            self::LENGTH_UNIT_KM => [
                'name' => 'kilometer',
                'abbr' => 'km',
                'conversionToBase' => ['*', 1000],
                'conversionFromBase' => ['/', 1000]
            ],
            self::LENGTH_UNIT_MM => [
                'name' => 'millimeter',
                'abbr' => 'mm',
                'conversionToBase' => ['/', 1000],
                'conversionFromBase' => ['*', 1000]
            ],
            self::LENGTH_UNIT_FT => [
                'name' => 'foot',
                'abbr' => 'ft',
                'conversionToBase' => ['/', 3.28084],
                'conversionFromBase' => ['*', 3.28084]
            ],
            self::LENGTH_UNIT_IN => [
                'name' => 'inch',
                'abbr' => 'in',
                'conversionToBase' => ['*', 0.0254],
                'conversionFromBase' => ['/', 0.0254]
            ],
            self::LENGTH_UNIT_MI => [
                'name' => 'mile',
                'abbr' => 'mi',
                'conversionToBase' => ['/', 0.0006213712],
                'conversionFromBase' => ['*', 0.0006213712]
            ],
            self::LENGTH_UNIT_NMI => [
                'name' => 'nautical mile',
                'abbr' => 'nmi',
                'conversionToBase' => ['/', 0.0005399568],
                'conversionFromBase' => ['*', 0.0005399568]
            ],
            self::LENGTH_UNIT_YD => [
                'name' => 'yard',
                'abbr' => 'yd',
                'conversionToBase' => ['/', 1.093613],
                'conversionFromBase' => ['*', 1.093613]
            ],
        ];
        return $unit == null ? $unitArr : $unitArr[$unit];
    }
}