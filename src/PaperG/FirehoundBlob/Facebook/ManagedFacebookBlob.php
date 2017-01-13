<?php

namespace PaperG\FirehoundBlob\Facebook;

use PaperG\FirehoundBlob\CampaignData\CreativeBlob;
use PaperG\FirehoundBlob\DataObject;
use PaperG\FirehoundBlob\Facebook\AdSets\ManagedFacebookAdSet;
use PaperG\FirehoundBlob\Facebook\Fields\ManagedFacebookBlobFields;

/**
 * Class ManagedFacebookBlob
 *
 * The fields here are the same as UnmanagedFacebookBlob, but this object
 * works with the new DataObject type.  For backwards compatibility reasons, we are not updating
 * UnmanagedFacebookBlob to extend DataObject instead.  This is something that can be done at the next major version.
 *
 * @package PaperG\FirehoundBlob\Facebook
 */
class ManagedFacebookBlob extends DataObject
{
    public function __construct($array = [])
    {
        $this->objectKeys = [
            ManagedFacebookBlobFields::AD_SETS => ['PaperG\FirehoundBlob\Facebook\AdSets\ManagedFacebookAdSet'],
            ManagedFacebookBlobFields::CREATIVES => ['PaperG\FirehoundBlob\Facebook\FacebookCreative'],
            ManagedFacebookBlobFields::AUDIENCE_TARGETING => 'PaperG\FirehoundBlob\AppNexus\AppNexusDaypartTargeting',
            ManagedFacebookBlobFields::GEOGRAPHIC_TARGETING => 'PaperG\FirehoundBlob\CampaignData\CampaignGeoTargetingData',
            ManagedFacebookBlobFields::DEMOGRAPHIC_TARGETING => 'PaperG\FirehoundBlob\AppNexus\AppNexusPublisherCustomization'
        ];
        $this->fromArray($array);
    }

    public function getAccessToken()
    {
        return $this->safeGet($this->data, ManagedFacebookBlobFields::ACCESS_TOKEN);
    }

    public function getAdAccountId()
    {
        return $this->safeGet($this->data, ManagedFacebookBlobFields::AD_ACCOUNT_ID);
    }

    /**
     * @return ManagedFacebookAdSet[]
     */
    public function getAdSets()
    {
        return $this->safeGet($this->objects, ManagedFacebookBlobFields::AD_SETS);
    }

    public function getCampaignObjective()
    {
        return $this->safeGet($this->data, ManagedFacebookBlobFields::CAMPAIGN_OBJECTIVE);
    }

    /**
     * @return CreativeBlob[]
     */
    public function getCreatives()
    {
        return $this->safeGet($this->objects, ManagedFacebookBlobFields::CREATIVES);
    }

    public function getEndDate()
    {
        return $this->safeGet($this->data, ManagedFacebookBlobFields::END_DATE);
    }

    public function getInstagramActorId()
    {
        return $this->safeGet($this->data, ManagedFacebookBlobFields::IG_ACTOR_ID);
    }

    public function getPageId()
    {
        return $this->safeGet($this->data, ManagedFacebookBlobFields::PAGE_ID);
    }

    public function getPublicationName()
    {
        return $this->safeGet($this->data, ManagedFacebookBlobFields::PUBLICATION_NAME);
    }

    public function getStartDate()
    {
        return $this->safeGet($this->data, ManagedFacebookBlobFields::START_DATE);
    }

    public function getStatus()
    {
        return $this->safeGet($this->data, ManagedFacebookBlobFields::STATUS);
    }

    public function getAudienceTargeting()
    {
        return $this->safeGet($this->objects, ManagedFacebookBlobFields::AUDIENCE_TARGETING);
    }

    public function getDemographicTargeting()
    {
        return $this->safeGet($this->objects, ManagedFacebookBlobFields::DEMOGRAPHIC_TARGETING);
    }

    public function getGeographicTargeting()
    {
        return $this->safeGet($this->objects, ManagedFacebookBlobFields::GEOGRAPHIC_TARGETING);
    }
}
