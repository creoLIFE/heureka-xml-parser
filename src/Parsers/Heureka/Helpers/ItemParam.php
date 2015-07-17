<?php
/**
 * Class definition of heureka item parameters
 * @copyright creoLIFE Miroslaw Ratman
 * @author Miroslaw Ratman
 * @since 2015-07-17
 * @license MIT
 */

namespace Parsers\Heureka\Helpers;

class ItemParam
{
    /*
     * @var string - name of parameter
     */
    private $paramName;

    /*
     * @var string - parameter value
     */
    private $val;

    /**
     * @return mixed
     */
    public function getParamName()
    {
        return $this->paramName;
    }

    /**
     * @param mixed $paramName
     */
    public function setParamName($paramName)
    {
        $this->paramName = $paramName;
    }

    /**
     * @return mixed
     */
    public function getVal()
    {
        return $this->val;
    }

    /**
     * @param mixed $val
     */
    public function setVal($val)
    {
        $this->val = $val;
    }
}