<?php

namespace Modules\Support;

class Bank
{
    /**
     * Path of the resource.
     *
     * @var string
     */
    const RESOURCE_PATH = __DIR__ . '/Resources/banks.php';

    /**
     * Array of all banks.
     *
     * @var array
     */
    private static $banks;

    /**
     * Array of supported banks by the app.
     *
     * @var array
     */
    private static $supported;

    /**
     * Get all banks.
     *
     * @return array
     */
    public static function all()
    {
        if (is_null(self::$banks)) {
            self::$banks = require self::RESOURCE_PATH;
        }

        return self::$banks;
    }

    /**
     * Get all supported banks.
     *
     * @return array
     */
    public static function supported()
    {
        if (! is_null(self::$supported)) {
            return self::$supported;
        }

        $supportedBank = setting('supported_banks');

        return self::$supported = array_filter(static::all(), function ($code) use ($supportedBank) {
            return in_array($code, $supportedBank);
        }, ARRAY_FILTER_USE_KEY);
    }

    /**
     * Get all Bank codes.
     *
     * @return array
     */
    public static function codes()
    {
        return array_keys(self::all());
    }

    /**
     * Get supported country codes.
     *
     * @return array
     */
    public static function supportedCodes()
    {
        return array_keys(self::supported());
    }

    /**
     * Get name of the given country code.
     *
     * @param string $code
     * @return string
     */
    public static function name($code)
    {
        return array_get(self::all(), $code . '.name');
    }
}
