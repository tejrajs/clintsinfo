<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ClientsRequest extends Request
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
            //Required Form Valadation
        	'name' => 'required',
       		'email' => 'required|email',
        	'phone' => 'required',
        	'gender' => 'required',
        	'nationality' => 'required',
        	'date_of_birth' => 'required',
        	'education' => 'required'
        ];
    }
}
