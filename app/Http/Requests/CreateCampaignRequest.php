<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Auth;

class CreateCampaignRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check() && $this->ajax();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'campaign_name' => 'required|unique:campaign_master,campaign_title'
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'campaign_name.required' => 'Campaign Name is required',
            'campaign_name.unique' => 'Campaign Name has already been taken.'
        ];
    }
}
