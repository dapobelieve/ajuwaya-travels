<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'required|string',
            'phone' => 'required|unique:bookings|digits:11',
            'email' => 'required|unique:bookings|email',
            'seat'  => 'required|array',
            // ''
        ],[
            'name.required'   => 'Please provide your full name',
            'phone.digits'    => 'Your phone number must be 11 digits',
            'phone.required'  => 'Enter your phone number',
            'email.required'  => 'The Email field is required',
            'email.unique'    => 'That email address has already been taken',
            'seat.required'   => 'Please select your seat number(s)'
        ];
    }
}
