<?php

namespace PaperG\FirehoundBlob\Facebook\AdSets;

use PaperG\FirehoundBlob\CampaignData\Budget;
use PaperG\FirehoundBlob\DataObject;
use PaperG\FirehoundBlob\Facebook\FacebookCreative;
use PaperG\FirehoundBlob\Facebook\Fields\GeneralFacebookAdSetFields;

class GeneralFacebookAdSet extends DataObject
{

    public function __construct($array = [])
    {
        $this->objectKeys = [
            GeneralFacebookAdSetFields::BUDGET => 'PaperG\FirehoundBlob\CampaignData\Budget',
            GeneralFacebookAdSetFields::CREATIVES => ['PaperG\FirehoundBlob\Facebook\FacebookCreative']

        ];
        $this->fromArray($array);
    }

    public function getAdSetId()
    {
        return $this->safeGet($this->data, GeneralFacebookAdSetFields::AD_SET_ID);
    }

    public function getBidAmount()
    {
        return $this->safeGet($this->data, GeneralFacebookAdSetFields::BID_AMOUNT);
    }

    /**
     * @return null|Budget
     */
    public function getBudget()
    {
        return $this->safeGet($this->objects, GeneralFacebookAdSetFields::BUDGET);
    }

    /**
     * @return null|FacebookCreative
     */
    public function getCreatives()
    {
        return $this->safeGet($this->objects, GeneralFacebookAdSetFields::CREATIVES);
    }

    public function getOptimizationGoal()
    {
        return $this->safeGet($this->data, GeneralFacebookAdSetFields::OPTIMIZATION_GOAL);
    }

    /**
     * Array of platform to placements.
     *
     * $placements = array(
     *     TargetingFields::PUBLISHER_PLATFORMS => [],
     *     TargetingFields::FACEBOOK_POSITIONS => [],
     *     TargetingFields::DEVICE_PLATFORMS => []
     * );
     * Platform and positions from:
     * 'desktop', 'mobile', 'facebook', 'instagram', 'audience_network', 'right_hand_column',
     * 'feed', 'instant_article'
     *
     * @return array
     */
    public function getPlacements()
    {
        return $this->safeGet($this->data, GeneralFacebookAdSetFields::PLACEMENTS);
    }

    public function getType()
    {
        return $this->safeGet($this->data, GeneralFacebookAdSetFields::TYPE);
    }

    public function getPlatformName()
    {
        return $this->safeGet($this->data, GeneralFacebookAdSetFields::PLATFORM_NAME);
    }
} 
