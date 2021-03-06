<?php

declare(strict_types=1);

namespace Shaarli\NetscapeBookmarkParser;

class ParseShaarliWithTabsAndSpacesTest extends TestCase
{
    /**
     * Delete log file.
     */
    public function tearDown(): void
    {
        @unlink(LoggerTestsUtils::getLogFile());
    }

    /**
     * Parse flat Chromium bookmarks (no directories)
     */
    public function testParseFlat()
    {
        $parser = new NetscapeBookmarkParser(false, null, '1');
        $bkm = $parser->parseFile('tests/input/shaarli_with_tabs_and_spaces.htm');

        static::assertSame(
            trim(file_get_contents('tests/output/shaarli_with_tabs_and_spaces.txt')),
            $bkm[0]['note']
        );
    }
}
