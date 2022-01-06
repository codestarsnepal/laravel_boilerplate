<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationRequest extends FormRequest
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
            'plan_id' => 'required',
            'name' => 'required|string|max:50',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'plan_id.required' => 'Plan is required!',
            'name.required' => 'Name is required!',
            'address.required' => 'Address is required!'
        ];
    }
}
