<?php

namespace Shaarli\NetscapeBookmarkParser;

/**
 * Ensure Scuttle exports are properly parsed
 *
 * @see https://sourceforge.net/projects/scuttle/
 */
class ParseScuttleBookmarksTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Delete log file.
     */
    public function tearDown()
    {
        @unlink(LoggerTestsUtils::getLogFile());
    }

    /**
     * Parse bookmarks as exported by Delicious
     */
    public function testParse()
    {
        $parser = new NetscapeBookmarkParser();
        $bkm = $parser->parseFile('tests/input/scuttle.htm');
        $this->assertEquals(4, sizeof($bkm));

        $this->assertEquals(
            'Multilingual Thesaurus of the European Union',
            $bkm[0]['note']
        );
        $this->assertEquals('0', $bkm[0]['pub']);
        $this->assertEquals('dictionary', $bkm[0]['tags']);
        $this->assertEquals('1298020913', $bkm[0]['time']);
        $this->assertEquals('EuroVoc Thesaurus', $bkm[0]['title']);
        $this->assertEquals(
            'http://eurovoc.europa.eu/drupal/?q=navigation&amp;cl=en',
            $bkm[0]['uri']
        );

        $this->assertEquals('', $bkm[1]['note']);
        $this->assertEquals('0', $bkm[1]['pub']);
        $this->assertEquals('dictionary', $bkm[1]['tags']);
        $this->assertEquals('1290688452', $bkm[1]['time']);
        $this->assertEquals("IATE - The EU's multilingual term base", $bkm[1]['title']);
        $this->assertEquals(
            'http://iate.europa.eu/iatediff/SearchByQueryLoad.do?method=load',
            $bkm[1]['uri']
        );

        $this->assertEquals(
            '&quot;Durchsuchen Sie Millionen von SÃ¤tzen, die von anderen'
            .' Menschen Ã¼bersetzt wurden.&quot;',
            $bkm[2]['note']
        );
        $this->assertEquals('0', $bkm[2]['pub']);
        $this->assertEquals('dictionary', $bkm[2]['tags']);
        $this->assertEquals('1290691589', $bkm[2]['time']);
        $this->assertEquals(
            'Linguee - Das Web als WÃ¶rterbuch - EN/DE, EN/FR, EN/SP, EN/POR',
            $bkm[2]['title']
        );
        $this->assertEquals(
            'http://www.linguee.de/deutsch-englisch/search',
            $bkm[2]['uri']
        );

        $this->assertEquals(
            "Database of the United Nation's German Translation Section."
            ." Every record contains at least one German term and a"
            ." corresponding term usually in English. Most records also"
            ." contain a French equivalent, some also a Spanish version."
            ." Not necessarily official.",
            $bkm[3]['note']
        );
        $this->assertEquals('0', $bkm[3]['pub']);
        $this->assertEquals('dictionary', $bkm[3]['tags']);
        $this->assertEquals('1210915553', $bkm[3]['time']);
        $this->assertEquals(
            'UN Terminology in German, English (&amp; French &amp; Spanish)',
            $bkm[3]['title']
        );
        $this->assertEquals(
            'http://unterm.un.org/dgaacs/gts_term.nsf',
            $bkm[3]['uri']
        );
    }
}