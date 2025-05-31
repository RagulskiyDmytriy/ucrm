<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocsEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'docs_id' => ['required', 'integer', 'exists:docs,docs_id'],
            'employee_id' => ['required', 'integer', 'exists:employee,employee_id'],
            'position_id' => ['nullable', 'integer'],
            'signed' => ['required', 'boolean'],
        ];
    }
}
