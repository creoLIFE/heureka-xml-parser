<?php
/**
 * Class definition of heureka item delivery methods
 * @copyright creoLIFE Miroslaw Ratman
 * @author Miroslaw Ratman
 * @since 2015-07-17
 * @license MIT
 */

namespace Parsers\Heureka\Helpers;

class ItemDelivery
{
    /*
     * @var string - ID of delivery method
     */
    private $deliveryId;

    /*
     * @var double - delivery price
     */
    private $deliveryPrice;

    /*
     * @var string - delivery price cod - cumulate price of delivery
     */
    private $deliveryPriceCod;

    /**
     * @return mixed
     */
    public function getDeliveryId()
    {
        return $this->deliveryId;
    }

    /**
     * @param mixed $deliveryId
     */
    public function setDeliveryId($deliveryId)
    {
        $this->deliveryId = $deliveryId;
    }

    /**
     * @return mixed
     */
    public function getDeliveryPrice()
    {
        return $this->deliveryPrice;
    }

    /**
     * @param mixed $deliveryPrice
     */
    public function setDeliveryPrice($deliveryPrice)
    {
        $this->deliveryPrice = $deliveryPrice;
    }

    /**
     * @return mixed
     */
    public function getDeliveryPriceCod()
    {
        return $this->deliveryPriceCod;
    }

    /**
     * @param mixed $deliveryPriceCod
     */
    public function setDeliveryPriceCod($deliveryPriceCod)
    {
        $this->deliveryPriceCod = $deliveryPriceCod;
    }

}