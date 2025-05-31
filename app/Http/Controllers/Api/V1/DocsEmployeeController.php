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
        $record = DocsEmployee::create($request->validated());
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
