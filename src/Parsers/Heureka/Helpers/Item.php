<?php
/**
 * Class definition of heureka item
 * @copyright creoLIFE Miroslaw Ratman
 * @author Miroslaw Ratman
 * @since 2015-07-17
 * @license MIT
 */

namespace Parsers\Heureka\Helpers;

use Parsers\Heureka\Helpers\ItemDelivery;
use Parsers\Heureka\Helpers\ItemParam;

class Item
{
    /*
     * @var string - item ID
     */
    private $id;

    /*
     * @var string - product name
     */
    private $productName;

    /*
     * @var string - product info
     */
    private $product;

    /*
     * @var string - product name
    */
    private $description;

    /*
     * @var string - product url
    */
    private $url;

    /*
     * @var string - product image url
    */
    private $imgUrl;

    /*
     * @var string - product img url alternative
    */
    private $imgUrlAlternative;

    /*
     * @var string - video url
    */
    private $videoUrl;

    /*
     * @var double - price VAT
    */
    private $priceVat;

    /*
     * @var double - Heureka CPC
    */
    private $heurekaCpc;

    /*
     * @var string - Manufacturer
    */
    private $manufacturer;

    /*
     * @var string - category text
    */
    private $categoryText;

    /*
     * @var string - EAN code
    */
    private $ean;

    /*
     * @var string - product number
    */
    private $productNo;

    /*
     * @var array - array of user defined parameters
    */
    private $param;

    /*
     * @var integer - delivery date (number of days)
    */
    private $deliveryDate;

    /*
     * @var array - array of delivery methods with details
    */
    private $delivery;

    /*
     * @var string - ID of item group
    */
    private $itemGroupId;

    /*
     * @var string - accessory
    */
    private $accessory;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @param mixed $productName
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param mixed $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getImgUrl()
    {
        return $this->imgUrl;
    }

    /**
     * @param mixed $imgUrl
     */
    public function setImgUrl($imgUrl)
    {
        $this->imgUrl = $imgUrl;
    }

    /**
     * @return mixed
     */
    public function getImgUrlAlternative()
    {
        return $this->imgUrlAlternative;
    }

    /**
     * @param mixed $imgUrlAlternative
     */
    public function setImgUrlAlternative($imgUrlAlternative)
    {
        $this->imgUrlAlternative = $imgUrlAlternative;
    }

    /**
     * @return mixed
     */
    public function getVideoUrl()
    {
        return $this->videoUrl;
    }

    /**
     * @param mixed $videoUrl
     */
    public function setVideoUrl($videoUrl)
    {
        $this->videoUrl = $videoUrl;
    }

    /**
     * @return mixed
     */
    public function getPriceVat()
    {
        return $this->priceVat;
    }

    /**
     * @param mixed $priceVat
     */
    public function setPriceVat($priceVat)
    {
        $this->priceVat = $priceVat;
    }

    /**
     * @return mixed
     */
    public function getHeurekaCpc()
    {
        return $this->heurekaCpc;
    }

    /**
     * @param mixed $heurekaCpc
     */
    public function setHeurekaCpc($heurekaCpc)
    {
        $this->heurekaCpc = $heurekaCpc;
    }

    /**
     * @return mixed
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * @param mixed $manufacturer
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return mixed
     */
    public function getCategoryText()
    {
        return $this->categoryText;
    }

    /**
     * @param mixed $categoryText
     */
    public function setCategoryText($categoryText)
    {
        $this->categoryText = $categoryText;
    }

    /**
     * @return mixed
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * @param mixed $ean
     */
    public function setEan($ean)
    {
        $this->ean = $ean;
    }

    /**
     * @return mixed
     */
    public function getProductNo()
    {
        return $this->productNo;
    }

    /**
     * @param mixed $productNo
     */
    public function setProductNo($productNo)
    {
        $this->productNo = $productNo;
    }

    /**
     * @return mixed
     */
    public function getParam()
    {
        return $this->param;
    }

    /**
     * @param mixed $param
     */
    public function setParam(array $param)
    {
        $this->param = $param;
    }

    /**
     * @param mixed $param
     */
    public function addParam(ItemParam $param)
    {
        $this->param[] = $param;
    }

    /**
     * @return mixed
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }

    /**
     * @param mixed $deliveryDate
     */
    public function setDeliveryDate($deliveryDate)
    {
        $this->deliveryDate = $deliveryDate;
    }

    /**
     * @return mixed
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * @param mixed $delivery
     */
    public function setDelivery(array $delivery)
    {
        $this->delivery = $delivery;
    }

    /**
     * @param mixed $delivery
     */
    public function addDelivery(ItemDelivery $delivery)
    {
        $this->delivery[] = $delivery;
    }

    /**
     * @return mixed
     */
    public function getItemGroupId()
    {
        return $this->itemGroupId;
    }

    /**
     * @param mixed $itemGroupId
     */
    public function setItemGroupId($itemGroupId)
    {
        $this->itemGroupId = $itemGroupId;
    }

    /**
     * @return mixed
     */
    public function getAccessory()
    {
        return $this->accessory;
    }

    /**
     * @param mixed $accessory
     */
    public function setAccessory($accessory)
    {
        $this->accessory = $accessory;
    }

}