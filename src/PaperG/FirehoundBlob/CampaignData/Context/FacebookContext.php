<?php
namespace PaperG\FirehoundBlob\CampaignData\Context;


use PaperG\FirehoundBlob\Facebook\FacebookAdSet;
use PaperG\FirehoundBlob\Utility;

class FacebookContext
{
    use Utility;

    const AD_ACCOUNT_ID = "adAccountId";
    const AD_SETS = "adSets";
    const PAGE_ID = "pageId";
    const ACCESS_TOKEN = "accessToken";
    const IG_ACTOR_ID = "igActorId";
    const CAMPAIGN_OBJECTIVE = "campaignObjective";

    private $adAccountId = null;
    private $pageId = null;
    private $accessToken = null;
    private $igActorId = null;
    private $campaignObjective = null;

    /**
     * @var FacebookAdSet[]
     */
    private $adSets;

    public function setPageId($pageId)
    {
        $this->pageId = $pageId;
    }

    public function setAdAccountId($adAccountId)
    {
        $this->adAccountId = $adAccountId;
    }

    public function getAdAccountId()
    {
        return $this->adAccountId;
    }

    public function getPageId()
    {
        return $this->pageId;
    }

    public function getAccessToken()
    {
        return $this->accessToken;
    }

    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    public function getIgActorId()
    {
        return $this->igActorId;
    }

    public function setIgActorId($igActorId)
    {
        $this->igActorId = $igActorId;
    }

    /**
     * @param $adSets FacebookAdSet[]
     */
    public function setAdSets($adSets)
    {
        $this->adSets = $adSets;
    }

    public function getAdSets()
    {
        return $this->adSets;
    }

    public function setCampaignObjective($objective)
    {
        $this->campaignObjective = $objective;
    }

    public function getCampaignObjective()
    {
        return $this->campaignObjective;
    }

    public function toAssociativeArray()
    {
        $adSets = array();

        foreach ($this->adSets as $adSet) {
            $adSets[] = $adSet->toAssociativeArray();
        }

        return array(
            self::AD_ACCOUNT_ID => $this->adAccountId,
            self::AD_SETS => $adSets,
            self::PAGE_ID => $this->pageId,
            self::ACCESS_TOKEN => $this->accessToken,
            self::IG_ACTOR_ID => $this->igActorId,
            self::CAMPAIGN_OBJECTIVE => $this->campaignObjective
        );
    }

    public function fromAssociativeArray($array)
    {
        $this->adAccountId = $this->safeGet($array, self::AD_ACCOUNT_ID);
        $this->pageId = $this->safeGet($array, self::PAGE_ID);
        $this->accessToken = $this->safeGet($array, self::ACCESS_TOKEN);
        $this->igActorId = $this->safeGet($array, self::IG_ACTOR_ID);
        $this->campaignObjective = $this->safeGet($array, self::CAMPAIGN_OBJECTIVE);

        $adSets = array();
        if (isset($array[self::AD_SETS])) {
            foreach ($array[self::AD_SETS] as $adSetArray) {

                $adSet = new FacebookAdSet();
                $adSet->fromAssociativeArray($adSetArray);
                $adSets[] = $adSet;
            }
        }

        $this->adSets = $adSets;
    }
} 
