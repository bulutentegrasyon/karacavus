<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin;
use App\Models\Post;
use App\Models\Project;
use App\Models\Reference;
use App\Models\Service;
use App\Models\BlogCategory;
use App\Models\Company;
use App\Models\Testimonial;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Route;

// ─── Ön Yüz ─────────────────────────────────────────────────────────────────
Route::get('/', function () {
    $services         = Service::active()->take(9)->get();
    $latestPosts      = Post::active()->with('category')->latest('published_at')->take(3)->get();
    $testimonials     = Testimonial::active()->orderBy('order')->get();
    $featuredProjects = Project::active()->featured()->take(12)->get();
    return view('frontend.home', compact('services', 'latestPosts', 'testimonials', 'featuredProjects'));
});
Route::get('/hakkimizda', fn() => view('frontend.about'));
Route::get('/hizmetler', function () {
    $services = Service::active()->get();
    return view('frontend.services', compact('services'));
});
Route::get('/referanslar', function () {
    $references = Reference::active()->orderBy('order')->get();
    return view('frontend.references', compact('references'));
});
Route::get('/referanslar/{slug}', function ($slug) {
    $reference = Reference::active()->where('slug', $slug)->firstOrFail();
    $others    = Reference::active()->where('id', '!=', $reference->id)->inRandomOrder()->take(8)->get();
    return view('frontend.reference-detail', compact('reference', 'others'));
});
Route::get('/projeler', function () {
    $projects   = Project::active()->get();
    $categories = $projects->pluck('category')->unique()->filter()->values();
    return view('frontend.projects', compact('projects', 'categories'));
});
Route::get('/projeler/{slug}', function (string $slug) {
    $project = Project::active()->where('slug', $slug)->firstOrFail();
    $others  = Project::active()->where('slug', '!=', $slug)->inRandomOrder()->take(8)->get();
    return view('frontend.project-detail', compact('project', 'others'));
})->name('project.show');
Route::get('/iletisim', fn() => view('frontend.contact'));
Route::get('/blog', function () {
    $posts       = Post::active()->with('category')->latest('published_at')->paginate(6);
    $categories  = BlogCategory::active()->withCount(['posts' => fn($q) => $q->active()])->get();
    $recentPosts = Post::active()->latest('published_at')->take(3)->get();
    return view('frontend.blog', compact('posts', 'categories', 'recentPosts'));
});
Route::get('/blog/{slug}', function (string $slug) {
    $post        = Post::active()->with('category', 'author')->where('slug', $slug)->firstOrFail();
    $recentPosts = Post::active()->latest('published_at')->take(3)->get();
    $categories  = BlogCategory::active()->withCount(['posts' => fn($q) => $q->active()])->get();
    return view('frontend.blog-detail', compact('post', 'recentPosts', 'categories'));
})->name('blog.show');
Route::get('/hizmetler', function () {
    $services = Service::active()->get();
    return view('frontend.services', compact('services'));
})->name('services');
Route::get('/sirketlerimiz', function () {
    $companies = Company::active()->orderBy('order')->get();
    return view('frontend.companies', compact('companies'));
})->name('companies');

Route::get('/hizmetler/{slug}', function (string $slug) {
    $service = Service::active()->where('slug', $slug)->firstOrFail();
    $others  = Service::active()->where('slug', '!=', $slug)->get();
    return view('frontend.service-detail', compact('service', 'others'));
})->name('service.show');

Route::get('/sirketlerimiz/{slug}', function (string $slug) {
    $company    = Company::active()->where('slug', $slug)->firstOrFail();
    $references = Reference::active()->where('company', $company->short)->orderBy('order')->get();
    $vehicles   = Vehicle::active()->where('company', 'Ömkar Otomotiv')->orderBy('order')->get();
    $others     = Company::active()->where('slug', '!=', $slug)->orderBy('order')->get();
    $showVehicles = $slug === 'omkar-otomotiv-insaat';
    return view('frontend.company-detail', compact('company', 'references', 'vehicles', 'others', 'showVehicles'));
})->name('company.show');

Route::get('/omkar/araclar/{slug}', function (string $slug) {
    $vehicle = Vehicle::active()->where('slug', $slug)->firstOrFail();
    return view('frontend.vehicle-detail', compact('vehicle'));
})->name('vehicle.show');

// ─── Admin Panel ─────────────────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    Route::get('/', fn() => redirect()->route('admin.posts.index'));

    // Blog
    Route::resource('posts', Admin\PostController::class)->except('show');
    Route::resource('blog-categories', Admin\BlogCategoryController::class)->except('show');

    // Hizmetler
    Route::resource('services', Admin\ServiceController::class)->except('show');

    // Projeler
    Route::resource('projects', Admin\ProjectController::class)->except('show');

    // Referanslar
    Route::resource('references', Admin\ReferenceController::class)->except('show');

    // Müşteri Yorumları
    Route::resource('testimonials', Admin\TestimonialController::class)->except('show');

    // Şirketler
    Route::resource('companies', Admin\CompanyController::class)->only(['index', 'edit', 'update']);

    // Araçlar (Ömkar)
    Route::resource('vehicles', Admin\VehicleController::class)->except('show');
    Route::post('vehicles/sahibinden/fetch-image',    [Admin\SahibindenProxyController::class, 'fetchImage'])->name('vehicles.sahibinden.fetch-image');
    Route::post('vehicles/sahibinden/check-status',   [Admin\SahibindenProxyController::class, 'checkStatus'])->name('vehicles.sahibinden.check-status');
    Route::post('vehicles/sahibinden/sync-all',       [Admin\SahibindenProxyController::class, 'syncAll'])->name('vehicles.sahibinden.sync-all');
    Route::match(['post','options'], 'vehicles/sahibinden/receive-image', [Admin\SahibindenProxyController::class, 'receiveImage'])->name('vehicles.sahibinden.receive-image');
    Route::get('vehicles/sahibinden/pending-image',   [Admin\SahibindenProxyController::class, 'pendingImage'])->name('vehicles.sahibinden.pending-image');

    // Ayarlar
    Route::get('settings', [Admin\SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [Admin\SettingController::class, 'update'])->name('settings.update');
});

// ─── Breeze Profile ──────────────────────────────────────────────────────────
Route::get('/dashboard', fn() => redirect()->route('admin.posts.index'))
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
