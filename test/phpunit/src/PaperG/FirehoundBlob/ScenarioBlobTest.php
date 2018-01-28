<?php

namespace PaperG\Common\Test;

use PaperG\FirehoundBlob\AppNexus\AppNexusBlob;
use PaperG\FirehoundBlob\AppNexus\Fields\AppNexusBlobFields;
use PaperG\FirehoundBlob\BasicInfo;
use PaperG\FirehoundBlob\Dcm\UnmanagedDcmBlob;
use PaperG\FirehoundBlob\Facebook\FacebookAdSet;
use PaperG\FirehoundBlob\Facebook\FacebookCreative;
use PaperG\FirehoundBlob\Facebook\Fields\GeneralFacebookAdSetFields;
use PaperG\FirehoundBlob\Facebook\Fields\GeneralFacebookBlobFields;
use PaperG\FirehoundBlob\Facebook\GeneralFacebookBlob;
use PaperG\FirehoundBlob\Facebook\UnmanagedFacebookBlob;
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

    public function testFromArrayUnmanagedFacebook()
    {
        $mockAdSetId = 'mock ad set id';
        $array = [
            ScenarioBlob::BASIC_INFO => [BasicInfo::SCENARIO => Scenario::FB_UNMANAGED],
            ScenarioBlob::BLOB => [
                GeneralFacebookBlobFields::AD_SETS => [
                    [
                        FacebookAdSet::AD_SET_ID => $mockAdSetId
                    ]
                ]
            ]
        ];
        $sut = new ScenarioBlob($array);
        /**
         * @var UnmanagedFacebookBlob $blob
         */
        $blob = $sut->getBlob();
        $this->assertEquals($mockAdSetId, $blob->getAdSets()[0]->getAdSetId());
    }

    public function testFromArrayManagedFacebook()
    {
        $mockAdSetId = 'mock ad set id';
        $mockType = 'mock facebook creative type';
        $array = [
            ScenarioBlob::BASIC_INFO => [BasicInfo::SCENARIO => Scenario::FB_MANAGED],
            ScenarioBlob::BLOB => [
                GeneralFacebookBlobFields::AD_SETS => [
                    [
                        GeneralFacebookAdSetFields::AD_SET_ID => $mockAdSetId,
                        GeneralFacebookAdSetFields::CREATIVES => [
                            [FacebookCreative::TYPE => $mockType]
                        ]
                    ]
                ]
            ]
        ];
        $sut = new ScenarioBlob($array);
        /**
         * @var GeneralFacebookBlob $blob
         */
        $blob = $sut->getBlob();
        $this->assertEquals($mockAdSetId, $blob->getAdSets()[0]->getAdSetId());
        $this->assertEquals($mockType, $blob->getAdSets()[0]->getCreatives()[0]->getType());
    }

    public function testFromArrayUnmanagedFacebookV2()
    {
        $mockAdSetId = 'mock ad set id';
        $mockType = 'mock facebook creative type';
        $array = [
            ScenarioBlob::BASIC_INFO => [BasicInfo::SCENARIO => Scenario::FB_UNMANAGED_V2],
            ScenarioBlob::BLOB => [
                GeneralFacebookBlobFields::AD_SETS => [
                    [
                        GeneralFacebookAdSetFields::AD_SET_ID => $mockAdSetId,
                        GeneralFacebookAdSetFields::CREATIVES => [
                            [FacebookCreative::TYPE => $mockType]
                        ]
                    ]
                ]
            ]
        ];
        $sut = new ScenarioBlob($array);
        /**
         * @var GeneralFacebookBlob $blob
         */
        $blob = $sut->getBlob();
        $this->assertEquals($mockAdSetId, $blob->getAdSets()[0]->getAdSetId());
        $this->assertEquals($mockType, $blob->getAdSets()[0]->getCreatives()[0]->getType());
    }
} 
