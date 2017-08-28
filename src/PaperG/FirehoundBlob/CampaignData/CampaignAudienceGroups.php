<?php

namespace PaperG\FirehoundBlob\CampaignData;

class CampaignAudienceGroups
{
    const AUDIENCE_GROUPS = 'audienceGroups';

    private $audienceGroups;

    public function getAudienceGroups()
    {
        return $this->audienceGroups;
    }

    public function setAudienceGroups($value)
    {
        // punting on verifying audience groups data values match valid
        // audience groups; input example: "1, 2, 3"
        if (!is_null($value))
        {
            if (!is_array($value))
            {
                throw new \InvalidArgumentException(
                    'Audience groups data was not an array.');
            }
            if (array_filter($value, 'is_int') != $value)
            {
                throw new \InvalidArgumentException(
                    'Audience groups data contains non-int value.');
            }
        }

        $this->audienceGroups = $value;
    }

    public function __construct($audienceGroups = null)
    {
        $this->setAudienceGroups($audienceGroups);
    }

    /**
     * Generates an array representation of the object which will be
     * serialized to JSON as part of a Web API response.
     *
     * @return array
     */
    public function toAssociativeArray()
    {
        return [
            self::AUDIENCE_GROUPS => $this->audienceGroups
        ];
    }

    public function fromAssociativeArray($array)
    {
        $this->audienceGroups = isset($array[self::AUDIENCE_GROUPS]) ? $array[self::AUDIENCE_GROUPS] : null;
    }
}
