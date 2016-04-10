<?php
namespace Doctrineum\String;

use Doctrineum\Scalar\ScalarEnum;
use Granam\Scalar\Tools\ToString;

/**
 * @method string getValue
 */
class StringEnum extends ScalarEnum
{
    const STRING_ENUM = 'string_enum';

    /**
     * @param bool|float|int|string|null|object $enumValue
     *
     * @return string
     */
    protected static function convertToEnumFinalValue($enumValue)
    {
        try {
            return ToString::toString($enumValue);
        } catch (\Granam\Scalar\Tools\Exceptions\WrongParameterType $exception) {
            throw new Exceptions\UnexpectedValueToEnum($exception->getMessage(), $exception->getCode(), $exception);
        }
    }

}
