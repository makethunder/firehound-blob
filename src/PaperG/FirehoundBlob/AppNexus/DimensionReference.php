<?php

namespace PaperG\FirehoundBlob\AppNexus;

class DimensionReference
{
    // These constants are the legacy PL dimension IDs
    const MEDIUM_RECTANGLE_ID = 1; // 300 x 250
    const SKYSCRAPER_ID = 2; // 160 x 600
    const LEADERBOARD_ID = 3; // 728 x  90
    const SMARTPHONE_WIDE_BANNER_ID = 4; // 320 x  50
    const SMARTPHONE_BANNER_ID = 5; // 300 x  50
    const FEATURE_PHONE_LARGE_BANNER_ID = 6; // 216 x  36
    const FEATURE_PHONE_MEDIUM_BANNER_ID = 7; // 168 x  28
    const FEATURE_PHONE_SMALL_BANNER_ID = 8; // 120 x  20
    const HALFPAGE_ID = 9; // 300 x 600
    const MOBILE_RECTANGLE_ID = 40;

    // These constants are array keys for DimensionReference method returns.
    const WIDTH = 'width';
    const HEIGHT = 'height';
    const DESKTOP = 'desktop';
    const MOBILE = 'mobile';

    // These constants are the legacy PL dimension symbolic names.
    const MEDIUM_RECTANGLE_NAME = 'medium_rectangle';
    const SKYSCRAPER_NAME = 'skyscraper';
    const LEADERBOARD_NAME = 'leaderboard';
    const SMARTPHONE_WIDE_BANNER_NAME = 'smartphone_wide_banner';
    const SMARTPHONE_BANNER_NAME = 'smartphone_banner';
    const FEATURE_PHONE_LARGE_BANNER_NAME = 'feature_phone_large_banner';
    const FEATURE_PHONE_MEDIUM_BANNER_NAME = 'feature_phone_medium_banner';
    const FEATURE_PHONE_SMALL_BANNER_NAME = 'feature_phone_small_banner';
    const HALFPAGE_NAME = 'halfpage';
    const FACEBOOK_NAME = 'DESKTOP_FEED_STANDARD';
    const FACEBOOK_CAROUSEL_NAME = 'FACEBOOK_CAROUSEL';
    const INSTAGRAM_NAME = 'INSTAGRAM_STANDARD';
    const MOBILE_RECTANGLE_NAME = 'w300_h250_pmobile';

    /**
     * Returns the ids allowed for AE
     *
     * @return array
     */
    public static function getUsableAEDimensions()
    {
        $usable = [
            self::MEDIUM_RECTANGLE_ID => [
                self::MOBILE => 0,
                'name' => self::MEDIUM_RECTANGLE_NAME
            ],
            self::SKYSCRAPER_ID => [
                self::MOBILE => 0,
                'name' => self::SKYSCRAPER_NAME
            ],
            self::LEADERBOARD_ID => [
                self::MOBILE => 0,
                'name' => self::LEADERBOARD_NAME
            ],
            self::SMARTPHONE_WIDE_BANNER_ID => [
                self::MOBILE => 1,
                'name' => self::SMARTPHONE_WIDE_BANNER_NAME
            ],
            self::HALFPAGE_ID => [
                self::MOBILE => 0,
                'name' => self::HALFPAGE_NAME
            ]
        ];
        $mobileRectangleId = self::MOBILE_RECTANGLE_ID;

        $usable[$mobileRectangleId] = [
            self::MOBILE => 1,
            'name' => self::MOBILE_RECTANGLE_NAME
        ];

        return $usable;
    }
} 
