<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class TentangPerusahaanController extends Controller
{
    public function index()
    {
        $i = 0;
        $companies = Company::all();
        return view('admin.pages.companies.index', compact('companies', 'i'));
    }

    public function create()
    {
        return view('admin.pages.companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'visi' => 'required',
            'misi' => 'required',
            'kebijakan' => 'required',
            'jasapelayanan' => 'required',
        ]);

        Company::create($request->all());
        return redirect()->route('admin.company.index')->with('success', 'Company created successfully.');
    }

    public function edit(Company $company)
    {
        return view('admin.pages.companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $request->validate([
            'visi' => 'required',
            'misi' => 'required',
            'kebijakan' => 'required',
            'jasapelayanan' => 'required',
        ]);

        $company->update($request->all());
        return redirect()->route('admin.company.index')->with('success', 'Company updated successfully.');
    }
}
