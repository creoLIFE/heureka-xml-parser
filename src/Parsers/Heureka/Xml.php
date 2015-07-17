<?php
/**
 * Class responsible of parsing Heureka XML feed
 * @copyright creoLIFE Miroslaw Ratman
 * @author Miroslaw Ratman
 * @since 2015-07-17
 * @license MIT
 */

namespace Parsers\Heureka;

use Parsers\Heureka\Helpers\Item;
use Parsers\Heureka\Helpers\ItemDelivery;
use Parsers\Heureka\Helpers\ItemParam;

class Xml
{
    /*
     * @var boolean
     */
    private $debug = false;

    /*
     * @var boolean
     */
    private $encode = false;

    /*
     * @var string
     */
    private $inputEncoding = 'utf-8';

    /*
     * @var string
     */
    private $outputEncoding = 'utf-8';

    /**
     * @return string
     */
    public function getInputEncoding()
    {
        return $this->inputEncoding;
    }

    /**
     * @param string $inputEncoding
     */
    public function setInputEncoding($inputEncoding)
    {
        $this->encode = true;
        $this->inputEncoding = $inputEncoding;
    }

    /**
     * @return string
     */
    public function getOutputEncoding()
    {
        return $this->outputEncoding;
    }

    /**
     * @param string $outputEncoding
     */
    public function setOutputEncoding($outputEncoding)
    {
        $this->encode = true;
        $this->outputEncoding = $outputEncoding;
    }

    /**
     * @return boolean
     */
    public function isDebug()
    {
        return $this->debug;
    }

    /**
     * @param boolean $debug
     */
    public function setDebug($debug)
    {
        $this->debug = $debug;
    }

    /**
     * Method will set encoding
     * @param string $in - input encoding
     * @param string $out - output encoding
     */
    public function setEncoding($in, $out)
    {
        $this->encode = true;
        $this->setInputEncoding($in);
        $this->setOutputEncoding($out);
    }

    /**
     * Method will parse Heureka XML data feed
     * @param [string] $fileName - path to file to parse
     * @param function $callback - callback method to call and pass item
     */
    public function parse($fileName, $callback = false)
    {
        $out = array();

        libxml_use_internal_errors(true);

        $xml = file_get_contents($fileName);
        $xml = self::cleanupXML($xml);
        $xml = self::encode($xml);

        $dom = new \DOMDocument();
        $dom->recover = TRUE;
        $dom->loadXml($xml);

        $items = $dom->getElementsByTagName('SHOPITEM');
        foreach ($items as $item) {

            $objItem = new Item();
            $objItem->setId($item->getElementsByTagName('ITEM_ID')->item(0)->nodeValue);
            $objItem->setProductName($item->getElementsByTagName('PRODUCTNAME')->item(0)->nodeValue);
            $objItem->setProduct($item->getElementsByTagName('PRODUCT')->item(0)->nodeValue);
            $objItem->setDescription($item->getElementsByTagName('DESCRIPTION')->item(0)->nodeValue);
            $objItem->setUrl($item->getElementsByTagName('URL')->item(0)->nodeValue);
            $objItem->setImgUrl($item->getElementsByTagName('IMGURL')->item(0)->nodeValue);
            $objItem->setImgUrlAlternative($item->getElementsByTagName('IMGURL_ALTERNATIVE')->item(0)->nodeValue);
            $objItem->setVideoUrl($item->getElementsByTagName('VIDEO_URL')->item(0)->nodeValue);
            $objItem->setPriceVat($item->getElementsByTagName('PRICE_VAT')->item(0)->nodeValue);
            $objItem->setHeurekaCpc($item->getElementsByTagName('HEUREKA_CPC')->item(0)->nodeValue);
            $objItem->setManufacturer($item->getElementsByTagName('MANUFACTURER')->item(0)->nodeValue);
            $objItem->setEan($item->getElementsByTagName('EAN')->item(0)->nodeValue);
            $objItem->setProductNo($item->getElementsByTagName('PRODUCTNO')->item(0)->nodeValue);

            $paramList = $item->getElementsByTagName('PARAM');
            if( $paramList->length > 0 ){
                foreach( $paramList as $p ) {
                    $objItemParams = new ItemParam();
                    $objItemParams->setParamName($p->getElementsByTagName('PARAM_NAME')->item(0)->nodeValue);
                    $objItemParams->setVal($p->getElementsByTagName('VAL')->item(0)->nodeValue);

                    $objItem->addParam($objItemParams);
                }
            }

            $objItem->setDeliveryDate($item->getElementsByTagName('DELIVERY_DATE')->item(0)->nodeValue);

            $deliveryList = $item->getElementsByTagName('DELIVERY');
            if( $deliveryList->length > 0 ){
                foreach( $deliveryList as $p ) {
                    $objItemDelivery = new ItemDelivery();
                    $objItemDelivery->setDeliveryId($p->getElementsByTagName('DELIVERY_ID')->item(0)->nodeValue);
                    $objItemDelivery->setDeliveryPrice($p->getElementsByTagName('DELIVERY_PRICE')->item(0)->nodeValue);
                    $objItemDelivery->setDeliveryPriceCod($p->getElementsByTagName('DELIVERY_PRICE_COD')->item(0)->nodeValue);

                    $objItem->addDelivery($objItemDelivery);
                }
            }

            $objItem->setItemGroupId($item->getElementsByTagName('ITEMGROUP_ID')->item(0)->nodeValue);
            $objItem->setAccessory($item->getElementsByTagName('ACCESSORY')->item(0)->nodeValue);

            if( is_callable($callback) ){
                $callback($objItem);
            }
            else{
                $out[] = $objItem;
            }
        }

        libxml_clear_errors();

        return $out;
    }

    private function cleanupXML($xml)
    {
        return str_replace('><', ">\n<", $xml);
    }

    private function encode($xml)
    {
        if( $this->encode ) {
            return iconv($this->getInputEncoding(), $this->getOutputEncoding(), $xml);
        }
        return $xml;
    }

}