<?php

namespace PaperG\Common\Test\Facebook\Validators;

use PaperG\FirehoundBlob\Facebook\AdSets\GeneralFacebookAdSet;
use PaperG\FirehoundBlob\Facebook\FacebookCreative;
use PaperG\FirehoundBlob\Facebook\FacebookCreativeData;
use PaperG\FirehoundBlob\Facebook\Fields\GeneralFacebookAdSetFields;
use PaperG\FirehoundBlob\Facebook\Fields\GeneralFacebookBlobFields;
use PaperG\FirehoundBlob\Facebook\GeneralFacebookBlob;
use PaperG\FirehoundBlob\Facebook\Validators\GeneralFacebookBlobValidator;

class GeneralFacebookBlobValidatorTest extends \FirehoundBlobTestCase
{
    /**
     * @var GeneralFacebookBlobValidator
     */
    private $sut;

    public function setUp()
    {
        $this->sut = new GeneralFacebookBlobValidator();
    }

    public function testValidateReturnsTrue()
    {
        $mockAdAccountId = 'mock ad account id';
        $mockPageId = 'mock page id';
        $mockAccessToken = 'mock access token';
        $primary = new FacebookCreativeData(['media_url' => 'media url', 'name' => 'name']);
        $creative = new FacebookCreative(["type"=> FacebookCreative::LINK_TYPE, "primary" => $primary->toArray()]);
        $creatives = [$creative->toArray()];
        $adSetArray = [GeneralFacebookAdSetFields::CREATIVES => $creatives];
        $adSet = new GeneralFacebookAdSet($adSetArray);
        $adSets = [$adSet->toArray()];
        $generalBlobArray = [
            GeneralFacebookBlobFields::AD_ACCOUNT_ID => $mockAdAccountId,
            GeneralFacebookBlobFields::PAGE_ID => $mockPageId,
            GeneralFacebookBlobFields::ACCESS_TOKEN => $mockAccessToken,
            GeneralFacebookBlobFields::AD_SETS => $adSets
        ];
        $generalBlob = new GeneralFacebookBlob($generalBlobArray);
        $result = $this->sut->validate($generalBlob->toArray());
        $this->assertEquals(true, $result->getResult());
    }

} 
