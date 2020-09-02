<?php

/**
 * Short description for file
 *
 * @FileName		Common.php
 * @Created On		14 June 2014
 * @author			Harihar Kushwaha <harihar.kushwaha@srmtechsol.com>
 * @copyright		2017-2018 The PHP Group
 * @license			http://www.php.net
 * @Description		Common Helper
 */

namespace App\Helpers;

use GuzzleHttp\Exception\GuzzleException;
use DB;
use Mail;
use DateTime;
use Excel;
Use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class Common {

    public $used_symbols;
    public $pass;

  
    public static function statusName($id = null) {
//        $name = DB::table('status')->select('name')->where('id', $id)->first();
//        return $name->name;
    }

  
    /**
     * safe_b64encode for user public profile
     * @param  $string
     * @return $stringrequestQuotationVendorApproved
     */
    public static function encode($string) {
        $data = base64_encode($string);
        $data = str_replace(array('+', '/', '='), array('-', '_', ''), $data);
        return $data;
    }

    /**
     * Site version of base64_decode().
     * Security purpose
     */
    public static function decode($string) {
        $data = str_replace(array('-', '_'), array('+', '/'), $string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }


    public static function getStatus($statusId = null) {
        
        $status = DB:: table('loans')->select('loan_status')->where('id', $statusId)->first();
        
     return $status->loan_status;
    }
    public static function getEmis($loanId = null) {
        
        $emis = DB:: table('emis')->where('loan_id', $loanId)->first();
        if($emis){
            $count =1;
        }else{
            $count =0;
        }
        return $count;
    }

   



    
    
}
