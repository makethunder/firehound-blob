<?php

namespace PaperG\FirehoundBlob\AppNexus\Validators;

use PaperG\FirehoundBlob\AppNexus\AppNexusBlob;
use PaperG\FirehoundBlob\JsonValidator;
use PaperG\FirehoundBlob\ScenarioBlob;
use PaperG\FirehoundBlob\ScenarioValidators\ScenarioValidator;
use PaperG\FirehoundBlob\ScenarioValidators\ValidationResult;

class AppNexusBlobValidator extends JsonValidator implements ScenarioValidator
{
    const RELATIVE_PATH = '/../../Schema/AppNexus/appNexusBlob.json';

    protected function getSchemaPath()
    {
        return 'file://' . realpath(__DIR__ . self::RELATIVE_PATH);
    }

    /**
     * @param ScenarioBlob $blob
     * @return ValidationResult
     */
    public function isValidCreateBlob($blob)
    {
        /**
         * @var $anBlob AppNexusBlob
         */
        $anBlob = $blob->getBlob();
        return $this->validate($anBlob->toArray());
    }

    /**
     * @param ScenarioBlob $blob
     * @return ValidationResult
     */
    public function isValidUpdateBlob($blob)
    {
        /**
         * @var $anBlob AppNexusBlob
         */
        $anBlob = $blob->getBlob();
        return $this->validate($anBlob->toArray());
    }
} 
