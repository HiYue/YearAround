# Year-Around
- Parse any month in any language then get season name. 
- 解析任意给定的日期来判定是否为一年中的某个季节
- Easily find the month in which season
- 方便的处理某个月或者日期属于哪个季节

## Installation
### With Composer
```
$ composer require yue/yeararound
```

## How to Use 使用说明
### Season start/end 判断是否季度开始/结束月份
```php
use Yue\YearAround\Context;

$monthInt = 3;
$monthString1 = '3';
$monthString2 = '03';
$monthString3 = 'Mar';
$monthString4 = 'March';

$isEndOfAnySeason1 = Context::IsEndOfSeason($monthInt);  // True
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

// Sometime the first month of the year might not January 有时候一月并非首月, 比如澳洲的Financial Year是从7月开始到第二年6月结束
$AustralianFinancialYear = Context::CreateYear(2018, 7); // 2018财政年从7月开始
foreach ($AustralianFinancialYear->getMonths() as $month) {
    /**
     * @var \Yue\YearAround\Contracts\IMonth $month
     */
    var_dump($month); // from Jul/2018; Aug/2018; ... Jan/2019; Feb/2019
}
```

# Test
- composer test
- 运行 composer test 命令即可