<?php

namespace App\Services;


class ModelCRUDService
{
    public function create($model, array $data)
    {
        return $model->create($data);
    }

    public function update($model, array $data)
    {
        return $model->update(array_filter($data));
    }

    public function delete($model)
    {
        return $model->delete();
    }
}
