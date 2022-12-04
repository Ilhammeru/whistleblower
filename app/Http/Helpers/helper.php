<?php

/**
 * Function to get user role in text and id
 * 
 * @return void
 */

use Illuminate\Support\Facades\App;
use Spatie\Permission\Models\Role;

if (!function_exists('get_user_role')) {
    function get_user_role()
    {
        $role_id = auth()->user()->role;

        $roles = Role::all();
        
    }
}

if (!function_exists('generate_token')) {
    function generate_token()
    {
        $char = '0123456789';
        $rand = '';

        for ($i = 0; $i < 4; $i++) {
        $index = rand(0, strlen($char) - 1);
        $rand .= $char[$index];
        }

        return $rand;
    }
}

if (!function_exists('generate_ticket')) {
    function generate_ticket()
    {
        $char = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $rand = '';

        for ($i = 0; $i < 5; $i++) {
            $index = rand(0, strlen($char) - 1);
            $rand .= $char[$index];
        }

        return $rand . '/' . date('Y');
    }
}

if (!function_exists('encrypt_data')) {
    function encrypt_data($data)
    {
        // $cipher = env('CIPHER');
        // $iv_length = openssl_cipher_iv_length($cipher);
        // $options = 0;
        // $encryption_iv = env('ENCRYPT_IV');
        // $encryption_key = env('ENCRYPT_KEY');
        // $res = openssl_encrypt($data, $cipher, $encryption_key, $options, $encryption_iv);
        $res = strtr(base64_encode($data), '+/=', '-__');
        return $res;
    }
}

if (!function_exists('decrypt_data')) {
    function decrypt_data($data)
    {
        // $cipher = env('CIPHER');
        // $iv_length = openssl_cipher_iv_length($cipher);
        // $options = 0;
        // $encryption_iv = env('ENCRYPT_IV');
        // $encryption_key = env('ENCRYPT_KEY');
        // $res = openssl_decrypt($data, $cipher, $encryption_key, $options, $encryption_iv);
        $res = strtr(base64_decode($data), '+_=', '-/_');
        return $res;
    }
}

if (!function_exists('set_local_time')) {
    function set_local_time($data)
    {
        $m = date('m', strtotime($data));
        $local = App::getLocale();
        if ($local == 'in') {
            switch ($m) {
                case '01':
                    $month = 'Januari';
                    break;
                
                case '02':
                    $month = 'Febuari';
                    break;

                case '03':
                    $month = 'Maret';
                    break;

                case '04':
                    $month = 'April';
                    break;

                case '05':
                    $month = 'Mei';
                    break;

                case '06':
                    $month = 'Juni';
                    break;

                case '07':
                    $month = 'Juli';
                    break;

                case '08':
                    $month = 'Agustus';
                    break;
                
                case '09':
                    $month = 'September';
                    break;

                case '10':
                    $month = 'Oktober';
                    break;

                case '11':
                    $month = 'November';
                    break;
                
                case '12':
                    $month = 'Desember';
                    break;
                
                default:
                    $month = 'Unset';
                    break;
            }

            return $month;
        }

        return "Don't set locale";
    }
}

if (!function_exists('set_local_day')) {
    function set_local_day($data) {
        $d = strtolower(date('D', strtotime($data)));
        if (App::getLocale() == 'in') {
            switch ($d) {
                case 'sun':
                    $day = 'Minggu';
                    break;

                case 'mon':
                    $day = 'Senin';
                    break;

                case 'tue':
                    $day = 'Selasa';
                    break;

                case 'wed':
                    $day = 'Rabu';
                    break;

                case 'thu':
                    $day = 'Kamis';
                    break;

                case 'fri':
                    $day = 'Jumat';
                    break;

                case 'sat':
                    $day = 'Sabtu';
                    break;
                
                default:
                    $day = 'Unset';
                    break;
            }

            return $day;
        }

        return "Don't have locale";
    }
}