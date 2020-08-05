<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuration;

class ConfigurationController extends Controller
{
	public function index()
	{
    $configurations = Configuration::all();
	return view('admin.configurations.index',compact('configurations'));
	}

	
}


