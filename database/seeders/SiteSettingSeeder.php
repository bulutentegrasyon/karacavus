<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // Genel
            ['key' => 'site_name',    'value' => 'Karaçavuş Proje Geliştirme İnşaat Ltd Şti', 'group' => 'general'],
            ['key' => 'site_tagline', 'value' => 'Hafriyat ve Proje Geliştirmede Güvenilir Çözüm Ortağı', 'group' => 'general'],

            // İletişim
            ['key' => 'site_phone',   'value' => '0539 730 50 65', 'group' => 'contact'],
            ['key' => 'site_email',   'value' => 'info@karacavus.com.tr', 'group' => 'contact'],
            ['key' => 'site_address', 'value' => 'Soğanlık Yeni Mah. Pega Gaz Sk. Aura Residence No:4/A K.6 D.48 Kartal / İstanbul', 'group' => 'contact'],

            // SEO
            ['key' => 'meta_description', 'value' => 'Karaçavuş Proje Geliştirme İnşaat Ltd Şti — hafriyat, toprak işleri, yıkım ve altyapı projelerinde güvenilir çözüm ortağınız.', 'group' => 'seo'],
            ['key' => 'meta_keywords',    'value' => 'hafriyat, inşaat, toprak işleri, yıkım, altyapı, kazı, dolgu, karaçavuş', 'group' => 'seo'],
            ['key' => 'google_analytics', 'value' => '', 'group' => 'seo'],

            // Sosyal Medya
            ['key' => 'facebook_url',  'value' => 'https://www.facebook.com', 'group' => 'social'],
            ['key' => 'instagram_url', 'value' => 'https://www.instagram.com', 'group' => 'social'],
            ['key' => 'twitter_url',   'value' => 'https://www.twitter.com', 'group' => 'social'],
            ['key' => 'youtube_url',   'value' => '', 'group' => 'social'],
            ['key' => 'linkedin_url',  'value' => '', 'group' => 'social'],
        ];

        foreach ($settings as $s) {
            SiteSetting::updateOrCreate(['key' => $s['key']], $s);
        }
    }
}
