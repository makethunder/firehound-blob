<?php

namespace PaperG\FirehoundBlob\Facebook\Validators;

use PaperG\FirehoundBlob\Facebook\FacebookCreative;
use PaperG\FirehoundBlob\JsonValidator;

class FacebookCreativeValidator extends JsonValidator
{
    const RELATIVE_PATH = '/../../Schema/Facebook/facebookCreative.json';

    protected function getSchemaPath()
    {
        return 'file://' . realpath(__DIR__ . self::RELATIVE_PATH);
    }

    /**
     * @param FacebookCreative $creative
     * @return \PaperG\FirehoundBlob\ScenarioValidators\ValidationResult
     */
    public function validate($creative)
    {
        return parent::validate($creative->toArray());
    }
} 
