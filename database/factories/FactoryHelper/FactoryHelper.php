<?php

namespace Database\Factories\FactoryHelper;

class FactoryHelper
{
    public static function getRandomModelId(string $model)
    {
        $count = $model::count();
        if($count === 0){
            return $model::factory()->create()->id;
        } else {
            return rand(1, $count);
        }
    }
}
