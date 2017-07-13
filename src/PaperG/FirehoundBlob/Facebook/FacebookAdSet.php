<?php

namespace PaperG\FirehoundBlob\Facebook;

class FacebookAdSet
{
    const OPTIMIZATION_GOAL = "optimizationGoal";
    const LIFETIME_BUDGET = "lifetimeBudget";
    const BID_AMOUNT = "bidAmount";
    const PLACEMENTS = "placements";
    const AD_SET_ID = "adSetId";
    const TYPE = "type";
    const IS_AUTO_BID = "isAutoBid";

    /**
     * @var int|null the ad set id if known
     */
    protected $adSetId = null;

    /**
     * @var string from FacebookAds/Object/Values/AdObjectives
     */
    protected $optimizationGoal;

    /**
     * @var int amount to bid in cents
     */
    protected $bidAmount;

    /**
     * @var []
     */
    protected $placements;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var bool
     */
    protected $isAutoBid;

    /**
     * @param int $bidAmount
     */
    public function setBidAmount($bidAmount)
    {
        $this->bidAmount = $bidAmount;
    }

    /**
     * @return int
     */
    public function getBidAmount()
    {
        return $this->bidAmount;
    }

    /**
     * @param string $optimizationGoal from FacebookAds/Object/Values/OptimizationGoals
     */
    public function setOptimizationGoal($optimizationGoal)
    {
        $this->optimizationGoal = $optimizationGoal;
    }

    /**
     * @return string
     */
    public function getOptimizationGoal()
    {
        return $this->optimizationGoal;
    }

    /**
     * @param string[] $placements Array of strings that should be from FacebookAds/Object/Values/PageTypes
     */
    public function setPlacements($placements)
    {
        $this->placements = $placements;
    }

    /**
     * @return string[]
     */
    public function getPlacements()
    {
        return $this->placements;
    }

    public function setAdSetId($adSetId)
    {
        $this->adSetId = $adSetId;
    }

    public function getAdSetId()
    {
        return $this->adSetId;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setAutoBid($isAuto)
    {
        $this->isAutoBid = $isAuto;
    }

    public function isAutoBid()
    {
        return $this->isAutoBid;
    }

    public function toArray()
    {
        return $this->toAssociativeArray();
    }

    public function toAssociativeArray()
    {
        return array(
            self::OPTIMIZATION_GOAL => $this->optimizationGoal,
            self::BID_AMOUNT => $this->bidAmount,
            self::PLACEMENTS => $this->placements,
            self::AD_SET_ID => $this->adSetId,
            self::TYPE => $this->type,
            self::IS_AUTO_BID => $this->isAutoBid
        );
    }

    public function fromAssociativeArray($array)
    {
        $this->optimizationGoal = isset($array[self::OPTIMIZATION_GOAL]) 
            ? $array[self::OPTIMIZATION_GOAL] : null;
        $this->bidAmount = isset($array[self::BID_AMOUNT]) ? $array[self::BID_AMOUNT] : null;
        $this->placements = isset($array[self::PLACEMENTS]) ? $array[self::PLACEMENTS] : null;
        $this->adSetId = isset($array[self::AD_SET_ID]) ? $array[self::AD_SET_ID] : null;
        $this->type = isset($array[self::TYPE]) ? $array[self::TYPE] : null;
        $this->isAutoBid = isset($array[self::IS_AUTO_BID]) || array_key_exists(
                self::IS_AUTO_BID, $array
        ) ? $array[self::IS_AUTO_BID] : null;
    }

    /**
     * @param null|[] $validPlacements Typically the returned value from FacebookSDK
     * PageTypes::getInstance()->getValues()
     * @param null|[] $validOptimizationGoals Typically the returned value from FacebookSDK
     * OptimizationGoals::getInstance()->getValues()
     * @return bool
     */
    public function validate($validPlacements = null, $validOptimizationGoals = null)
    {
        $valid = $this->validatePlacements($validPlacements);
        $valid = $valid && $this->validateGoal($validOptimizationGoals);

        return $valid;
    }

    private function validatePlacements($validPlacements)
    {
        if (empty($validPlacements)) {
            return true;
        }

        $valid = !empty($this->placements);
        $valid = $valid && is_array($this->placements);
        if ($valid) {
            foreach ($this->placements as $placement) {
                $valid = $valid && in_array($placement, $validPlacements);
            }
        }

        return $valid;
    }

    private function validateGoal($validOptimizationGoals)
    {
        if (empty($validOptimizationGoals)) {
            return true;
        }

        return in_array($this->optimizationGoal, $validOptimizationGoals);
    }
} 
