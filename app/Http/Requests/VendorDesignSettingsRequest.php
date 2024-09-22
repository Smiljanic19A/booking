<?php

namespace App\Http\Requests;

use AllowDynamicProperties;
use Illuminate\Foundation\Http\FormRequest;

#[AllowDynamicProperties] class VendorDesignSettingsRequest extends FormRequest
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
            "template_id" => "required|int",
            "primary_color" => "nullable|string",
            "secondary_color" => "nullable|string",
            "accent_color" => "nullable|string",
            "logo" => "nullable|mimes:jpg,png|max:102400"
        ];
    }
}
