<?php

declare(strict_types = 1);

namespace UTFH8\Tests\Emoji;

test('emojis', function (...$glyph): void {
    assertNotAscii(...$glyph);
    assertUtf8(...$glyph);
    assertUtf16(...$glyph);
})->with(
    'emoji.food',
)->group(
    'emoji',
    'symbols',
);
