<?php

declare(strict_types = 1);

namespace UTFH8\Tests\Datasets;

use Generator;
use UTFH8\Script;

dataset('ascii.control', static function (): Generator {
    yield from [
        'Null character'                  => ["\u{0000}", 'U+0000', 0, 'NUL', Script::COMMON],
        'Start of Heading'                => ["\u{0001}", 'U+0001', 1, 'SOH', Script::COMMON],
        'Start of Text'                   => ["\u{0002}", 'U+0002', 2, 'STX', Script::COMMON],
        'End-of-text character'           => ["\u{0003}", 'U+0003', 3, 'ETX', Script::COMMON],
        'End-of-transmission character'   => ["\u{0004}", 'U+0004', 4, 'EOT', Script::COMMON],
        'Enquiry character'               => ["\u{0005}", 'U+0005', 5, 'ENQ', Script::COMMON],
        'Acknowledge character'           => ["\u{0006}", 'U+0006', 6, 'ACK', Script::COMMON],
        'Bell character'                  => ["\u{0007}", 'U+0007', 7, 'BEL', Script::COMMON],
        'Backspace'                       => ["\u{0008}", 'U+0008', 8, 'BS', Script::COMMON],
        'Horizontal tab'                  => ["\u{0009}", 'U+0009', 9, 'HT', Script::COMMON],
        'Line feed'                       => ["\u{000A}", 'U+000A', 10, 'LF', Script::COMMON],
        'Vertical tab'                    => ["\u{000B}", 'U+000B', 11, 'VT', Script::COMMON],
        'Form feed'                       => ["\u{000C}", 'U+000C', 12, 'FF', Script::COMMON],
        'Carriage return'                 => ["\u{000D}", 'U+000D', 13, 'CR', Script::COMMON],
        'Shift Out'                       => ["\u{000E}", 'U+000E', 14, 'SO', Script::COMMON],
        'Shift In'                        => ["\u{000F}", 'U+000F', 15, 'SI', Script::COMMON],
        'Data Link Escape'                => ["\u{0010}", 'U+0010', 16, 'DLE', Script::COMMON],
        'Device Control 1'                => ["\u{0011}", 'U+0011', 17, 'DC1', Script::COMMON],
        'Device Control 2'                => ["\u{0012}", 'U+0012', 18, 'DC2', Script::COMMON],
        'Device Control 3'                => ["\u{0013}", 'U+0013', 19, 'DC3', Script::COMMON],
        'Device Control 4'                => ["\u{0014}", 'U+0014', 20, 'DC4', Script::COMMON],
        'Negative-acknowledge character'  => ["\u{0015}", 'U+0015', 21, 'NAK', Script::COMMON],
        'Synchronous Idle'                => ["\u{0016}", 'U+0016', 22, 'SYN', Script::COMMON],
        'End of Transmission Block'       => ["\u{0017}", 'U+0017', 23, 'ETB', Script::COMMON],
        'Cancel character'                => ["\u{0018}", 'U+0018', 24, 'CAN', Script::COMMON],
        'End of Medium'                   => ["\u{0019}", 'U+0019', 25, 'EM', Script::COMMON],
        'Substitute character'            => ["\u{001A}", 'U+001A', 26, 'SUB', Script::COMMON],
        'Escape character'                => ["\u{001B}", 'U+001B', 27, 'ESC', Script::COMMON],
        'File Separator'                  => ["\u{001C}", 'U+001C', 28, 'FS', Script::COMMON],
        'Group Separator'                 => ["\u{001D}", 'U+001D', 29, 'GS', Script::COMMON],
        'Record Separator'                => ["\u{001E}", 'U+001E', 30, 'RS', Script::COMMON],
        'Unit Separator'                  => ["\u{001F}", 'U+001F', 31, 'US', Script::COMMON],
        'Delete'                          => ["\u{007F}", 'U+007F', 127, 'DEL', Script::COMMON],
    ];
});

dataset('ascii.digits', static function (): Generator {
    yield from [
        'Digit Zero'  => ['0', 'U+0030', 48, 'DIGIT ZERO', Script::COMMON],
        'Digit One'   => ['1', 'U+0031', 49, 'DIGIT ONE', Script::COMMON],
        'Digit Two'   => ['2', 'U+0032', 50, 'DIGIT TWO', Script::COMMON],
        'Digit Three' => ['3', 'U+0033', 51, 'DIGIT THREE', Script::COMMON],
        'Digit Four'  => ['4', 'U+0034', 52, 'DIGIT FOUR', Script::COMMON],
        'Digit Five'  => ['5', 'U+0035', 53, 'DIGIT FIVE', Script::COMMON],
        'Digit Six'   => ['6', 'U+0036', 54, 'DIGIT SIX', Script::COMMON],
        'Digit Seven' => ['7', 'U+0037', 55, 'DIGIT SEVEN', Script::COMMON],
        'Digit Eight' => ['8', 'U+0038', 56, 'DIGIT EIGHT', Script::COMMON],
        'Digit Nine'  => ['9', 'U+0039', 57, 'DIGIT NINE', Script::COMMON],
    ];
});

dataset('ascii.lowercase', static function (): Generator {
    yield from [
        'Latin Small Letter A' => ['a', 'U+0061', 97, 'LATIN SMALL LETTER A', Script::LATIN],
        'Latin Small Letter B' => ['b', 'U+0062', 98, 'LATIN SMALL LETTER B', Script::LATIN],
        'Latin Small Letter C' => ['c', 'U+0063', 99, 'LATIN SMALL LETTER C', Script::LATIN],
        'Latin Small Letter D' => ['d', 'U+0064', 100, 'LATIN SMALL LETTER D', Script::LATIN],
        'Latin Small Letter E' => ['e', 'U+0065', 101, 'LATIN SMALL LETTER E', Script::LATIN],
        'Latin Small Letter F' => ['f', 'U+0066', 102, 'LATIN SMALL LETTER F', Script::LATIN],
        'Latin Small Letter G' => ['g', 'U+0067', 103, 'LATIN SMALL LETTER G', Script::LATIN],
        'Latin Small Letter H' => ['h', 'U+0068', 104, 'LATIN SMALL LETTER H', Script::LATIN],
        'Latin Small Letter I' => ['i', 'U+0069', 105, 'LATIN SMALL LETTER I', Script::LATIN],
        'Latin Small Letter J' => ['j', 'U+006A', 106, 'LATIN SMALL LETTER J', Script::LATIN],
        'Latin Small Letter K' => ['k', 'U+006B', 107, 'LATIN SMALL LETTER K', Script::LATIN],
        'Latin Small Letter L' => ['l', 'U+006C', 108, 'LATIN SMALL LETTER L', Script::LATIN],
        'Latin Small Letter M' => ['m', 'U+006D', 109, 'LATIN SMALL LETTER M', Script::LATIN],
        'Latin Small Letter N' => ['n', 'U+006E', 110, 'LATIN SMALL LETTER N', Script::LATIN],
        'Latin Small Letter O' => ['o', 'U+006F', 111, 'LATIN SMALL LETTER O', Script::LATIN],
        'Latin Small Letter P' => ['p', 'U+0070', 112, 'LATIN SMALL LETTER P', Script::LATIN],
        'Latin Small Letter Q' => ['q', 'U+0071', 113, 'LATIN SMALL LETTER Q', Script::LATIN],
        'Latin Small Letter R' => ['r', 'U+0072', 114, 'LATIN SMALL LETTER R', Script::LATIN],
        'Latin Small Letter S' => ['s', 'U+0073', 115, 'LATIN SMALL LETTER S', Script::LATIN],
        'Latin Small Letter T' => ['t', 'U+0074', 116, 'LATIN SMALL LETTER T', Script::LATIN],
        'Latin Small Letter U' => ['u', 'U+0075', 117, 'LATIN SMALL LETTER U', Script::LATIN],
        'Latin Small Letter V' => ['v', 'U+0076', 118, 'LATIN SMALL LETTER V', Script::LATIN],
        'Latin Small Letter W' => ['w', 'U+0077', 119, 'LATIN SMALL LETTER W', Script::LATIN],
        'Latin Small Letter X' => ['x', 'U+0078', 120, 'LATIN SMALL LETTER X', Script::LATIN],
        'Latin Small Letter Y' => ['y', 'U+0079', 121, 'LATIN SMALL LETTER Y', Script::LATIN],
        'Latin Small Letter Z' => ['z', 'U+007A', 122, 'LATIN SMALL LETTER Z', Script::LATIN],
    ];
});

dataset('ascii.uppercase', static function (): Generator {
    yield from [
        'Latin Capital letter A' => ['A', 'U+0041', 65, 'LATIN CAPITAL LETTER A', Script::LATIN],
        'Latin Capital letter B' => ['B', 'U+0042', 66, 'LATIN CAPITAL LETTER B', Script::LATIN],
        'Latin Capital letter C' => ['C', 'U+0043', 67, 'LATIN CAPITAL LETTER C', Script::LATIN],
        'Latin Capital letter D' => ['D', 'U+0044', 68, 'LATIN CAPITAL LETTER D', Script::LATIN],
        'Latin Capital letter E' => ['E', 'U+0045', 69, 'LATIN CAPITAL LETTER E', Script::LATIN],
        'Latin Capital letter F' => ['F', 'U+0046', 70, 'LATIN CAPITAL LETTER F', Script::LATIN],
        'Latin Capital letter G' => ['G', 'U+0047', 71, 'LATIN CAPITAL LETTER G', Script::LATIN],
        'Latin Capital letter H' => ['H', 'U+0048', 72, 'LATIN CAPITAL LETTER H', Script::LATIN],
        'Latin Capital letter I' => ['I', 'U+0049', 73, 'LATIN CAPITAL LETTER I', Script::LATIN],
        'Latin Capital letter J' => ['J', 'U+004A', 74, 'LATIN CAPITAL LETTER J', Script::LATIN],
        'Latin Capital letter K' => ['K', 'U+004B', 75, 'LATIN CAPITAL LETTER K', Script::LATIN],
        'Latin Capital letter L' => ['L', 'U+004C', 76, 'LATIN CAPITAL LETTER L', Script::LATIN],
        'Latin Capital letter M' => ['M', 'U+004D', 77, 'LATIN CAPITAL LETTER M', Script::LATIN],
        'Latin Capital letter N' => ['N', 'U+004E', 78, 'LATIN CAPITAL LETTER N', Script::LATIN],
        'Latin Capital letter O' => ['O', 'U+004F', 79, 'LATIN CAPITAL LETTER O', Script::LATIN],
        'Latin Capital letter P' => ['P', 'U+0050', 80, 'LATIN CAPITAL LETTER P', Script::LATIN],
        'Latin Capital letter Q' => ['Q', 'U+0051', 81, 'LATIN CAPITAL LETTER Q', Script::LATIN],
        'Latin Capital letter R' => ['R', 'U+0052', 82, 'LATIN CAPITAL LETTER R', Script::LATIN],
        'Latin Capital letter S' => ['S', 'U+0053', 83, 'LATIN CAPITAL LETTER S', Script::LATIN],
        'Latin Capital letter T' => ['T', 'U+0054', 84, 'LATIN CAPITAL LETTER T', Script::LATIN],
        'Latin Capital letter U' => ['U', 'U+0055', 85, 'LATIN CAPITAL LETTER U', Script::LATIN],
        'Latin Capital letter V' => ['V', 'U+0056', 86, 'LATIN CAPITAL LETTER V', Script::LATIN],
        'Latin Capital letter W' => ['W', 'U+0057', 87, 'LATIN CAPITAL LETTER W', Script::LATIN],
        'Latin Capital letter X' => ['X', 'U+0058', 88, 'LATIN CAPITAL LETTER X', Script::LATIN],
        'Latin Capital letter Y' => ['Y', 'U+0059', 89, 'LATIN CAPITAL LETTER Y', Script::LATIN],
        'Latin Capital letter Z' => ['Z', 'U+005A', 90, 'LATIN CAPITAL LETTER Z', Script::LATIN],
    ];
});

dataset('ascii.punctuation', static function (): Generator {
    yield from [
        'Space'                                   => [' ', 'U+0020', 32, 'SPACE', Script::COMMON],
        'Exclamation mark'                        => ['!', 'U+0021', 33, 'EXCLAMATION MARK', Script::COMMON],
        'Quotation mark'                          => ['"', 'U+0022', 34, 'QUOTATION MARK', Script::COMMON],
        'Number sign, Hashtag, Octothorpe, Sharp' => ['#', 'U+0023', 35, 'NUMBER SIGN', Script::COMMON],
        'Dollar sign'                             => ['$', 'U+0024', 36, 'DOLLAR SIGN', Script::COMMON],
        'Percent sign'                            => ['%', 'U+0025', 37, 'PERCENT SIGN', Script::COMMON],
        'Ampersand'                               => ['&', 'U+0026', 38, 'AMPERSAND', Script::COMMON],
        'Apostrophe'                              => ["'", 'U+0027', 39, 'APOSTROPHE', Script::COMMON],
        'Left parenthesis'                        => ['(', 'U+0028', 40, 'LEFT PARENTHESIS', Script::COMMON],
        'Right parenthesis'                       => [')', 'U+0029', 41, 'RIGHT PARENTHESIS', Script::COMMON],
        'Asterisk'                                => ['*', 'U+002A', 42, 'ASTERISK', Script::COMMON],
        'Plus sign'                               => ['+', 'U+002B', 43, 'PLUS SIGN', Script::COMMON],
        'Comma'                                   => [',', 'U+002C', 44, 'COMMA', Script::COMMON],
        'Hyphen-minus'                            => ['-', 'U+002D', 45, 'HYPHEN-MINUS', Script::COMMON],
        'Full stop'                               => ['.', 'U+002E', 46, 'FULL STOP', Script::COMMON],
        'Slash (Solidus)'                         => ['/', 'U+002F', 47, 'SOLIDUS', Script::COMMON],
        'Colon'                                   => [':', 'U+003A', 58, 'COLON', Script::COMMON],
        'Semicolon'                               => [';', 'U+003B', 59, 'SEMICOLON', Script::COMMON],
        'Less-than sign'                          => ['<', 'U+003C', 60, 'LESS-THAN SIGN', Script::COMMON],
        'Equal sign'                              => ['=', 'U+003D', 61, 'EQUALS SIGN', Script::COMMON],
        'Greater-than sign'                       => ['>', 'U+003E', 62, 'GREATER-THAN SIGN', Script::COMMON],
        'Question mark'                           => ['?', 'U+003F', 63, 'QUESTION MARK', Script::COMMON],
        '(Commercial) At sign'                    => ['@', 'U+0040', 64, 'COMMERCIAL AT', Script::COMMON],
        'Left Square Bracket'                     => ['[', 'U+005B', 91, 'LEFT SQUARE BRACKET', Script::COMMON],
        'Backslash (Reverse solidus)'             => ['\\', 'U+005C', 92, 'REVERSE SOLIDUS', Script::COMMON],
        'Right Square Bracket'                    => [']', 'U+005D', 93, 'RIGHT SQUARE BRACKET', Script::COMMON],
        'Circumflex accent'                       => ['^', 'U+005E', 94, 'CIRCUMFLEX ACCENT', Script::COMMON],
        'Low line'                                => ['_', 'U+005F', 95, 'LOW LINE', Script::COMMON],
        'Grave accent'                            => ['`', 'U+0060', 96, 'GRAVE ACCENT', Script::COMMON],
        'Left Curly Bracket'                      => ['{', 'U+007B', 123, 'LEFT CURLY BRACKET', Script::COMMON],
        'Vertical bar (line)'                     => ['|', 'U+007C', 124, 'VERTICAL LINE', Script::COMMON],
        'Right Curly Bracket'                     => ['}', 'U+007D', 125, 'RIGHT CURLY BRACKET', Script::COMMON],
        'Tilde'                                   => ['~', 'U+007E', 126, 'TILDE', Script::COMMON],
    ];
});
