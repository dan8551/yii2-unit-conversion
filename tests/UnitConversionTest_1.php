<?php
declare(strict_types=1);

namespace dan8551\components\unit_conversion\test;
use PHPUnit\Framework\TestCase;
use dan8551\components\unit_conversion\UnitConversion;

final class UnitConversionTest extends TestCase
{
    public function testMassConversionLongConstructor()
    {
        //init in grams
        $mass = new UnitConversion(UnitConversion::UNIT_MASS,1,'g');
        $this->assertEquals('gram', $mass->unitName());
        $this->assertEquals('g', $mass->unitAbbr());
        
        //g to kg to g
        $this->assertEquals(1000, $mass->to('kg'));
        $this->assertEquals('kilogram', $mass->unitName());
        $this->assertEquals('kg', $mass->unitAbbr());
        $this->assertEquals(1,$mass->to('g'));
        
        //g to Ib to g
        $this->assertEquals(0.002204623,round($mass->to('Ib'),9));
        $this->assertEquals('pound', $mass->unitName());
        $this->assertEquals('Ib', $mass->unitAbbr());
        $this->assertEquals(1,$mass->to('g'));
        
        //init in pounds
        $mass = new UnitConversion(UnitConversion::UNIT_MASS,1,'Ib');
        $this->assertEquals(453.59237, $mass->to('g'));
    }
    
    public function testMassConversionShortConstructor()
    {
        //init without unit or value
        $mass = new UnitConversion(UnitConversion::UNIT_MASS);
        $this->assertEquals(1, $mass->value(1, 'kilogram'));
        $this->assertEquals('kg', $mass->unitAbbr());
        $this->assertEquals('kilogram', $mass->unitName());
    }
    
    public function testEnergyConversion()
    {
        //init in Joules
        $energy = new UnitConversion(UnitConversion::UNIT_ENERGY,1,'J');
        $this->assertEquals(1,$energy->value());
        $this->assertEquals('J', $energy->unitAbbr());
        $this->assertEquals('Joule', $energy->unitName());
        
        $this->assertEquals(0.001,$energy->to('kJ'));
        $this->assertEquals('kJ', $energy->unitAbbr());
        $this->assertEquals('kilojoule', $energy->unitName());
        
        $this->assertEquals(0.000001,$energy->to('MJ'));
        $this->assertEquals('MJ', $energy->unitAbbr());
        $this->assertEquals('megajoule', $energy->unitName());
        
        $this->assertEquals(0.000000001,$energy->to('GJ'));
        $this->assertEquals('GJ', $energy->unitAbbr());
        $this->assertEquals('gigajoule', $energy->unitName());
        
        $this->assertEquals(1000,$energy->to('mJ'));
        $this->assertEquals('mJ', $energy->unitAbbr());
        $this->assertEquals('millijoule', $energy->unitName());
        
        $this->assertEquals(0.0002777778,$energy->to('Wh'));
        $this->assertEquals('Wh', $energy->unitAbbr());
        $this->assertEquals('Watt-hour', $energy->unitName());
        
        $this->assertEquals(0.0000002777778,$energy->to('kWh'));
        $this->assertEquals('kWh', $energy->unitAbbr());
        $this->assertEquals('kilowatt-hour', $energy->unitName());
        
        $this->assertEquals(0.0000000002777778,$energy->to('MWh'));
        $this->assertEquals('MWh', $energy->unitAbbr());
        $this->assertEquals('megawatt-hour', $energy->unitName());
        
        $this->assertEquals(0.0009478171,$energy->to('BTU'));
        $this->assertEquals('BTU', $energy->unitAbbr());
        $this->assertEquals('British Thermal Unit', $energy->unitName());
        
        $this->assertEquals(0.0000009478171,$energy->to('kBTU'));
        $this->assertEquals('kBTU', $energy->unitAbbr());
        $this->assertEquals('kilo British Thermal Unit', $energy->unitName());
    }
    
    public function testLengthConversion()
    {
        $length = new UnitConversion(UnitConversion::UNIT_LENGTH,1,'m');
        $this->assertEquals(1,$length->value());
        $this->assertEquals('m', $length->unitAbbr());
        $this->assertEquals('meter', $length->unitName());
        
        $this->assertEquals(100,$length->to('cm'));
        $this->assertEquals('cm', $length->unitAbbr());
        $this->assertEquals('centimeter', $length->unitName());
        
        $this->assertEquals(10,$length->to('dm'));
        $this->assertEquals('dm', $length->unitAbbr());
        $this->assertEquals('decimeter', $length->unitName());
        
        $this->assertEquals(1000,$length->to('mm'));
        $this->assertEquals('mm', $length->unitAbbr());
        $this->assertEquals('millimeter', $length->unitName());
        
        $this->assertEquals(0.001,$length->to('km'));
        $this->assertEquals('km', $length->unitAbbr());
        $this->assertEquals('kilometer', $length->unitName());
        
        $this->assertEquals(3.28084,$length->to('ft'));
        $this->assertEquals('ft', $length->unitAbbr());
        $this->assertEquals('foot', $length->unitName());
        
        $this->assertEquals(39.37008,round($length->to('in'),5));
        $this->assertEquals('in', $length->unitAbbr());
        $this->assertEquals('inch', $length->unitName());
        
        $this->assertEquals(0.0006213712,$length->to('mi'));
        $this->assertEquals('mi', $length->unitAbbr());
        $this->assertEquals('mile', $length->unitName());
        
        $this->assertEquals(0.0005399568,$length->to('nmi'));
        $this->assertEquals('nmi', $length->unitAbbr());
        $this->assertEquals('nautical mile', $length->unitName());
        
        $this->assertEquals(1.093613,$length->to('yd'));
        $this->assertEquals('yd', $length->unitAbbr());
        $this->assertEquals('yard', $length->unitName());
    }
    
    public function testSpeedConversion()
    {
        $speed = new UnitConversion(UnitConversion::UNIT_SPEED,1,'mps');
        $this->assertEquals(1,$speed->value());
        $this->assertEquals('mps', $speed->unitAbbr());
        $this->assertEquals('meters per second', $speed->unitName());
        
        $this->assertEquals(3.599999712,$speed->to('kmh'));
        $this->assertEquals('kmh', $speed->unitAbbr());
        $this->assertEquals('kilometers per hour', $speed->unitName());
        
        $this->assertEquals(2.2369362920544,$speed->to('mph'));
        $this->assertEquals('mph', $speed->unitAbbr());
        $this->assertEquals('miles per hour', $speed->unitName());
        
        $this->assertEquals(3.28084,round($speed->to('ft/s'),5));
        $this->assertEquals('ft/s', $speed->unitAbbr());
        $this->assertEquals('feet per second', $speed->unitName());
        
        $this->assertEquals(1.9425019425019,$speed->to('knot (uk)'));
        $this->assertEquals('kn', $speed->unitAbbr());
        $this->assertEquals('knot (uk)', $speed->unitName());
        
        $this->assertEquals(1.9438446603753,$speed->to('knot (nmi)'));
        $this->assertEquals('kn', $speed->unitAbbr());
        $this->assertEquals('knot (nmi)', $speed->unitName());
    }
    
    public function testTemperatureConversion()
    {
        $temp = new UnitConversion(UnitConversion::UNIT_TEMPERATURE,1,'°C');
        $this->assertEquals(1,$temp->value());
        $this->assertEquals('°C', $temp->unitAbbr());
        $this->assertEquals('Celsius', $temp->unitName());
        
        $this->assertEquals(33.8,$temp->to('°F'));
        $this->assertEquals('°F', $temp->unitAbbr());
        $this->assertEquals('Farenheit', $temp->unitName());
        
        $this->assertEquals(493.47,$temp->to('°R'));
        $this->assertEquals('°R', $temp->unitAbbr());
        $this->assertEquals('Rankine', $temp->unitName());
        
        $this->assertEquals(274.15,$temp->to('K'));
        $this->assertEquals('K', $temp->unitAbbr());
        $this->assertEquals('Kelvin', $temp->unitName());
    }
}
