<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VehicleController extends Controller
{
    const CATEGORIES = [
        'arazi_suv' => 'Arazi & SUV',
        'otomobil'  => 'Otomobil',
        'minivan'   => 'Minivan & Panelvan',
        'ticari'    => 'Ticari Araçlar',
    ];

    public function index(Request $request)
    {
        $category = $request->get('category', '');
        $search   = $request->get('search', '');

        $vehicles = Vehicle::query()
            ->when($category, fn($q) => $q->where('category', $category))
            ->when($search,   fn($q) => $q->where('name', 'like', "%{$search}%"))
            ->orderBy('category')
            ->orderBy('order')
            ->paginate(25)
            ->withQueryString();

        $counts = [];
        foreach (self::CATEGORIES as $key => $label) {
            $counts[$key] = Vehicle::where('category', $key)->count();
        }

        return view('admin.vehicles.index', compact('vehicles', 'counts', 'category', 'search'));
    }

    public function create()
    {
        return view('admin.vehicles.create', ['categories' => self::CATEGORIES]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'           => 'required|string|max:255',
            'brand'          => 'nullable|string|max:100',
            'year'           => 'nullable|string|max:10',
            'category'       => 'required|in:arazi_suv,otomobil,minivan,ticari',
            'vehicle_type'   => 'nullable|string|max:100',
            'sahibinden_url' => 'nullable|url|max:500',
            'cover_image'    => 'nullable|image|max:8192',
            'order'          => 'nullable|integer|min:0',
            'is_active'      => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');
        $data['slug']      = $this->uniqueSlug($data['name']);
        $data['company']   = 'Ömkar Otomotiv';

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('vehicles', 'public');
        }

        Vehicle::create($data);

        return redirect()->route('admin.vehicles.index')->with('success', 'Araç oluşturuldu.');
    }

    public function edit(Vehicle $vehicle)
    {
        return view('admin.vehicles.edit', [
            'vehicle'    => $vehicle,
            'categories' => self::CATEGORIES,
        ]);
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $data = $request->validate([
            'name'              => 'required|string|max:255',
            'brand'             => 'nullable|string|max:100',
            'year'              => 'nullable|string|max:10',
            'price'             => 'nullable|string|max:100',
            'km'                => 'nullable|integer|min:0',
            'category'          => 'required|in:arazi_suv,otomobil,minivan,ticari',
            'vehicle_type'      => 'nullable|string|max:100',
            'sahibinden_url'    => 'nullable|url|max:500',
            'cover_image'       => 'nullable|image|max:8192',
            'cover_image_url'   => 'nullable|url|max:500',
            'order'             => 'nullable|integer|min:0',
            'is_active'         => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('cover_image')) {
            if ($vehicle->cover_image && !str_starts_with($vehicle->cover_image, 'http')) {
                Storage::disk('public')->delete($vehicle->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('vehicles', 'public');
        } elseif (!empty($data['cover_image_url'])) {
            $data['cover_image'] = $data['cover_image_url'];
        }

        unset($data['cover_image_url']);
        $vehicle->update($data);

        return redirect()->route('admin.vehicles.index', ['category' => $vehicle->category])
            ->with('success', 'Araç güncellendi.');
    }

    public function destroy(Vehicle $vehicle)
    {
        if ($vehicle->cover_image && !str_starts_with($vehicle->cover_image, 'http')) {
            Storage::disk('public')->delete($vehicle->cover_image);
        }
        $vehicle->delete();

        return redirect()->route('admin.vehicles.index')
            ->with('success', 'Araç silindi.');
    }

    private function uniqueSlug(string $name): string
    {
        $base = Str::slug(Str::limit($name, 60));
        $slug = $base;
        $i    = 1;
        while (Vehicle::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i++;
        }
        return $slug;
    }
}
