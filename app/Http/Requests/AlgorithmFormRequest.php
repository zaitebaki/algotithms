<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlgorithmFormRequest extends FormRequest
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
        return [
            'groupId' => 'bail|required|exists:App\Group,id',
            'nameAlgorithm' => 'bail|required|max:255',
            'codeTextArea' => 'bail|required|max:2000',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязательно к заполнению.',
            'max' => 'Поле :attribute не должно превышать :max символов.',
        ];
    }
}
