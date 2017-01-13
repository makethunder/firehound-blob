<?php

namespace Validators;

use PaperG\FirehoundBlob\CampaignData\CampaignGeotargetingDataFields;
use PaperG\FirehoundBlob\CampaignData\Validators\CampaignGeotargetingDataValidator;

class CampaignGeotargetingDataValidatorTest extends \FirehoundBlobTestCase
{
    public function testValidateTrueCountry()
    {
        $sut = new CampaignGeotargetingDataValidator();
        $result = $sut->validate(
            [
                CampaignGeotargetingDataFields::COUNTRY_ACTION => "include",
                CampaignGeotargetingDataFields::COUNTRY_TARGETS => [1]
            ]
        );

        $this->assertTrue($result->getResult());
    }

    public function testValidateTrueDma()
    {
        $sut = new CampaignGeotargetingDataValidator();
        $result = $sut->validate(
            [
                CampaignGeotargetingDataFields::DMA_ACTION => "include",
                CampaignGeotargetingDataFields::DMA_TARGETS => [1]
            ]
        );

        $this->assertTrue($result->getResult());
    }

    public function testValidateTrueRegion()
    {
        $sut = new CampaignGeotargetingDataValidator();
        $result = $sut->validate(
            [
                CampaignGeotargetingDataFields::REGION_ACTION => "include",
                CampaignGeotargetingDataFields::REGION_TARGETS => [1]
            ]
        );

        $this->assertTrue($result->getResult());
    }
    public function testValidateTrueZip()
    {
        $sut = new CampaignGeotargetingDataValidator();
        $result = $sut->validate(
            [
                CampaignGeotargetingDataFields::ZIP_ACTION => "include",
                CampaignGeotargetingDataFields::ZIP_TARGETS => [1]
            ]
        );

        $this->assertTrue($result->getResult());
    }

    public function testValidateTrueNull()
    {
        $sut = new CampaignGeotargetingDataValidator();
        $result = $sut->validate(
            [
                CampaignGeotargetingDataFields::COUNTRY_ACTION => "include",
                CampaignGeotargetingDataFields::COUNTRY_TARGETS => [1],
                CampaignGeotargetingDataFields::CITY_ACTION=> null,
                CampaignGeotargetingDataFields::CITY_TARGETS => null,
            ]
        );
        $this->assertTrue($result->getResult());
        $this->assertEquals('', $result->getMessage());
    }

    public function testValidateFalse()
    {
        $sut = new CampaignGeotargetingDataValidator();
        $result = $sut->validate(
            [
                CampaignGeotargetingDataFields::COUNTRY_ACTION => null,
                CampaignGeotargetingDataFields::COUNTRY_TARGETS => [1],
                CampaignGeotargetingDataFields::CITY_ACTION=> null,
                CampaignGeotargetingDataFields::CITY_TARGETS => [1],
            ]
        );
        $expectedMessage = '[country_action] Does not have a value in the enumeration ["include","exclude"]. '
            . '[city_action] Does not have a value in the enumeration ["include","exclude"]. '
            . '[dma_action] The property dma_action is required. '
            . '[region_action] The property region_action is required. '
            . '[zip_action] The property zip_action is required. [] Failed to match at least one schema.';
        $this->assertFalse($result->getResult());
        $this->assertEquals($expectedMessage, $result->getMessage());
    }
} 
