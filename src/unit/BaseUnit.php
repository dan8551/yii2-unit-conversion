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
        if(isset($unit))
            $this->unit = $this->unitIndex($unit);
//        for($i=1;$i<=count($this->units());$i++)
//        {
//            if(array_search($unit, $this->units()[$i]))
//                $this->unit = $i;
//        }
    }
    
    /**
     * Find the corresponding array index for a given unit string
     * @param string $unit
     * @return int index of [[units()]]
     */
    public function unitIndex(string $unit):int
    {
        for($i=1;$i<=count($this->units());$i++)
        {
            if(array_search($unit, $this->units()[$i]))
                return $i;
        }
        return 0;
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
        return $this->units($this->unit)['name'];

    }
    
    /**
     * 
     * @return string current unit abbreviation
     */
    public function unitAbbr()
    {
        return $this->units($this->unit)['abbr'];
    }
    
    /**
     * Convert from current unit to new unit and return value
     * @param string $units new unit type
     * @return float new value 
     */
    public function to(string $newUnit)
    {
        $baseValue;
        $convertToBase = $this->units($this->unit)['conversionToBase'];
//        codecept_debug('Old Unit: '.$this->unitAbbr());
//        codecept_debug('New Unit: '.$newUnit);
//        codecept_debug($convertToBase[0].' '.$convertToBase[1]);
        switch($convertToBase[0])
        {
            case '*':
//                codecept_debug('Multiply');
                $this->value = $this->multiply($convertToBase[1]);
                break;
            case '/':
//                codecept_debug('Divide');
                $this->value = $this->divide($convertToBase[1]);
                break;
            case '+':
//                codecept_debug('Add');
                $this->value = $this->plus($convertToBase[1]);
                break;
            case '-':
//                codecept_debug('Minus');
                $this->value = $this->minus($convertToBase[1]);
                break;
            case '()':
//                codecept_debug('Function');
                $this->value = $convertToBase[1]($this->value);
                break;
        }
        $convertToNewUnit = $this->units($this->unitIndex($newUnit))['conversionFromBase'];
//        codecept_debug($convertToNewUnit[0].' '.$convertToNewUnit[1]);
//        codecept_debug('Value: '.$this->value);
        switch($convertToNewUnit[0])
        {
            case '*':
//                codecept_debug('Multiply');
                $this->value = $this->multiply($convertToNewUnit[1]);
                break;
            case '/':
//                codecept_debug('Divide');
                $this->value = $this->divide($convertToNewUnit[1]);
                break;
            case '+':
//                codecept_debug('Add');
                $this->value = $this->plus($convertToNewUnit[1]);
                break;
            case '-':
//                codecept_debug('Minus');
                $this->value = $this->minus($convertToNewUnit[1]);
                break;
            case '()':
//                codecept_debug('Function');
                $this->value = $convertToNewUnit[1]($this->value);
                break;
        }
        $this->unit = $this->unitIndex($newUnit);
//        codecept_debug($this->value);
        return $this->value;
    }
    
    /**
     * Multiplies current value by $conversionValue
     * @param float $conversionValue
     * @return float
     */
    public function multiply(float $conversionValue):float
    {
//        codecept_debug($conversionValue);
        return ($this->value * $conversionValue);
    }
    
    /**
     * Divides current value by $conversionValue
     * @param float $conversionValue
     * @return float
     */
    public function divide(float $conversionValue):float
    {
        return ($this->value / $conversionValue);
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
    
    /**
     * 
     * @param float|null $newValue
     * @param float|null $newUnit
     * @return float current value
     */
    public function value(?float $newValue=null, ?string $newUnit=null):float
    {
        if(isset($newValue))
            $this->value = $newValue;
        if(isset($newUnit))
            $this->unit = $this->unitIndex ($newUnit);
        return $this->value;
    }
    
    /**
     * 
     * @param float $value
     * @return void
     */
    public function setValue(float $value):void
    {
        $this->value = $value;
    }
}