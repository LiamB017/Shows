<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShowRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required'],
            'genre' => ['required'],
            'synopsis' => ['required'],
            'user_rating' => ['required'],
            'creator' => ['required'],
            'seasons' => ['required'],
            'src' => ['required'],
            'network_id' => ['required'],
            'actors' =>['required', 'exists:actors,id']
        ];
    }
}
