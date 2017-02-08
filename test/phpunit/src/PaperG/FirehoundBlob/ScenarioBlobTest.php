<?php

namespace PaperG\Common\Test;

use PaperG\FirehoundBlob\AppNexus\AppNexusBlob;
use PaperG\FirehoundBlob\AppNexus\Fields\AppNexusBlobFields;
use PaperG\FirehoundBlob\BasicInfo;
use PaperG\FirehoundBlob\Dcm\UnmanagedDcmBlob;
use PaperG\FirehoundBlob\Scenario;
use PaperG\FirehoundBlob\ScenarioBlob;

class ScenarioBlobTest extends \FirehoundBlobTestCase
{
    public function testFromArrayAnDesktop()
    {
        $mockAgIds = [1,2,3];
        $array = [
            ScenarioBlob::BASIC_INFO => [
                BasicInfo::SCENARIO => Scenario::AN_DESKTOP
            ],
            ScenarioBlob::BLOB => [
                AppNexusBlobFields::AUDIENCE_GROUP_IDS => $mockAgIds
            ]
        ];
        $sut = new ScenarioBlob();
        $sut->fromArray($array);
        /**
         * @var $blob AppNexusBlob
         */
        $blob = $sut->getBlob();
        $this->assertEquals($mockAgIds, $blob->getAudienceGroupIds());
    }

    public function testFromArrayAnMobile()
    {
        $mockAgIds = [1,2,3];
        $array = [
            ScenarioBlob::BASIC_INFO => [
                BasicInfo::SCENARIO => Scenario::AN_MOBILE
            ],
            ScenarioBlob::BLOB => [
                AppNexusBlobFields::AUDIENCE_GROUP_IDS => $mockAgIds
            ]
        ];
        $sut = new ScenarioBlob();
        $sut->fromArray($array);
        /**
         * @var $blob AppNexusBlob
         */
        $blob = $sut->getBlob();
        $this->assertEquals($mockAgIds, $blob->getAudienceGroupIds());
    }

    public function testFromArrayDcm()
    {
        $mockAdvId = "moc kid";
        $array = [
            ScenarioBlob::BASIC_INFO => [
                BasicInfo::SCENARIO => Scenario::DCM_UNMANAGED
            ],
            ScenarioBlob::BLOB => [UnmanagedDcmBlob::GOOGLE_ADVERTISER_ID => $mockAdvId]
        ];
        $sut = new ScenarioBlob($array);
        /**
         * @var $blob UnmanagedDcmBlob
         */
        $blob = $sut->getBlob();
        $this->assertEquals($mockAdvId, $blob->getAdvertiserId());
    }
} 
