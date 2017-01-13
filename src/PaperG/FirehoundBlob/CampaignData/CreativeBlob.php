<?php

namespace PaperG\FirehoundBlob\CampaignData;

use PaperG\FirehoundBlob\CampaignData\Fields\CreativeBlobFields;
use PaperG\FirehoundBlob\DataObject;

class CreativeBlob extends DataObject
{
    public function getAdTagJavascriptSecure()
    {
        return $this->safeGet($this->data, CreativeBlobFields::ADTAG_JAVASCRIPT_SECURE);
    }

    public function getAdTagJavascriptInsecure()
    {
        return $this->safeGet($this->data, CreativeBlobFields::ADTAG_JAVASCRIPT_INSECURE);
    }

    public function getAdTagIframeSecure()
    {
        return $this->safeGet($this->data, CreativeBlobFields::ADTAG_IFRAME_SECURE);
    }

    public function getAdTagIframeInsecure()
    {
        return $this->safeGet($this->data, CreativeBlobFields::ADTAG_IFRAME_INSECURE);
    }

    public function getMediaUrl()
    {
        return $this->safeGet($this->data, CreativeBlobFields::MEDIA_URL);
    }

    public function getCallToAction()
    {
        return $this->safeGet($this->data, CreativeBlobFields::CALL_TO_ACTION);
    }

    public function getMessage()
    {
        return $this->safeGet($this->data, CreativeBlobFields::MESSAGE);
    }

    public function getCaption()
    {
        return $this->safeGet($this->data, CreativeBlobFields::CAPTION);
    }

    public function getLandingPage()
    {
        return $this->safeGet($this->data, CreativeBlobFields::LANDING_PAGE);
    }

    public function getVersion()
    {
        return $this->safeGet($this->data, CreativeBlobFields::VERSION);
    }

    public function getName()
    {
        return $this->safeGet($this->data, CreativeBlobFields::NAME);
    }

    public function getDescription()
    {
        return $this->safeGet($this->data, CreativeBlobFields::DESCRIPTION);
    }

    public function getVariationId()
    {
        return $this->safeGet($this->data, CreativeBlobFields::VARIATION_ID);
    }
} 
