<?php

namespace PaperG\FirehoundBlob\Facebook\Targeting;


use PaperG\FirehoundBlob\Utility;

class FacebookAudienceTargeting
{
    use Utility;

    const TYPE = 'type';
    const IDS = 'ids';

    private $type;
    private $ids;

    public function __construct($array = null)
    {
        $this->fromArray($array);
    }

    /**
     * @param mixed $ids
     */
    public function setIds($ids)
    {
        $this->ids = $ids;
    }

    /**
     * @return mixed
     */
    public function getIds()
    {
        return $this->ids;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            self::TYPE => $this->type,
            self::IDS => $this->ids
        ];
    }

    /**
     * @param $array array
     */
    public function fromArray($array)
    {
        $this->type = $this->safeGet($array, self::TYPE);
        $this->ids = $this->safeGet($array, self::IDS);
    }
} 
