<?php
declare(strict_types=1);

namespace dan8551\components\unit_conversion\test;
use PHPUnit\Framework\TestCase;
use dan8551\components\unit_conversion\UnitConversion;

final class UnitConversionTest extends TestCase
{
    public function massConversion_long()
    {
        $mass = new UnitConversionTest(1,'g', UnitConversion::UNIT_MASS);
        $this->assertEquals(1000, $mass->to('kg'));
    }
}
