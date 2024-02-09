<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyKnowledge extends Model
{
    use HasFactory;

    protected $table = 'company_knowledge';

    protected $fillable = [
        'company_id',
        'knowledge_id',
    ];

    public function knowledgeDetails()
    {
        return $this->hasMany(Knowledge::class, 'id', 'knowledge_id');
    }
}
