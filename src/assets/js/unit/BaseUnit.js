class BaseUnit
{
    constructor(value, unit)
    {
        this.value = value;
        if(unit !== undefined)
            this.unit = this.unitIndex(unit);
    }
    
    /**
     * 
     * @param string unit
     * @returns int
     */
    unitIndex(unit)
    {
        for(const[key,value] of Object.entries(this.units())){
            if(value['name'] === unit || value['abbr'] === unit)
                return key;
        }
//        for(var i=0; i<this.units().length; i++)
//        {
//            console.log(this.units()[i]);
//            
//        }
        return 0;
    }
    
    units(unit)
    {
        var unitArr = [];
        if(unit !== undefined)
            return unitArr[unit];
        else
            return unitArr;
    }
    
    unitName()
    {
        return this.units(this.unit)['name'];
    }
    
    unitAbbr()
    {
        return this.units(this.unit)['abbr'];
    }
    
    to(newUnit)
    {
        var convertToBase = this.units(this.unit)['conversionToBase'];
        switch(convertToBase[0])
        {
            case '*':
                this.value = this.multiply(convertToBase[1]);
                break;
            case '/':
                this.value = this.divide(convertToBase[1]);
                break;
            case '+':
                this.value = this.plus(convertToBase[1]);
                break;
            case '-':
                this.value = this.minus(convertToBase[1]);
                break;
            case '()':
                this.value = convertToBase[1](this.value);
                break;
        }
        var convertToNewUnit = this.units(this.unitIndex(newUnit))['conversionFromBase'];
        switch(convertToNewUnit[0])
        {
            case '*':
                this.value = this.multiply(convertToNewUnit[1]);
                break;
            case '/':
                this.value = this.divide(convertToNewUnit[1]);
                break;
            case '+':
                this.value = this.plus(convertToNewUnit[1]);
                break;
            case '-':
                this.value = this.minus(convertToNewUnit[1]);
                break;
            case '()':
                this.value = convertToNewUnit[1](this.value);
                break;
        }
        this.unit = this.unitIndex(newUnit);
        return this.value;
    }
    
    multiply(conversionValue)
    {
        return this.value * conversionValue;
    }
    
    divide(conversionValue)
    {
        return this.value / conversionValue;
    }
    
    plus(conversionValue)
    {
        return this.value + conversionValue;
    }
    
    minus(conversionValue)
    {
        return this.value - conversionValue;
    }
    
    value(newValue,newUnit)
    {
        if(newValue !== undefined)
            this.value = newValue;
        if(newUnit !== undefined)
            this.unit = newUnit;
        return this.value;
    }
}