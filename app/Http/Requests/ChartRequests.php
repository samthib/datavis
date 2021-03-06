<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChartRequests extends FormRequest
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
          'title' => 'required|string|max:255',
          'subtitle' => 'nullable|string|max:255',
          'description' => 'nullable|string',
          'js' => 'nullable|string',
          'css' => 'nullable|string',
          'libraries.*' => 'integer',
          'datas.*' => 'integer',
          'files.*' => 'integer',
          'medias.*' => 'integer',
          'available' => 'filled',
        ];
    }
}
