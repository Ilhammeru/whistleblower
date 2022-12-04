<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reporting extends Model
{
    use HasFactory;

    const PREFIX_REPORTING_FILE = 'reporting-';

    protected $table = 'report';
    protected $fillable = [
        'ticket_number',
        'token',
        'name',
        'company',
        'phone',
        'email',
        'report_time',
        'scene',
        'status'
    ];
    protected $appends = [
        'report_time_text', 'status_text',
        'original_description', 'additional_description',
        'original_evidence', 'additional_evidence'
    ];

    public function documentations():HasMany
    {
        return $this->hasMany(ReportDocumentation::class, 'report_id', 'id');
    }

    public function descriptions():HasMany
    {
        return $this->hasMany(ReportDescription::class, 'report_id', 'id');
    }

    public function getOriginalEvidenceAttribute()
    {
        $ori = null;
        $images = $this->documentations;
        if (count($images) > 0) {
            $ori = collect($images)->filter(function($item) {
                return !$item->is_additional;
            })->values();
        }

        return $ori;
    }

    public function getAdditionalEvidenceAttribute()
    {
        $ori = null;
        $images = $this->documentations;
        if (count($images) > 0) {
            $ori = collect($images)->filter(function($item) {
                return $item->is_additional;
            })->values();
        }

        return $ori;
    }

    public function getOriginalDescriptionAttribute()
    {
        $ori = null;
        $descriptions = $this->descriptions;
        if (count($descriptions) > 0) {
            $ori = collect($descriptions)->filter(function($item) {
                return !$item->is_additional;
            })->values()[0];
        }

        return $ori;
    }

    public function getAdditionalDescriptionAttribute()
    {
        $additional = null;
        $descriptions = $this->descriptions;
        if (count($descriptions) > 0) {
            $additional = collect($descriptions)->filter(function($item) {
                return $item->is_additional;
            })->values();
        }

        return $additional;
    }

    public function getReportTimeTextAttribute()
    {
        $month = set_local_time($this->attributes['report_time']);
        $year = date('Y', strtotime($this->attributes['report_time']));
        $day = set_local_day($this->attributes['report_time']);
        $date = date('d', strtotime($this->attributes['report_time']));

        return $day . ', ' . $date . ' ' . $month . ' ' . $year; 
    }

    public function getStatusTextAttribute()
    {
        $status = $this->attributes['status'];

        $text = '';
        if ($status == 1) {
            $text = __('view.accept');
        } else if ($status == 2) {
            $text = __('view.reject');
        } else if ($status == 3) {
            $text = __('view.less_evidence');
        } else if ($status == 4) {
            $text = __('view.on_process');
        } else if ($status == 5) {
            $text = __('view.proven');
        } else if ($status == 6) {
            $text = __('view.not_proven');
        }

        return $text;
    }
}
