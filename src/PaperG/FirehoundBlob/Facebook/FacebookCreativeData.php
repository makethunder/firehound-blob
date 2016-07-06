<?php
/**
 * Created by PhpStorm.
 * User: allentsai
 * Date: 7/6/16
 * Time: 5:23 PM
 */

namespace PaperG\FirehoundBlob\Facebook;


use PaperG\FirehoundBlob\BlobInterface;
use PaperG\FirehoundBlob\Utility;

class FacebookCreativeData implements BlobInterface
{
    use Utility;

    const MEDIA_URL = "media_url";
    const CALL_TO_ACTION = "call_to_action";
    const MESSAGE = "message";
    const CAPTION = "caption";
    const LANDING_PAGE = "landing_page";
    const VERSION = "version";
    const NAME = "name";
    const DESCRIPTION = "description";
    const VARIATION_ID = 'variation_id';

    const CURRENT_VERSION = 1;

    //base creative, usually for Facebook
    private $mediaUrl = null;
    private $callToAction = null;
    private $message = null;
    private $caption = null;
    private $landingPage = null;
    private $name = null;
    private $description = null;
    private $variationId = null;

    public function __construct($array = null)
    {
        $this->fromArray($array);
    }

    /**
     * @param null $callToAction
     */
    public function setCallToAction($callToAction)
    {
        $this->callToAction = $callToAction;
    }

    /**
     * @return null
     */
    public function getCallToAction()
    {
        return $this->callToAction;
    }

    /**
     * @param null $caption
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
    }

    /**
     * @return null
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @param null $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param null $landingPage
     */
    public function setLandingPage($landingPage)
    {
        $this->landingPage = $landingPage;
    }

    /**
     * @return null
     */
    public function getLandingPage()
    {
        return $this->landingPage;
    }

    /**
     * @param null $mediaUrl
     */
    public function setMediaUrl($mediaUrl)
    {
        $this->mediaUrl = $mediaUrl;
    }

    /**
     * @return null
     */
    public function getMediaUrl()
    {
        return $this->mediaUrl;
    }

    /**
     * @param null $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return null
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param null $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param null $variationId
     */
    public function setVariationId($variationId)
    {
        $this->variationId = $variationId;
    }

    /**
     * @return null
     */
    public function getVariationId()
    {
        return $this->variationId;
    }

    public function toArray()
    {
        return [
            self::MEDIA_URL => $this->getMediaUrl(),
            self::CALL_TO_ACTION => $this->getCallToAction(),
            self::MESSAGE => $this->getMessage(),
            self::CAPTION => $this->getCaption(),
            self::LANDING_PAGE => $this->getLandingPage(),
            self::NAME => $this->getName(),
            self::DESCRIPTION => $this->getDescription(),
            self::VARIATION_ID => $this->getVariationId(),
            self::VERSION => self::CURRENT_VERSION
        ];
    }

    public function fromArray($array)
    {
        $this->mediaUrl = $this->safeGet($array, self::MEDIA_URL);
        $this->callToAction = $this->safeGet($array, self::CALL_TO_ACTION);
        $this->message = $this->safeGet($array, self::MESSAGE);
        $this->caption = $this->safeGet($array, self::CAPTION);
        $this->landingPage = $this->safeGet($array, self::LANDING_PAGE);
        $this->name = $this->safeGet($array, self::NAME);
        $this->description = $this->safeGet($array, self::DESCRIPTION);
        $this->variationId = $this->safeGet($array, self::VARIATION_ID);
    }
} 
