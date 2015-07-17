<?php
/**
 * Created by PhpStorm.
 * User: mirekratman
 * Date: 15/07/15
 * Time: 13:09
 */

ERROR_REPORTING(E_ALL);
require_once(__DIR__ . '/../src/loader.php');

class ApiTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var classParser - Parser instance
     */
    private $classParser;

    /**
     * @var $xmlFeed - XML feed path
     */
    private $xmlFeed;

    public function __construct()
    {
        date_default_timezone_set('UTC');

        $this->xmlFeed = __DIR__ . '/data/feed.xml';
        $this->classParser = new Parsers\Heureka\Xml();
    }


    //Test Items
    public function getItemIdFromItem0($items)
    {
        $this->assertNotNull($items->getId());
    }


    //Test Items
    public function testParser()
    {
        $this->classParser->parse($this->xmlFeed, array($this,'getItemIdFromItem0'));
    }

    //Test Items
    public function testParsedId()
    {
        $parsed = $this->classParser->parse($this->xmlFeed);

        $this->assertSame($parsed[0]->getId(), 'AB123');;
    }

}