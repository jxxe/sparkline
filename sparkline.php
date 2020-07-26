<?php
/**
 * Generate SVG sparklines with PHP
 * @author Jerome Paulos
 * @version 1.0.0
 * @license MIT
 * @link https://github.com/jxxe/sparkline/
 */

function getY($max, $height, $diff, $value) {
    return round(floatval( ($height - ($value * $height / $max) + $diff) ), 2);
}

function buildElement($tag, $attrs) {
    $element = '<' . $tag . ' ';
    foreach($attrs as $attr => $value) {
        $element .= $attr . '="' . $value . '"';
    }
    $element .= '></' . $tag . '>';
    return $element;
}

function sparkline($svgClass, $values, $lineColor = 'red', $fillColor = 'none', $options = null) {
    if( count($values) <= 1 ) {
        return;
    }

    $svg = '<svg class="' . $svgClass . '">';

    $options = $options ?? [
        'strokeWidth' => 3,
        'width' => 100,
        'height' => 30,
    ];

    $strokeWidth = $options['strokeWidth'];
    $width = $options['width'];
    $fullHeight = $options['height'];
    $height = $fullHeight - ($strokeWidth * 2);
    $max = max($values);
    $lastItemIndex = count($values) - 1;
    $offset = $width / $lastItemIndex;

    $datapoints = [];
    
    $pathY = getY($max, $height, $strokeWidth, $values[0]);
    $pathCoords = "M 0 {$pathY}";

    foreach($values as $index => $value) {
        $x = $index * $offset;
        $y = getY($max, $height, $strokeWidth, $value);
        $datapoints[$index] = [
            'index' => $index,
            'x' => $x,
            'y' => $y
        ];
        $pathCoords .= " L {$x} {$y}";
    }

    $path = buildElement('path', [
        'class' => 'sparkline--line',
        'd' => $pathCoords,
        'fill' => 'none',
        'stroke-width' => $strokeWidth,
        'stroke' => $lineColor
    ]);

    $fillCoords = "{$pathCoords} V {$fullHeight} L 0 {$fullHeight} Z";

    $fill = buildElement('path', [
        'class' => 'sparkline--fill',
        'd' => $fillCoords,
        'stroke' => 'none',
        'fill' => $fillColor
    ]);

    $svg .= $fill;
    $svg .= $path;
    $svg .= '</svg>';
    
    return $svg;
}

echo sparkline('sparkline', [1, 5, 2, 4, 8, 3, 7]);