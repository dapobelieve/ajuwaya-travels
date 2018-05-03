<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RouteRequest extends FormRequest
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
            'state' => 'required',
            'take_off' => 'required',
            'camp'     => 'required',
            'price'    => 'required',
            'seater'   => 'required',
            // 'ref'      => [
            //     'required',
            //     Rule::unique('routes')->ignore(Auth::user()->id),
            // ],
            'date'     => 'required'
        ];
    }

    public function messages()
    {
        return [
            'price.required' => 'Enter a price',
            'seater.required' => 'Select a bus type',
            'camp.required' =>   'Select Orientation Camp',
            'take_off.required' => 'Enter a location in the selected state',
        ];
    }
}
