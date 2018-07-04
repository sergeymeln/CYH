<?php


namespace CYH\Models\Core\Factory;


interface IFactory
{
    static function CreateFromArray(array $input);
}