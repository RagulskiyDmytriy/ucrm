<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocsEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

  public function rules()
{
    return [
        'docs_id' => ['required', 'integer'], // убрать exists
        'employee_id' => ['required', 'integer'],
        'signed' => ['required', 'boolean'],
    ];
}
}
