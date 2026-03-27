<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $general = SiteSetting::group('general');
        $seo     = SiteSetting::group('seo');
        $contact = SiteSetting::group('contact');
        $social  = SiteSetting::group('social');

        return view('admin.settings.index', compact('general', 'seo', 'contact', 'social'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'site_name'        => 'required|string|max:255',
            'site_tagline'     => 'nullable|string|max:255',
            'site_email'       => 'nullable|email|max:255',
            'site_phone'       => 'nullable|string|max:50',
            'site_address'     => 'nullable|string|max:500',
            'logo'             => 'nullable|image|max:1024',
            'favicon'          => 'nullable|image|max:512',
            'meta_description' => 'nullable|string|max:320',
            'meta_keywords'    => 'nullable|string|max:255',
            'google_analytics' => 'nullable|string|max:50',
            'facebook_url'     => 'nullable|url|max:255',
            'instagram_url'    => 'nullable|url|max:255',
            'twitter_url'      => 'nullable|url|max:255',
            'youtube_url'      => 'nullable|url|max:255',
            'linkedin_url'     => 'nullable|url|max:255',
        ]);

        if ($request->hasFile('logo')) {
            $old = SiteSetting::get('logo');
            if ($old) Storage::disk('public')->delete($old);
            $data['logo'] = $request->file('logo')->store('settings', 'public');
        }

        if ($request->hasFile('favicon')) {
            $old = SiteSetting::get('favicon');
            if ($old) Storage::disk('public')->delete($old);
            $data['favicon'] = $request->file('favicon')->store('settings', 'public');
        }

        $groups = [
            'site_name'        => 'general',
            'site_tagline'     => 'general',
            'logo'             => 'general',
            'favicon'          => 'general',
            'meta_description' => 'seo',
            'meta_keywords'    => 'seo',
            'google_analytics' => 'seo',
            'site_email'       => 'contact',
            'site_phone'       => 'contact',
            'site_address'     => 'contact',
            'facebook_url'     => 'social',
            'instagram_url'    => 'social',
            'twitter_url'      => 'social',
            'youtube_url'      => 'social',
            'linkedin_url'     => 'social',
        ];

        foreach ($data as $key => $value) {
            SiteSetting::set($key, $value, $groups[$key] ?? 'general');
        }

        return redirect()->route('admin.settings.index')->with('success', 'Ayarlar kaydedildi.');
    }
}
