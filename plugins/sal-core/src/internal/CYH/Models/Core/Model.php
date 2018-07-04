<?php


namespace CYH\Models\Core;


abstract class Model
{
    public static function CreateFromObject($obj)
    {
        $vars = array_keys(get_object_vars($obj));
        $class = get_called_class();

        $mappedObject = new $class();
        //attempting to map properties of object to current model
        foreach ($vars as $prop)
        {
            if (property_exists($class, $prop)) {
                $mappedObject->$prop = $obj->$prop;
            }
        }

        return $mappedObject;
    }

    public static function CreateFromArray(array $data)
    {
        $vars = array_keys($data);
        $class = get_called_class();

        $mappedObject = new $class();
        //attempting to map properties of object to current model
        foreach ($vars as $prop)
        {
            if (property_exists($class, $prop)) {
                $mappedObject->$prop = $data[$prop];
            }
        }

        return $mappedObject;
    }

    //case insensitive property assigning
    public static function CreateFromArrayCI(array $data, $accessLevel = MappedPropsAccessLevels::ALL_NONSTATIC)
    {
        $vars = array_keys($data);
        $class = get_called_class();

        $mappedObject = new $class();

        $classReflector = new \ReflectionClass($class);
        $propsList = $classReflector->getProperties($accessLevel);

        $mappedPropsList = [];
        foreach ($propsList as $property) {
            $mappedPropsList[strtolower($property->getName())] = $property->getName();
        }

        //attempting to map properties of object to current model
        foreach ($vars as $key)
        {
            if (isset($mappedPropsList[strtolower($key)]))
            {
                $fieldName = $mappedPropsList[strtolower($key)];
                $mappedObject->$fieldName = $data[$key];
            }
        }

        return $mappedObject;
    }
}