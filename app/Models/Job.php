<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'job_categories_id-select',
        'type',
        'position',
        'location',
        'salary',
        'description',
        'name',
        'phone_number',
        'location-company',
        'thumb',
        'thumb-company'
    ];
    public function Category()
    {
        return $this->belongsTo( Job_Category::class, 'job_categories_id','id');
    }
}
