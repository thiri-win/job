<?php

namespace App\Http\Controllers;

use App\Model\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function show($id, Company $name)
    {
    	return view('company.show', [
    		'company' => Company::find($id),
    	]);
    }
}
