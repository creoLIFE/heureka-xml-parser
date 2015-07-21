<?php
/**
 * Created by PhpStorm.
 * User: mirekratman
 * Date: 15/07/15
 * Time: 15:41
 */

header( 'Content-Type: text/html; charset=UTF-8' );

ERROR_REPORTING(E_ALL);
require __DIR__ . "/../src/loader.php";

//Data files
$xml = '../test/data/feed.xml';
$xml = 'http://www.snhk.cz/storage/files/915/heureka.cz.xml';
$xml = 'http://www.nbb.cz/heureka.xml';

$timeLimit = 1200;

echo "Memory limit: \n";
print_r(ini_get('memory_limit')."\n");
echo "Time limit: ".$timeLimit."\n";
set_time_limit(1200);
date_default_timezone_set('UTC');

//Instance of parser
$classParser = new Parsers\Heureka\Xml();
//$classParser->setInputEncoding('utf-8');
//$classParser->setOutputEncoding('utf-8');
$classParser->setDebug(false);

//Set start time of parsing
$timerStart = time();

//Callback class example
class CallbackClass{

    public function process(Parsers\Heureka\Helpers\Item $item){
        echo "<pre>";
        echo "\n\n-------------------------------------------------------\n";
        echo "Parser output data:\n";
        echo "-------------------------------------------------------\n\n";
        print_r($item);
    }
}

//Parsing XML
$callbackClass = new CallbackClass();
$classParser->parse($xml, array($callbackClass,'process') );

//Set end time of parsing
$timerEnd = time();
echo date('H:i:s', $timerEnd - $timerStart)."\n";