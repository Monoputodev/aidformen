<?php

namespace App\Modules\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SponsorRequest extends FormRequest
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
        // $image = Request::input('image_link') ? Request::input('image_link') : '';
        // dd($image);
        return [
            'name' => 'required|max:64',
            'slug' => 'required|max:64|unique:team,id,' . $this->get('id'),
            'image_link'   => 'mimes:jpeg,png,jpg,gif,webp|max:1024',

        ];
    }
}
