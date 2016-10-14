<?php

namespace PaperG\FirehoundBlob\Facebook;

use PaperG\FirehoundBlob\BlobInterface;
use PaperG\FirehoundBlob\CampaignData\Budget;
use PaperG\FirehoundBlob\Facebook\Targeting\FacebookAudienceTargeting;
use PaperG\FirehoundBlob\Facebook\Targeting\FacebookDemographicTargeting;
use PaperG\FirehoundBlob\Facebook\Targeting\FacebookGeographicTargeting;
use PaperG\FirehoundBlob\Utility;

class UnmanagedFacebookBlob implements BlobInterface
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
    const CREATIVES = 'creatives';
    const BUDGET = 'budget';
    const PUBLICATION_NAME = 'publicationName';
    const IG_ACTOR_ID = 'igActorId';
    const VERSION = 'version';

    const CURRENT_VERSION = 1;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string|int
     */
    private $startDate;

    /**
     * @var string|int
     */
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

    /**
     * @var array
     */
    private $objectsToUpdate;

    /**
     * @var string
     */
    private $adAccountId;

    /**
     * @var string|int
     */
    private $pageId;

    /**
     * @var string
     */
    private $accessToken;

    /**
     * @var FacebookAdSet[]
     */
    private $adSets;

    /**
     * @var FacebookCreative[]
     */
    private $creatives;

    /**
     * @var Budget
     */
    private $budget;

    /**
     * @var string
     */
    private $publicationName;

    /**
     * @var string
     */
    private $igActorId;

    public function __construct($array = null)
    {
        $this->fromArray($array);
    }

    /**
     * @param string $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param string $adAccountId
     */
    public function setAdAccountId($adAccountId)
    {
        $this->adAccountId = $adAccountId;
    }

    /**
     * @return string
     */
    public function getAdAccountId()
    {
        return $this->adAccountId;
    }

    /**
     * @param FacebookAdSet[] $adSets
     */
    public function setAdSets($adSets)
    {
        $this->adSets = $adSets;
    }

    /**
     * @return FacebookAdSet[]
     */
    public function getAdSets()
    {
        return $this->adSets;
    }

    /**
     * @param FacebookAudienceTargeting $audienceTargeting
     */
    public function setAudienceTargeting($audienceTargeting)
    {
        $this->audienceTargeting = $audienceTargeting;
    }

    /**
     * @return FacebookAudienceTargeting
     */
    public function getAudienceTargeting()
    {
        return $this->audienceTargeting;
    }

    /**
     * @param FacebookCreative[] $creatives
     */
    public function setCreatives($creatives)
    {
        $this->creatives = $creatives;
    }

    /**
     * @return FacebookCreative[]
     */
    public function getCreatives()
    {
        return $this->creatives;
    }

    /**
     * @param FacebookDemographicTargeting $demographicTargeting
     */
    public function setDemographicTargeting($demographicTargeting)
    {
        $this->demographicTargeting = $demographicTargeting;
    }

    /**
     * @return FacebookDemographicTargeting
     */
    public function getDemographicTargeting()
    {
        return $this->demographicTargeting;
    }

    /**
     * @param string|int $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return string|int
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param FacebookGeographicTargeting $geographicTargeting
     */
    public function setGeographicTargeting($geographicTargeting)
    {
        $this->geographicTargeting = $geographicTargeting;
    }

    /**
     * @return FacebookGeographicTargeting
     */
    public function getGeographicTargeting()
    {
        return $this->geographicTargeting;
    }

    /**
     * @param array $objectsToUpdate
     */
    public function setObjectsToUpdate($objectsToUpdate)
    {
        $this->objectsToUpdate = $objectsToUpdate;
    }

    /**
     * @return array
     */
    public function getObjectsToUpdate()
    {
        return $this->objectsToUpdate;
    }

    /**
     * @param string|int $pageId
     */
    public function setPageId($pageId)
    {
        $this->pageId = $pageId;
    }

    /**
     * @return string|int
     */
    public function getPageId()
    {
        return $this->pageId;
    }

    /**
     * @param string|int $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return string|int
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return Budget
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * @param Budget $budget
     */
    public function setBudget(Budget $budget)
    {
        $this->budget = $budget;
    }

    public function getPublicationName()
    {
        return $this->publicationName;
    }

    public function setPublicationName($name)
    {
        $this->publicationName = $name;
    }

    /**
     * @return string
     */
    public function getIgActorId()
    {
        return $this->igActorId;
    }

    /**
     * @param string $igActorId
     */
    public function setIgActorId($igActorId)
    {
        $this->igActorId = $igActorId;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $array  = [
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
            self::BUDGET                => isset($this->budget) ? $this->budget->toArray() : null,
            self::PUBLICATION_NAME      => $this->publicationName,
            self::IG_ACTOR_ID           => $this->igActorId,
            self::VERSION               => self::CURRENT_VERSION
        ];
        $adSets = null;
        if (!empty($this->adSets)) {
            $adSets = [];
            foreach ($this->adSets as $adSet) {
                $adSets[] = $adSet->toAssociativeArray();
            }
        }

        $array[self::AD_SETS] = $adSets;

        $creatives = null;
        if (!empty($this->creatives)) {
            foreach ($this->creatives as $creative) {
                $creatives[] = $creative->toArray();
            }
        }

        $array[self::CREATIVES] = $creatives;

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

        $this->geographicTargeting = new FacebookGeographicTargeting($this->safeGet(
            $array,
            self::GEOGRAPHIC_TARGETING
        ));
        $this->demographicTargeting = new FacebookDemographicTargeting($this->safeGet(
            $array,
            self::DEMOGRAPHIC_TARGETING
        )); // versioned
        $this->audienceTargeting = new FacebookAudienceTargeting($this->safeGet(
            $array,
            self::AUDIENCE_TARGETING
        )); // versioned

        $this->objectsToUpdate      = $this->safeGet($array, self::OBJECTS_TO_UPDATE);
        $this->adAccountId          = $this->safeGet($array, self::AD_ACCOUNT_ID);
        $this->pageId               = $this->safeGet($array, self::PAGE_ID);
        $this->accessToken          = $this->safeGet($array, self::ACCESS_TOKEN);
        $this->igActorId            = $this->safeGet($array, self::IG_ACTOR_ID);

        $creatives = $this->safeGet($array, self::CREATIVES, []);
        $this->creatives = [];
        foreach ($creatives as $creative) {
            $fbCreative = new FacebookCreative();
            $fbCreative->fromArray($creative);
            $this->creatives[] = $fbCreative;
        }

        $adSetResults               = [];
        $adSets                     = $this->safeGet($array, self::AD_SETS, []);
        foreach ($adSets as $adSetArray) {
            $adSet = new FacebookAdSet();
            $adSet->fromAssociativeArray($adSetArray);
            $adSetResults[] = $adSet;
        }
        $this->adSets   = $adSetResults; // versioned, might need builder

        $budget = $this->safeGet($array, self::BUDGET);
        if (!empty($budget))
        {
            $budget = new Budget(null);
            $budget->fromArray($this->safeGet($array, self::BUDGET));
            $this->budget  = $budget;
        }
        $this->publicationName = $this->safeGet($array, self::PUBLICATION_NAME);
    }
}
