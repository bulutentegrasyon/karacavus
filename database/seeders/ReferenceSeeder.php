<?php

namespace Database\Seeders;

use App\Models\Reference;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ReferenceSeeder extends Seeder
{
    public function run(): void
    {
        Reference::truncate();

        $references = [
            // ── Asel İnşaat Hafriyat ─────────────────────────────────────
            ['company' => 'Asel İnşaat Hafriyat', 'name' => 'Akfırat ve Tepeören Alt Yapı Çalışması',                                      'quantity' => null, 'status' => 'tamamlanan', 'order' => 1],
            ['company' => 'Asel İnşaat Hafriyat', 'name' => 'Kurtköy Yenişehir İSKİ Alt Yapı Çalışması',                                   'quantity' => null, 'status' => 'tamamlanan', 'order' => 2],
            ['company' => 'Asel İnşaat Hafriyat', 'name' => 'Şile dere ıslah ve alt yapı çalışması',                                       'quantity' => null, 'status' => 'tamamlanan', 'order' => 3],
            ['company' => 'Asel İnşaat Hafriyat', 'name' => 'Sultanbeyli dere ıslah ve alt yapı çalışması',                                'quantity' => null, 'status' => 'tamamlanan', 'order' => 4],
            ['company' => 'Asel İnşaat Hafriyat', 'name' => 'Pendik dere ıslah ve alt yapı çalışması',                                     'quantity' => null, 'status' => 'tamamlanan', 'order' => 5],
            ['company' => 'Asel İnşaat Hafriyat', 'name' => 'Maltepe Gülsuyu İSKİ Kanal Alt yapı çalışması',                               'quantity' => null, 'status' => 'tamamlanan', 'order' => 6],
            ['company' => 'Asel İnşaat Hafriyat', 'name' => 'Sultanbeyli Yol yapım ve alt yapı çalışması',                                 'quantity' => null, 'status' => 'tamamlanan', 'order' => 7],
            ['company' => 'Asel İnşaat Hafriyat', 'name' => 'Bodrum Turgut Reis alt yapı bakım onarım çalışması',                          'quantity' => null, 'status' => 'tamamlanan', 'order' => 8],
            ['company' => 'Asel İnşaat Hafriyat', 'name' => 'Sakarya Kocaeli otoyol çalışması',                                            'quantity' => null, 'status' => 'tamamlanan', 'order' => 9],
            ['company' => 'Asel İnşaat Hafriyat', 'name' => 'Kurtköy Pendik alt yapı çalışması',                                           'quantity' => null, 'status' => 'tamamlanan', 'order' => 10],
            ['company' => 'Asel İnşaat Hafriyat', 'name' => 'Şile Kartal Beton Santrali mıcır kum nakliye',                                'quantity' => null, 'status' => 'tamamlanan', 'order' => 11],
            ['company' => 'Asel İnşaat Hafriyat', 'name' => 'Kadıköy Çekmeköy madenler yol ve refüj çalışması',                            'quantity' => null, 'status' => 'tamamlanan', 'order' => 12],
            ['company' => 'Asel İnşaat Hafriyat', 'name' => 'Pendik Çamlık yol ve refüj çalışması',                                        'quantity' => null, 'status' => 'tamamlanan', 'order' => 13],
            ['company' => 'Asel İnşaat Hafriyat', 'name' => 'Sivas zara su şehri yol yapım çalışması',                                     'quantity' => null, 'status' => 'tamamlanan', 'order' => 14],
            ['company' => 'Asel İnşaat Hafriyat', 'name' => 'Sancaktepe Samandıra Metro Alt Yapı Çalışması',                               'quantity' => null, 'status' => 'tamamlanan', 'order' => 15],
            ['company' => 'Asel İnşaat Hafriyat', 'name' => 'Bahçelievler Çalışdar Cad. Alt yapı kaldırım bakım onarım çalışması',         'quantity' => null, 'status' => 'tamamlanan', 'order' => 16],
            ['company' => 'Asel İnşaat Hafriyat', 'name' => 'Sultanbeyli yol ve refüj çalışması',                                          'quantity' => null, 'status' => 'tamamlanan', 'order' => 17],
            ['company' => 'Asel İnşaat Hafriyat', 'name' => 'Sultanbeyli Samandıra metro alt yapı çalışması',                              'quantity' => null, 'status' => 'tamamlanan', 'order' => 18],

            // ── Nayifoğulları İnşaat ─────────────────────────────────────
            ['company' => 'Nayifoğulları İnşaat', 'name' => 'Maltepe Osmangazi spor kompleksi hafriyat çalışması',    'quantity' => '245.400 m3', 'status' => 'tamamlanan', 'order' => 1],
            ['company' => 'Nayifoğulları İnşaat', 'name' => 'Ümraniye Ticari Alan Çalışması (ofis, dükkan vb.)',      'quantity' => '28.970 m3',  'status' => 'tamamlanan', 'order' => 2],
            ['company' => 'Nayifoğulları İnşaat', 'name' => 'Dudullu Ticari Alan Çalışması (AVM)',                    'quantity' => '253.000 m3', 'status' => 'tamamlanan', 'order' => 3],
            ['company' => 'Nayifoğulları İnşaat', 'name' => 'Dudullu Ticari Alan Çalışması (Ofis)',                   'quantity' => '11.800 m3',  'status' => 'tamamlanan', 'order' => 4],
            ['company' => 'Nayifoğulları İnşaat', 'name' => 'Ümraniye Ticari Alan Çalışması (Ofis Dükkan vb.)',       'quantity' => '119.000 m3', 'status' => 'tamamlanan', 'order' => 5],
            ['company' => 'Nayifoğulları İnşaat', 'name' => 'Ümraniye Ticari Alan Çalışması (İşmerkezi)',             'quantity' => '165.000 m3', 'status' => 'tamamlanan', 'order' => 6],
            ['company' => 'Nayifoğulları İnşaat', 'name' => 'Sultanbeyli Spor kompleksi hafriyat çalışması',          'quantity' => '33.000 m3',  'status' => 'tamamlanan', 'order' => 7],
            ['company' => 'Nayifoğulları İnşaat', 'name' => 'Tuzla Ticari Alan Çalışması (İş merkezi)',               'quantity' => '98.700 m3',  'status' => 'tamamlanan', 'order' => 8],

            // ── Nayifoğulları YMK Yıkım ──────────────────────────────────
            ['company' => 'Nayifoğulları YMK Yıkım', 'name' => 'Adapazarı Arifiye Konut İnşaatı', 'quantity' => null, 'status' => 'devam_eden', 'order' => 1],

            // ── Karaçavuş Proje Geliştirme — Devam Eden ──────────────────
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Kartal Cevizli Konut Hafriyat Çalışması',        'quantity' => '30.495 m3', 'status' => 'devam_eden', 'order' => 1],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Pendik Yayalar konut Hafriyat Çalışması',         'quantity' => '60.627 m3', 'status' => 'devam_eden', 'order' => 2],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Pendik Batı Mh. Konut Hafriyat Çalışması',        'quantity' => '20.908 m3', 'status' => 'devam_eden', 'order' => 3],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Pendik Yenişehir Konut Hafriyat Çalışması',       'quantity' => '20.200 m3', 'status' => 'devam_eden', 'order' => 4],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Kartal Yakacık Konut Hafriyat Çalışması',         'quantity' => '21.695 m3', 'status' => 'devam_eden', 'order' => 5],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Kartal Karlıktepe Mh. Konut Hafriyat Çalışması',  'quantity' => '20.350 m3', 'status' => 'devam_eden', 'order' => 6],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Kartal Atalar Konut Hafriyat Çalışması',          'quantity' => '30.450 m3', 'status' => 'devam_eden', 'order' => 7],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Kartal Esentepe Hafriyat Çalışması',              'quantity' => '20.468 m3', 'status' => 'devam_eden', 'order' => 8],

            // ── Karaçavuş Proje Geliştirme — Tamamlanan ──────────────────
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Pendik Okul Hafriyat Çalışması',                                                 'quantity' => '120.000 m3', 'status' => 'tamamlanan', 'order' => 1],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Ümraniye okul hafriyat çalışması',                                                'quantity' => '110.000 m3', 'status' => 'tamamlanan', 'order' => 2],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Beykoz Okul hafriyat Çalışması',                                                  'quantity' => '150.000 m3', 'status' => 'tamamlanan', 'order' => 3],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Kartal Okul Hafriyat Çalışması',                                                  'quantity' => '190.000 m3', 'status' => 'tamamlanan', 'order' => 4],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Maltepe Toki konut hafriyat çalışması',                                           'quantity' => '513.000 m3', 'status' => 'tamamlanan', 'order' => 5],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Çekmeköy Okul Hafriyat Çalışması',                                                'quantity' => '150.000 m3', 'status' => 'tamamlanan', 'order' => 6],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Sancaktepe Okul Hafriyat Çalışması',                                              'quantity' => '123.000 m3', 'status' => 'tamamlanan', 'order' => 7],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Maltepe Okul Hafriyat Çalışması',                                                 'quantity' => '105.000 m3', 'status' => 'tamamlanan', 'order' => 8],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Sultanbeyli Okul Hafriyat Çalışması',                                             'quantity' => '100.000 m3', 'status' => 'tamamlanan', 'order' => 9],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Sancaktepe Okul Hafriyat Çalışması 2',                                            'quantity' => '130.000 m3', 'status' => 'tamamlanan', 'order' => 10],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Pendik konut hafriyat çalışması – 120 konut yapımı',                              'quantity' => '104.500 m3', 'status' => 'tamamlanan', 'order' => 11],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Ümraniye konut hafriyat çalışması – 75 konut yapımı',                             'quantity' => '94.000 m3',  'status' => 'tamamlanan', 'order' => 12],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Ataşehir konut hafriyat çalışması – 45 konut yapımı',                             'quantity' => '54.860 m3',  'status' => 'tamamlanan', 'order' => 13],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Maltepe konut hafriyat çalışması – 130 konut yapımı',                             'quantity' => '97.200 m3',  'status' => 'tamamlanan', 'order' => 14],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Maltepe konut hafriyat çalışması – 25 konut yapımı',                              'quantity' => '31.250 m3',  'status' => 'tamamlanan', 'order' => 15],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Kadıköy konut hafriyat çalışması – 34 konut yapımı',                              'quantity' => '46.000 m3',  'status' => 'tamamlanan', 'order' => 16],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Kadıköy konut hafriyat çalışması – 155 konut yapımı',                             'quantity' => '123.000 m3', 'status' => 'tamamlanan', 'order' => 17],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Kartal Uğurmumcu konut hafriyat çalışması – 92 konut yapımı',                     'quantity' => '72.000 m3',  'status' => 'tamamlanan', 'order' => 18],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Kartal Cevizli konut hafriyat çalışması – 30 konut yapımı',                       'quantity' => '48.658 m3',  'status' => 'tamamlanan', 'order' => 19],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Pendik konut hafriyat çalışması – 120 konut yapımı 2',                            'quantity' => '104.500 m3', 'status' => 'tamamlanan', 'order' => 20],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Kadıköy konut hafriyat çalışması – 28 konut yapımı',                              'quantity' => '36.650 m3',  'status' => 'tamamlanan', 'order' => 21],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Ataşehir konut hafriyat çalışması – 20 konut yapımı',                             'quantity' => '34.790 m3',  'status' => 'tamamlanan', 'order' => 22],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Kartal konut hafriyat çalışması – 180 konut yapımı',                              'quantity' => '150.000 m3', 'status' => 'tamamlanan', 'order' => 23],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Pendik konut hafriyat çalışması – 15 konut yapımı',                               'quantity' => '14.720 m3',  'status' => 'tamamlanan', 'order' => 24],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Kartal Petrol İş Mah. konut hafriyat çalışması – 100 konut yapımı',               'quantity' => '81.400 m3',  'status' => 'tamamlanan', 'order' => 25],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Tuzla Aydınlı Mh. konut hafriyat çalışması – 30 konut yapımı',                    'quantity' => '42.560 m3',  'status' => 'tamamlanan', 'order' => 26],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Küçükyalı konut hafriyat çalışması – 28 konut yapımı',                            'quantity' => '36.478 m3',  'status' => 'tamamlanan', 'order' => 27],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Ataşehir konut hafriyat çalışması – 22 konut yapımı',                             'quantity' => '31.140 m3',  'status' => 'tamamlanan', 'order' => 28],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Tuzla konut hafriyat çalışması – 20 konut yapımı',                                'quantity' => '25.680 m3',  'status' => 'tamamlanan', 'order' => 29],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Aydınevler konut hafriyat çalışması – 18 konut yapımı',                           'quantity' => '19.980 m3',  'status' => 'tamamlanan', 'order' => 30],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Pendik konut hafriyat çalışması – 185 konut yapımı',                              'quantity' => '190.000 m3', 'status' => 'tamamlanan', 'order' => 31],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Pendik Kaynarca konut hafriyat çalışması – 20 konut yapımı',                      'quantity' => '29.741 m3',  'status' => 'tamamlanan', 'order' => 32],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Sancaktepe konut hafriyat çalışması – 32 konut yapımı',                           'quantity' => '41.125 m3',  'status' => 'tamamlanan', 'order' => 33],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'İBB Şeyhli Konut hafriyat çalışması – 110 konut yapımı',                          'quantity' => '93.000 m3',  'status' => 'tamamlanan', 'order' => 34],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Pendik Yayalar konut hafriyat çalışması – 15 konut yapımı',                       'quantity' => '16.000 m3',  'status' => 'tamamlanan', 'order' => 35],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Kartal Petroliş Mah. Konut hafriyat çalışması – 210 konut yapımı',                'quantity' => '273.000 m3', 'status' => 'tamamlanan', 'order' => 36],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Tuzla Aydınlı konut hafriyat çalışması – 85 konut yapımı',                        'quantity' => '77.000 m3',  'status' => 'tamamlanan', 'order' => 37],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Maltepe Aydınevler konut hafriyat çalışması – 32 konut yapımı',                   'quantity' => '45.000 m3',  'status' => 'tamamlanan', 'order' => 38],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Kartal Uğurmumcu konut hafriyat çalışması – 18 konut yapımı',                     'quantity' => '21.000 m3',  'status' => 'tamamlanan', 'order' => 39],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Bostancı konut hafriyat çalışması – 150 konut yapımı',                            'quantity' => '163.000 m3', 'status' => 'tamamlanan', 'order' => 40],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Kartal konut hafriyat çalışması – 18 konut yapımı',                               'quantity' => '22.000 m3',  'status' => 'tamamlanan', 'order' => 41],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Pendik Villa hafriyat çalışması',                                                 'quantity' => '23.000 m3',  'status' => 'tamamlanan', 'order' => 42],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Ümraniye Villa hafriyat çalışması',                                               'quantity' => '37.000 m3',  'status' => 'tamamlanan', 'order' => 43],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Maltepe Okul Hafriyat Çalışması 2',                                               'quantity' => '105.000 m3', 'status' => 'tamamlanan', 'order' => 44],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Sultanbeyli Okul Hafriyat Çalışması 2',                                           'quantity' => '100.000 m3', 'status' => 'tamamlanan', 'order' => 45],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Sancaktepe Okul Hafriyat Çalışması 3',                                            'quantity' => '130.000 m3', 'status' => 'tamamlanan', 'order' => 46],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Pendik Konut hafriyat çalışması – 15 konut yapımı 2',                             'quantity' => '16.000 m3',  'status' => 'tamamlanan', 'order' => 47],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Üsküdar konut hafriyat çalışması – 18 konut yapımı',                              'quantity' => '21.000 m3',  'status' => 'tamamlanan', 'order' => 48],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Kartal konut hafriyat çalışması – 35 konut yapımı',                               'quantity' => '57.000 m3',  'status' => 'tamamlanan', 'order' => 49],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Tuzla konut hafriyat çalışması – 150 konut yapımı',                               'quantity' => '163.000 m3', 'status' => 'tamamlanan', 'order' => 50],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Üsküdar konut hafriyat çalışması – 30 konut yapımı',                              'quantity' => '57.000 m3',  'status' => 'tamamlanan', 'order' => 51],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Kadıköy konut hafriyat çalışması – 110 konut yapımı',                             'quantity' => '215.000 m3', 'status' => 'tamamlanan', 'order' => 52],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Aydınevler konut hafriyat çalışması – 18 konut yapımı 2',                         'quantity' => '23.000 m3',  'status' => 'tamamlanan', 'order' => 53],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Pendik Yenişehir konut hafriyat çalışması – 96 konut yapımı',                     'quantity' => '193.000 m3', 'status' => 'tamamlanan', 'order' => 54],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Pendik konut hafriyat çalışması – 18 konut yapımı',                               'quantity' => '20.000 m3',  'status' => 'tamamlanan', 'order' => 55],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Aydınevler konut hafriyat çalışması – 60 konut yapımı',                           'quantity' => '86.500 m3',  'status' => 'tamamlanan', 'order' => 56],
            ['company' => 'Karaçavuş Proje Geliştirme', 'name' => 'Maltepe Toki konut hafriyat çalışması 2',                                         'quantity' => '328.000 m3', 'status' => 'tamamlanan', 'order' => 57],
        ];

        foreach ($references as $data) {
            Reference::create(array_merge($data, [
                'slug' => Str::slug($data['name']) . '-' . $data['order'],
            ]));
        }

        $this->command->info(count($references) . ' references seeded.');
    }
}
