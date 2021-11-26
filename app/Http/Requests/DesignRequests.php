<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DesignRequests extends FormRequest
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
          'active' => 'filled',
          'title' => 'nullable|string|max:255',
          'subtitle' => 'nullable|string|max:255',
          'description' => 'nullable|string|max:255',
          'hero' => 'image|max:5000',
          'logo' => 'image|max:5000',
          'color' => 'string|max:255',
        ];
    }
}
