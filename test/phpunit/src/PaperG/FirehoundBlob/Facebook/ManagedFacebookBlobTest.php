<?php

namespace PaperG\Common\Test\Facebook;

use PaperG\FirehoundBlob\Facebook\Fields\ManagedFacebookAdSetFields;
use PaperG\FirehoundBlob\Facebook\Fields\ManagedFacebookBlobFields;
use PaperG\FirehoundBlob\Facebook\ManagedFacebookBlob;
use PaperG\FirehoundBlob\Facebook\Targeting\FacebookAudienceTargeting;

class ManagedFacebookBlobTest extends \FirehoundBlobTestCase
{
    public function testFromArray()
    {
        $mockAccessToken = "mock token";
        $mockAudienceIds = [1,2,3];
        //Test single objects
        $mockAudienceTargeting = [
            FacebookAudienceTargeting::IDS => $mockAudienceIds
        ];
        $mockAdSetId = 12;
        //Test array of objects
        $mockAdSets = [
            [ManagedFacebookAdSetFields::AD_SET_ID => $mockAdSetId]
        ];

        $array = [
            ManagedFacebookBlobFields::ACCESS_TOKEN => $mockAccessToken,
            ManagedFacebookBlobFields::AUDIENCE_TARGETING => $mockAudienceTargeting,
            ManagedFacebookBlobFields::AD_SETS => $mockAdSets
        ];
        $sut = new ManagedFacebookBlob($array);
        $this->assertEquals($mockAccessToken, $sut->getAccessToken());
        $audienceTargeting = $sut->getAudienceTargeting();
        $this->assertEquals($mockAudienceIds, $audienceTargeting->getIds());
        $this->assertEquals(1, count($sut->getAdSets()));
        $adSet = $sut->getAdSets()[0];

        $this->assertEquals($mockAdSetId, $adSet->getAdSetId());
    }
}
