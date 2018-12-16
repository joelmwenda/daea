<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class BaseComposer
{

	public function compose(View $view)
	{
		$view->with('user', auth()->user());
	} 
}