<?php

namespace PaperG\FirehoundBlob\Facebook\Validators;

use PaperG\FirehoundBlob\Facebook\ManagedFacebookBlob;

class ManagedFacebookBlobValidator extends UnmanagedFacebookBlobValidator
{
    /**
     * Only difference is type-hinting, but I did not want to break
     * compatibility.
     *
     * @param ManagedFacebookBlob $blob
     * @return \PaperG\FirehoundBlob\ScenarioValidators\ValidationResult
     */
    public function validateCreate(ManagedFacebookBlob $blob)
    {
        $this->path = self::RELATIVE_CREATE_PATH;
        return parent::validate($blob->toArray());
    }

    public function validateUpdate(ManagedFacebookBlob $blob)
    {
        $this->path = self::RELATIVE_UPDATE_PATH;
        return parent::validate($blob->toArray());
    }
}
