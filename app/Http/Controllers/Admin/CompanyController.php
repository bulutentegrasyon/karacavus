<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::orderBy('order')->get();
        return view('admin.companies.index', compact('companies'));
    }

    public function edit(Company $company)
    {
        return view('admin.companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'short'       => 'required|string|max:255',
            'tagline'     => 'nullable|string|max:255',
            'sector'      => 'nullable|string|max:255',
            'established' => 'nullable|string|max:10',
            'about'       => 'nullable|string',
            'activities'  => 'nullable|string',
            'address'     => 'nullable|string|max:500',
            'map_query'   => 'nullable|string|max:500',
            'phone'       => 'nullable|string|max:50',
            'vision'      => 'nullable|string',
            'order'       => 'nullable|integer|min:0',
            'is_active'   => 'boolean',
        ]);

        // Parse activities: one per line -> array
        $activitiesRaw = trim($request->input('activities', ''));
        $data['activities'] = $activitiesRaw
            ? array_values(array_filter(array_map('trim', explode("\n", $activitiesRaw))))
            : [];

        $data['is_active'] = $request->boolean('is_active');

        $company->update($data);

        return redirect()->route('admin.companies.index')->with('success', 'Şirket bilgileri güncellendi.');
    }
}
