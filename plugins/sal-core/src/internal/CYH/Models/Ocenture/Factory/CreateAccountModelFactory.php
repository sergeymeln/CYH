<?php

namespace CYH\Models\Ocenture\Factory;

use CYH\Models\Core\Factory\IFactory;
use CYH\Models\Ocenture\CreateAccountModel;

class CreateAccountModelFactory implements IFactory
{
    public static function CreateFromArray(array $input): CreateAccountModel
    {
        if (!empty($input))
        {
            $model = CreateAccountModel::CreateFromArrayCI($input);
            /* @var $model CreateAccountModel */
            $model->Birthday = (new \DateTime())->setDate($input['dobYear'], $input['dobMonth'], $input['dobDay'])->setTime(0,0);
        }
        else
        {
            $model = new CreateAccountModel();
        }

        return $model;
    }

}