<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CategoryDestroyRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !($this->route('categories') == config('cms.default_category_id'));
    }

    public function forbiddenResponse()
    {
        return redirect()->back()->with('error-message', 'You cannot delete default category!');
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
