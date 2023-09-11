<?php

namespace App\Modules\Web\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ForLegalAidRequest extends FormRequest
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
        $nid_file = Request::input('nid_file') ? Request::input('nid_file') : '';
        return [
            'name' => 'required',
            'fathers_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:11',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'description' => 'required',
            'nid_file'   => 'mimes:jpeg,png,jpg|max:1024' . $nid_file,
            'image_link'   => 'mimes:jpeg,png,jpg|max:1024' . $image,
        ];
    }
}
