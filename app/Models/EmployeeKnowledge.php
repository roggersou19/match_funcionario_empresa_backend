<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeKnowledge extends Model
{
    use HasFactory;

    protected $table = 'employee_knowledge';

    protected $fillable = [
        'employee_id',
        'knowledge_id'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function knowledge()
    {
        return $this->belongsTo(Knowledge::class);
    }
}
