<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'name',
    ];

    public function knowledge()
    {
        return $this->hasMany(CompanyKnowledge::class, 'company_id', 'id')->with('knowledgeDetails');
    }
}
