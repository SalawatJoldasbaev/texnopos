<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function update(CompanyRequest $companyRequest){
        $company =  Company::first();
        $company->update($companyRequest->all());
        return ResponseControler::success('Successfuly edited');
    }

    public function getCompany(){
        return ResponseControler::data(Company::first());
    }
}
