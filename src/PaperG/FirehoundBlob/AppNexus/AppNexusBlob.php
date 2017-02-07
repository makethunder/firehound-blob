<?php

namespace PaperG\FirehoundBlob\AppNexus;

use PaperG\FirehoundBlob\AppNexus\Fields\AppNexusBlobFields;
use PaperG\FirehoundBlob\CampaignData\Budget;
use PaperG\FirehoundBlob\CampaignData\CampaignGeoTargetingData;
use PaperG\FirehoundBlob\CampaignData\CreativeBlob;
use PaperG\FirehoundBlob\DataObject;
use PaperG\FirehoundBlob\Utility;

class AppNexusBlob extends DataObject
{
    use Utility;

    public function __construct($array = [])
    {
        $this->objectKeys = [
            AppNexusBlobFields::BID_SETTING => 'PaperG\FirehoundBlob\AppNexus\AppNexusBidSetting',
            AppNexusBlobFields::BUDGET => 'PaperG\FirehoundBlob\CampaignData\Budget',
            AppNexusBlobFields::CREATIVE => 'PaperG\FirehoundBlob\CampaignData\CreativeBlob',
            AppNexusBlobFields::DAYPART_TARGETING => 'PaperG\FirehoundBlob\AppNexus\AppNexusDaypartTargeting',
            AppNexusBlobFields::GEOGRAPHIC_TARGETING => 'PaperG\FirehoundBlob\CampaignData\CampaignGeoTargetingData',
            AppNexusBlobFields::PUBLISHER_CUSTOMIZATIONS => 'PaperG\FirehoundBlob\AppNexus\AppNexusPublisherCustomization',
            AppNexusBlobFields::AUDIENCE_SEGMENTS => 'PaperG\FirehoundBlob\AppNexus\AppNexusSegmentSetting',
            AppNexusBlobFields::NORMAL_SEGMENTS => 'PaperG\FirehoundBlob\AppNexus\AppNexusSegmentSetting'
        ];
        $this->fromArray($array);
    }

    public function shouldApplyAudienceBlacklist()
    {
        return $this->safeGet($this->data, AppNexusBlobFields::APPLY_AUDIENCE_BLACKLIST);
    }

    public function shouldApplyNormalBlacklist()
    {
        return $this->safeGet($this->data, AppNexusBlobFields::APPLY_NORMAL_BLACKLIST);
    }

    public function getAudienceGroupIds()
    {
        return $this->safeGet($this->data, AppNexusBlobFields::AUDIENCE_GROUP_IDS);
    }

    /**
     * @return AppNexusBidSetting
     */
    public function getBidSetting()
    {
        return $this->safeGet($this->objects, AppNexusBlobFields::BID_SETTING);
    }

    /**
     * @return Budget
     */
    public function getBudget()
    {
        return $this->safeGet($this->objects, AppNexusBlobFields::BUDGET);
    }

    public function getCampaignId()
    {
        return $this->safeGet($this->data, AppNexusBlobFields::CAMPAIGN_ID);
    }

    /**
     * @return CreativeBlob
     */
    public function getCreative()
    {
        return $this->safeGet($this->objects, AppNexusBlobFields::CREATIVE);
    }

    public function getCustomizationName()
    {
        return $this->safeGet($this->data, AppNexusBlobFields::CUSTOMIZATION_NAME);
    }

    /**
     * @return AppNexusDaypartTargeting
     */
    public function getDaypartTargeting()
    {
        return $this->safeGet($this->objects, AppNexusBlobFields::DAYPART_TARGETING);
    }

    public function getEndDate()
    {
        return $this->safeGet($this->data, AppNexusBlobFields::END_DATE);
    }

    /**
     * @return CampaignGeoTargetingData
     */
    public function getGeographicTargeting()
    {
        return $this->safeGet($this->objects, AppNexusBlobFields::GEOGRAPHIC_TARGETING);
    }

    public function getLanguages()
    {
        return $this->safeGet($this->data, AppNexusBlobFields::LANGUAGES);
    }

    public function getPublicationId()
    {
        return $this->safeGet($this->data, AppNexusBlobFields::PUBLICATION_ID);
    }

    public function getPublicationName()
    {
        return $this->safeGet($this->data, AppNexusBlobFields::PUBLICATION_NAME);
    }

    /**
     * @return AppNexusPublisherCustomization
     */
    public function getPublisherCustomizations()
    {
        return $this->safeGet($this->objects, AppNexusBlobFields::PUBLISHER_CUSTOMIZATIONS);
    }

    /**
     * @return AppNexusSegmentSetting
     */
    public function getAudienceSegments()
    {
        return $this->safeGet($this->objects, AppNexusBlobFields::AUDIENCE_SEGMENTS);
    }

    /**
     * @return AppNexusSegmentSetting
     */
    public function getNormalSegments()
    {
        return $this->safeGet($this->objects, AppNexusBlobFields::NORMAL_SEGMENTS);
    }

    public function getStartDate()
    {
        return $this->safeGet($this->data, AppNexusBlobFields::START_DATE);
    }

    public function getStatus()
    {
        return $this->safeGet($this->data, AppNexusBlobFields::STATUS);
    }

    /**
     * Mobile vs desktop
     *
     * @return string from AppNexusBlobType
     */
    public function getType()
    {
        return $this->safeGet($this->data, AppNexusBlobFields::TYPE);
    }

    public function getIndustryId()
    {
        return $this->safeGet($this->data, AppNexusBlobFields::INDUSTRY_ID);
    }
}
