<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestAjoutEvent extends FormRequest
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
            
          
            'date' => 'required|date_format:"Y-m-d"',
            'titre' => 'required|max:255',
            'message' => 'required',
            'img' => 'image|mimes:jpg,png,jpeg,gif|max:50000|dimensions:min_width=100,min_height=100,max_width=10000,max_height=10000',
        ];
    }
}
