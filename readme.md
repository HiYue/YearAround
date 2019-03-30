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

# How to Use 使用说明
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

# Test
- composer test
- 运行 composer test 命令即可