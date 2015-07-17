# PHP Heureka.cz XML Parser

PHP Heureka.cz XML Parser is a simple class which handle XML conversion to PHP array of objects
where each object represent one item (product)


## Usage

Usage of parser is very simple. You just need to instance class, setup some basic parameters if you need
character conversion and run parser. You can pass as a callback the method which will do something
withch each parsed item.


### Parser instance
Depends how you will use parser you need to require necessary PHP files or use composer.
After this just simply instance class.

```
$classParser = new Parsers\Heureka\Xml();
```


### Parsing XML
Now call ->parse() method and pass necessary parameters.

```
$xml = '../test/data/feed.xml';
$classParser->parse($xml);
```

or pass your own function/class method as a second parameter to process imediatelly each item

```
class CallbackClass{
    public function process(Parsers\Heureka\Helpers\Item $item){
        print_r($item);
    }
}

$xml = '../test/data/feed.xml';
$classParser->parse($xml, array($callbackClass,'process') );
```


### Set character decoding
If you need to recode character set just simply set those parameters after parser will be instanced.

```
$classParser->setInputEncoding('utf-8');
$classParser->setOutputEncoding('utf-8');
```


### Additional configuration for big files
If you expect to parse big files you need to add some extra parameters in to PHP configuration and/or
PHP file before you will instance parser.

in most cases you need to increase only parsing time limit by setting set_time_limit() parameter.

```
set_time_limit(1200);
```