# Year-Around
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
- YEAR_AROUND_START_MONTH=7 // 全局配置以7月份作为起始年 默认或缺失此配置时 起始月份为1月
- YEAR_AROUND_HEMISPHERE=1  // 在北半球使用; 南半球使用设置为2 则季节会反转
- YEAR_AROUND_FORMAT_SEPARATOR="-"  // 年月之间的分隔符

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

### Season start/end 判断是否季度开始/结束月份
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