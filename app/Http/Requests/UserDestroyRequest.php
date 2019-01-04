<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserDestroyRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
     public function authorize()
     {
         return !($this->route('users') == config('cms.default_user_id') ||
                    $this->route('users') == auth()->user()->id);
     }

     public function forbiddenResponse()
     {
         return redirect()->back()->with('error-message', 'You cannot delete default user or delete yourself!');
     }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
