<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; // ✅ вот эту строку ты забыл

class DocsEmployee extends Model
{
    use HasFactory;

    protected $table = 'docs_employee';
    protected $primaryKey = 'id';
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
