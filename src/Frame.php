<?php

namespace JakubTheDeveloper\PhpFrame;

class Frame
{
    /**
     * @var string[]
     */
    private array $texts;
    private int $longestTextLength;
    private FrameConfiguration $configuration;

    /**
     * @param string[] $texts
     * @param FrameConfiguration $frameConfiguration
     */
    public function __construct(array $texts, FrameConfiguration $frameConfiguration = null)
    {
        $this->texts = $texts;
        $this->configuration = $frameConfiguration ?? new FrameConfiguration();
        $this->longestTextLength = $this->getLongestTextLength($texts);
    }

    public function draw()
    {
        $output = $this->drawTopBorder();

        $output .= $this->drawEmptyLines($this->configuration->getMarginLinesTop());

        foreach ($this->texts as $text) {
            $output .= $this->drawTextLine($text);
        }

        $output .= $this->drawEmptyLines($this->configuration->getMarginLinesBottom());

        $output .=  $this->drawBottomBorder();
        $output .= PHP_EOL;

        return $output;
    }

    private function getLongestTextLength(array $texts): int
    {
        $length = 0;

        foreach ($texts as $text) {
            $length = max($length, mb_strlen($text));
        }

        return $length;
    }

    private function drawTopBorder(): string
    {
        $length = $this->longestTextLength + $this->configuration->getMarginLeft() + $this->configuration->getMarginRight();

        return $this->configuration->getTopLeftCornerSymbol() .
               str_repeat($this->configuration->getHorizontalBorderSymbol(), $length) .
               $this->configuration->getTopRightCornerSymbol() . PHP_EOL;
    }

    private function drawBottomBorder(): string
    {
        $length = $this->longestTextLength + $this->configuration->getMarginLeft() + $this->configuration->getMarginRight();

        return $this->configuration->getBottomLeftCornerSymbol() .
            str_repeat($this->configuration->getHorizontalBorderSymbol(), $length) .
            $this->configuration->getBottomRightCornerSymbol();
    }

    private function drawEmptyLines(int $number = 1): string
    {
        $output = '';

        for($i = 0; $i < $number; $i++) {
            $length = $this->longestTextLength + $this->configuration->getMarginLeft() + $this->configuration->getMarginRight();
            $output .= $this->configuration->getVerticalBorderSymbol() . str_repeat(' ', $length) . $this->configuration->getVerticalBorderSymbol() . PHP_EOL;
        }

        return $output;
    }

    private function drawTextLine(string $text): string
    {
        $padLeft = floor(($this->longestTextLength) / 2) - floor(mb_strlen($text) / 2);
        $padRight = $this->longestTextLength - mb_strlen($text) - $padLeft;

        $output = $this->configuration->getVerticalBorderSymbol();
        $output .= str_repeat(' ', $this->configuration->getMarginLeft());
        $output .= str_repeat(' ', $padLeft);
        $output .= $text;
        $output .= str_repeat(' ', $padRight);
        $output .= str_repeat(' ', $this->configuration->getMarginRight());
        $output .= $this->configuration->getVerticalBorderSymbol() . PHP_EOL;

        return $output;
    }
}
