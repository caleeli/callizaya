<?php

namespace App\Traits;

use Illuminate\Support\Facades\Validator;

trait ModelValidation
{
    public static function bootModelValidation()
    {
        static::saving(function ($model) {
            $model->validate($model->validation());
        });
    }

    public function validation()
    {
        return [];
    }

    private function validate($validations = null)
    {
        if (!$validations) {
            $validations = $this->validation();
        }
        $validations = $this->validation();
        $values = [];
        foreach ($validations as $field => $validation) {
            $values[$field] = $this->$field;
        }
        $validator = Validator::make($values, $validations);
        $validator->validate();
    }
}
