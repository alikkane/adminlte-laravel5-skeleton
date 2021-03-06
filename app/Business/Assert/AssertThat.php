<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 26/12/16
 * Time: 17:07
 */

namespace App\Business\Assert;


use App\Business\Exception\BusinessException;
use Webmozart\Assert\Assert as BaseAssert;

class AssertThat extends BaseAssert
{
    /**
     * @param $message
     * @throws BusinessException
     */
    protected static function reportInvalidArgument($message)
    {
        try {
            parent::reportInvalidArgument($message);
        } catch (\InvalidArgumentException $e) {
            throw new BusinessException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @param $value
     * @param string $message
     */
    public static function false($value, $message = '')
    {
        if (false !== boolval($value)) {
            static::reportInvalidArgument(sprintf(
                $message ?: 'Expected a value to be false. Got: %s',
                static::valueToString($value)
            ));
        }
    }

    /**
     * @param $value
     * @param string $message
     */
    public static function true($value, $message = '')
    {
        if (true !== boolval($value)) {
            static::reportInvalidArgument(sprintf(
                $message ?: 'Expected a value to be true. Got: %s',
                static::valueToString($value)
            ));
        }
    }

    /**
     * @param $value
     * @param array $values
     * @param string $message
     */
    public static function in($value, array $values, $message = '')
    {
        if (!in_array($value, $values)) {
            static::reportInvalidArgument(sprintf(
                $message ?: 'Expected a value to be in the array values. Got: %s',
                static::valueToString($value)
            ));
        }
    }

    /**
     * @param $value
     * @param array $values
     * @param string $message
     */
    public static function notIn($value, array $values, $message = '')
    {
        if (in_array($value, $values)) {
            static::reportInvalidArgument(sprintf(
                $message ?: 'Expected a value to not be in the array values. Got: %s',
                static::valueToString($value)
            ));
        }
    }

    public static function countGreaterThan($array, $number, $message = '')
    {
        static::greaterThan(
            count($array),
            $number,
            $message ?: sprintf('Expected an array to contain > %d elements. Got: %d.', $number, count($array))
        );
    }

    public static function countGreaterThanEq($array, $number, $message = '')
    {
        static::greaterThanEq(
            count($array),
            $number,
            $message ?: sprintf('Expected an array to contain >= %d elements. Got: %d.', $number, count($array))
        );
    }

    public static function countLessThan($array, $number, $message = '')
    {
        static::lessThan(
            count($array),
            $number,
            $message ?: sprintf('Expected an array to contain < %d elements. Got: %d.', $number, count($array))
        );
    }

    public static function countLessThanEq($array, $number, $message = '')
    {
        static::lessThanEq(
            count($array),
            $number,
            $message ?: sprintf('Expected an array to contain <= %d elements. Got: %d.', $number, count($array))
        );
    }

    /**
     * @param $value
     * @param array $values
     * @param string $message
     */
    public static function nullOrIn($value, array $values, $message = '')
    {
        if (is_null($value) || !in_array($value, $values)) {
            static::reportInvalidArgument(sprintf(
                $message ?: 'Expected a value to be null or in the array values. Got: %s',
                static::valueToString($value)
            ));
        }
    }

    /**
     * @param $value
     * @param array $values
     * @param string $message
     */
    public static function nullOrNotIn($value, array $values, $message = '')
    {
        if (is_null($value) || in_array($value, $values)) {
            static::reportInvalidArgument(sprintf(
                $message ?: 'Expected a value to br null or not be in the array values. Got: %s',
                static::valueToString($value)
            ));
        }
    }
}