<?php

namespace PaperG\FirehoundBlob\AppNexus;

class ExchangeCampaign
{
    const BID_TYPE = 'bid_type';
    const CPC_GOAL = 'cpc_goal';
    const CPM_BASE = 'cpm_base';
    const CPM_MIN = 'cpm_min';
    const CPM_MAX = 'cpm_max';
    const PIXELS = 'pixels';
    const POSTAL_RANGE = 'postal_range';
    const NORMAL_WHITELIST = 'has_normal_whitelist';
    const AUD_WHITELIST = 'has_audience_whitelist';
    const NORMAL_BLACKLIST = 'has_normal_blacklist';
    const AUD_BLACKLIST = 'has_audience_blacklist';
    const NORMAL_DOMAIN_BLACKLIST = 'has_normal_domain_blacklist';
    const AUD_DOMAIN_BLACKLIST = 'has_audience_domain_blacklist';
    const IMPRESSION_LIMIT = 'impression_limit';
    const BID_MULTIPLIER = 'bid_multiplier';
    const BID_MULTIPLIER_BY_TYPE = 'bid_multiplier_by_type';
    const INDUSTRY_ID_ARRAY = "industry_id_array";
    const CENTER_POSTAL_CODE = 'center_postal_code';
    const LEARN_OVERRIDE_TYPE = 'learn_override_type';
    const CUSTOMIZATION_NAME = 'customization_name';
    const PUB_CUSTOMIZATION_ARRAY = 'publisher_customization_array';
    const DAYPART_TARGETING = 'daypart_targets';
    const DAYPART_TIMEZONE = 'daypart_timezone';
    const AUD_SEGMENTS_TO_ADD = 'audience_segments_to_add';
    const AUD_SEGMENTS_TO_REMOVE = 'audience_segments_to_remove';
    const NORMAL_SEGMENTS_TO_ADD = 'normal_segments_to_add';
    const NORMAL_SEGMENTS_TO_REMOVE = 'normal_segments_to_remove';
    const CADENCE_MODIFIER_ENABLED = 'cadence_modifier_enabled';
    const CADENCE_TYPE = 'cadence_type';
    const LIFETIME_IMPRESSION_BUDGET = 'lifetime_impression_budget';
    const ENABLE_LIFETIME_PACING = 'enable_lifetime_pacing';
    const DAILY_IMPRESSION_BUDGET = 'daily_impression_budget';
    const BASE_CPM_BID_VALUE = 'base_cpm_bid_value';
    const MOBILE_DAILY_IMPRESSION_BUDGET = 'mobile_daily_impression_budget';
    const MOBILE_ENABLE_LIFETIME_PACING = 'mobile_enable_lifetime_pacing';
    const MOBILE_LIFETIME_IMP_BUDGET = 'mobile_lifetime_imp_budget';
    const MOBILE_CPM_BASE = 'mobile_cpm_base';
    const MOBILE_CPM_MIN = 'mobile_cpm_min';
    const MOBILE_CPM_MAX = 'mobile_cpm_max';
    const CREATIVE_DISTRIBUTION_TYPE = 'creative_distribution_type';
    const TRUST = 'trust';

    protected $bidType;
    protected $cpcGoal;
    protected $cpmBase;
    protected $cpmMin;
    protected $cpmMax;
    protected $hasNormalWhitelist = null;
    protected $hasAudienceWhitelist = null;
    protected $hasNormalBlacklist = null;
    protected $hasAudienceBlacklist = null;
    protected $hasNormalDomainBlacklist = null;
    protected $hasAudienceDomainBlacklist = null;
    protected $pixels = null;
    protected $postalRange = null;
    protected $centerPostalCode = null;
    protected $daypartTimezone = null;
    protected $daypartTargets = null;
    protected $audienceGroupSegmentTargetsToAdd = null;
    protected $audienceGroupSegmentTargetsToRemove = null;
    protected $normalSegmentTargetsToAdd = null;
    protected $normalSegmentTargetsToRemove = null;
    protected $contentCategories = null;
    protected $learnBudgetPercent = null;
    protected $dailyImpressionBudget = null;
    protected $enableLifetimePacing = null;
    protected $lifetimeImpressionBudget = null;
    protected $learnOverrideType = null;
    protected $bidMultiplier = null;
    protected $bidMargin = null;
    protected $impressionLimit = null;
    protected $cadenceType = null;
    protected $cadenceModifierEnabled = null;
    protected $bidMultiplierByType = null;
    protected $baseCpmBidValue = null;
    protected $lineItemId = null;
    protected $campaignToUpdate = null;
    protected $campaignStatus = null;
    protected $lineItemStatus = null;
    protected $startAt = null;
    protected $endAt = null;
    protected $publisherCustomizationArray = array();
    protected $customizationName = null;
    protected $industryIdArray = array();
    protected $mobileEnableLifetimePacing = null;
    protected $mobileDailyImpressionBudget = null;
    protected $mobileLifetimeImpressionBudget = null;
    protected $creativeDistributionType = null;
    protected $mobileCpmBase = null;
    protected $mobileCpmMin = null;
    protected $mobileCpmMax = null;

    public function getIndustryIds()
    {
        return $this->industryIdArray;
    }

    public function setIndustryIds(array $industryIds)
    {
        $this->industryIdArray = $industryIds;
    }

    public function getBidType()
    {
        return $this->bidType;
    }

    public function setBidType($bidType)
    {
        $this->bidType = $bidType;
    }

    public function getCpcGoal()
    {
        return $this->cpcGoal;
    }

    public function setCpcGoal($cpcGoal)
    {
        $this->cpcGoal = $cpcGoal;
    }

    public function getBaseBid()
    {
        return $this->cpmBase;
    }

    public function setBaseBid($cpmBase)
    {
        $this->cpmBase = $cpmBase;
    }

    public function getCpmMin()
    {
        return $this->cpmMin;
    }

    public function setCpmMin($cpmMin)
    {
        $this->cpmMin = $cpmMin;
    }

    public function getCpmMax()
    {
        return $this->cpmMax;
    }

    public function setCpmMax($cpmMax)
    {
        $this->cpmMax = $cpmMax;
    }

    public function getHasAudienceBlacklist()
    {
        return $this->hasAudienceBlacklist;
    }

    public function setHasAudienceBlacklist($value)
    {
        $this->hasAudienceBlacklist = $value;
    }

    public function getHasNormalBlacklist()
    {
        return $this->hasNormalBlacklist;
    }

    public function setHasNormalBlacklist($value)
    {
        $this->hasNormalBlacklist = $value;
    }

    /**
     * @return bool|null
     */
    public function getHasDomainBlacklistForAudience()
    {
        return $this->hasAudienceDomainBlacklist;
    }

    /**
     * @param bool|null $value
     */
    public function setHasDomainBlacklistForAudience($value)
    {
        $this->hasAudienceDomainBlacklist = $value;
    }

    /**
     * @return bool|null
     */
    public function getHasDomainBlacklistForNormal()
    {
        return $this->hasNormalDomainBlacklist;
    }

    /**
     * @param bool|null $value
     */
    public function setHasDomainBlacklistForNormal($value)
    {
        $this->hasNormalDomainBlacklist = $value;
    }

    public function getHasAudienceWhitelist()
    {
        return $this->hasAudienceWhitelist;
    }

    public function setHasAudienceWhitelist($value)
    {
        $this->hasAudienceWhitelist = $value;
    }

    public function getHasNormalWhitelist()
    {
        return $this->hasNormalWhitelist;
    }

    public function setHasNormalWhitelist($value)
    {
        $this->hasNormalWhitelist = $value;
    }

    public function getPixels()
    {
        return $this->pixels;
    }

    public function setPixels($value)
    {
        $this->pixels = $value;
    }

    public function getPostalRange()
    {
        return $this->postalRange;
    }

    public function setPostalRange($value)
    {
        $this->postalRange = $value;
    }

    public function getCenterPostalCode()
    {
        return $this->centerPostalCode;
    }

    public function setCenterPostalCode($value)
    {
        $this->centerPostalCode = $value;
    }

    public function getDaypartTargets()
    {
        return $this->daypartTargets;
    }

    public function setDaypartTargets($value)
    {
        $this->daypartTargets = $value;
    }

    public function getDaypartTimezone()
    {
        return $this->daypartTimezone;
    }

    public function setDaypartTimezone($value)
    {
        $this->daypartTimezone = $value;
    }

    public function getAudienceGroupSegmentTargetsToAdd()
    {
        return $this->audienceGroupSegmentTargetsToAdd;
    }

    public function setAudienceGroupSegmentTargetsToAdd($value)
    {
        $this->audienceGroupSegmentTargetsToAdd = $value;
    }

    public function getAudienceGroupSegmentTargetsToRemove()
    {
        return $this->audienceGroupSegmentTargetsToRemove;
    }

    public function setAudienceGroupSegmentTargetsToRemove($value)
    {
        $this->audienceGroupSegmentTargetsToRemove = $value;
    }

    public function getNormalSegmentTargetsToAdd()
    {
        return $this->normalSegmentTargetsToAdd;
    }

    public function setNormalSegmentTargetsToAdd($value)
    {
        $this->normalSegmentTargetsToAdd = $value;
    }

    public function getNormalSegmentTargetsToRemove()
    {
        return $this->normalSegmentTargetsToRemove;
    }

    public function setNormalSegmentTargetsToRemove($value)
    {
        $this->normalSegmentTargetsToRemove = $value;
    }

    public function getContentCategories()
    {
        return $this->contentCategories;
    }

    public function setContentCategories($value)
    {
        $this->contentCategories = $value;
    }

    public function getLearnBudgetPercent()
    {
        return $this->learnBudgetPercent;
    }

    public function setLearnBudgetPercent($value)
    {
        $this->learnBudgetPercent = $value;
    }

    public function getDailyImpressionBudget()
    {
        return $this->dailyImpressionBudget;
    }

    public function setDailyImpressionBudget($value)
    {
        $this->dailyImpressionBudget = $value;
    }

    public function getEnableLifetimePacing()
    {
        return $this->enableLifetimePacing;
    }

    public function setEnableLifetimePacing($value)
    {
        $this->enableLifetimePacing = $value;
    }

    public function getLifetimeImpressionBudget()
    {
        return $this->lifetimeImpressionBudget;
    }

    public function setLifetimeImpressionBudget($value)
    {
        $this->lifetimeImpressionBudget = $value;
    }

    public function getLearnOverrideType()
    {
        return $this->learnOverrideType;
    }

    public function setLearnOverrideType($value)
    {
        $this->learnOverrideType = $value;
    }

    public function getBidMargin()
    {
        return $this->bidMargin;
    }

    public function setBidMargin($value)
    {
        $this->bidMargin = $value;
    }

    public function getBidMultiplier()
    {
        return $this->bidMultiplier;
    }

    public function setBidMultiplier($value)
    {
        $this->bidMultiplier = $value;
    }

    public function getImpressionLimit()
    {
        return $this->impressionLimit;
    }

    public function setImpressionLimit($value)
    {
        $this->impressionLimit = $value;
    }

    public function getCadenceType()
    {
        return $this->cadenceType;
    }

    public function setCadenceType($value)
    {
        $this->cadenceType = $value;
    }

    public function getCadenceModifierEnabled()
    {
        return $this->cadenceModifierEnabled;
    }

    public function setCadenceModifierEnabled($value)
    {
        $this->cadenceModifierEnabled = $value;
    }

    public function getBidMultiplierByType()
    {
        return $this->bidMultiplierByType;
    }

    public function setBidMultiplierByType($value)
    {
        $this->bidMultiplierByType = $value;
    }

    public function getBaseCpmBidValue()
    {
        return $this->baseCpmBidValue;
    }

    public function setBaseCpmBidValue($value)
    {
        $this->baseCpmBidValue = $value;
    }

    public function getLineItemId()
    {
        return $this->lineItemId;
    }

    public function setLineItemId($value)
    {
        $this->lineItemId = $value;
    }

    public function getCampaignToUpdate()
    {
        return $this->campaignToUpdate;
    }

    public function setCampaignToUpdate($value)
    {
        $this->campaignToUpdate = $value;
    }

    public function getCampaignStatus()
    {
        return $this->campaignStatus;
    }

    public function setCampaignStatus($value)
    {
        $this->campaignStatus = $value;
    }

    public function getLineItemStatus()
    {
        return $this->lineItemStatus;
    }

    public function setLineItemStatus($value)
    {
        $this->lineItemStatus = $value;
    }

    public function getStartAt()
    {
        return $this->startAt;
    }

    public function setStartAt($value)
    {
        $this->startAt = $value;
    }

    public function getEndAt()
    {
        return $this->endAt;
    }

    public function setEndAt($value)
    {
        $this->endAt = $value;
    }

    public function getPublisherCustomizationArray()
    {
        return $this->publisherCustomizationArray;
    }

    public function setPublisherCustomizationArray(array $pubCustArr)
    {
        $this->publisherCustomizationArray = $pubCustArr;
    }

    /**
     * @return null
     */
    public function getMobileDailyImpressionBudget()
    {
        return $this->mobileDailyImpressionBudget;
    }

    /**
     * @param null $mobileDailyImpressionBudget
     */
    public function setMobileDailyImpressionBudget($mobileDailyImpressionBudget)
    {
        $this->mobileDailyImpressionBudget = $mobileDailyImpressionBudget;
    }

    /**
     * @return null
     */
    public function getMobileLifetimeImpressionBudget()
    {
        return $this->mobileLifetimeImpressionBudget;
    }

    /**
     * @param null $mobileLifetimeImpressionBudget
     */
    public function setMobileLifetimeImpressionBudget($mobileLifetimeImpressionBudget)
    {
        $this->mobileLifetimeImpressionBudget = $mobileLifetimeImpressionBudget;
    }

    /**
     * @return null
     */
    public function getMobileCpmBase()
    {
        return $this->mobileCpmBase;
    }

    /**
     * @param null $mobileCpmBase
     */
    public function setMobileCpmBase($mobileCpmBase)
    {
        $this->mobileCpmBase = $mobileCpmBase;
    }

    /**
     * @return null
     */
    public function getMobileCpmMax()
    {
        return $this->mobileCpmMax;
    }

    /**
     * @param null $mobileCpmMax
     */
    public function setMobileCpmMax($mobileCpmMax)
    {
        $this->mobileCpmMax = $mobileCpmMax;
    }

    /**
     * @return null
     */
    public function getMobileCpmMin()
    {
        return $this->mobileCpmMin;
    }

    /**
     * @param null $mobileCpmMin
     */
    public function setMobileCpmMin($mobileCpmMin)
    {
        $this->mobileCpmMin = $mobileCpmMin;
    }

    /**
     * @return null
     */
    public function getMobileEnableLifetimePacing()
    {
        return $this->mobileEnableLifetimePacing;
    }

    /**
     * @param null $mobileEnableLifetimePacing
     */
    public function setMobileEnableLifetimePacing($mobileEnableLifetimePacing)
    {
        $this->mobileEnableLifetimePacing = $mobileEnableLifetimePacing;
    }

    /**
     * should be either 'even' or 'ctr-optimized'
     *
     * @param string $creativeDistributionType
     */
    public function setCreativeDistributionType($creativeDistributionType)
    {
        $this->creativeDistributionType = $creativeDistributionType;
    }

    /**
     * @return string
     */
    public function getCreativeDistributionType()
    {
        return $this->creativeDistributionType;
    }

    public function toAssociativeArray()
    {
        $array = array(
            self::BID_TYPE => $this->bidType,
            self::CPC_GOAL => $this->cpcGoal,
            self::CPM_BASE => $this->cpmBase,
            self::CPM_MIN => $this->cpmMin,
            self::CPM_MAX => $this->cpmMax,
            self::NORMAL_WHITELIST => $this->hasNormalWhitelist,
            self::AUD_WHITELIST => $this->hasAudienceWhitelist,
            self::NORMAL_BLACKLIST => $this->hasNormalBlacklist,
            self::AUD_BLACKLIST => $this->hasAudienceBlacklist,
            self::NORMAL_DOMAIN_BLACKLIST => $this->hasNormalDomainBlacklist,
            self::AUD_DOMAIN_BLACKLIST => $this->hasAudienceDomainBlacklist,
            self::PIXELS => $this->pixels,
            self::POSTAL_RANGE => $this->postalRange,
            self::CENTER_POSTAL_CODE => $this->centerPostalCode,
            self::CUSTOMIZATION_NAME => $this->customizationName,
            self::PUB_CUSTOMIZATION_ARRAY => $this->publisherCustomizationArray,
            self::INDUSTRY_ID_ARRAY => $this->industryIdArray,
            self::DAYPART_TARGETING => $this->daypartTargets,
            self::AUD_SEGMENTS_TO_ADD => $this->audienceGroupSegmentTargetsToAdd,
            self::AUD_SEGMENTS_TO_REMOVE => $this->audienceGroupSegmentTargetsToRemove,
            self::NORMAL_SEGMENTS_TO_ADD => $this->normalSegmentTargetsToAdd,
            self::NORMAL_SEGMENTS_TO_REMOVE => $this->normalSegmentTargetsToRemove,
            self::ENABLE_LIFETIME_PACING => $this->enableLifetimePacing,
            self::DAYPART_TIMEZONE => $this->daypartTimezone
        );

        if (!is_null($this->learnOverrideType)) {
            $array[self::LEARN_OVERRIDE_TYPE] = $this->learnOverrideType;
        }

        if (!is_null($this->impressionLimit)) {
            $array[self::IMPRESSION_LIMIT] = $this->impressionLimit;
        }

        if (!is_null($this->bidMultiplier)) {
            $array[self::BID_MULTIPLIER] = $this->bidMultiplier;
        }

        if (!is_null($this->bidMultiplierByType)) {
            $array[self::BID_MULTIPLIER_BY_TYPE] = $this->bidMultiplierByType;
        }

        if (!is_null($this->cadenceModifierEnabled)) {
            $array[self::CADENCE_MODIFIER_ENABLED] = $this->cadenceModifierEnabled;
        }

        if (!is_null($this->lifetimeImpressionBudget)) {
            $array[self::LIFETIME_IMPRESSION_BUDGET] = $this->lifetimeImpressionBudget;
        }

        if (!is_null($this->dailyImpressionBudget)) {
            $array[self::DAILY_IMPRESSION_BUDGET] = $this->dailyImpressionBudget;
        }

        if (!is_null($this->baseCpmBidValue)) {
            $array[self::BASE_CPM_BID_VALUE] = $this->baseCpmBidValue;
        }

        if (!is_null($this->cadenceType)) {
            $array[self::CADENCE_TYPE] = $this->cadenceType;
        }

        if (!is_null($this->mobileDailyImpressionBudget)) {
            $array[self::MOBILE_DAILY_IMPRESSION_BUDGET] = $this->mobileDailyImpressionBudget;
        }

        if (!is_null($this->mobileLifetimeImpressionBudget)) {
            $array[self::MOBILE_LIFETIME_IMP_BUDGET] = $this->mobileLifetimeImpressionBudget;
        }

        if (!is_null($this->mobileCpmBase)) {
            $array[self::MOBILE_CPM_BASE] = $this->mobileCpmBase;
        }

        if (!is_null($this->mobileCpmMax)) {
            $array[self::MOBILE_CPM_MAX] = $this->mobileCpmMax;
        }

        if (!is_null($this->mobileCpmMin)) {
            $array[self::MOBILE_CPM_MIN] = $this->mobileCpmMin;
        }

        if (!is_null($this->mobileEnableLifetimePacing)) {
            $array[self::MOBILE_ENABLE_LIFETIME_PACING] = $this->mobileEnableLifetimePacing;
        }

        if (!is_null($this->creativeDistributionType)) {
            $array[self::CREATIVE_DISTRIBUTION_TYPE] = $this->creativeDistributionType;
        }

        return $array;
    }

    public function fromAssociativeArray($array)
    {
        $this->bidType = isset($array[self::BID_TYPE]) ? $array[self::BID_TYPE] : null;
        $this->cpcGoal = isset($array[self::CPC_GOAL]) ? $array[self::CPC_GOAL] : null;
        $this->cpmBase = isset($array[self::CPM_BASE]) ? $array[self::CPM_BASE] : null;
        $this->cpmMin = isset($array[self::CPM_MIN]) ? $array[self::CPM_MIN] : null;
        $this->cpmMax = isset($array[self::CPM_MAX]) ? $array[self::CPM_MAX] : null;
        $this->pixels = isset($array[self::PIXELS]) ? $array[self::PIXELS] : null;
        $this->postalRange = isset($array[self::POSTAL_RANGE]) ? $array[self::POSTAL_RANGE] : null;
        $this->centerPostalCode = isset($array[self::CENTER_POSTAL_CODE]) ? $array[self::CENTER_POSTAL_CODE] : null;
        $this->bidMultiplier = isset($array[self::BID_MULTIPLIER]) ? $array[self::BID_MULTIPLIER] : null;
        $this->impressionLimit = isset($array[self::IMPRESSION_LIMIT]) ? $array[self::IMPRESSION_LIMIT] : null;
        $this->industryIdArray = isset($array[self::INDUSTRY_ID_ARRAY]) ? $array[self::INDUSTRY_ID_ARRAY] : null;
        $this->daypartTargets = isset($array[self::DAYPART_TARGETING]) ? $array[self::DAYPART_TARGETING] : null;
        $this->bidMultiplierByType = isset($array[self::BID_MULTIPLIER_BY_TYPE])
            ? $array[self::BID_MULTIPLIER_BY_TYPE] : null;
        $this->hasNormalWhitelist = isset($array[self::NORMAL_WHITELIST]) ? $array[self::NORMAL_WHITELIST] : null;
        $this->hasAudienceWhitelist = isset($array[self::AUD_WHITELIST]) ? $array[self::AUD_WHITELIST] : null;
        $this->hasNormalBlacklist = isset($array[self::NORMAL_BLACKLIST]) ? $array[self::NORMAL_BLACKLIST] : null;
        $this->hasAudienceBlacklist = isset($array[self::AUD_BLACKLIST]) ? $array[self::AUD_BLACKLIST] : null;
        $this->learnOverrideType = isset($array[self::LEARN_OVERRIDE_TYPE]) ? $array[self::LEARN_OVERRIDE_TYPE] : null;
        $this->customizationName = isset($array[self::CUSTOMIZATION_NAME]) ? $array[self::CUSTOMIZATION_NAME] : null;
        $this->publisherCustomizationArray = isset($array[self::PUB_CUSTOMIZATION_ARRAY])
            ? $array[self::PUB_CUSTOMIZATION_ARRAY] : array();
        $this->hasAudienceDomainBlacklist = isset($array[self::AUD_DOMAIN_BLACKLIST])
            ? $array[self::AUD_DOMAIN_BLACKLIST] : null;
        $this->hasNormalDomainBlacklist = isset($array[self::NORMAL_DOMAIN_BLACKLIST])
            ? $array[self::NORMAL_DOMAIN_BLACKLIST] : null;
        $this->audienceGroupSegmentTargetsToAdd = isset($array[self::AUD_SEGMENTS_TO_ADD])
            ? $array[self::AUD_SEGMENTS_TO_ADD] : null;
        $this->audienceGroupSegmentTargetsToRemove = isset($array[self::AUD_SEGMENTS_TO_REMOVE])
            ? $array[self::AUD_SEGMENTS_TO_REMOVE] : null;
        $this->normalSegmentTargetsToAdd = isset($array[self::NORMAL_SEGMENTS_TO_ADD])
            ? $array[self::NORMAL_SEGMENTS_TO_ADD] : null;
        $this->normalSegmentTargetsToRemove = isset($array[self::NORMAL_SEGMENTS_TO_REMOVE])
            ? $array[self::NORMAL_SEGMENTS_TO_REMOVE] : null;
        $this->cadenceModifierEnabled = isset($array[self::CADENCE_MODIFIER_ENABLED])
            ? $array[self::CADENCE_MODIFIER_ENABLED] : null;
        $this->cadenceType = isset($array[self::CADENCE_TYPE]) ? $array[self::CADENCE_TYPE] : null;
        $this->lifetimeImpressionBudget = isset($array[self::LIFETIME_IMPRESSION_BUDGET])
            ? $array[self::LIFETIME_IMPRESSION_BUDGET] : null;
        $this->dailyImpressionBudget = isset($array[self::DAILY_IMPRESSION_BUDGET])
            ? $array[self::DAILY_IMPRESSION_BUDGET] : null;
        $this->enableLifetimePacing = isset($array[self::ENABLE_LIFETIME_PACING])
            ? $array[self::ENABLE_LIFETIME_PACING] : null;
        $this->daypartTimezone = isset($array[self::DAYPART_TIMEZONE]) ? $array[self::DAYPART_TIMEZONE] : null;
        $this->baseCpmBidValue = isset($array[self::BASE_CPM_BID_VALUE]) ? $array[self::BASE_CPM_BID_VALUE] : null;
        $this->mobileLifetimeImpressionBudget = isset($array[self::MOBILE_LIFETIME_IMP_BUDGET])
            ? $array[self::MOBILE_LIFETIME_IMP_BUDGET] : null;
        $this->mobileDailyImpressionBudget = isset($array[self::MOBILE_DAILY_IMPRESSION_BUDGET])
            ? $array[self::MOBILE_DAILY_IMPRESSION_BUDGET] : null;
        $this->mobileCpmBase = isset($array[self::MOBILE_CPM_BASE]) ? $array[self::MOBILE_CPM_BASE] : null;
        $this->mobileCpmMax = isset($array[self::MOBILE_CPM_MAX]) ? $array[self::MOBILE_CPM_MAX] : null;
        $this->mobileCpmMin = isset($array[self::MOBILE_CPM_MIN]) ? $array[self::MOBILE_CPM_MIN] : null;
        $this->mobileEnableLifetimePacing = isset($array[self::MOBILE_ENABLE_LIFETIME_PACING])
            ? $array[self::MOBILE_ENABLE_LIFETIME_PACING] : null;
        $this->creativeDistributionType = isset($array[self::CREATIVE_DISTRIBUTION_TYPE])
            ? $array[self::CREATIVE_DISTRIBUTION_TYPE] : null;
    }

    public function getCustomizationName()
    {
        return $this->customizationName;
    }

    public function setCustomizationName($customizationName)
    {
        $this->customizationName = $customizationName;
    }
}
