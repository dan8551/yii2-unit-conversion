<?php

namespace dan8551\components\unit_conversion\unit;

class BaseUnit
{
    /**
     * 
     * @var ?float
     */
    private $value;
    
    /**
     * 
     * @var int current unit type, resolves to `$this->units()`
     */
    private $unit;
    
    /**
     * 
     * @param float|null $value value of unit
     * @param string|null $unit unit e.g. g or gram
     */
    public function __construct(?float $value=null, ?string $unit=null) 
    {
        $this->value = $value;
        for($i=1;$i<=length($this->units());$i++)
        {
            if(array_search($unit, $this->units()[$i]))
                $this->unit = $this->units()[$i];
        }
    }
    
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
        $unitArr = [];
        return $unit == null ? $unitArr : $unitArr[$unit];
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
     * Convert from current unit to new unit and return value
     * @param string $units new unit type
     * @return float new value 
     */
    public function to(string $newUnit)
    {
        $baseValue = float;
        $convertToBase = $this->units($this->unit)['conversionToBase'];
        switch($convertToBase[0])
        {
            case '*':
                $baseValue = $this->multiply($this->units($this->unit)['conversionToBase'][1]);
                break;
            case '/':
                $baseValue = $this->divide($this->units($this->unit)['conversionToBase'][1]);
                break;
            case '+':
                $baseValue = $this->plus($this->units($this->unit)['conversionToBase'][1]);
                break;
            case '-':
                $baseValue = $this->minus($this->units($this->unit)['conversionToBase'][1]);
                break;
        }
        $convertToNewUnit = $this->units($newUnit)['conversionFromBase'];
        switch($convertToBase[0])
        {
            case '*':
                $this->value = $this->multiply($this->units($this->unit)['conversionFromBase'][1]);
                break;
            case '/':
                $this->value = $this->divide($this->units($this->unit)['conversionFromBase'][1]);
                break;
            case '+':
                $this->value = $this->plus($this->units($this->unit)['conversionFromBase'][1]);
                break;
            case '-':
                $this->value = $this->minus($this->units($this->unit)['conversionFromBase'][1]);
                break;
        }
        return $this->value;
    }
    
    /**
     * Multiplies current value by $conversionValue
     * @param float $conversionValue
     * @return float
     */
    public function multiply(float $conversionValue):float
    {
        return $this->value * $conversionValue;
    }
    
    /**
     * Divides current value by $conversionValue
     * @param float $conversionValue
     * @return float
     */
    public function divide(float $conversionValue):float
    {
        return $this->value / $conversionValue;
    }
    
    /**
     * Adds current value to $conversionValue
     * @param float $conversionValue
     * @return float
     */
    public function plus(float $conversionValue):float
    {
        return $this->value + $conversionValue;
    }
    
    /**
     * Minuses conversionValue from CurrentValue
     * @param float $conversionValue
     * @return float
     */
    public function minus(float $conversionValue):float
    {
        return $this->value - $conversionValue;
    }
}