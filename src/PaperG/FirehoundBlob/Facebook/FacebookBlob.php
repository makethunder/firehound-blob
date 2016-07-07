<?php
/**
 * Created by PhpStorm.
 * User: allentsai
 * Date: 7/6/16
 * Time: 2:32 PM
 */

namespace PaperG\FirehoundBlob\Facebook;


use PaperG\FirehoundBlob\BlobInterface;
use PaperG\FirehoundBlob\Facebook\Targeting\FacebookAudienceTargeting;
use PaperG\FirehoundBlob\Facebook\Targeting\FacebookDemographicTargeting;
use PaperG\FirehoundBlob\Facebook\Targeting\FacebookGeographicTargeting;
use PaperG\FirehoundBlob\Utility;

class FacebookBlob implements BlobInterface
{
    use Utility;

    const STATUS = 'status';
    const START_DATE = 'startDate';
    const END_DATE = 'endDate';
    const GEOGRAPHIC_TARGETING = 'geographicTargeting';
    const DEMOGRAPHIC_TARGETING = 'demographicTargeting';
    const AUDIENCE_TARGETING = 'audienceTargeting';
    const OBJECTS_TO_UPDATE = 'objectsToUpdate';
    const AD_ACCOUNT_ID = 'adAccountId';
    const PAGE_ID = 'pageId';
    const ACCESS_TOKEN = 'accessToken';
    const AD_SETS = 'adSets';
    const CREATIVE = 'creative';
    const VERSION = 'version';

    const CURRENT_VERSION = 1;

    private $status;
    private $startDate;
    private $endDate;

    /**
     * @var FacebookGeographicTargeting
     */
    private $geographicTargeting;

    /**
     * @var FacebookDemographicTargeting
     */
    private $demographicTargeting;

    /**
     * @var FacebookAudienceTargeting
     */
    private $audienceTargeting;
    private $objectsToUpdate;
    private $adAccountId;
    private $pageId;
    private $accessToken;

    /**
     * @var FacebookAdSet[]
     */
    private $adSets;

    /**
     * @var FacebookCreative
     */
    private $creative;

    public function __construct($array = null)
    {
        $this->fromArray($array);
    }

    /**
     * @param mixed $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @return mixed
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param mixed $adAccountId
     */
    public function setAdAccountId($adAccountId)
    {
        $this->adAccountId = $adAccountId;
    }

    /**
     * @return mixed
     */
    public function getAdAccountId()
    {
        return $this->adAccountId;
    }

    /**
     * @param mixed $adSets
     */
    public function setAdSets($adSets)
    {
        $this->adSets = $adSets;
    }

    /**
     * @return mixed
     */
    public function getAdSets()
    {
        return $this->adSets;
    }

    /**
     * @param mixed $audienceTargeting
     */
    public function setAudienceTargeting($audienceTargeting)
    {
        $this->audienceTargeting = $audienceTargeting;
    }

    /**
     * @return mixed
     */
    public function getAudienceTargeting()
    {
        return $this->audienceTargeting;
    }

    /**
     * @param mixed $creatives
     */
    public function setCreative($creatives)
    {
        $this->creative = $creatives;
    }

    /**
     * @return mixed
     */
    public function getCreative()
    {
        return $this->creative;
    }

    /**
     * @param mixed $demographicTargeting
     */
    public function setDemographicTargeting($demographicTargeting)
    {
        $this->demographicTargeting = $demographicTargeting;
    }

    /**
     * @return mixed
     */
    public function getDemographicTargeting()
    {
        return $this->demographicTargeting;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $geographicTargeting
     */
    public function setGeographicTargeting($geographicTargeting)
    {
        $this->geographicTargeting = $geographicTargeting;
    }

    /**
     * @return mixed
     */
    public function getGeographicTargeting()
    {
        return $this->geographicTargeting;
    }

    /**
     * @param mixed $objectsToUpdate
     */
    public function setObjectsToUpdate($objectsToUpdate)
    {
        $this->objectsToUpdate = $objectsToUpdate;
    }

    /**
     * @return mixed
     */
    public function getObjectsToUpdate()
    {
        return $this->objectsToUpdate;
    }

    /**
     * @param mixed $pageId
     */
    public function setPageId($pageId)
    {
        $this->pageId = $pageId;
    }

    /**
     * @return mixed
     */
    public function getPageId()
    {
        return $this->pageId;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $array = [
            self::STATUS                => $this->status,
            self::START_DATE            => $this->startDate,
            self::END_DATE              => $this->endDate,
            self::GEOGRAPHIC_TARGETING  => isset($this->geographicTargeting)
                    ? $this->geographicTargeting->toArray() : null,
            self::DEMOGRAPHIC_TARGETING => isset($this->demographicTargeting)
                    ? $this->demographicTargeting->toArray() : null,
            self::AUDIENCE_TARGETING    => isset($this->audienceTargeting)
                    ? $this->audienceTargeting->toArray() : null,
            self::OBJECTS_TO_UPDATE     => $this->objectsToUpdate,
            self::AD_ACCOUNT_ID         => $this->adAccountId,
            self::PAGE_ID               => $this->pageId,
            self::ACCESS_TOKEN          => $this->accessToken,
            self::CREATIVE              => isset($this->creative) ? $this->creative->toArray() : null,
            self::VERSION               => self::CURRENT_VERSION
        ];
        $adSets = null;
        if (!empty($this->adSets)) {
            $adSets = [];
            foreach($this->adSets as $adSet) {
                $adSets[] = $adSet->toAssociativeArray();
            }
        }

        $array[self::AD_SETS] = $adSets;

        return $array;
    }

    /**
     * @param $array array
     */
    public function fromArray($array)
    {
        $this->status               = $this->safeGet($array, self::STATUS);
        $this->endDate              = $this->safeGet($array, self::END_DATE);
        $this->startDate            = $this->safeGet($array, self::START_DATE);
        $this->geographicTargeting  = $this->safeGet($array, self::GEOGRAPHIC_TARGETING);
        $this->demographicTargeting = $this->safeGet($array, self::DEMOGRAPHIC_TARGETING);
        $this->audienceTargeting    = $this->safeGet($array, self::AUDIENCE_TARGETING);
        $this->objectsToUpdate      = $this->safeGet($array, self::OBJECTS_TO_UPDATE);
        $this->adAccountId          = $this->safeGet($array, self::AD_ACCOUNT_ID);
        $this->pageId               = $this->safeGet($array, self::PAGE_ID);
        $this->accessToken          = $this->safeGet($array, self::ACCESS_TOKEN);
        $this->adSets               = $this->safeGet($array, self::AD_SETS);
        $this->creative             = $this->safeGet($array, self::CREATIVE);
    }
}
