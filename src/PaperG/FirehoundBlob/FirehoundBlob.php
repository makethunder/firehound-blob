<?php

namespace PaperG\Common;

use PaperG\Common\CampaignData\Budget;
use PaperG\Common\CampaignData\Creative;
use PaperG\Common\CampaignData\ExchangeTargeting;
use PaperG\Common\CampaignData\PlatformTargeting;
use PaperG\Common\CampaignData\Targeting;
use PaperG\Common\CampaignData\Context;

class FirehoundBlob
{
    /* @var string $name A human readable name */
    protected $name              = null;

    /* @var string $identifier Used to identify a campaign uniquely across all services */
    protected $identifier        = null;

    /* @var int $startDate An int representing the timestamp of a \DateTime */
    protected $startDate         = null;

    /* @var int $endDate An int representing the timestamp of a \DateTime */
    protected $endDate           = null;

    /* @var Budget[] $budget An array of an "budget" (int) and "type" (string) that is either impression or dollar, together form a budget
     * eg. [
     *       {"budget" => 100
     *       "type" => "dollar"}
     *     ]
     * This example shows a $100 budget
     */
    protected $budgets            = null;

    /* @var Targeting $targeting An array of various types of targeting from demographics to geographic
     * eg.
     * [
     *   "geographic" => [
     *      "zip" => [12345,12346,123457]
     *      "region" => [1,2]
     *      "country" => [123]
     *   ],
     *   "demographic" => [1,2,3],
     *   "group" => [22,89]
     * ]
     *
     * This example shows some geographic targeting that has specific zip list, region list and country list.
     * It has a demographic targeting for some age and gender groups.
     * It has group targeting for some defined groups that map to different kinds of groups on various exchanges.
     */
    protected $targeting         = null;

    /* @var Context $context An array of custom values that can be used for exchange specific actions or customizations */
    protected $context           = null;

    /* @var PlatformTargeting $platformTargeting An array of various platforms to target
     * eg.
     * [
     *   "mobile" => true,
     *   "desktop" => true
     * ]
     */
    protected $platformTargeting = null;

    /* @var ExchangeTargeting $exchangeTargeting An array of various exchanges to target
     * eg.
     * [
     *   "AppNexus" => true,
     *   "Facebook" => true
     * ]
     */
    protected $exchangeTargeting = null;

    /* @var Creative $creative The creative info to publish */
    protected $creative = null;

    const CURRENT_VERSION       = 1;

    //these values are used for serializing the blob
    const NAME                  = "name";
    const IDENTIFIER            = "identifier";
    const START_DATE            = "start_date";
    const END_DATE              = "end_date";
    const BUDGETS               = "budgets";
    const TARGETING             = "targeting";
    const CONTEXT               = "context";
    const PLATFORM_TARGETING    = "platform_targeting";
    const EXCHANGE_TARGETING    = "exchange_targeting";
    const CREATIVE              = "creative";
    const VERSION               = "version";

    /**
     * @param String $name
     * @param String $identifier
     * @param int $startDate TimeStamp of date
     * @param int$endDate TimeStamp of date
     * @param Budget[] $budgets
     * @param Targeting $targeting
     * @param PlatformTargeting $platformTargeting
     * @param ExchangeTargeting $exchangeTargeting
     * @param Creative $creative
     * @param null|Context $context
     */
    public function __construct(
        $name,
        $identifier,
        $startDate,
        $endDate,
        $budgets,
        $targeting,
        $platformTargeting,
        $exchangeTargeting,
        $creative,
        $context = null
    )
    {
        $this->name = $name;
        $this->identifier = $identifier;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->budgets = $budgets;
        $this->targeting = $targeting;
        $this->platformTargeting = $platformTargeting;
        $this->exchangeTargeting = $exchangeTargeting;
        $this->creative = $creative;

        //may not necessarily have any context
        $this->context = is_null($context) ? new Context() : $context;
    }

    public function toAssociativeArray()
    {
        $budgets = array();
        if (!is_null($this->budgets)) {

            foreach($this->budgets as $key => $budget)
            {
                $budgets[$key] = $budget->toAssociativeArray();
            }
        }
        $array = array(
            self::NAME               => isset($this->name) ? $this->name : null,
            self::IDENTIFIER         => isset($this->identifier) ? $this->identifier : null,
            self::START_DATE         => isset($this->startDate) ? $this->startDate : null,
            self::END_DATE           => isset($this->endDate) ? $this->endDate : null,
            self::BUDGETS            => isset($this->budgets) ? $budgets : null,
            self::TARGETING          => isset($this->targeting) ? $this->targeting->toAssociativeArray() : null,
            self::CONTEXT            => isset($this->context) ? $this->context->toAssociativeArray() : null,
            self::PLATFORM_TARGETING => isset($this->platformTargeting) ? $this->platformTargeting->toAssociativeArray() : null,
            self::EXCHANGE_TARGETING => isset($this->exchangeTargeting) ? $this->exchangeTargeting->toAssociativeArray() : null,
            self::CREATIVE           => isset($this->creative) ? $this->creative->toAssociativeArray() : null,
            self::VERSION            => self::CURRENT_VERSION,
        );

        return $array;
    }

    public static function fromAssociativeArray($firehoundBlobArray)
    {
        $name               = isset($firehoundBlobArray[self::NAME]) ? $firehoundBlobArray[self::NAME] : null;
        $identifier         = isset($firehoundBlobArray[self::IDENTIFIER]) ? $firehoundBlobArray[self::IDENTIFIER] : null;
        $startDate          = isset($firehoundBlobArray[self::START_DATE]) ? $firehoundBlobArray[self::START_DATE] : null;
        $endDate            = isset($firehoundBlobArray[self::END_DATE]) ? $firehoundBlobArray[self::END_DATE] : null;
        $budgets = null;
        if (isset($firehoundBlobArray[self::BUDGETS]) && is_array($firehoundBlobArray[self::BUDGETS]))
        {
            $budgets = array();
            foreach($firehoundBlobArray[self::BUDGETS] as $key => $budgetArray) {
                $budgets[$key] = Budget::fromAssociativeArray($budgetArray);
            }
        }
        $budget             = is_array($budgets) ? $budgets : null;
        $targeting          = isset($firehoundBlobArray[self::TARGETING]) ? Targeting::fromAssociativeArray($firehoundBlobArray[self::TARGETING]) : null;
        $platformTargeting  = isset($firehoundBlobArray[self::PLATFORM_TARGETING]) ? PlatformTargeting::fromAssociativeArray($firehoundBlobArray[self::PLATFORM_TARGETING]) : null;
        $exchangeTargeting  = isset($firehoundBlobArray[self::EXCHANGE_TARGETING]) ? ExchangeTargeting::fromAssociativeArray($firehoundBlobArray[self::EXCHANGE_TARGETING]) : null;
        $creative           = isset($firehoundBlobArray[self::CREATIVE]) ? Creative::fromAssociativeArray($firehoundBlobArray[self::CREATIVE]) : null;
        $context            = isset($firehoundBlobArray[self::CONTEXT]) ? Context::fromAssociativeArray($firehoundBlobArray[self::CONTEXT]) : null;

        $firehoundBlob = new FirehoundBlob(
            $name,
            $identifier,
            $startDate,
            $endDate,
            $budget,
            $targeting,
            $platformTargeting,
            $exchangeTargeting,
            $creative,
            $context
        );

        return $firehoundBlob;
    }

    public function isValid($checkValidForCreation, &$outErrorMessage)
    {
        if (empty($this->identifier))
        {
            $outErrorMessage = "Identifier is missing";
            return false;
        }

        if (is_null($this->platformTargeting) || !$this->platformTargeting->isValid())
        {
            $outErrorMessage = "Platform targeting is not completed or is invalid";
            return false;
        }

        if (is_null($this->exchangeTargeting) || !$this->exchangeTargeting->isValid())
        {
            $outErrorMessage = "Exchange targeting is not completed or is invalid";
            return false;
        }


        if (true === $checkValidForCreation)
        {
            //for creation we need more values filled out
            $validBudget = $this->validateBudget();

            if (!$validBudget)
            {
                $outErrorMessage = "Budget is not completed or is invalid: " . print_r($this->budgets, true);
                return false;
            }

            if (is_null($this->targeting) || !$this->targeting->isValid())
            {
                $outErrorMessage = "Targeting is not completed or is invalid";
                return false;
            }

            if (is_null($this->creative) || !$this->creative->isValid())
            {
                $outErrorMessage = "Creative is not completed or is invalid";
                return false;
            }
        }
        else
        {
            //in a partial update, nulls are allowed
            if (!is_null($this->budgets))
            {
                $validBudget = $this->validateBudget();

                if (!$validBudget)
                {
                    $outErrorMessage = "Budget is invalid";
                    return false;
                }
            }

            if (!is_null($this->targeting) && !$this->targeting->isValid())
            {
                $outErrorMessage = "Targeting is invalid";
                return false;
            }

            if (!is_null($this->creative) && !$this->creative->isValid())
            {
                $outErrorMessage = "Creative is invalid";
                return false;
            }
        }

        return true;
    }

    /**
     * @param \PaperG\Common\CampaignData\Budget $budget
     */
    public function setBudget(Budget $budget)
    {
        $this->budgets[Budget::DEFAULT_KEY] = $budget;
    }

    /**
     * @return \PaperG\Common\CampaignData\Budget
     */
    public function getBudget()
    {
        return $this->budgets[Budget::DEFAULT_KEY];
    }

    /**
     * @param $key
     * @param Budget $budget
     */
    public function setBudgetByKey($key, Budget $budget)
    {
        $this->budgets[$key] = $budget;
    }

    /**
     * @param $key
     * @return null|Budget
     */
    public function getBudgetByKey($key)
    {
        if (isset($this->budgets[$key]))
        {
            return $this->budgets[$key];
        }

        return null;
    }

    /**
     * @param Context $context
     */
    public function setContext($context)
    {
        $this->context = $context;
    }

    /**
     * @return Context
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * A convenience function to avoid lengthy if statements when getting a context value which may or may not exist
     *
     * @param String $key A known key name for a value inside context
     * @return null|String
     */
    public function getContextByKey($key)
    {
        return $this->context->getValueByKey($key);
    }

    /**
     * A convenience function to set specific context values for the blob
     *
     * @param $key
     * @param $value
     */
    public function setContextByKey($key, $value)
    {
        $this->context->setValueByKey($key, $value);
    }

    /**
     * @param \PaperG\Common\CampaignData\Creative $creative
     */
    public function setCreative($creative)
    {
        $this->creative = $creative;
    }

    /**
     * @return \PaperG\Common\CampaignData\Creative
     */
    public function getCreative()
    {
        return $this->creative;
    }

    /**
     * @param int $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return int
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param \PaperG\Common\CampaignData\ExchangeTargeting $exchangeTargeting
     */
    public function setExchangeTargeting($exchangeTargeting)
    {
        $this->exchangeTargeting = $exchangeTargeting;
    }

    /**
     * @return \PaperG\Common\CampaignData\ExchangeTargeting
     */
    public function getExchangeTargeting()
    {
        return $this->exchangeTargeting;
    }

    /**
     * @param string $identifier
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param \PaperG\Common\CampaignData\PlatformTargeting $platformTargeting
     */
    public function setPlatformTargeting($platformTargeting)
    {
        $this->platformTargeting = $platformTargeting;
    }

    /**
     * @return \PaperG\Common\CampaignData\PlatformTargeting
     */
    public function getPlatformTargeting()
    {
        return $this->platformTargeting;
    }

    /**
     * @param int $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return int
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param \PaperG\Common\CampaignData\Targeting|null $targeting
     */
    public function setTargeting($targeting)
    {
        $this->targeting = $targeting;
    }

    /**
     * @return \PaperG\Common\CampaignData\Targeting
     */
    public function getTargeting()
    {
        return $this->targeting;
    }

    /**
     * validateBudget treats null as invalid, but array() as valid
     *
     * @return bool
     */
    private function validateBudget()
    {
        $validBudget = false;
        if (is_array($this->budgets)) // null is generally an invalid budget
        {
            $validBudget = true;
            foreach($this->budgets as $budget)
            {
                if (!$budget->isValid())
                {
                    $validBudget = false;
                    break;
                }
            }
        }

        return $validBudget;
    }
}
