<?php

namespace PaperG\FirehoundBlob\Facebook\AdSets;

use PaperG\FirehoundBlob\DataObject;
use PaperG\FirehoundBlob\Facebook\Fields\ManagedFacebookAdSetFields;

class ManagedFacebookAdSet extends DataObject
{

    public function __construct($array = [])
    {
        $this->objectKeys = [
            ManagedFacebookAdSetFields::BUDGET => 'PaperG\FirehoundBlob\CampaignData\Budget',
        ];
        $this->fromArray($array);
    }

    public function getAdSetId()
    {
        return $this->safeGet($this->data, ManagedFacebookAdSetFields::AD_SET_ID);
    }

    public function getBidAmount()
    {
        return $this->safeGet($this->data, ManagedFacebookAdSetFields::BID_AMOUNT);
    }

    public function getBudget()
    {
        return $this->safeGet($this->objects, ManagedFacebookAdSetFields::BUDGET);
    }

    public function getOptimizationGoal()
    {
        return $this->safeGet($this->data, ManagedFacebookAdSetFields::OPTIMIZATION_GOAL);
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
        return $this->safeGet($this->data, ManagedFacebookAdSetFields::PLACEMENTS);
    }

    public function getType()
    {
        return $this->safeGet($this->data, ManagedFacebookAdSetFields::TYPE);
    }
}
