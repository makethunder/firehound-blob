<?php

namespace PaperG\FirehoundBlob\AppNexus;

use PaperG\FirehoundBlob\AppNexus\Fields\AppNexusBidSettingFields;
use PaperG\FirehoundBlob\DataObject;
use PaperG\FirehoundBlob\Utility;

class AppNexusBidSetting extends DataObject
{
    use Utility;

    /**
     * @return string - generally should be 'predicted' or 'margin'
     */
    public function getBidType()
    {
        return $this->safeGet($this->data, AppNexusBidSettingFields::BID_TYPE);
    }

    public function getCpcGoal()
    {
        return $this->safeGet($this->data, AppNexusBidSettingFields::CPC_GOAL);
    }

    public function getBaseBid()
    {
        return $this->safeGet($this->data, AppNexusBidSettingFields::BASE_BID);
    }

    public function getBidMultiplier()
    {
        return $this->safeGet($this->data, AppNexusBidSettingFields::BID_MULTIPLIER);
    }

    /**
     * @return string - generally something like 'venue_avg_rpm_bid'
     */
    public function getLearnOverrideType()
    {
        return $this->safeGet($this->data, AppNexusBidSettingFields::LEARN_OVERRIDE_TYPE);
    }

    /**
     * @return int - defaults to 5000
     */
    public function getLearnOverrideImpressionLimit()
    {
        return $this->safeGet($this->data, AppNexusBidSettingFields::LEARN_OVERRIDE_IMPRESSION_LIMIT);
    }

    /**
     * @return float
     */
    public function getCpmMin()
    {
        return $this->safeGet($this->data, AppNexusBidSettingFields::CPM_MIN);
    }

    /**
     * @return float
     */
    public function getCpmMax()
    {
        return $this->safeGet($this->data, AppNexusBidSettingFields::CPM_MAX);
    }

    /**
     * Is this even used?  I can't find anywhere that we actually set "base_cpm_bid_value"
     *
     * @return null
     */
    public function getBaseCpmBidValue()
    {
        return $this->safeGet($this->data, AppNexusBidSettingFields::BASE_CPM_BID_VALUE);
    }

    /**
     * @return bool - Believe this is unused as well
     */
    public function isCadenceModifierEnabled()
    {
        return $this->safeGet($this->data, AppNexusBidSettingFields::CADENCE_MODIFIER_ENABLED, false);
    }

    /**
     * @return null Not convinced this is used either
     */
    public function getCadenceType()
    {
        return $this->safeGet($this->data, AppNexusBidSettingFields::CADENCE_TYPE);
    }
}
