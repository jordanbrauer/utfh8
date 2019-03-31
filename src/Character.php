<?php

declare(strict_types = 1);

namespace UTFH8;

use IntlChar;
use LogicException;
use Normalizer;
use RuntimeException;

final class Character
{
    const BIDIRECTIONAL_CLASSES = [
        IntlChar::CHAR_DIRECTION_LEFT_TO_RIGHT              => 'L',
        IntlChar::CHAR_DIRECTION_RIGHT_TO_LEFT              => 'R',
        IntlChar::CHAR_DIRECTION_EUROPEAN_NUMBER            => 'EN',
        IntlChar::CHAR_DIRECTION_EUROPEAN_NUMBER_SEPARATOR  => 'ES',
        IntlChar::CHAR_DIRECTION_EUROPEAN_NUMBER_TERMINATOR => 'ET',
        IntlChar::CHAR_DIRECTION_ARABIC_NUMBER              => 'AN',
        IntlChar::CHAR_DIRECTION_COMMON_NUMBER_SEPARATOR    => 'CS',
        IntlChar::CHAR_DIRECTION_BLOCK_SEPARATOR            => 'B',
        IntlChar::CHAR_DIRECTION_SEGMENT_SEPARATOR          => 'S',
        IntlChar::CHAR_DIRECTION_WHITE_SPACE_NEUTRAL        => 'WS',
        IntlChar::CHAR_DIRECTION_OTHER_NEUTRAL              => 'ON',
        IntlChar::CHAR_DIRECTION_LEFT_TO_RIGHT_EMBEDDING    => 'LRE',
        IntlChar::CHAR_DIRECTION_LEFT_TO_RIGHT_OVERRIDE     => 'LRO',
        IntlChar::CHAR_DIRECTION_RIGHT_TO_LEFT_ARABIC       => 'AL',
        IntlChar::CHAR_DIRECTION_RIGHT_TO_LEFT_EMBEDDING    => 'RLE',
        IntlChar::CHAR_DIRECTION_RIGHT_TO_LEFT_OVERRIDE     => 'RLO',
        IntlChar::CHAR_DIRECTION_POP_DIRECTIONAL_FORMAT     => 'PDF',
        IntlChar::CHAR_DIRECTION_DIR_NON_SPACING_MARK       => 'NSM',
        IntlChar::CHAR_DIRECTION_BOUNDARY_NEUTRAL           => 'BN',
        IntlChar::CHAR_DIRECTION_FIRST_STRONG_ISOLATE       => 'FSI',
        IntlChar::CHAR_DIRECTION_LEFT_TO_RIGHT_ISOLATE      => 'LRI',
        IntlChar::CHAR_DIRECTION_RIGHT_TO_LEFT_ISOLATE      => 'RLI',
        IntlChar::CHAR_DIRECTION_POP_DIRECTIONAL_ISOLATE    => 'PDI',
        IntlChar::CHAR_DIRECTION_CHAR_DIRECTION_COUNT       => '?',
    ];

    const BINARY_FORMAT = 'H*';

    const CODEPOINT_ASCII = 'U+%04d';
    
    const CODEPOINT_UNICODE = 'U+%04X';

    const CHARACTER_CATEGORIES = [
        IntlChar::CHAR_CATEGORY_UNASSIGNED             => '?',
        IntlChar::CHAR_CATEGORY_GENERAL_OTHER_TYPES    => '??',
        IntlChar::CHAR_CATEGORY_UPPERCASE_LETTER       => 'Lu',
        IntlChar::CHAR_CATEGORY_LOWERCASE_LETTER       => 'Ll',
        IntlChar::CHAR_CATEGORY_TITLECASE_LETTER       => 'Lt',
        IntlChar::CHAR_CATEGORY_MODIFIER_LETTER        => 'Lm',
        IntlChar::CHAR_CATEGORY_OTHER_LETTER           => 'Lo',
        IntlChar::CHAR_CATEGORY_NON_SPACING_MARK       => 'Mn',
        IntlChar::CHAR_CATEGORY_ENCLOSING_MARK         => 'Me',
        IntlChar::CHAR_CATEGORY_COMBINING_SPACING_MARK => 'Mc',
        IntlChar::CHAR_CATEGORY_DECIMAL_DIGIT_NUMBER   => 'Nd',
        IntlChar::CHAR_CATEGORY_LETTER_NUMBER          => 'Nl',
        IntlChar::CHAR_CATEGORY_OTHER_NUMBER           => 'No',
        IntlChar::CHAR_CATEGORY_SPACE_SEPARATOR        => 'Zs',
        IntlChar::CHAR_CATEGORY_LINE_SEPARATOR         => 'Zl',
        IntlChar::CHAR_CATEGORY_PARAGRAPH_SEPARATOR    => 'Zp',
        IntlChar::CHAR_CATEGORY_CONTROL_CHAR           => 'Cc',
        IntlChar::CHAR_CATEGORY_FORMAT_CHAR            => 'Cf',
        IntlChar::CHAR_CATEGORY_PRIVATE_USE_CHAR       => 'Co',
        IntlChar::CHAR_CATEGORY_SURROGATE              => 'Cs',
        IntlChar::CHAR_CATEGORY_DASH_PUNCTUATION       => 'Pd',
        IntlChar::CHAR_CATEGORY_START_PUNCTUATION      => 'Ps',
        IntlChar::CHAR_CATEGORY_END_PUNCTUATION        => 'Pe',
        IntlChar::CHAR_CATEGORY_CONNECTOR_PUNCTUATION  => 'Pc',
        IntlChar::CHAR_CATEGORY_OTHER_PUNCTUATION      => 'Po',
        IntlChar::CHAR_CATEGORY_MATH_SYMBOL            => 'Sm',
        IntlChar::CHAR_CATEGORY_CURRENCY_SYMBOL        => 'Sc',
        IntlChar::CHAR_CATEGORY_MODIFIER_SYMBOL        => 'Sk',
        IntlChar::CHAR_CATEGORY_OTHER_SYMBOL           => 'So',
        IntlChar::CHAR_CATEGORY_INITIAL_PUNCTUATION    => 'Pi',
        IntlChar::CHAR_CATEGORY_FINAL_PUNCTUATION      => 'Pf',
        IntlChar::CHAR_CATEGORY_CHAR_CATEGORY_COUNT    => '???',
    ];

    const ENCODING_ASCII = 'ASCII';

    const ENCODING_UTF16 = 'UTF-16';

    const ENCODING_UTF32 = 'UTF-32';

    const ENCODING_UTF8 = 'UTF-8';

    private $bidirectionalClass;

    private $blockCode;

    private $bytes;

    private $category;

    private $combiningClass;

    private $encoding;

    private $glyph;

    private $isMirrored;

    private $name;

    private $script;

    private $version;

    public function __construct(string $character, bool $detectScript = true)
    {
        $this->setCharacterData($character, $detectScript);
    }

    public function __toString(): string
    {
        return $this->glyph;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getScript(): string
    {
        return $this->script;
    }

    public function isAscii(): bool
    {
        return mb_check_encoding($this->glyph, self::ENCODING_ASCII);
    }

    public function isUtf16(): bool
    {
        return mb_check_encoding($this->glyph, self::ENCODING_UTF16);
    }

    public function isUtf32(): bool
    {
        return mb_check_encoding($this->glyph, self::ENCODING_UTF32);
    }

    public function isUtf8(): bool
    {
        return mb_check_encoding($this->glyph, self::ENCODING_UTF8);
    }

    public function toArray(): array
    {
        $data = array_merge(\get_object_vars($this), [
            'binary'    => $this->toBinary(),
            'codepoint' => $this->toCodepoint(),
            'decimal'   => $this->toDecimal(),
            'hex'       => $this->toHex(),
            'utf8'      => $this->toUtf8(),
            'utf16'     => $this->toUtf16(),
            'utf32'     => $this->toUtf32(),
        ]);

        ksort($data);

        return $data;
    }

    public function toBinary(): string
    {
        return base_convert(unpack(self::BINARY_FORMAT, $this->glyph)[1], 16, 2);
    }

    public function toCodepoint()
    {
        return sprintf(...(self::ENCODING_ASCII === $this->encoding)
            ? [self::CODEPOINT_ASCII, $this->toHex()]
            : [self::CODEPOINT_UNICODE, IntlChar::ord($this->glyph)]);
    }

    public function toDecimal(): int
    {
        return bindec($this->toBinary());
    }

    public function toHex(): string
    {
        return bin2hex($this->glyph);
    }

    public function toJson(): string
    {
        return json_encode($this->toArray(), JSON_UNESCAPED_UNICODE);
    }

    public function toString(): string
    {
        return (string) $this;
    }

    public function toUtf16($toInt = false)
    {
        return $this->convertUtfEncoding(self::ENCODING_UTF16, $toInt);
    }

    public function toUtf32($toInt = false)
    {
        return $this->convertUtfEncoding(self::ENCODING_UTF32, $toInt);
    }

    public function toUtf8($toInt = false)
    {
        return $this->convertUtfEncoding(self::ENCODING_UTF8, $toInt);
    }

    private function checkSize(): self
    {
        $maxBytes = (self::ENCODING_UTF16 == $this->encoding) ? 4 : 1;

        if ($this->bytes <= 0 || $this->bytes > $maxBytes) {
            throw new LogicException("Characters must only have a maximum byte size of {$maxBytes}, received {$this->bytes}.");
        }

        return $this;
    }

    private function convertUtfEncoding(string $encoding, bool $toInt = true)
    {
        $bytes = '';
        $split = ((int) \trim(\substr($encoding, -2, 2), '-')) / 4;

        if ($this->isAscii()) {
            $bytes .= \sprintf("%0{$split}s", $this->toHex());
        } else {
            $glyph = \mb_convert_encoding($this->glyph, $encoding, self::ENCODING_UTF8);
            $size = \strlen($glyph); # NOTE: `mb_strlen($glyph, self::ENCODING_UTF32)` does not work here for all chars
    
            for ($i = 0; $i < $size; ++$i) {
                $bytes .= \bin2hex(\mb_substr($glyph, $i, 1, self::ENCODING_UTF32));
            }
        }

        return \implode(' ', \array_map(function ($part) use ($toInt) {
            $hex = '0x'.\strtoupper($part);

            return ($toInt) ? (string) \hexdec($hex) : $hex;
        }, \str_split($bytes, $split)));
    }

    private function detectBidirectionalClass(): string
    {
        return self::BIDIRECTIONAL_CLASSES[IntlChar::charDirection($this->glyph)];
    }

    private function detectBlockCode(): int
    {
        return IntlChar::getBlockCode($this->glyph);
    }

    private function detectBytes(): self
    {
        $this->bytes = \mb_strlen($this->glyph, $this->encoding);

        return $this;
    }

    private function detectCategory(): string
    {
        return self::CHARACTER_CATEGORIES[IntlChar::charType($this->glyph)];
    }

    private function detectCombiningClass(): int
    {
        return IntlChar::getCombiningClass($this->glyph);
    }

    private function detectEncoding(): self
    {
        $isAscii = $this->isAscii();
        $isUtf8 = $this->isUtf8();
        $isUtf16 = $this->isUtf16();
        // $isUtf32 = $this->isUtf32();

        if (!$isAscii && !$isUtf8 && !$isUtf16) {
            throw new RuntimeException("Unknown encoding for character glyph: `{$this->glyph}`");
        }

        if ($isAscii && !$isUtf8) {
            $this->encoding = self::ENCODING_ASCII;
        } elseif (($isAscii && $isUtf8) || (!$isAscii && $isUtf8 && !$isUtf16)) {
            $this->encoding = self::ENCODING_UTF8;
        } elseif (($isUtf8 && $isUtf16) || (!$isUtf8 && $isUtf16)) {
            $this->encoding = self::ENCODING_UTF16;
        }

        return $this;
    }

    private function detectIsMirrored(): bool
    {
        return IntlChar::isMirrored($this->glyph);
    }

    private function detectName(): string
    {
        return IntlChar::charName($this->glyph);
    }

    private function detectScript(): string
    {
        return (string) new Script($this);
    }

    private function detectVersion(): string
    {
        return implode('.', IntlChar::charAge($this->glyph));
    }

    private function setCharacterData(string $character, bool $detectScript): self
    {
        $this->glyph = Normalizer::normalize($character, Normalizer::FORM_C);

        $this->detectEncoding()->detectBytes()->checkSize();

        $this->bidirectionalClass = $this->detectBidirectionalClass();
        $this->blockCode = $this->detectBlockCode();
        $this->category = $this->detectCategory();
        $this->combiningClass = $this->detectCombiningClass();
        $this->isMirrored = $this->detectIsMirrored();
        $this->name = $this->detectName();
        $this->version = $this->detectVersion();

        if ($detectScript) { # INF loops :(
            $this->script = $this->detectScript();
        }

        return $this;
    }
}
