<?php

namespace App\Modules\Web\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class LegalAidPanelRequest extends FormRequest
{
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
        $image = Request::input('image_link') ? Request::input('image_link') : '';

        return [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:11',
            'education' => 'required',
            'institute' => 'required',
            'present_address' => 'required',
            'description' => 'required',
            'image_link'   => 'mimes:jpeg,png,jpg|max:1024' . $image,
        ];
    }
}
