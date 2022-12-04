<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportDescription extends Model
{
    use HasFactory;

    protected $table = 'report_description';
    protected $fillable = [
        'report_id',
        'description',
        'is_additional'
    ];

    
}
