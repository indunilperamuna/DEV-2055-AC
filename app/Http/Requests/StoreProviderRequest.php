<?php

namespace App\Http\Requests;

use App\Rules\AbnValidation;
use Illuminate\Foundation\Http\FormRequest;

class StoreProviderRequest extends FormRequest
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
            'abn' => ['required|unique:providers,abn', new AbnValidation],
            'pc_phone' => 'sometimes|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'sc_phone' => 'sometimes|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'pc_email' => 'sometimes|email',
            'sc_email' => 'sometimes|email'
        ];
    }
}
