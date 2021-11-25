<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProviderRequest extends FormRequest
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
            'company_name' => 'sometimes|string',
            'trading_name' => 'sometimes|string',
            'abn' => 'required|unique:providers,abn,'.$this->provider->slug.',slug',
            'pc_phone' => 'sometimes|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'sc_phone' => 'sometimes|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ];
    }
}
