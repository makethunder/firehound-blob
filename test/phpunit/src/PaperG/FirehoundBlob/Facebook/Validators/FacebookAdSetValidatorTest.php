<?php

namespace PaperG\Common\Test\Facebook\Validators;

use PaperG\FirehoundBlob\Facebook\FacebookAdSet;
use PaperG\FirehoundBlob\Facebook\Validators\FacebookAdSetValidator;

class FacebookAdSetValidatorTest extends \FirehoundBlobTestCase
{
    public function testValidate()
    {
        $sut = new FacebookAdSetValidator();
        $adSet = new FacebookAdSet();
        $adSet->setBidAmount("1234");
        $placements = [
            "publisher_platforms" => ["facebook"],
            "facebook_positions" => ["right_hand_column"],
            "device_platforms" => ["mobile"]
        ];
        $adSet->setPlacements($placements);

        $result = $sut->validate($adSet);
        $this->assertFalse($result->getResult());
        $this->assertEquals('[bidAmount] String value found, but a number or a null is required.', $result->getMessage());
    }

    public function testValidateNoPlacements()
    {
        $sut = new FacebookAdSetValidator();
        $adSet = new FacebookAdSet();
        $adSet->setBidAmount(1234);

        $result = $sut->validate($adSet);
        $this->assertTrue($result->getResult());
    }

    public function testValidateMissingPlacements()
    {
        $sut = new FacebookAdSetValidator();
        $adSet = new FacebookAdSet();
        $adSet->setBidAmount(1234);
        $placements = [
            "facebook_positions" => ["right_hand_column"],
            "device_platforms" => ["mobile"]
        ];
        $adSet->setPlacements($placements);

        $result = $sut->validate($adSet);
        $this->assertTrue($result->getResult());
    }

    public function testInvalidOldPlacement()
    {
        $sut = new FacebookAdSetValidator();
        $adSet = new FacebookAdSet();
        $adSet->setBidAmount(1234);
        $placements = [
            "string", "string"
        ];
        $adSet->setPlacements($placements);

        $result = $sut->validate($adSet);
        $this->assertFalse($result->getResult());
    }
} 
