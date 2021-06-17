<?php

namespace JakubTheDeveloper\PhpFrame;

use PHPUnit\Framework\TestCase;

/**
 * Class FrameTest
 * @package JakubTheDeveloper\PhpFrame
 * @covers \JakubTheDeveloper\PhpFrame\Frame
 */
class FrameTest extends TestCase
{
    public function testDrawFrameWithDefaultConfiguration()
    {
        $frame = new Frame(
            [
                "First line of the text",
                "Second line of the text",
                "© Copyright information",
            ]
        );

        $expectedOutput = <<<Frame
╔═══════════════════════════════════════╗
║                                       ║
║                                       ║
║        First line of the text         ║
║        Second line of the text        ║
║        © Copyright information        ║
║                                       ║
║                                       ║
╚═══════════════════════════════════════╝
Frame;

        $this->assertEquals($expectedOutput, $frame->draw());
    }

    public function testDrawFrameWithUserConfiguration()
    {
        $configuration = new FrameConfiguration(
            1,
            3,
            26,
            26,
            '+',
            '+',
            '+',
            '+',
            '~',
            '|'
        );

        $frame = new Frame(
            [
                "First, longer line of the text",
                "Second line",
                "And the third",
            ],
            $configuration
        );

        $expectedOutput = <<<Frame
+~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~+
|                                                                                  |
|                          First, longer line of the text                          |
|                                    Second line                                   |
|                                   And the third                                  |
|                                                                                  |
|                                                                                  |
|                                                                                  |
+~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~+
Frame;

        $this->assertEquals($expectedOutput, $frame->draw());
    }
}
