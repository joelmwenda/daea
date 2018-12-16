<?php

namespace App;

class Lookup
{

	public static $class_array = [
		'deductions' => 'App\Deduction',
		'emails' => 'App\Email',
		'expenses' => 'App\Expense',
		'fees' => 'App\Fee',
		'incomes' => 'App\Income',
		'journals' => 'App\Journal',
		'journal_purchases' => 'App\JournalPurchase',
		'occasions' => 'App\Occasion',
		'occasion_registrations' => 'App\OccasionRegistration',
		'payments' => 'App\Payment',
		'registration' => 'App\Registration',
		'users' => 'App\User',
		'user_types' => 'App\UserType',
	];

	public static function retrieve_raw($retrieve_array)
	{
		if(is_array($retrieve_array)){
			$data = [];
			foreach ($retrieve_array as $key => $value) {
				$class = self::$class_array[$value];
				$data[$value] = $class::all();
			}
			return $data;
		}
		else{
			$class = self::$class_array[$retrieve_array];
			return [$retrieve_array => $class::all()];
		}
	}

	public static function retrieve($retrieve_array)
	{
		// self::cacher();

		if(is_array($retrieve_array)){
			$data = [];
			foreach ($retrieve_array as $key => $value) {
				$data[$value] = self::retrieve_one($value);
			}
			return $data;
		}
		else{
			return [$retrieve_array => self::retrieve_one($retrieve_array)];
		}
	}

	private static function retrieve_one($key)
	{
		if(isset(self::$cache_array[$key])){
			$data = Cache::get($key);
		}
		else{
			$class = self::$class_array[$retrieve_array];
			return $class::all();
		}
		if($data){
			return $data;
		}else{
			$class = self::$cache_array[$key];
			self::refresh_element($class);
			return self::retrieve_one($key);
		}
	}

	public static function refresh_one($key)
	{
		$data = self::$class_array[$key]::all();
		Cache::forget($key);
		Cache::put($key, $data, 60);
	}

	public static function refresh_element($class)
	{
		// $class = get_class($model);
		$class_array = explode('\\', $class);
		$cache_key = str_plural(snake_case($class_array[1]));
		$data = $class::all();
		Cache::forget($cache_key);
		Cache::put($cache_key, $data, 60);
	}

	public static function cacher()
	{
        if(Cache::has('user_types')){}

        else{
        	foreach (self::$cache_array as $key => $value) {
        		$data = $value::all();
        		Cache::put($key, $data, 60);
        	}
        }
    }

	public static function clear_cache()
    {
    	foreach (self::$cache_array as $key => $value) {
    		Cache::forget($key);
    	}
    }


    public static function refresh_cache()
    {
        self::clear_cache();
        self::cacher();
    }
}
