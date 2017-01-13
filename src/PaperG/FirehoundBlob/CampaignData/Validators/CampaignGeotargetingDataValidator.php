<?php

namespace PaperG\FirehoundBlob\CampaignData\Validators;

use PaperG\FirehoundBlob\JsonValidator;

class CampaignGeotargetingDataValidator extends JsonValidator
{
    const RELATIVE_PATH = '/../../Schema/CampaignData/campaignGeotargetingData.json';

    protected function getSchemaPath()
    {
        return 'file://' . realpath(__DIR__ . self::RELATIVE_PATH);
    }
} 
