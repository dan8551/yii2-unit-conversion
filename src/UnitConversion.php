<?php

/**
 * @copyright Copyright &copy; Daniel Orton, 2021
 * @package yii2-unit-conversion
 * @subpackage yii2-unit-conversion
 * @version 0.0.1
 */

namespace dan8551\components\unit_conversion;

use unit;


/**
 * A component to return arrays of unit types and convert between different units
 *
 * For example:
 *
 * ```php
 * 
 * ```
 *
 * @author Daniel Orton <dan.orton84@gmail.com>
 */
class UnitConversion extends yii\base\BaseObject
{   
    
    const UNIT_MASS = 'mass';
    const UNIT_ENERGY = 'energy';
    const UNIT_LENGTH = 'length';
    const UNIT_SPEED = 'speed';
    const UNIT_TEMPERATURE = 'temperature';
    
    /**
     * 
     * @var dan8551\components\unit_conversion\unit\BaseUnit
     */
    private $unitType;
    
    /**
     * 
     * @param float|null $value value of unit
     * @param string|null $unit unit e.g. g or gram
     * @param string $unitType type of unit e.g. mass or self::UNIT_MASS
     * @param string $path path to additional units created by end user
     */
    public function __construct(?float $value=null, ?string $unit=null, string $unitType) 
    {
        $class = ucfirst($unitType);
        $this->unitType = new $class($value, $unit);
    }
    
    /**
     * 
     * @return float  current value
     */
    public function value()
    {
        return $this->unitType->value();
    }
    
    /**
     * 
     * @return string current unit name
     */
    public function unitName()
    {
        return $this->unitType->unitName();    

    }
    
    /**
     * 
     * @return string current unit abbreviation
     */
    public function unitAbbr()
    {
        return $this->unitType->unitAbbr();
    }
    
    /**
     * 
     * @param string $units new unit type
     * @return float new value 
     */
    public function to(string $units)
    {
        return $this->unitType->to($units);
    }
    
    
//    const SPEED_UNIT_MS = 1;
//    const SPEED_UNIT_KMH = 2;
//    const SPEED_UNIT_MPH = 3;
//    const SPEED_UNIT_FTS = 4;
//    
//    const TIME_UNIT_MINS = 1;
//    const TIME_UNIT_SECONDS = 2;
//    const TIME_UNIT_HOURS = 3;
//    
//    const TEMP_CELSIUS = 1;
//    const TEMP_KELVIN = 2;
//    const TEMP_FARENHEIGHT = 3;
//    
//    const ENERGY_UNIT_J = 1;
//    const ENERGY_UNIT_KJ = 2;
//    
//    
//    
//    /**
//     * 
//     * @param int $airspeed
//     * @return array|string
//     */
//    public function getAirspeed($airspeed = null, $stringOnly = false)
//    {
//        if(is_null($airspeed) && $stringOnly)  return;
//        $arr = [
//            self::AIRSPEED_UNIT_MS => 'm/s',
//            self::AIRSPEED_UNIT_KMH => 'km/h',
//            self::AIRSPEED_UNIT_MPH => 'mph',
//            self::AIRSPEED_UNIT_FTS => 'ft/s',
//        ];
//        return $airspeed == null ? $arr : $arr[$airspeed];
//    }
//    
//    /**
//     * 
//     * @param int $unit
//     * @return array|string
//     */
//    public function getTimeUnit($unit = null, $stringOnly = false)
//    {
//        if(is_null($unit) && $stringOnly)  return;
//        $arr = [
//            self::TIME_UNIT_MINS => 'minutes',
//            self::TIME_UNIT_SECONDS => 'seconds',
//            self::TIME_UNIT_HOURS => 'hours',
//        ];
//        return $unit == null ? $arr : $arr[$unit];
//    }
//    
//    /**
//     * 
//     * @param int $temp
//     * @return array|string
//     */
//    public function getTemp($temp = null, $stringOnly = false)
//    {
//        if(is_null($temp) && $stringOnly)  return;
//        $arr = [
//            self::TEMP_CELSIUS => '° C',
//            self::TEMP_FARENHEIGHT => '° F',
//            self::TEMP_KELVIN => 'K',
//        ];
//        return $temp == null ? $arr : $arr[$temp];
//    }
//    
//    /**
//     * 
//     * @param int $unit
//     * @return array|string
//     */
//    public function getEnergy($unit = null, $stringOnly = false)
//    {
//        if(is_null($unit) && $stringOnly)  return;
//        $arr = [
//            self::ENERGY_UNIT_J => 'J',
//            self::ENERGY_UNIT_KJ => 'kJ',
//        ];
//        return $unit == null ? $arr : $arr[$unit];
//    }
}
