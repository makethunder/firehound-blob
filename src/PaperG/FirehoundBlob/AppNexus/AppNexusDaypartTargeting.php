<?php

namespace PaperG\FirehoundBlob\AppNexus;

use PaperG\FirehoundBlob\AppNexus\Fields\AppNexusDaypartTargetingFields;
use PaperG\FirehoundBlob\DataObject;

class AppNexusDaypartTargeting extends DataObject
{
    public function getStartHour()
    {
        return $this->safeGet($this->data, AppNexusDaypartTargetingFields::START_HOUR);
    }

    public function getEndHour()
    {
        return $this->safeGet($this->data, AppNexusDaypartTargetingFields::END_HOUR);
    }

    public function getTimezone()
    {
        return $this->safeGet($this->data, AppNexusDaypartTargetingFields::TIMEZONE);
    }
} 
