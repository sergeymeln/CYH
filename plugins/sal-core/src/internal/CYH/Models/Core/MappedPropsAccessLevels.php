<?php
/**
 * Created by PhpStorm.
 * User: npyat
 * Date: 11/28/2017
 * Time: 1:22 PM
 */

namespace CYH\Models\Core;


class MappedPropsAccessLevels
{
    const ALL = \ReflectionProperty::IS_PRIVATE | \ReflectionProperty::IS_PROTECTED | \ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_STATIC;
    const ALL_NONSTATIC = \ReflectionProperty::IS_PRIVATE | \ReflectionProperty::IS_PROTECTED | \ReflectionProperty::IS_PUBLIC;
    const PUBLIC = \ReflectionProperty::IS_PUBLIC;
}