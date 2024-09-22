<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "vendor_id" => "required|int",
            "service_id" => "required|int",
            "name" => "required|string|max:244",
            "price" => "required|int|min:0",
            "duration_in_minutes" => "required|int|min:0",
            "description" => "nullable|string"
        ];
    }
}
