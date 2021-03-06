# sparkline
[![License](https://img.shields.io/github/license/jxxe/sparkline)](https://github.com/jxxe/sparkline/blob/master/LICENSE)
[![Download](https://img.shields.io/badge/download-<2KB-brightgreen)](https://raw.githubusercontent.com/jxxe/sparkline/master/sparkline.php)
[![GitHub stars](https://img.shields.io/github/stars/jxxe/sparkline?style=social)](https://github.com/jxxe/sparkline)

This is a port of [fnando/sparkline](https://github.com/fnando/sparkline). Due to the nature of PHP, it does not have many of the features that the JavaScript version does, but can still generate pretty SVG sparklines from a dataset. Here's how it works:

## Usage
This is a minimum working example:
```php
require_once('sparkline.php'); // Or whatever the path is
echo sparkline('sparkline', [1, 5, 2, 4, 8, 3, 7]);
```
It will output an SVG that looks like this:

![](https://i.imgur.com/UiZKmH0.png)

## API
### `sparkline($svgClass, $values, $lineColor, $fillColor, $options)`
| Parameter  | Default Value | Description |
| --- | --- | --- |
| $svgClass | (Required) | The CSS class for your sparkline. You can use this to style specific sparklines. |
| $values | (Required) | An array of the values to be graphed. Example: `[1,2,3,4,5]`; |
| $lineColor | `'red'` | A value that will be put into the `stroke` attribute of the line path. Any CSS color values work. |
| $fillColor | `'none'` | A value that will be put into the `fill` attribute of the sparkline's fill. CSS colors work. |
| $options | `['strokeWidth' => 3, 'width' => 100, 'height' => 30]` | An array of options for the sparkline. |

## License
(The MIT License)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the 'Software'), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
