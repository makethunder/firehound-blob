<?php

namespace PaperG\Common\Test\AppNexus\Validators;

use PaperG\FirehoundBlob\AppNexus\AppNexusBlob;
use PaperG\FirehoundBlob\AppNexus\Fields\AppNexusBidSettingFields;
use PaperG\FirehoundBlob\AppNexus\Fields\AppNexusBlobFields;
use PaperG\FirehoundBlob\AppNexus\Fields\AppNexusDaypartTargetingFields;
use PaperG\FirehoundBlob\AppNexus\Fields\AppNexusPublisherCustomizationFields;
use PaperG\FirehoundBlob\AppNexus\Fields\AppNexusSegmentSettingFields;
use PaperG\FirehoundBlob\AppNexus\Validators\AppNexusBlobValidator;
use PaperG\FirehoundBlob\AppNexus\Values\AppNexusBlobType;
use PaperG\FirehoundBlob\CampaignData\CampaignGeotargetingDataFields;
use PaperG\FirehoundBlob\CampaignData\Creative;
use PaperG\FirehoundBlob\CampaignData\Fields\CreativeBlobFields;
use PaperG\FirehoundBlob\ScenarioBlob;

class AppNexusBlobValidatorTest extends \FirehoundBlobTestCase
{
    /**
     * @var AppNexusBlobValidator
     */
    private $sut;
    public function setUp()
    {
        $this->sut = new AppNexusBlobValidator();
    }

    public function testIsValidCreateDaypartReturnsTrue()
    {
        $array = [
            AppNexusBlobFields::START_DATE => 1234,
            AppNexusBlobFields::END_DATE => 4312,
            AppNexusBlobFields::STATUS => '',
            AppNexusBlobFields::AUDIENCE_GROUP_IDS=> [],
            AppNexusBlobFields::LANGUAGES => [],
            AppNexusBlobFields::APPLY_AUDIENCE_BLACKLIST => true,
            AppNexusBlobFields::APPLY_NORMAL_BLACKLIST => false,
            AppNexusBlobFields::GEOGRAPHIC_TARGETING => [
                CampaignGeotargetingDataFields::COUNTRY_ACTION => "include",
                CampaignGeotargetingDataFields::COUNTRY_TARGETS => [1],
            ],
            AppNexusBlobFields::DAYPART_TARGETING => [
            ],
            AppNexusBlobFields::CUSTOMIZATION_NAME => 'DEX',
            AppNexusBlobFields::PUBLISHER_CUSTOMIZATIONS => [
                AppNexusPublisherCustomizationFields::INDUSTRY_TO_QUERY_STRING => true
            ],
            AppNexusBlobFields::AUDIENCE_SEGMENTS => [
                AppNexusSegmentSettingFields::ADD => [],
                AppNexusSegmentSettingFields::REMOVE => []
            ],
            AppNexusBlobFields::NORMAL_SEGMENTS => [
                AppNexusSegmentSettingFields::ADD => [],
                AppNexusSegmentSettingFields::REMOVE => []
            ],
            AppNexusBlobFields::BID_SETTING => [
                AppNexusBidSettingFields::BID_TYPE => "predicted"
            ],
            AppNexusBlobFields::CREATIVE => [
                CreativeBlobFields::ADTAG_JAVASCRIPT_SECURE => [
                    "medium_rectangle" => "ad tag"
                ],
                CreativeBlobFields::ADTAG_JAVASCRIPT_INSECURE => null
            ]
        ];
        $anBlob = new AppNexusBlob($array);
        $scenarioBlob = new ScenarioBlob();
        $scenarioBlob->setBlob($anBlob);
        $result = $this->sut->isValidCreateBlob($scenarioBlob);
        $this->assertEquals('', $result->getMessage());
        $this->assertTrue($result->getResult());
    }
    public function testIsValidCreateReturnsTrue()
    {
        $array = [
            AppNexusBlobFields::START_DATE => 1234,
            AppNexusBlobFields::END_DATE => 4312,
            AppNexusBlobFields::STATUS => '',
            AppNexusBlobFields::AUDIENCE_GROUP_IDS=> [],
            AppNexusBlobFields::LANGUAGES => [],
            AppNexusBlobFields::APPLY_AUDIENCE_BLACKLIST => true,
            AppNexusBlobFields::APPLY_NORMAL_BLACKLIST => false,
            AppNexusBlobFields::GEOGRAPHIC_TARGETING => [
                CampaignGeotargetingDataFields::COUNTRY_ACTION => "include",
                CampaignGeotargetingDataFields::COUNTRY_TARGETS => [1],
            ],
            AppNexusBlobFields::DAYPART_TARGETING => [
                AppNexusDaypartTargetingFields::START_HOUR => 1
            ],
            AppNexusBlobFields::CUSTOMIZATION_NAME => 'DEX',
            AppNexusBlobFields::PUBLISHER_CUSTOMIZATIONS => [
                AppNexusPublisherCustomizationFields::INDUSTRY_TO_QUERY_STRING => true
            ],
            AppNexusBlobFields::AUDIENCE_SEGMENTS => [
                AppNexusSegmentSettingFields::ADD => [],
                AppNexusSegmentSettingFields::REMOVE => []
            ],
            AppNexusBlobFields::NORMAL_SEGMENTS => [
                AppNexusSegmentSettingFields::ADD => [],
                AppNexusSegmentSettingFields::REMOVE => []
            ],
            AppNexusBlobFields::BID_SETTING => [
                AppNexusBidSettingFields::BID_TYPE => "predicted"
            ],
            AppNexusBlobFields::CREATIVE => [
                CreativeBlobFields::ADTAG_JAVASCRIPT_SECURE => [
                    "medium_rectangle" => "ad tag"
                ],
                CreativeBlobFields::ADTAG_JAVASCRIPT_INSECURE => null
            ]
        ];
        $anBlob = new AppNexusBlob($array);
        $scenarioBlob = new ScenarioBlob();
        $scenarioBlob->setBlob($anBlob);
        $result = $this->sut->isValidCreateBlob($scenarioBlob);
        $this->assertEquals('', $result->getMessage());
        $this->assertTrue($result->getResult());
    }

    public function testIsValidCreateReturnsFalseCountry()
    {
        $array = [
            AppNexusBlobFields::START_DATE => 1234,
            AppNexusBlobFields::END_DATE => 4312,
            AppNexusBlobFields::STATUS => '',
            AppNexusBlobFields::AUDIENCE_GROUP_IDS=> [],
            AppNexusBlobFields::LANGUAGES => [],
            AppNexusBlobFields::APPLY_AUDIENCE_BLACKLIST => true,
            AppNexusBlobFields::APPLY_NORMAL_BLACKLIST => false,
            AppNexusBlobFields::GEOGRAPHIC_TARGETING => [
                CampaignGeotargetingDataFields::COUNTRY_ACTION => null,
                CampaignGeotargetingDataFields::COUNTRY_TARGETS => [1]
            ],
            AppNexusBlobFields::DAYPART_TARGETING => [
                AppNexusDaypartTargetingFields::START_HOUR => 1
            ],
            AppNexusBlobFields::CUSTOMIZATION_NAME => 'DEX',
            AppNexusBlobFields::PUBLISHER_CUSTOMIZATIONS => [
                AppNexusPublisherCustomizationFields::INDUSTRY_TO_QUERY_STRING => true
            ],
            AppNexusBlobFields::AUDIENCE_SEGMENTS => [
                AppNexusSegmentSettingFields::ADD => [],
                AppNexusSegmentSettingFields::REMOVE => []
            ],
            AppNexusBlobFields::NORMAL_SEGMENTS => [
                AppNexusSegmentSettingFields::ADD => [],
                AppNexusSegmentSettingFields::REMOVE => []
            ],
            AppNexusBlobFields::BID_SETTING => [
                AppNexusBidSettingFields::BID_TYPE => "predicted"
            ]
        ];
        $anBlob = new AppNexusBlob($array);
        $scenarioBlob = new ScenarioBlob();
        $scenarioBlob->setBlob($anBlob);
        $result = $this->sut->isValidCreateBlob($scenarioBlob);
        $this->assertEquals(
            '[geographicTargeting.country_action] Does not have a value in the enumeration ["include","exclude"]. '
            . '[geographicTargeting.city_action] Does not have a value in the enumeration ["include","exclude"]. '
            . '[geographicTargeting.city_targets] NULL value found, but an array is required. '
            . '[geographicTargeting.city_target_ids] NULL value found, but an array is required. '
            . '[geographicTargeting.city_target_radii] There must be a minimum of 1 items in the array. '
            . '[geographicTargeting.dma_action] Does not have a value in the enumeration ["include","exclude"]. '
            . '[geographicTargeting.dma_targets] NULL value found, but an array is required. '
            . '[geographicTargeting.region_action] Does not have a value in the enumeration ["include","exclude"]. '
            . '[geographicTargeting.region_targets] NULL value found, but an array is required. '
            . '[geographicTargeting.zip_action] Does not have a value in the enumeration ["include","exclude"]. '
            . '[geographicTargeting.zip_targets] NULL value found, but an array is required. '
            . '[geographicTargeting] Failed to match at least one schema.',
            $result->getMessage()
        );
        $this->assertFalse($result->getResult());
    }

    public function testIsValidCreateReturnsFalseCityTargets()
    {
        $array = [
            AppNexusBlobFields::START_DATE => 1234,
            AppNexusBlobFields::END_DATE => 4312,
            AppNexusBlobFields::STATUS => '',
            AppNexusBlobFields::AUDIENCE_GROUP_IDS=> [],
            AppNexusBlobFields::LANGUAGES => [],
            AppNexusBlobFields::APPLY_AUDIENCE_BLACKLIST => true,
            AppNexusBlobFields::APPLY_NORMAL_BLACKLIST => false,
            AppNexusBlobFields::GEOGRAPHIC_TARGETING => [
                CampaignGeotargetingDataFields::CITY_ACTION => null,
                CampaignGeotargetingDataFields::CITY_TARGETS => [1]
            ],
            AppNexusBlobFields::DAYPART_TARGETING => [
                AppNexusDaypartTargetingFields::START_HOUR => 1
            ],
            AppNexusBlobFields::CUSTOMIZATION_NAME => 'DEX',
            AppNexusBlobFields::PUBLISHER_CUSTOMIZATIONS => [
                AppNexusPublisherCustomizationFields::INDUSTRY_TO_QUERY_STRING => true
            ],
            AppNexusBlobFields::AUDIENCE_SEGMENTS => [
                AppNexusSegmentSettingFields::ADD => [],
                AppNexusSegmentSettingFields::REMOVE => []
            ],
            AppNexusBlobFields::NORMAL_SEGMENTS => [
                AppNexusSegmentSettingFields::ADD => [],
                AppNexusSegmentSettingFields::REMOVE => []
            ],
            AppNexusBlobFields::BID_SETTING => [
                AppNexusBidSettingFields::BID_TYPE => "predicted"
            ],
            AppNexusBlobFields::CREATIVE => [
                Creative::ADTAG_JAVASCRIPT_SECURE => '',
                Creative::ADTAG_JAVASCRIPT_INSECURE => ''
            ]
        ];
        $anBlob = new AppNexusBlob($array);
        $scenarioBlob = new ScenarioBlob();
        $scenarioBlob->setBlob($anBlob);
        $result = $this->sut->isValidCreateBlob($scenarioBlob);
        $this->assertEquals(
            '[geographicTargeting.country_action] Does not have a value in the enumeration ["include","exclude"]. '
            . '[geographicTargeting.country_targets] NULL value found, but an array is required. '
            . '[geographicTargeting.city_action] Does not have a value in the enumeration ["include","exclude"]. '
            . '[geographicTargeting.city_target_ids] NULL value found, but an array is required. '
            . '[geographicTargeting.city_target_radii] There must be a minimum of 1 items in the array. '
            . '[geographicTargeting.dma_action] Does not have a value in the enumeration ["include","exclude"]. '
            . '[geographicTargeting.dma_targets] NULL value found, but an array is required. '
            . '[geographicTargeting.region_action] Does not have a value in the enumeration ["include","exclude"]. '
            . '[geographicTargeting.region_targets] NULL value found, but an array is required. '
            . '[geographicTargeting.zip_action] Does not have a value in the enumeration ["include","exclude"]. '
            . '[geographicTargeting.zip_targets] NULL value found, but an array is required. '
            . '[geographicTargeting] Failed to match at least one schema.',
            $result->getMessage()
        );
        $this->assertFalse($result->getResult());
    }

    public function testIsValidCreateReturnsFalseCityIds()
    {
        $array = [
            AppNexusBlobFields::START_DATE => 1234,
            AppNexusBlobFields::END_DATE => 4312,
            AppNexusBlobFields::STATUS => '',
            AppNexusBlobFields::AUDIENCE_GROUP_IDS=> [],
            AppNexusBlobFields::LANGUAGES => [],
            AppNexusBlobFields::APPLY_AUDIENCE_BLACKLIST => true,
            AppNexusBlobFields::APPLY_NORMAL_BLACKLIST => false,
            AppNexusBlobFields::GEOGRAPHIC_TARGETING => [
                CampaignGeotargetingDataFields::CITY_ACTION => "include",
                CampaignGeotargetingDataFields::CITY_TARGETS => null
            ],
            AppNexusBlobFields::DAYPART_TARGETING => [
                AppNexusDaypartTargetingFields::START_HOUR => 1
            ],
            AppNexusBlobFields::CUSTOMIZATION_NAME => 'DEX',
            AppNexusBlobFields::PUBLISHER_CUSTOMIZATIONS => [
                AppNexusPublisherCustomizationFields::INDUSTRY_TO_QUERY_STRING => true
            ],
            AppNexusBlobFields::AUDIENCE_SEGMENTS => [
                AppNexusSegmentSettingFields::ADD => [],
                AppNexusSegmentSettingFields::REMOVE => []
            ],
            AppNexusBlobFields::NORMAL_SEGMENTS => [
                AppNexusSegmentSettingFields::ADD => [],
                AppNexusSegmentSettingFields::REMOVE => []
            ],
            AppNexusBlobFields::BID_SETTING => [
                AppNexusBidSettingFields::BID_TYPE => "predicted"
            ],
            AppNexusBlobFields::CREATIVE => [
                Creative::ADTAG_JAVASCRIPT_SECURE => '',
                Creative::ADTAG_JAVASCRIPT_INSECURE => ''
            ]
        ];
        $anBlob = new AppNexusBlob($array);
        $scenarioBlob = new ScenarioBlob();
        $scenarioBlob->setBlob($anBlob);
        $result = $this->sut->isValidCreateBlob($scenarioBlob);
        $this->assertEquals(
            '[geographicTargeting.country_action] Does not have a value in the enumeration ["include","exclude"]. '
            . '[geographicTargeting.country_targets] NULL value found, but an array is required. '
            . '[geographicTargeting.city_targets] NULL value found, but an array is required. '
            . '[geographicTargeting.city_target_ids] NULL value found, but an array is required. '
            . '[geographicTargeting.city_target_radii] There must be a minimum of 1 items in the array. '
            . '[geographicTargeting.dma_action] Does not have a value in the enumeration ["include","exclude"]. '
            . '[geographicTargeting.dma_targets] NULL value found, but an array is required. '
            . '[geographicTargeting.region_action] Does not have a value in the enumeration ["include","exclude"]. '
            . '[geographicTargeting.region_targets] NULL value found, but an array is required. '
            . '[geographicTargeting.zip_action] Does not have a value in the enumeration ["include","exclude"]. '
            . '[geographicTargeting.zip_targets] NULL value found, but an array is required. '
            . '[geographicTargeting] Failed to match at least one schema.',
            $result->getMessage()
        );
        $this->assertFalse($result->getResult());
    }

    public function testIsValidCreateReturnsTrueCityRadii()
    {
        $array = [
            AppNexusBlobFields::START_DATE => 1234,
            AppNexusBlobFields::END_DATE => 4312,
            AppNexusBlobFields::STATUS => '',
            AppNexusBlobFields::AUDIENCE_GROUP_IDS=> [],
            AppNexusBlobFields::LANGUAGES => [],
            AppNexusBlobFields::APPLY_AUDIENCE_BLACKLIST => true,
            AppNexusBlobFields::APPLY_NORMAL_BLACKLIST => false,
            AppNexusBlobFields::GEOGRAPHIC_TARGETING => [
                CampaignGeotargetingDataFields::CITY_ACTION => "include",
                CampaignGeotargetingDataFields::CITY_TARGET_RADII => [
                    ["cityId" => 1, "radius" => 1]
                ]
            ],
            AppNexusBlobFields::DAYPART_TARGETING => [
                AppNexusDaypartTargetingFields::START_HOUR => 1
            ],
            AppNexusBlobFields::CUSTOMIZATION_NAME => 'DEX',
            AppNexusBlobFields::PUBLISHER_CUSTOMIZATIONS => [
                AppNexusPublisherCustomizationFields::INDUSTRY_TO_QUERY_STRING => true
            ],
            AppNexusBlobFields::AUDIENCE_SEGMENTS => [
                AppNexusSegmentSettingFields::ADD => [],
                AppNexusSegmentSettingFields::REMOVE => []
            ],
            AppNexusBlobFields::NORMAL_SEGMENTS => [
                AppNexusSegmentSettingFields::ADD => [],
                AppNexusSegmentSettingFields::REMOVE => []
            ],
            AppNexusBlobFields::BID_SETTING => [
                AppNexusBidSettingFields::BID_TYPE => "predicted"
            ],
            AppNexusBlobFields::CREATIVE => [
                Creative::ADTAG_JAVASCRIPT_SECURE => '',
                Creative::ADTAG_JAVASCRIPT_INSECURE => ''
            ],
            AppNexusBlobFields::INDUSTRY_ID => 1,
            AppNexusBlobFields::THROTTLE_MODE => false,
            AppNexusBlobFields::USER_SUBMITTED => false
        ];
        $anBlob = new AppNexusBlob($array);
        $scenarioBlob = new ScenarioBlob();
        $scenarioBlob->setBlob($anBlob);
        $result = $this->sut->isValidCreateBlob($scenarioBlob);
        $this->assertTrue($result->getResult());
    }

    public function testInvalidTypeReturnsFalse()
    {
        $array = [AppNexusBlobFields::TYPE => "bvlah"];
        $anBlob = new AppNexusBlob($array);
        $scenarioBlob = new ScenarioBlob();
        $scenarioBlob->setBlob($anBlob);
        $result = $this->sut->isValidCreateBlob($scenarioBlob);
        $this->assertFalse($result->getResult());
    }

    public function testValidTypeReturnsTrue()
    {
        $array = [AppNexusBlobFields::TYPE => AppNexusBlobType::DESKTOP];
        $anBlob = new AppNexusBlob($array);
        $scenarioBlob = new ScenarioBlob();
        $scenarioBlob->setBlob($anBlob);
        $result = $this->sut->isValidCreateBlob($scenarioBlob);
        $this->assertTrue($result->getResult());
    }
} 
