# Year-Around
- Support English, Chinese, Japanese, French, Germany and Spanish
- 支持自动输出 中/英/日/德/法/西 的月份与季节
- Support Constellations
- 支持根据日期获取星座 可输出每个月可能的星座
- Parse any month in any language is the start or end of a season. 
- 解析任意给定的日期来判定是否为一年中的某个季节的开始和结束
- When a year is not start from January, such as a Financial Year in Australia
- 方便的处理那些不是从一月开始的年的情况 比如财政年度可能是从7月份开始
- Configurations in .env file, compatible with Laravel framework
- 可以在 .env 文件中灵活定义配置参数 可以在Laravel中直接使用

## Installation
### With Composer
```
$ composer require yue/yeararound
```

## How to Use 使用说明
### Global configurations in flexible 灵活的自动配置 兼容Laravel
- YEAR_AROUND_START_MONTH=7         // 全局配置以7月份作为起始年 默认或缺失此配置时 起始月份为1月
- YEAR_AROUND_HEMISPHERE=1          // 在北半球使用; 南半球使用设置为2 则季节会反转
- YEAR_AROUND_FORMAT_SEPARATOR="-"  // 年月之间的分隔符
- YEAR_AROUND_LANGUAGE="EN"         // Default Language: English; Support CN/ES/FR/DE/JP 默认语言英语
```
/** File: .env.example */
YEAR_AROUND_START_MONTH=1
YEAR_AROUND_HEMISPHERE=1
YEAR_AROUND_FORMAT_SEPARATOR="-"
YEAR_AROUND_LANGUAGE="EN"
```

### Year, Season and Month 年月日
```php
use Yue\YearAround\Context;
use Yue\YearAround\Contracts\ISeason;
use Yue\YearAround\Contracts\IMonth;
use Yue\YearAround\Utilities\DateParser;

$year = Context::CreateYear(2018);

// Check if the leap year
$isLeapYear = $year->isLeapYear(); // false 是否为闰年

$seasons = $year->getSeasons();

foreach($seasons as $season){
    /** @var ISeason $season */
    var_dump($season->getName());
    
    // Get months of each season, it will be adjusted by hemisphere setting in .env
    // 获取每个季度或者季节包含的月份 会根据 .env 文件中半球的设置自动生成
    $months = $season->getMonths();
    foreach($months as $month){
        /** @var IMonth $month */
        var_dump($month);
    }
}

// Can get the end day of any month in any year
// 可以获取某个月在任何年的最后一天
$feb = DateParser::GetMonth(2);
$lastDayInt = $feb->getLastDay(2000)->day; // It's 29 得到闰月值 29
$lastDayInt = $feb->getLastDay(2001)->day; // It's 28 得到闰月值 28
```

### Constellations 星座的获取
```php
use Yue\YearAround\Context;
use Yue\YearAround\Contracts\IConstellation;
use Yue\YearAround\Utilities\DateParser;
use Yue\YearAround\Utilities\DictionaryFactory;

$constellation = Context::CreateConstellation(1,11,DictionaryFactory::GetInstance('en'));

var_dump($constellation->getName());    // Capricorn 摩羯座
var_dump($constellation->getFistDay()->format('d/M'));  // 22/Dec 从12月22日
var_dump($constellation->getLastDay()->format('d/M'));  // 19/Jan 至1月19日

// Get previous and next 获取前一个星座和下一个星座的名称
var_dump($constellation->prev()->getName());    // Sagittarius 前一个星座是射手座
var_dump($constellation->next()->getName());    // Aquarius 下一个星座是水瓶座

// Get constellation by give tpye 获取指定的星座
$leo = Context::CreateConstellation(null, null, null, IConstellation::Leo);
var_dump($leo->getName()); // Leo 狮子座
```

### Season start/end 判断是否季度开始/结束月份
```php
use Yue\YearAround\Context;

$monthInt = 3;
$monthString1 = '3';
$monthString2 = '03';
$monthString3 = 'Mar';
$monthString4 = 'March';

$isEndOfAnySeason1 = Context::IsEndOfSeason($monthInt);      // True
$isEndOfAnySeason2 = Context::IsEndOfSeason($monthString1);  // True
$isEndOfAnySeason3 = Context::IsEndOfSeason($monthString2);  // True
$isEndOfAnySeason4 = Context::IsEndOfSeason($monthString3);  // True
$isEndOfAnySeason5 = Context::IsEndOfSeason($monthString4);  // True
```

### Year start/end 判断是否年度开始/结束月份
- It refers to the configured YEAR_AROUND_START_MONTH; By default: 1 (January)
- 将根据在配置文件中的 YEAR_AROUND_START_MONTH 项来判定年度的起始 默认为1
```php
use Yue\YearAround\Context;

$year = Context::CreateYear(2018);
foreach ($year->getMonths() as $month) {
    /**
     * @var \Yue\YearAround\Contracts\IMonth $month
     */
    var_dump($month); // Jan/2018; Feb/2018; ...
}

// Sometime the first month of the year might not January 
// 有时候一月并非首月, 比如澳洲的Financial Year是从7月开始到第二年6月结束
$AustralianFinancialYear = Context::CreateYear(2018, 7); // 2018财政年从7月开始
foreach ($AustralianFinancialYear->getMonths() as $month) {
    /**
     * @var \Yue\YearAround\Contracts\IMonth $month
     */
    var_dump($month); // from Jul/2018; Aug/2018; ... Jan/2019; Feb/2019
}

$AustralianFinancialYear->getFirstMonth();  // Jul/2018 获取年度首月 2018年7月
$AustralianFinancialYear->getLastMonth();   // Jun/2019 获取年度末月 2019年6月
```

# Test
- composer test
- 运行 composer test 命令即可

Contributing
------------

1. Fork it
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Make your changes
4. Run the tests, adding new ones for your own code if necessary (`phpunit`)
5. Commit your changes (`git commit -am 'Added some feature'`)
6. Push to the branch (`git push origin my-new-feature`)
7. Create new Pull Request