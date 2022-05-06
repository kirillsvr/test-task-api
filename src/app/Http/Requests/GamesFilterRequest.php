<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GamesFilterRequest extends FormRequest
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
            'genres' => 'nullable',
            'status' => 'nullable',
            'developers' => 'nullable',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'genres' => isset($this->genres) ? explode(",", $this->genres) : null,
            'status' => isset($this->status) ? array_map(function ($value){
                return ucfirst($value);
            }, explode(",", $this->status)) : null,
            'developers' => isset($this->developers) ? explode(",", $this->developers) : null,
        ]);
    }
}
