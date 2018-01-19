<?php

namespace PaperG\FirehoundBlob\Facebook;

use PaperG\FirehoundBlob\DataObject;
use PaperG\FirehoundBlob\Facebook\AdSets\GeneralFacebookAdSet;
use PaperG\FirehoundBlob\Facebook\Fields\GeneralFacebookBlobFields;
use PaperG\FirehoundBlob\Facebook\Targeting\FacebookAudienceTargeting;
use PaperG\FirehoundBlob\Facebook\Targeting\FacebookDemographicTargeting;
use PaperG\FirehoundBlob\Facebook\Targeting\FacebookGeographicTargeting;

class GeneralFacebookBlob extends DataObject
{
    public function __construct($array = [])
    {
        $this->objectKeys = [
            GeneralFacebookBlobFields::AD_SETS => ['PaperG\FirehoundBlob\Facebook\AdSets\GeneralFacebookAdSet'],
            GeneralFacebookBlobFields::AUDIENCE_TARGETING => 'PaperG\FirehoundBlob\Facebook\Targeting\FacebookAudienceTargeting',
            GeneralFacebookBlobFields::GEOGRAPHIC_TARGETING => 'PaperG\FirehoundBlob\Facebook\Targeting\FacebookGeographicTargeting',
            GeneralFacebookBlobFields::DEMOGRAPHIC_TARGETING => 'PaperG\FirehoundBlob\Facebook\Targeting\FacebookDemographicTargeting'
        ];
        $this->fromArray($array);
    }

    public function getAccessToken()
    {
        return $this->safeGet($this->data, GeneralFacebookBlobFields::ACCESS_TOKEN);
    }

    public function getAdAccountId()
    {
        return $this->safeGet($this->data, GeneralFacebookBlobFields::AD_ACCOUNT_ID);
    }

    /**
     * @return GeneralFacebookAdSet[]
     */
    public function getAdSets()
    {
        return $this->safeGet($this->objects, GeneralFacebookBlobFields::AD_SETS);
    }

    public function getCampaignObjective()
    {
        return $this->safeGet($this->data, GeneralFacebookBlobFields::CAMPAIGN_OBJECTIVE);
    }

    public function getEndDate()
    {
        return $this->safeGet($this->data, GeneralFacebookBlobFields::END_DATE);
    }

    public function getInstagramActorId()
    {
        return $this->safeGet($this->data, GeneralFacebookBlobFields::IG_ACTOR_ID);
    }

    public function getPageId()
    {
        return $this->safeGet($this->data, GeneralFacebookBlobFields::PAGE_ID);
    }

    public function getPublicationName()
    {
        return $this->safeGet($this->data, GeneralFacebookBlobFields::PUBLICATION_NAME);
    }

    public function getStartDate()
    {
        return $this->safeGet($this->data, GeneralFacebookBlobFields::START_DATE);
    }

    public function getStatus()
    {
        return $this->safeGet($this->data, GeneralFacebookBlobFields::STATUS);
    }

    /**
     * @return FacebookAudienceTargeting
     */
    public function getAudienceTargeting()
    {
        return $this->safeGet($this->objects, GeneralFacebookBlobFields::AUDIENCE_TARGETING);
    }

    /**
     * @return FacebookDemographicTargeting
     */
    public function getDemographicTargeting()
    {
        return $this->safeGet($this->objects, GeneralFacebookBlobFields::DEMOGRAPHIC_TARGETING);
    }

    /**
     * @return FacebookGeographicTargeting
     */
    public function getGeographicTargeting()
    {
        return $this->safeGet($this->objects, GeneralFacebookBlobFields::GEOGRAPHIC_TARGETING);
    }
} 
