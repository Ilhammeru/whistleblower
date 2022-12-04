<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportDocumentation extends Model
{
    use HasFactory;

    protected $table = 'report_documentation';
    protected $fillable = [
        'report_id',
        'file', 
        'type',
        'is_additional'
    ];
    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
        $path = asset('uploads/reporting/' . $this->attributes['file']);
        return $path;
    }
}
