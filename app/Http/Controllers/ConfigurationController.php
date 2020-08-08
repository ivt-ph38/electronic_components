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
	
	public function edit($id)
	{
		$configuration = Configuration::find($id);
		return view('admin.configurations.edit',compact('configuration'));
	}

	public function update(ConfigurationUpdateRequest $request, $id)
	{
		$configuration = Configuration::find($id);

		$configuration->value = $request->value;
		$configuration->save();

		return redirect(route('admin.configurations.index'))->with('success', 'Cập nhật cấu hình thành công.');
	}	
	
}


