<?php

/**
 * User: Dev. Hridoy
 * Date: 20/02/20
 * Time: 10:40 AM
 */

namespace App\Modules\Blog\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Request;

class BlogRequest extends FormRequest
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
            'category_id'   => 'required',
            'date'   => 'required',
            'title'   => 'required|max:256',
            'slug' => 'required|max:256|unique:category,id,' . $this->get('id'),
            'image_link'   => 'mimes:jpeg,png,jpg,gif' . $image,
            'status' => 'required',
        ];
    }
}
