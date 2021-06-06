<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function getCompany()
    {
        return Company::paginate(25);
    }
    public function index()
    {
        return view('companies.list-company', ["companies" => $this->getCompany()]);
    }
}
