<?php

namespace PaperG\FirehoundBlob\AppNexus;

use PaperG\FirehoundBlob\AppNexus\Fields\AppNexusPublisherCustomizationFields;
use PaperG\FirehoundBlob\DataObject;

class AppNexusPublisherCustomization extends DataObject
{
    public function getIndustryToQueryString()
    {
        return $this->safeGet($this->data, AppNexusPublisherCustomizationFields::INDUSTRY_TO_QUERY_STRING);
    }

    public function getIndustryIds()
    {
        return $this->safeGet($this->data, AppNexusPublisherCustomizationFields::INDUSTRY_IDS);
    }

    public function getAudienceGroupToInventoryGroup()
    {
        return $this->safeGet($this->data, AppNexusPublisherCustomizationFields::AUDIENCE_GROUP_TO_INVENTORY_GROUP);
    }

    public function getDirectExchangePubId()
    {
        return $this->safeGet($this->data, AppNexusPublisherCustomizationFields::DIRECT_EXCHANGE_PUB_ID);
    }
} 
