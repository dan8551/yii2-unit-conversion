<?php

namespace dan8551\components\unit_conversion\unit;

class Energy extends BaseUnit
{
    const ENERGY_UNIT_J = 1;
    const ENERGY_UNIT_KJ = 2;
    const ENERGY_UNIT_MILLIJ = 3;
    const ENERGY_UNIT_MEGAJ = 4;
    const ENERGY_UNIT_GJ = 5;
    const ENERGY_UNIT_WH = 6;
    const ENERGY_UNIT_KWH = 7;
    const ENERGY_UNIT_MWH = 8;
    const ENERGY_UNIT_BTU = 9;
    const ENERGY_UNIT_KBTU = 10;
    
    
    
    /**
     * returns array of units that can be used in the format:
     * self::int => [
     *  'name',                 //name of the unit 
     *  'abbr',                 //abbreviation of the unit
     *  'conversionToBase',     //conversion applied to get to base unit
     *  'conversionFromBase',   //conversion applied to get from the base unit
     * ];
     * @return array
     */
    public function units(?int $unit = null):array
    {
        $unitArr = [
            self::ENERGY_UNIT_J => [
                'name' => 'joules',
                'abbr' => 'J',
                'conversionToBase' => ['*',1],
                'conversionFromBase' => ['*',1],
            ],
            self::ENERGY_UNIT_KJ => [
                'name' => 'kilojoules',
                'abbr' => 'kJ',
                'conversionToBase' => ['*',1000],
                'conversionFromBase' => ['/',1000],
            ],
            self::ENERGY_UNIT_MILLIJ => [
                'name' => 'millijoules',
                'abbr' => 'mJ',
                'conversionToBase' => ['/',1000],
                'conversionFromBase' => ['*',1000],
            ],
            self::ENERGY_UNIT_MEGAJ => [
                'name' => 'megajoules',
                'abbr' => 'MJ',
                'conversionToBase' => ['*', 1000000],
                'conversionFromBase' => ['/', 1000000]
            ],
            self::ENERGY_UNIT_GJ => [
                'name' => 'gigajoules',
                'abbr' => 'GJ',
                'conversionToBase' => ['*', 1000000000],
                'conversionFromBase' => ['/', 1000000000]
            ],
            self::ENERGY_UNIT_WH => [
                'name' => 'watt-hour',
                'abbr' => 'Wh',
                'conversionToBase' => ['*', 3600],
                'conversionFromBase' => ['/', 3600]
            ],
            self::ENERGY_UNIT_KWH => [
                'name' => 'kilowatt-hour',
                'abbr' => 'kWh',
                'conversionToBase' => ['*', 3600000],
                'conversionFromBase' => ['/', 3600000]
            ],
            self::ENERGY_UNIT_MWH => [
                'name' => 'megawatt-hour',
                'abbr' => 'MWh',
                'conversionToBase' => ['*', 3,600,000,000],
                'conversionFromBase' => ['/', 3,600,000,000]
            ],
            self::ENERGY_UNIT_BTU => [
                'name' => 'BTU',
                'abbr' => 'BTU',
                'conversionToBase' => ['*', 1055.05585262],
                'conversionFromBase' => ['*', 0.00094781712]
            ],
            self::ENERGY_UNIT_KBTU => [
                'name' => 'kiloBTU',
                'abbr' => 'kBTU',
                'conversionToBase' => ['*', 1.05505585262],
                'conversionFromBase' => ['/', 0.94781712]
            ],
        ];
        return $unit == null ? $unitArr : $unitArr[$unit];
    }
}