<?php
namespace MyProject;

use PHPUnit\Framework\TestCase;
use Browser\Casper;

class SimpleTest extends TestCase
{
    private static $casperBinPath = '/usr/bin/';

    public static function setUpBeforeClass()
    {
        // OSX global install
        if (file_exists("/usr/local/bin/casperjs")) {
            self::$casperBinPath = "/usr/local/bin/";
        } elseif (!file_exists(self::$casperBinPath . 'casperjs')) {
            self::$casperBinPath = 'node_modules/casperjs/bin/';
        }
    }

    public function testPageContent()
    {
        $casper = new Casper(self::$casperBinPath);

        $screenshotFileName = "startpage-" . date('Y-m-d-H-i-s') . ".png";

        $casper->setViewPort(800, 600)
            ->start('http://my-project.dev')
            ->waitForText('MyProject')
            ->capturePage("tests/ui/.reports/{$screenshotFileName}")
            ->run();

        $result = $casper->getOutput();

        $this->assertContains("found text \"Hello World\"", $result);
    }
}
