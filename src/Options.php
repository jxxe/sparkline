<?php

namespace Amir\Sparkline;

class Options
{
    private float $strokeWidth;
    private float $width;
    private float $height;
    private float $fullHeight;
    private float $maxNumber;
    private float $lastItemIndex;
    private float $offset;

    public function __construct(private array $options, private array $numbers)
    {
        $this->strokeWidth = $options['strokeWidth'];
        $this->width = $options['width'];
        $this->fullHeight = $options['height'];
        $this->height = $this->fullHeight - ($this->strokeWidth * 2);
        $this->maxNumber = max($this->numbers);
        $this->lastItemIndex = count($this->numbers) - 1;
        $this->offset = $this->width / $this->lastItemIndex;
    }

    public function getStrokeWidth(): float
    {
        return $this->strokeWidth;
    }

    public function setStrokeWidth(float $strokeWidth): void
    {
        $this->strokeWidth = $strokeWidth;
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function setWidth(float $width): void
    {
        $this->width = $width;
    }

    public function getHeight(): float
    {
        return $this->height;
    }

    public function setHeight(float $height): void
    {
        $this->height = $height;
    }

    public function getFullHeight(): float
    {
        return $this->fullHeight;
    }

    public function setFullHeight(float $fullHeight): void
    {
        $this->fullHeight = $fullHeight;
    }

    public function getMaxNumber(): float
    {
        return $this->maxNumber;
    }

    public function setMaxNumber(float $maxNumber): void
    {
        $this->maxNumber = $maxNumber;
    }

    public function getLastItemIndex(): float
    {
        return $this->lastItemIndex;
    }

    public function setLastItemIndex(float $lastItemIndex): void
    {
        $this->lastItemIndex = $lastItemIndex;
    }

    public function getOffset(): float
    {
        return $this->offset;
    }

    public function setOffset(float $offset): void
    {
        $this->offset = $offset;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function setOptions(array $options): void
    {
        $this->options = $options;
    }

    public function getNumbers(): array
    {
        return $this->numbers;
    }

    public function setNumbers(array $numbers): void
    {
        $this->numbers = $numbers;
    }
}