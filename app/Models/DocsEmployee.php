<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocsEmployee extends Model
{
    /** @use HasFactory<\Database\Factories\DocsEmployeeFactory> */
    use HasFactory;

    protected $table = 'docs_employee';
    public $timestamps = false;

    protected $fillable = [
        'docs_id',
        'employee_id',
        'position_id',
        'signed',
    ];

    public function doc()
    {
        return $this->belongsTo(Docs::class, 'docs_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
