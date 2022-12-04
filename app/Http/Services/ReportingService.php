<?php

namespace App\Http\Services;

use App\Models\ReportDescription;
use App\Models\ReportDocumentation;
use App\Models\Reporting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class ReportingService {
    /**
     * Handle upload evidence
     * 
     */
    public function uploadEvidence($files, $need_to_save = false, $report_id = 0, $is_additional = false)
    {
        // get type
        $format = [];
        for ($a = 0; $a < count($files); $a++) {
            $name = $files[$a]->getClientOriginalName();
            $extension = $files[$a]->getClientOriginalExtension();
            $filename = Reporting::PREFIX_REPORTING_FILE . date('YmdHis') . '.' . $extension;
            
            // save to folder
            $files[$a]->storeAs('reporting', $filename, 'public');

            if ($need_to_save) {
                ReportDocumentation::insert([
                    'report_id' => $report_id,
                    'file' => $filename,
                    'type' => $extension,
                    'is_additional' => $is_additional,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }

            $format[] = [
                'name' => $name,
                'ext' => $extension
            ];
        }

        return $format;
    }

    /**
     * Function to store description
     */
    public function storeDescription($desc, $report_id, $is_additional = false)
    {
        ReportDescription::insert([
            'report_id' => $report_id,
            'description' => $desc,
            'is_additional' => $is_additional,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }

    /**
     * Function to track report
     * @param string ticket
     */
    public function tracking($ticket)
    {
        $data = Reporting::select(
                'id', 'ticket_number', 'token', 'name',
                'company', 'phone', 'email', 'report_time', 'scene', 'status', 'created_at'
            )
            ->with(['documentations', 'descriptions'])
            ->where('ticket_number', $ticket)
            ->first();
        
        if (!$data) {
            return false;
        }
        
        // save to cache
        $merge = [];
        $current_track = json_decode(Cache::get('report_data'), true);
        if ($current_track) {
            $merge = collect($current_track)->merge([$data])->unique('id')->values();
        } else {
            $merge[] = $data;
        }

        Cache::put('report_data', json_encode($merge));

        return true;
    }

    /**
     * Function to get detail report by given params
     * 
     * @param array params
     */
    public function detailReport($params = [])
    {
        $data = json_decode(Cache::get('report_data'), true);
        $ticket = decrypt_data($params['ticket']);
        $res = collect($data)->filter(function($item) use ($ticket) {
            return $item['ticket_number'] == $ticket;
        })->values();

        return count($res) > 0 ? $res[0] : null;
    }
}