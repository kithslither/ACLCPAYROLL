<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddEmployeeRequest extends Request
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
        return [
            'Employee ID' => 'required',
            'Firstname' => 'required',
            'Middlename' => 'required',
            'Lastname' => 'required',
            'Phone' => 'required',
            'Email' => 'required',
        ];
    }
}
