//const UNIT_MASS = Mass;
const UNIT_ENERGY = Energy;
//const UNIT_LENGTH = Length;
//const UNIT_SPEED = Speed;
//const UNIT_TEMPERATURE = Temperature;

class UnitConversion 
{    
    /**
     * 
     * @param string unitType
     * @param float value
     * @param string unit
     * @returns {UnitConversion}
     */
    constructor(unitType, value, unit)
    {
        this.unitType = new unitType(value, unit);
        
    }
    
    /**
     * 
     * @param float newValue
     * @param string newUnit
     * @returns float
     */
    value(newValue, newUnit)
    {
        return this.unitType.value(newValue, newUnit);
    }
    
    unitName()
    {
        return this.unitType.unitName();
    }
    
    unitAbbr()
    {
        return this.unitType.unitAbbr();
    }
    
    to(units)
    {
        return this.unitType.to(units);
    }
 }