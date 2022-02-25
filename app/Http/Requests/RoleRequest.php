<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class RoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|string|between:2,100|unique:roles,name',
            'description' => 'nullable|string',
            'active' => 'nullable|boolean'
        ];

        if ($this->method() == 'PUT') {
            $rules['name'] = 'required|string|between:2,100|unique:roles,name,' . $this->role->id . ',id';
        }

        return $rules;
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            response()->json(
                ['errors' => $errors],
                400
            )
        );
    }
}
