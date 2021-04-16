<?php

namespace dan8551\components\unit_conversion\unit;

class Speed extends BaseUnit
{
    const SPEED_UNIT_MPS = 1;
    const SPEED_UNIT_KMH = 2;
    const SPEED_UNIT_MPH = 3;
    const SPEED_UNIT_FTS = 4;
    const SPEED_UNIT_KNOT_UK = 5;
    
    const SPEED_UNIT_SOL = 6;
    
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
            self::SPEED_UNIT_MPS => [
                'name' => 'meters per second',
                'abbr' => 'm/s',
                'conversionToBase' => ['*',1],
                'conversionFromBase' => ['*',1],
            ],
            self::SPEED_UNIT_KMH => [
                'name' => 'kilometers per hour',
                'abbr' => 'kmh',
                'conversionToBase' => ['*', 0.2777778],
                'conversionFromBase' => ['/', 0.2777778],
            ],
            self::SPEED_UNIT_MPH => [
                'name' => 'miles per hour',
                'abbr' => 'mph',
                'conversionToBase' => ['/', 0.44704],
                'conversionFromBase' => ['*', 0.44704]
            ],
            self::SPEED_UNIT_FTS => [
                'name' => 'feet per second',
                'abbr' => 'ft/s',
                'conversionToBase' => ['*', 0.3048],
                'conversionFromBase' => ['/', 0.3048]
            ],
            self::SPEED_UNIT_KNOT_UK => [
                'name' => 'knot',
                'abbr' => 'kn',
                'conversionToBase' => ['*', 0.5148],
                'conversionFromBase' => ['/', 0.5148]
            ],
            self::SPEED_UNIT_KNOT_NM => [
                'name' => 'knot',
                'abbr' => 'kn',
                'conversionToBase' => ['*', 0.5144444],
                'conversionFromBase' => ['/', 0.5144444]
            ],
            self::SPEED_UNIT_SOL => [
                'name' => 'speed of light (vacuum)',
                'abbr' => 'c',
                'conversionToBase' => ['*', 299792458],
                'conversionFromBase' => ['/', 299792458]
            ],
        ];
        return $unit == null ? $unitArr : $unitArr[$unit];
    }
}