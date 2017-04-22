<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarModelsRequest extends FormRequest
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
            'description' => 'required',
            'car_brand_id' => 'required',
            'tires.*' => 'exists:tires,id',
            'car_numbers.*.number' => 'required|unique:car_numbers,number,'.$this->route('car_number'),
        ];
    }
}
