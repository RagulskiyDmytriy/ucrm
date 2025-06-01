<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\DocsEmployee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\DocsEmployeeResource;
use App\Http\Requests\StoreDocsEmployeeRequest;
use App\Http\Requests\UpdateDocsEmployeeRequest;

class DocsEmployeeController extends Controller
{
    public function index()
    {
        return DocsEmployeeResource::collection(DocsEmployee::all());
    }

   public function store(StoreDocsEmployeeRequest $request)
{
    $data = $request->validated();

    // Попробовать найти или создать документ
    $doc = \App\Models\DocsEmployee::firstOrCreate(['id' => $data['docs_id']]);

    // Попробовать найти или создать сотрудника
    $employee = \App\Models\DocsEmployee::firstOrCreate(['id' => $data['employee_id']]);

    // Проверить, нет ли уже такой связи
    $exists = DocsEmployee::where('docs_id', $doc->id)
        ->where('employee_id', $employee->id)
        ->exists();

    if ($exists) {
        return response()->json([
            'message' => 'Такая запись уже существует (docs_id + employee_id)'
        ], 409);
    }

    // Создать связь
    $record = DocsEmployee::create([
        'docs_id' => $doc->id,
        'employee_id' => $employee->id,
        'signed' => $data['signed'],
    ]);

    return DocsEmployeeResource::make($record);
}


    public function show($id)
    {
        $record = DocsEmployee::findOrFail($id);
        return DocsEmployeeResource::make($record);
    }

    public function update(UpdateDocsEmployeeRequest $request, $id)
    {
        $record = DocsEmployee::findOrFail($id);
        $record->update($request->validated());
        return DocsEmployeeResource::make($record);
    }

    public function destroy($id)
    {
        $record = DocsEmployee::findOrFail($id);
        $record->delete();
        return response()->noContent();
    }

    public function markSigned(Request $request, $id)
    {
        $record = DocsEmployee::findOrFail($id);
        $record->signed = $request->boolean('signed');
        $record->save();

        return DocsEmployeeResource::make($record);
    }
}
