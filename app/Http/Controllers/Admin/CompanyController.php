<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'logo'        => 'nullable|image|mimes:png,jpg,jpeg,svg,webp|max:2048',
            'remove_logo' => 'nullable|boolean',
        ]);

        // Activities: satır satır → dizi
        $activitiesRaw = trim($request->input('activities', ''));
        $data['activities'] = $activitiesRaw
            ? array_values(array_filter(array_map('trim', explode("\n", $activitiesRaw))))
            : [];

        $data['is_active'] = $request->boolean('is_active');

        // Logo kaldır
        if ($request->boolean('remove_logo') && $company->logo) {
            Storage::disk('public')->delete($company->logo);
            $data['logo'] = null;
        }

        // Logo yükle
        if ($request->hasFile('logo')) {
            if ($company->logo) {
                Storage::disk('public')->delete($company->logo);
            }
            $data['logo'] = $request->file('logo')->store('companies/logos', 'public');
        }

        unset($data['remove_logo']);
        $company->update($data);

        return redirect()->route('admin.companies.index')->with('success', 'Şirket bilgileri güncellendi.');
    }
}
