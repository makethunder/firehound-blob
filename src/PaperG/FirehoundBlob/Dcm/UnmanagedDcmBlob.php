<?php

namespace PaperG\FirehoundBlob\Dcm;


use PaperG\FirehoundBlob\BlobInterface;
use PaperG\FirehoundBlob\Utility;

class UnmanagedDcmBlob implements BlobInterface
{
    use Utility;

    const PUBLICATION_ID = 'publicationId';
    const PLACELOCAL_CAMPAIGN_ID = 'placelocalCampaignId';
    const GOOGLE_ADVERTISER_ID = 'googleAdvertiserId';
    const CREATIVE_ASSETS = 'creativeAssets';
    const STATUS_CALLBACK_URL = 'callbackUrl';
    const STATUS_CALLBACK_HEADERS = 'callbackHeaders';

    /**
     * @var int
     */
    private $publicationId;

    /**
     * @var int
     */
    private $advertiserId;

    /**
     * @var int
     */
    private $placelocalCampaignId;

    /**
     * @var DcmCreativeAsset[]
     */
    private $creativeAssets;

    private $statusCallbackUrl;

    private $statusCallbackHeaders;

    public function __construct($array = [])
    {
        $this->fromArray($array);
    }

    public function toArray()
    {
        $assets =  [];
        foreach ($this->creativeAssets as $asset) {
            $assets[] = $asset->toArray();
        }

        return [
            self::PUBLICATION_ID => $this->publicationId,
            self::GOOGLE_ADVERTISER_ID => $this->advertiserId,
            self::CREATIVE_ASSETS => $assets,
            self::STATUS_CALLBACK_URL => $this->statusCallbackUrl,
            self::STATUS_CALLBACK_HEADERS => $this->statusCallbackHeaders,
            self::PLACELOCAL_CAMPAIGN_ID => $this->placelocalCampaignId
        ];
    }

    public function fromArray($array)
    {
        $this->placelocalCampaignId = $this->safeGet($array, self::PLACELOCAL_CAMPAIGN_ID);
        $this->publicationId = $this->safeGet($array, self::PUBLICATION_ID);
        $this->advertiserId = $this->safeGet($array, self::GOOGLE_ADVERTISER_ID);
        $assets = $this->safeGet($array, self::CREATIVE_ASSETS, []);
        $this->statusCallbackUrl = $this->safeGet($array, self::STATUS_CALLBACK_URL);
        $this->statusCallbackHeaders = $this->safeGet($array, self::STATUS_CALLBACK_HEADERS);

        $this->creativeAssets = [];
        foreach($assets as $assetArray) {
            $this->creativeAssets[] = new DcmCreativeAsset($assetArray);
        }
    }

    /**
     * @param int $placelocalCampaignId
     */
    public function setPlacelocalCampaignId($placelocalCampaignId)
    {
        $this->placelocalCampaignId = $placelocalCampaignId;
    }

    /**
     * @return int
     */
    public function getPlacelocalCampaignId()
    {
        return $this->placelocalCampaignId;
    }

    /**
     * @param int $advertiserId
     */
    public function setAdvertiserId($advertiserId)
    {
        $this->advertiserId = $advertiserId;
    }

    /**
     * @return int
     */
    public function getAdvertiserId()
    {
        return $this->advertiserId;
    }

    /**
     * @param DcmCreativeAsset[] $creativeAssets
     */
    public function setCreativeAssets($creativeAssets)
    {
        $this->creativeAssets = $creativeAssets;
    }

    /**
     * @return DcmCreativeAsset[]
     */
    public function getCreativeAssets()
    {
        return $this->creativeAssets;
    }

    /**
     * @param int $publicationId
     */
    public function setPublicationId($publicationId)
    {
        $this->publicationId = $publicationId;
    }

    /**
     * @return int
     */
    public function getPublicationId()
    {
        return $this->publicationId;
    }

    /**
     * @param mixed $callbackHeaders
     */
    public function setStatusCallbackHeaders($callbackHeaders)
    {
        $this->statusCallbackHeaders = $callbackHeaders;
    }

    /**
     * @return mixed
     */
    public function getStatusCallbackHeaders()
    {
        return $this->statusCallbackHeaders;
    }

    /**
     * @param mixed $callbackUrl
     */
    public function setStatusCallbackUrl($callbackUrl)
    {
        $this->statusCallbackUrl = $callbackUrl;
    }

    /**
     * @return mixed
     */
    public function getStatusCallbackUrl()
    {
        return $this->statusCallbackUrl;
    }
} 
