<?php

namespace App;

use App\BaseModel;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomMail;
use App\Mail\CustomEmailFiles;
use Exception;

class Email extends BaseModel
{

    /**
     * Get the user's full name
     *
     * @return string
     */
    public function getContentAttribute()
    {
        return $this->get_raw();
    }

    public function getSendingHourAttribute()
    {
        if($this->time_to_be_sent) return date('H', strtotime($this->time_to_be_sent));
        return null;
    }

    public function getSendingDayAttribute()
    {
        if($this->time_to_be_sent) return date('Y-m-d', strtotime($this->time_to_be_sent));
        return null;
    }

    public function demo_email($recepient)
    {
        $this->save_blade();
        $comm = new CustomMail($this, null);
        Mail::to([$recepient])->send($comm);
        $this->delete_blade();
    }

    public function dispatch()
    {
        $this->save_blade();
        ini_set("memory_limit", "-1");
        $facilities = \App\Facility::where('flag', 1)->get();
        
        $this->sent = true;
        $this->save();

        $cc_array = $this->comma_array($this->cc_list);
        $bcc_array = $this->comma_array($this->bcc_list);
        $bcc_array = array_merge($bcc_array, ['joelkith@gmail.com']);

        foreach ($facilities as $key => $facility) {
        	$mail_array = $facility->email_array;
            if(!$mail_array) continue;
        	$comm = new CustomMail($this, $facility);
        	try {
	        	Mail::to($mail_array)->cc($cc_array)->bcc($bcc_array)->send($comm);
	        } catch (Exception $e) {
        	
	        }
        	// break;
        }
        
        // $this->send_files();
        $this->delete_blade();
    }

    public function send_files()
    {
        $comm = new CustomEmailFiles($this);
        $mail_array = array('joelkith@gmail.com');
        Mail::to($mail_array)->send($comm);
    }

    public function save_raw($email_string)
    {
    	if(!is_dir(storage_path('app/emails'))) mkdir(storage_path('app/emails'), 0777, true);

    	$filename = storage_path('app/emails') . '/' . $this->id . '.txt';

    	file_put_contents($filename, $email_string);
    }

    public function get_raw()
    {
    	if(!is_dir(storage_path('app/emails'))) mkdir(storage_path('app/emails'), 0777, true);

    	$filename = storage_path('app/emails') . '/' . $this->id . '.txt';
    	if(!file_exists($filename)) return null;
    	return file_get_contents($filename);
    }

    public function save_blade()
    {
    	$filename = storage_path('app/emails') . '/' . $this->id . '.txt';
    	$blade = base_path('resources/views/emails') . '/' . $this->id . '.blade.php';

    	$str = file_get_contents($filename);
        $fac_name = '{{ $facility->name ?? ' . "'(Facility Name Here)'"  . ' }}';
        $str = str_replace(':facilityname', $fac_name, $str);
    	if($this->signature) $str .= " @include('emails.signature') ";
    	file_put_contents($blade, $str);
    }

    public function delete_blade()
    {
    	$blade = base_path('resources/views/emails') . '/' . $this->id . '.blade.php';
    	unlink($blade);
    }

    public function delete_raw()
    {
        $filename = storage_path('app/emails') . '/' . $this->id . '.txt';
        if(file_exists($filename)) unlink($filename);
    }

    public function comma_array($str)
    {
        if(!$str || $str == '') return [];
        $emails = explode(',', $str);

        $mail_array = [];

        foreach ($emails as $key => $value) {
            if(str_contains($value, '@')) $mail_array[] = trim($value);
        }
        return $mail_array;
    }
}
