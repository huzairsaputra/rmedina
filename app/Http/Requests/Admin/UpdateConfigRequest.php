<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Config;

class UpdateConfigRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
        $id = $this->route('config');
        $rules = [
            'key'=>['required', 'unique:configs,key,'.$id, 'regex:/^[A-Z0-9_]*$/']
        ];
        return $rules;
    }
}
