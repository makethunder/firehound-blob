<?php

namespace PaperG\FirehoundBlob\AppNexus;

use PaperG\FirehoundBlob\AppNexus\Fields\AppNexusSegmentSettingFields;
use PaperG\FirehoundBlob\DataObject;

class AppNexusSegmentSetting extends DataObject
{
    public function getSegmentsToAdd()
    {
        return $this->safeGet($this->data, AppNexusSegmentSettingFields::ADD);
    }

    public function getSegmentsToRemove()
    {
        return $this->safeGet($this->data, AppNexusSegmentSettingFields::REMOVE);
    }
}
