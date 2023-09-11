<?php
namespace App\Modules\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Request;

class NoticeRequest extends FormRequest
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
            $image = Request::input('image_link')?Request::input('image_link'):'';
            return [
                'title' => 'required|max:64',
                'slug' => 'required|max:64|unique:notice_career,id,' . $this->get('id'),
                'image_link'   => 'mimes:pdf,doc,docx'.$image,
            ];
    }

}