<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DocsEmployeeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'docs_id' => $this->docs_id,
            'employee_id' => $this->employee_id,
            'position_id' => $this->position_id,
            'signed' => $this->signed,
        ];
    }
}
