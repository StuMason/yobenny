<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewEvent extends FormRequest
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
            "title" => "required",
            "start_date" => "required|date",
            "end_date" => "required|date",
            "start_time" => "required",
            "end_time" => "required",
            "image_url" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "description" => "required",
            "country" => "required",
            "latitude" => "required",
            "longitude" => "required",
            "postal_code" => "required",
            "route" => "required",
            "street_number" => "required",
            "google_json" => "required",
            "tags" => "required",
        ];
    }
}
