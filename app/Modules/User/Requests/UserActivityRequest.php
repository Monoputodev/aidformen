<?php
/**
  * User: Hridoy
 * Date: 25/05/18
 * Time: 9:27 AM
 */

namespace App\Modules\User\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserActivityRequest extends FormRequest
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

            return [
                'ip_address' => 'required|max:32',
                'actionname' => 'required|max:32',
                'action_url' => 'required|max:32',
                'action_table' => 'required|max:32',
                'users_id' => 'required|max:10',
                'date' => 'required|date'
               
            ];

    }

}