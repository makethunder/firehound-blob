<?php

namespace PaperG\FirehoundBlob\Facebook\Targeting;


use PaperG\FirehoundBlob\BlobInterface;
use PaperG\FirehoundBlob\Utility;

class FacebookGeographicTargeting implements BlobInterface
{
    use Utility;

    const COUNTRY_IDS    = 'countryIds';
    const REGION_IDS     = 'regionIds';
    const CITY_IDS       = 'cityIds';
    const POSTAL_CODES   = 'postalCodes';
    const COUNTRY_ACTION = 'countryAction';
    const REGION_ACTION  = 'regionAction';
    const CITY_ACTION    = 'cityAction';
    const POSTAL_ACTION  = 'postalAction';

    const VERSION = 'version';

    const CURRENT_VERSION = 1;

    private $countryIds;
    private $regionIds;
    private $cityIds;
    private $postalCodes;

    private $countryAction;
    private $regionAction;
    private $cityAction;
    private $postalAction;

    public function __construct($array = null)
    {
        $this->fromArray($array);
    }

    /**
     * @param mixed $cityAction
     */
    public function setCityAction($cityAction)
    {
        $this->cityAction = $cityAction;
    }

    /**
     * @return mixed
     */
    public function getCityAction()
    {
        return $this->cityAction;
    }

    /**
     * @param mixed $cityIds
     */
    public function setCityIds($cityIds)
    {
        $this->cityIds = $cityIds;
    }

    /**
     * @return mixed
     */
    public function getCityIds()
    {
        return $this->cityIds;
    }

    /**
     * @param mixed $countryAction
     */
    public function setCountryAction($countryAction)
    {
        $this->countryAction = $countryAction;
    }

    /**
     * @return mixed
     */
    public function getCountryAction()
    {
        return $this->countryAction;
    }

    /**
     * @param mixed $countryIds
     */
    public function setCountryIds($countryIds)
    {
        $this->countryIds = $countryIds;
    }

    /**
     * @return mixed
     */
    public function getCountryIds()
    {
        return $this->countryIds;
    }

    /**
     * @param mixed $postalAction
     */
    public function setPostalAction($postalAction)
    {
        $this->postalAction = $postalAction;
    }

    /**
     * @return mixed
     */
    public function getPostalAction()
    {
        return $this->postalAction;
    }

    /**
     * @param mixed $postalCodes
     */
    public function setPostalCodes($postalCodes)
    {
        $this->postalCodes = $postalCodes;
    }

    /**
     * @return mixed
     */
    public function getPostalCodes()
    {
        return $this->postalCodes;
    }

    /**
     * @param mixed $regionAction
     */
    public function setRegionAction($regionAction)
    {
        $this->regionAction = $regionAction;
    }

    /**
     * @return mixed
     */
    public function getRegionAction()
    {
        return $this->regionAction;
    }

    /**
     * @param mixed $regionIds
     */
    public function setRegionIds($regionIds)
    {
        $this->regionIds = $regionIds;
    }

    /**
     * @return mixed
     */
    public function getRegionIds()
    {
        return $this->regionIds;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            self::COUNTRY_IDS => $this->getCountryIds(),
            self::REGION_IDS => $this->getRegionIds(),
            self::CITY_IDS => $this->getCityIds(),
            self::POSTAL_CODES => $this->getPostalCodes(),
            self::COUNTRY_ACTION => $this->getCountryAction(),
            self::REGION_ACTION => $this->getRegionAction(),
            self::CITY_ACTION => $this->getCityAction(),
            self::POSTAL_ACTION => $this->getPostalAction(),
            self::VERSION => self::CURRENT_VERSION
        ];
    }

    /**
     * @param $array array
     */
    public function fromArray($array)
    {
        $this->setCountryIds($this->safeGet($array, self::COUNTRY_IDS));
        $this->setRegionIds($this->safeGet($array, self::REGION_IDS));
        $this->setCityIds($this->safeGet($array, self::CITY_IDS));
        $this->setPostalCodes($this->safeGet($array, self::POSTAL_CODES));
        $this->setCountryAction($this->safeGet($array, self::COUNTRY_ACTION));
        $this->setRegionAction($this->safeGet($array, self::REGION_ACTION));
        $this->setCityAction($this->safeGet($array, self::CITY_ACTION));
        $this->setPostalAction($this->safeGet($array, self::POSTAL_ACTION));
    }
} 
