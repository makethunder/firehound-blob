<?php

namespace PaperG\FirehoundBlob\Facebook\Validators;

use PaperG\FirehoundBlob\Facebook\GeneralFacebookBlob;
use PaperG\FirehoundBlob\JsonValidator;

class GeneralFacebookBlobValidator extends JsonValidator
{
    const RELATIVE_PATH = '/../../Schema/Facebook/generalFacebookBlob.json';

    protected $path;

    protected function getSchemaPath()
    {
        if (empty($this->path)) {
            return 'file://' . realpath(__DIR__ . self::RELATIVE_PATH);
        }

        return 'file://' . realpath(__DIR__ . $this->path);
    }

    public function validateCreate(GeneralFacebookBlob $blob)
    {
        return parent::validate($blob->toArray());
    }

    public function validateUpdate(GeneralFacebookBlob $blob)
    {
        return parent::validate($blob->toArray());
    }
} 
