const LENGTH_UNIT_M = 1;
const LENGTH_UNIT_CM = 2;
const LENGTH_UNIT_DM = 3;
const LENGTH_UNIT_KM = 4;
const LENGTH_UNIT_MM = 5;
const LENGTH_UNIT_FT = 6;
const LENGTH_UNIT_IN = 7;
const LENGTH_UNIT_MI = 8;
const LENGTH_UNIT_NMI = 9;
const LENGTH_UNIT_YD = 10;

class Length extends BaseUnit
{
    units(unit)
    {
        var unitArr = {
            LENGTH_UNIT_M: {
                'name': 'meter',
                'abbr': 'm',
                'conversionToBase': ['*',1],
                'conversionFromBase': ['*',1],
            },
            LENGTH_UNIT_CM: {
                'name':'centimeter',
                'abbr': 'cm',
                'conversionToBase': ['/',100],
                'conversionFromBase': ['*',100],
            },
            LENGTH_UNIT_DM: {
                'name': 'decimeter',
                'abbr': 'dm',
                'conversionToBase': ['/', 10],
                'conversionFromBase': ['*', 10]
            },
            LENGTH_UNIT_KM: {
                'name': 'kilometer',
                'abbr': 'km',
                'conversionToBase': ['*', 1000],
                'conversionFromBase': ['/', 1000]
            },
            LENGTH_UNIT_MM:{
                'name': 'millimeter',
                'abbr': 'mm',
                'conversionToBase': ['/', 1000],
                'conversionFromBase': ['*', 1000]
            },
            LENGTH_UNIT_FT:{
                'name': 'foot',
                'abbr': 'ft',
                'conversionToBase': ['/', 3.28084],
                'conversionFromBase': ['*', 3.28084]
            },
            LENGTH_UNIT_IN: {
                'name': 'inch',
                'abbr': 'in',
                'conversionToBase': ['*', 0.0254],
                'conversionFromBase': ['/', 0.0254]
            },
            LENGTH_UNIT_MI: {
                'name': 'mile',
                'abbr': 'mi',
                'conversionToBase': ['/', 0.0006213712],
                'conversionFromBase': ['*', 0.0006213712]
            },
            LENGTH_UNIT_NMI: {
                'name': 'nautical mile',
                'abbr': 'nmi',
                'conversionToBase': ['/', 0.0005399568],
                'conversionFromBase': ['*', 0.0005399568]
            },
            LENGTH_UNIT_YD: {
                'name': 'yard',
                'abbr': 'yd',
                'conversionToBase': ['/', 1.093613],
                'conversionFromBase': ['*', 1.093613]
            },
        };
        if(unit === undefined)
            return unitArr;
        else
            return unitArr[unit];
    }
}

