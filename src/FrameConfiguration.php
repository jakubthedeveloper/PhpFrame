<?php

namespace JakubTheDeveloper\PhpFrame;

use JakubTheDeveloper\PhpFrame\Exception\InvalidConfigurationException;

class FrameConfiguration
{
    private int $marginLinesTop;
    private int $marginLinesBottom;
    private int $marginLeft;
    private int $marginRight;
    private string $topLeftCornerSymbol;
    private string $topRightCornerSymbol;
    private string $bottomLeftCornerSymbol;
    private string $bottomRightCornerSymbol;
    private string $horizontalBorderSymbol;
    private string $verticalBorderSymbol;

    public function __construct(
        int $marginLinesTop = 2,
        int $marginLinesBottom = 2,
        int $marginLeft = 8,
        int $marginRight = 8,
        string $topLeftCornerSymbol = '╔',
        string $topRightCornerSymbol = '╗',
        string $bottomLeftCornerSymbol = '╚',
        string $bottomRightCornerSymbol = '╝',
        string $horizontalBorderSymbol = '═',
        string $verticalBorderSymbol = '║'
    ) {

        $this->marginLinesTop = $marginLinesTop;
        $this->marginLinesBottom = $marginLinesBottom;
        $this->marginLeft = $marginLeft;
        $this->marginRight = $marginRight;
        $this->topLeftCornerSymbol = $topLeftCornerSymbol;
        $this->topRightCornerSymbol = $topRightCornerSymbol;
        $this->bottomLeftCornerSymbol = $bottomLeftCornerSymbol;
        $this->bottomRightCornerSymbol = $bottomRightCornerSymbol;
        $this->horizontalBorderSymbol = $horizontalBorderSymbol;
        $this->verticalBorderSymbol = $verticalBorderSymbol;

        $this->validate();
    }

    private function validate()
    {
        $errors = [];

        if ($this->marginLinesTop < 0) {
            $errors[] = 'Margin lines top must be an non-negative integer.';
        }

        if ($this->marginLinesBottom < 0) {
            $errors[] = 'Margin lines bottom must be an non-negative integer.';
        }

        if ($this->marginLeft < 0) {
            $errors[] = 'Margin left must be an non-negative integer.';
        }

        if ($this->marginRight < 0) {
            $errors[] = 'Margin right must be an non-negative integer.';
        }

        if (mb_strlen($this->topLeftCornerSymbol) !== 1) {
            $errors[] = 'Top left corner symbol must be only one character.';
        }

        if (mb_strlen($this->topRightCornerSymbol) !== 1) {
            $errors[] = 'Top right corner symbol must be only one character.';
        }

        if (mb_strlen($this->bottomLeftCornerSymbol) !== 1) {
            $errors[] = 'Bottom left corner symbol must be only one character.';
        }

        if (mb_strlen($this->bottomRightCornerSymbol) !== 1) {
            $errors[] = 'Bottom right corner symbol must be only one character.';
        }

        if (count($errors) > 0) {
            throw new InvalidConfigurationException(json_encode($errors));
        }
    }

    public function getMarginLinesTop(): int
    {
        return $this->marginLinesTop;
    }

    public function getMarginLinesBottom(): int
    {
        return $this->marginLinesBottom;
    }

    public function getMarginLeft(): int
    {
        return $this->marginLeft;
    }

    public function getMarginRight(): int
    {
        return $this->marginRight;
    }

    public function getTopLeftCornerSymbol(): string
    {
        return $this->topLeftCornerSymbol;
    }

    public function getTopRightCornerSymbol(): string
    {
        return $this->topRightCornerSymbol;
    }

    public function getBottomLeftCornerSymbol(): string
    {
        return $this->bottomLeftCornerSymbol;
    }

    public function getBottomRightCornerSymbol(): string
    {
        return $this->bottomRightCornerSymbol;
    }

    public function getHorizontalBorderSymbol(): string
    {
        return $this->horizontalBorderSymbol;
    }

    public function getVerticalBorderSymbol(): string
    {
        return $this->verticalBorderSymbol;
    }
}
