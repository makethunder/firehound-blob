<?php

namespace PaperG\Common\Test\Dcm\Validators;

use PaperG\FirehoundBlob\Dcm\UnmanagedDcmBlob;
use PaperG\FirehoundBlob\Dcm\Validators\DcmCreativeAssetValidator;
use PaperG\FirehoundBlob\Dcm\Validators\UnmanagedDcmBlobValidator;
use PaperG\FirehoundBlob\ScenarioBlob;

class UnmanagedDcmBlobValidatorTest extends \FirehoundBlobTestCase
{
    /**
     * @var UnmanagedDcmBlobValidator
     */
    private $sut;
    private $mockValidator;

    public function setUp() {
        $this->mockValidator = new DcmCreativeAssetValidator();
        $this->sut = new UnmanagedDcmBlobValidator($this->mockValidator);
    }

    public function testIsValidCreateBlob() {
        $mockCreativeAsset = $this->buildMock('PaperG\FirehoundBlob\Dcm\DcmCreativeAsset');
        $mockCreativeAssetArray = [
            "imageUrl" => "image url",
            "uuid" => "blah",
            "adTag" => "blah blah"
        ];
        $this->addExpectation($mockCreativeAsset, $this->atLeastOnce(), 'toArray', null, $mockCreativeAssetArray);
        $this->addExpectation($mockCreativeAsset, $this->atLeastOnce(), 'getImageUrl', null, "image url");
        $this->addExpectation($mockCreativeAsset, $this->atLeastOnce(), 'getAdTag', null, "blah blah");
        $mockAssets = [$mockCreativeAsset];

        $dcmBlob = new UnmanagedDcmBlob();
        $dcmBlob->setAdvertiserId(1234);
        $dcmBlob->setCreativeAssets($mockAssets);
        $dcmBlob->setPublicationId(1234);
        $dcmBlob->setPlacelocalCampaignId(4321);
        $dcmBlob->setStatusCallbackUrl('http://www.google.com/');
        $dcmBlob->setStatusCallbackHeaders(["url" => "url", "auth" => "auth"]);

        $testBlob = new ScenarioBlob();
        $testBlob->setBlob($dcmBlob);
        $result = $this->sut->isValidCreateBlob($testBlob);
        $this->assertTrue($result->getResult());
        $this->assertEmpty($result->getMessage());
    }

    public function testIsValidUpdateBlob()
    {
        $assetArray = [
            "uuid" => "blah",
            "imageUrl" => "image url"
        ];
        $mockCreativeAsset = $this->buildMock('PaperG\FirehoundBlob\Dcm\DcmCreativeAsset');
        $this->addExpectation($mockCreativeAsset, $this->atLeastOnce(), 'toArray', null, $assetArray);
        $mockAssets = [$mockCreativeAsset];
        $mockCreativeAssetArray = [
            "uuid" => "blah",
            "adTag" => "blah blah"
        ];
        $this->addExpectation($mockCreativeAsset, $this->atLeastOnce(), 'toArray', null, $mockCreativeAssetArray);
        $this->addExpectation($mockCreativeAsset, $this->atLeastOnce(), 'getAdTag', null, "blah blah");

        $dcmBlob = new UnmanagedDcmBlob();
        $dcmBlob->setPlacelocalCampaignId(321);
        $dcmBlob->setAdvertiserId(1234);
        $dcmBlob->setCreativeAssets($mockAssets);
        $dcmBlob->setPublicationId(1234);
        $dcmBlob->setStatusCallbackUrl("mock callback url");
        $dcmBlob->setStatusCallbackHeaders(["header" => "value"]);

        $testBlob = new ScenarioBlob();
        $testBlob->setBlob($dcmBlob);
        $result = $this->sut->isValidUpdateBlob($testBlob);
        $this->assertTrue($result->getResult());
        $this->assertEmpty($result->getMessage());
    }
} 
