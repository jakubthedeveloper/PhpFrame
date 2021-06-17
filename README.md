# About

PHP library for drawing a frame around lines of text. 

# Installation

```shell
composer require jakub-the-developer/php-frame
```

# Examples

## Default configuration
```php

$frame = new \JakubTheDeveloper\PhpFrame\Frame(
    [
        "First line of the text",
        "Second line of the text",
        "© Copyright information",
    ]
);

$frame->draw();
```

Result:

```shell
╔═══════════════════════════════════════╗
║                                       ║
║                                       ║
║        First line of the text         ║
║        Second line of the text        ║
║        © Copyright information        ║
║                                       ║
║                                       ║
╚═══════════════════════════════════════╝
```

Screenshot:

![PhpFrame - Console output - first example](screenshots/1.png)

## Custom configuration

```php
$configuration = new \JakubTheDeveloper\PhpFrame\FrameConfiguration(
    1, // top margin lines
    3, // bottom margin lines
    26, // margin left
    26, // margin right
    '+', // top-left corner symbol
    '+', // top-right corner symbol
    '+', // top-left corner symbol
    '+', // top-left corner symbol
    '~', // horizontal border symbol
    '|' // vertical border symbol
);

$frame = new \JakubTheDeveloper\PhpFrame\Frame(
    [
        "First, longer line of the text",
        "Second line",
        "And the third",
    ],
    $configuration
);
```

Result:

```shell
+~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~+
|                                                                                  |
|                          First, longer line of the text                          |
|                                    Second line                                   |
|                                   And the third                                  |
|                                                                                  |
|                                                                                  |
|                                                                                  |
+~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~+
```

Screenshot:

![PhpFrame - Console output - second example](screenshots/2.png)
