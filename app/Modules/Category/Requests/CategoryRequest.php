<?php

/**
 * User: Hridoy
 * Date: 26/05/18
 * Time: 9:24 AM
 */

namespace App\Modules\Category\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Request;

class CategoryRequest extends FormRequest
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
            'title'   => 'required|max:128',
            'slug' => 'required|max:128|unique:category,id,' . $this->get('id'),
            'image_link'   => 'mimes:jpeg,png,jpg,gif' . $image,
            'status' => 'required',
        ];
    }
}
