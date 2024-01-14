<?php

namespace Amir\Sparkline;

class Sparkline
{
    private Math $math;
    private string $lineColor = 'red';
    private string $fillColor = 'none';
    private array $options = [];

    public function __construct()
    {
        $this->math = new Math();
    }

    public function generate(string $svgClass, array $numbers): ?string
    {
        if (count($numbers) <= 1) {
            return null;
        }

        $options = new Options($this->options, $numbers);
        $svg = $this->initSvg($options, $svgClass);
        $pathCoords = $this->generatePathCoords($options);

        $path = $this->generatePath($pathCoords, $options->getStrokeWidth());
        $fillCoords = "{$pathCoords} V {$options->getFullHeight()} L 0 {$options->getFullHeight()} Z";
        $fill = $this->generateFill($fillCoords);

        $svg .= $fill;
        $svg .= $path;
        $svg .= '</svg>';

        return $svg;
    }

    public function getMath(): Math
    {
        return $this->math;
    }

    public function setMath(Math $math): self
    {
        $this->math = $math;

        return $this;
    }

    public function getLineColor(): string
    {
        return $this->lineColor;
    }

    public function setLineColor(string $lineColor): self
    {
        $this->lineColor = $lineColor;

        return $this;
    }

    public function getFillColor(): string
    {
        return $this->fillColor;
    }

    public function setFillColor(string $fillColor): self
    {
        $this->fillColor = $fillColor;

        return $this;
    }

    public function getOptions(): array
    {
        return empty($this->options) ? [
            'strokeWidth' => 3,
            'width' => 100,
            'height' => 30,
        ] : $this->options;
    }

    public function setOptions(array $options): self
    {
        $this->options = $options;

        return $this;
    }

    private function buildElement($tag, $attrs): string
    {
        $element = '<' . $tag . ' ';
        foreach ($attrs as $attr => $value) {
            $element .= $attr . '="' . $value . '"';
        }
        $element .= '></' . $tag . '>';

        return $element;
    }

    private function generatePath(string $pathCoords, int $strokeWidth): string
    {
        return $this->buildElement('path', [
            'class' => 'sparkline--line',
            'd' => $pathCoords,
            'fill' => 'none',
            'stroke-width' => $strokeWidth,
            'stroke' => $this->lineColor
        ]);
    }

    private function generateFill(string $fillCoords): string
    {
        return $this->buildElement('path', [
            'class' => 'sparkline--fill',
            'd' => $fillCoords,
            'stroke' => 'none',
            'fill' => $this->fillColor
        ]);
    }

    private function initSvg(Options $options, string $svgClass): string
    {
        return '<svg style="width:' . $options->getWidth() . 'px;height:' . $options->getHeight() . 'px" class="' . $svgClass . '">';
    }

    private function generatePathCoords(Options $options): string
    {
        $pathY = $this->math->getY($options->getMaxNumber(), $options->getHeight(), $options->getStrokeWidth(), $options->getNumbers()[0]);
        $pathCoords = "M 0 {$pathY}";

        foreach ($options->getNumbers() as $index => $value) {
            $x = $index * $options->getOffset();
            $y = $this->math->getY($options->getMaxNumber(), $options->getHeight(), $options->getStrokeWidth(), $value);
            $pathCoords .= " L {$x} {$y}";
        }

        return $pathCoords;
    }
}