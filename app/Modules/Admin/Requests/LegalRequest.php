<?php

namespace App\Modules\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Request;

class LegalRequest extends FormRequest
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
        $pdf = Request::input('pdf_link') ? Request::input('pdf_link') : '';
        $image = Request::input('image_link') ? Request::input('image_link') : '';


        return [
            'name' => 'required|max:64',
            'slug' => 'required|max:64|unique:team,id,' . $this->get('id'),
            'pdf_link'   => 'mimes:pdf|nullable',
            'image_link'   => 'mimes:jpeg,png,jpg,gif,webp|max:1024|nullable',

        ];
        // dd(Request::all());
    }
}
