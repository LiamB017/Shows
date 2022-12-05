<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShowRequest extends FormRequest
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
        $method = $this->method();

        if($method == 'PUT') {
            return [
                'title' => ['required'],
                'genre' => ['required'],
                'synopsis' => ['required'],
                'user_rating' => ['required'],
                'creator' => ['required'],
                'seasons' => ['required'],
                'src' => ['required'],
                // The "exists" validation function checks if the networks and actors sent in the request exist in the database,
                // in the networks and actors tables respectively
                'network_id' => ['required', 'exists:networks,id'],
                'actors' =>['required', 'exists:actors,id']
               
            ];
        }

        else{
        
        
        return [
            'title' => ['sometimes','required'],
            'genre' => ['sometimes','required'],
            'synopsis' => ['sometimes','required'],
            'user_rating' => ['sometimes','required'],
            'creator' => ['sometimes','required'],
            'seasons' => ['sometimes','required'],
            'src' => ['sometimes','required'],
            'network_id' => ['required', 'exists:networks,id'],
            'actors' =>['required', 'exists:actors,id']
        ];
    }
}
}