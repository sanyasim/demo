<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoucherCreateRequest extends FormRequest
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
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'discount' => 'bail|required|integer|digits_between:1,100|exists:discounts',
        ];
    }
    
    public function postFillData()
    {
        return [
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'discount' => $this->discount,
        ];
    }
    
    
    
}
