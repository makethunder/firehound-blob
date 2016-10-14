<?php

namespace PaperG\Common\Test\Facebook\Validators;

use PaperG\FirehoundBlob\Facebook\FacebookCreative;
use PaperG\FirehoundBlob\Facebook\FacebookCreativeData;
use PaperG\FirehoundBlob\Facebook\Validators\FacebookCreativeValidator;
use PaperG\FirehoundBlob\Facebook\Values\FacebookAdType;

class FacebookCreativeValidatorTest extends \FirehoundBlobTestCase
{
    /**
     * @var FacebookCreativeValidator
     */
    private $sut;

    public function setUp()
    {
        $this->sut = new FacebookCreativeValidator();
    }

    public function testValidateCarouselReturnsTrue()
    {
        $carouselArray = [
            FacebookCreative::PRIMARY => [],
            FacebookCreative::TYPE => FacebookAdType::CAROUSEL,
            FacebookCreative::CHILD_ATTACHMENTS => [
                [
                    FacebookCreativeData::NAME => "mockName",
                    FacebookCreativeData::MEDIA_URL => "mediaUrl"
                ]
            ]
        ];
        $fc = new FacebookCreative($carouselArray);
        $result = $this->sut->validate($fc);
        $this->assertTrue($result->getResult());
    }

    public function testValidateCarouselReturnsFalse()
    {
        $carouselArray = [
            FacebookCreative::PRIMARY => [],
            FacebookCreative::TYPE => FacebookAdType::CAROUSEL,
            FacebookCreative::CHILD_ATTACHMENTS => [
                [
                    FacebookCreativeData::NAME => "name"
                ]
            ]
        ];
        $fc = new FacebookCreative($carouselArray);
        $result = $this->sut->validate($fc);
        $expectedMessage = '[child_attachments[0].media_url] NULL value found, but a string is required. '
            . '[child_attachments[0]] Failed to match all schemas. '
            . '[primary.media_url] NULL value found, but a string is required. '
            . '[primary.name] NULL value found, but a string is required. [primary] Failed to match all schemas. '
            . '[type] Does not have a value in the enumeration ["link"]. '
            . '[child_attachments] Array value found, but a null is required. [] Failed to match exactly one schema.';
        $this->assertFalse($result->getResult());
        $this->assertEquals($expectedMessage, $result->getMessage());
    }

    public function testValidateLinkReturnsTrue()
    {
        $carouselArray = [
            FacebookCreative::PRIMARY => [
                FacebookCreativeData::NAME => "name",
                FacebookCreativeData::MEDIA_URL => "media url"
            ],
            FacebookCreative::TYPE => FacebookAdType::LINK,
            FacebookCreative::CHILD_ATTACHMENTS => null
        ];
        $fc = new FacebookCreative($carouselArray);
        $result = $this->sut->validate($fc);
        $this->assertTrue($result->getResult());
    }

    public function testValidateLinkReturnsFalse()
    {
        $carouselArray = [
            FacebookCreative::PRIMARY => [
                FacebookCreativeData::NAME => 'name'
            ],
            FacebookCreative::TYPE => FacebookAdType::LINK,
            FacebookCreative::CHILD_ATTACHMENTS => null
        ];
        $fc = new FacebookCreative($carouselArray);
        $result = $this->sut->validate($fc);
        $expectedMessage = '[type] Does not have a value in the enumeration ["carousel"]. '
            . '[child_attachments] NULL value found, but an array is required. '
            . '[primary.media_url] NULL value found, but a string is required. '
            . '[primary] Failed to match all schemas. '
            . '[] Failed to match exactly one schema.';
        $this->assertFalse($result->getResult());
        $this->assertEquals($expectedMessage, $result->getMessage());
    }
} 
