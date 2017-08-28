<?php

namespace PaperG\FirehoundBlob\AppNexus;

class AppNexusDataIncludeFrame
{
    const LINE_ITEM = 'line-item';
    const CAMPAIGNS = 'campaigns';
    const PROFILES = 'profiles';
    const CREATIVES = 'creatives';
    const SEGMENT = 'targeting-segment';
    const MOBILE_LINE_ITEM = 'mobile-line-item';
    const MOBILE_CAMPAIGNS = 'mobile-campaigns';
    const MOBILE_PROFILES = 'mobile-profiles';

    private $lineItem;

    /**
     * @var array of AppNexusCampaignWrappers
     */
    private $campaigns;
    private $profiles, $creatives, $segment;

    /**
     * @param null $lineItem TRUE to indicate include this, FALSE to not.
     * @param null $campaigns Can be either TRUE to get all, or an associative array with campaign type as key and true/false indicating
     * which campaigns to get
     * @param null $profiles Can be either TRUE to get all, or an associative array with profile type as key,
     * and value of true/false indicating whether we want to get it
     * @param null $creatives Can be either TRUE to get all, or an associative array with dimension id as key, and true/false as value
     * @param null $segment
     */
    public function __construct(
        $lineItem = null,
        $campaigns = null,
        $profiles = null,
        $creatives = null,
        $segment = null
    ) {
        $this->lineItem = isset($lineItem) ? $lineItem : false;
        $this->campaigns = isset($campaigns) ? $campaigns : false;
        $this->profiles = isset($profiles) ? $profiles : false;
        $this->setCreatives($creatives);
        $this->segment = isset($segment) ? $segment : false;
    }

    public function setCreatives($creatives)
    {
        $dimensionsAvailable = DimensionReference::getUsableAEDimensions();
        $this->creatives = [];

        foreach ($dimensionsAvailable as $dimensionId => $isMobile) {
            $this->creatives[$dimensionId] = isset($creatives[$dimensionId]) ? $creatives[$dimensionId] : false;
        }

        if ($creatives === true) {
            $this->creatives = [];
            foreach ($dimensionsAvailable as $dimensionId => $isMobile) {
                $this->creatives[$dimensionId] = true;
            }
        }
    }

    public function getCampaignsInclusions()
    {
        return $this->campaigns;
    }

    public function setCampaignsInclusionsByType($value, $campaignType)
    {
        $this->campaigns[$campaignType] = $value;
    }

    public function setCampaignsInclusions($value)
    {
        $this->campaigns = $value;
    }

    public function getCreativesInclusions()
    {
        return $this->creatives;
    }

    public function setCreativesInclusions($value)
    {
        $dimensionsAvailable = DimensionReference::getUsableAEDimensions();
        $dimensionIds = array_keys($dimensionsAvailable);
        foreach ($dimensionIds as $dimensionId) {
            $this->setCreativesInclusionsByType($value, $dimensionId);
        }
    }

    public function setCreativesInclusionsByType($value, $dimensionId)
    {
        $this->creatives[$dimensionId] = $value;
    }

    public function getLineItemInclusion()
    {
        return $this->lineItem;
    }

    public function setLineItemInclusion($value)
    {
        $this->lineItem = $value;
    }

    public function getProfilesInclusions()
    {
        return $this->profiles;
    }

    public function setProfilesInclusionsByType($value, $campaignType)
    {
        $this->profiles[$campaignType] = $value;
    }

    public function setProfilesInclusions($value)
    {
        $this->profiles = $value;
    }

    public function getSegmentInclusion()
    {
        return $this->segment;
    }

    public function setSegmentInclusion($value)
    {
        $this->segment = $value;
    }

    /**
     * Makes this data blob into a key-value associative array
     * @return array - Associative array
     */
    public function toAssociativeArray()
    {
        return [
            self::LINE_ITEM => $this->lineItem,
            self::CAMPAIGNS => $this->campaigns,
            self::PROFILES => $this->profiles,
            self::CREATIVES => $this->creatives,
            self::SEGMENT => $this->segment
        ];
    }

    public function fromAssociativeArray($array)
    {
        $this->lineItem = isset($array[self::LINE_ITEM]) ? $array[self::LINE_ITEM] : null;
        $this->campaigns = isset($array[self::CAMPAIGNS]) ? $array[self::CAMPAIGNS] : null;
        $this->profiles = isset($array[self::PROFILES]) ? $array[self::PROFILES] : null;
        $this->creatives = isset($array[self::CREATIVES]) ? $array[self::CREATIVES] : null;
        $this->segment = isset($array[self::SEGMENT]) ? $array[self::SEGMENT] : null;
    }
}
