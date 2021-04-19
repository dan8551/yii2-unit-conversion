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
class UnitConversion extends \yii\base\BaseObject
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
    public function __construct(string $unitType,?float $value=null, ?string $unit=null) 
    {
        $class = __NAMESPACE__.'\unit\\'.ucfirst($unitType);
        $this->unitType = new $class($value, $unit);
    }
    
    /**
     * 
     * @param float|null $newValue
     * @param float|null $newUnit
     * @return float current value
     */
    public function value(?float $newValue=null, ?string $newUnit=null):float
    {
        return $this->unitType->value($newValue,$newUnit);
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
}
