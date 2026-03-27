<?php

namespace Database\Seeders;

use App\Models\Reference;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ReferenceSeeder extends Seeder
{
    public function run(): void
    {
        $references = [
            ['name' => 'DOĞUŞ - YAPI MERKEZİ - ÖZALTIN ADİ ORTAKLIĞI',                                              'quantity' => '190.000 m³'],
            ['name' => 'MBM ENERJİ İNŞAAT AŞ. - MALTEPE TOKİ ŞANTİYESİ',                                           'quantity' => '513.000 m³'],
            ['name' => 'YAFA MÜHENDİSLİK MÜŞAVİRLİK İNŞAAT A.Ş',                                                   'quantity' => '390.000 m³'],
            ['name' => 'ÖZBEK İNŞAAT TRUZ. GIDA SAN VE TİC A.Ş',                                                   'quantity' => '55.000 m³'],
            ['name' => 'VARLIBAŞ İNŞAAT - VARLİFE PENDİK PROJESİ',                                                  'quantity' => '40.000 m³'],
            ['name' => 'ZK ALT YAPI İNŞAAT AŞ. - İSTANBUL GENELİ',                                                 'quantity' => '273.000 m³'],
            ['name' => 'ALKAN ŞİRKETLER GRUBU',                                                                      'quantity' => '106.000 m³'],
            ['name' => 'GAP İNŞ. TİC. VE SAN. LTD. ŞTİ (1)',                                                        'quantity' => '320.000 m³'],
            ['name' => 'OLGUN MEDİCAL İNŞ. LTD. ŞTİ',                                                               'quantity' => '98.700 m³'],
            ['name' => 'MİSEK İNŞAAT',                                                                               'quantity' => '328.000 m³'],
            ['name' => 'ATİ-BEL ADİ ORTAKLIĞI',                                                                      'quantity' => '170.000 m³'],
            ['name' => 'İSPA (2) ADİ ORTAKLIĞI (MAKYOL)',                                                            'quantity' => '85.000 m³'],
            ['name' => 'KALYON İNŞAAT',                                                                              'quantity' => '65.813 m³'],
            ['name' => 'VARYAP İNŞAAT',                                                                              'quantity' => '120.000 m³'],
            ['name' => 'OSMANLI YAPI İNŞAAT A.Ş',                                                                   'quantity' => '89.650 m³'],
            ['name' => 'CONOĞLU İNŞAAT SANAYİ VE SPOR TESİS. TİC LTD ŞTİ',                                         'quantity' => '35.000 m³'],
            ['name' => 'AYDINOĞLU TURİZM OTELCİLİK LTD ŞTİ',                                                       'quantity' => '86.500 m³'],
            ['name' => 'BAHAS HOLDİNG A.Ş',                                                                          'quantity' => '33.000 m³'],
            ['name' => 'ATİLLA İNŞAAT',                                                                              'quantity' => '63.000 m³'],
            ['name' => 'ALMİS YATIRIM BİLGİ YATIRIM. DANIŞ LTD ŞTİ',                                               'quantity' => '42.000 m³'],
            ['name' => 'MS MEGA YAPI İNŞAAT SAN. VE TİC. LTD ŞTİ',                                                 'quantity' => '175.000 m³'],
            ['name' => 'AYDINOĞLU İNŞAAT - AYDINOĞLU ŞEHZADELER ADİ ORTAKLIĞI',                                     'quantity' => '50.000 m³'],
            ['name' => 'ELÇİ YAPIMCILIK İNŞAAT LTD ŞTİ',                                                           'quantity' => '20.000 m³'],
            ['name' => 'MİRAC YOL ALTYAPI ÜSTYAPI İNŞ. SAN. VE TİC. A.Ş',                                          'quantity' => '113.000 m³'],
            ['name' => 'LEDA YAPI VE PROJE TAAHHÜT LİMİTED ŞİRKETİ',                                               'quantity' => '193.000 m³'],
            ['name' => 'YMK EMLAK İNŞAAT LTD ŞTİ',                                                                  'quantity' => '18.000 m³'],
            ['name' => 'ASYA İNŞAAT',                                                                                'quantity' => '23.000 m³'],
            ['name' => 'FİDAN İNŞAAT LTD ŞTİ',                                                                      'quantity' => '94.000 m³'],
            ['name' => 'ORTADOĞU PROJE GELİŞTİRME SAN VE TİC A.Ş',                                                 'quantity' => '115.000 m³'],
            ['name' => 'ZEKSAN İNŞ. SAN. VE TİC. LTD ŞTİ',                                                         'quantity' => '335.000 m³'],
            ['name' => 'KÖROĞLU İNŞ. TAAH. TURİZM TİC. LTD. ŞTİ',                                                  'quantity' => '215.000 m³'],
            ['name' => 'NUHOĞLU İNŞ SAN. VE TİC. A.Ş',                                                             'quantity' => '57.000 m³'],
            ['name' => 'KAHRAMAN İNŞAAT VE TİC. LTD. ŞTİ',                                                         'quantity' => '163.000 m³'],
            ['name' => 'KRATON İNŞ. SAN. TİC. VE A.Ş',                                                             'quantity' => '57.000 m³'],
            ['name' => 'BAŞARIR İNŞAAT YAPI SAN VE TİC AŞ',                                                        'quantity' => '21.000 m³'],
            ['name' => 'TUNABEY TEKSTİL İNŞ. SANİ TİC. LTD. ŞTİ',                                                  'quantity' => '16.000 m³'],
            ['name' => 'ŞİMŞEK GÜL ESSE İNŞ. SAN. TİC. LTD. ŞTİ',                                                 'quantity' => '165.000 m³'],
            ['name' => 'KARTAL BETON GRUP İNŞ. SAN. TİC AŞ',                                                        'quantity' => '19.000 m³'],
            ['name' => 'BİLSA BİLGİN ALPHA GRUP VE İNVESTMENT HOUSE ADİ ORTAKLIĞI',                                 'quantity' => '67.000 m³'],
            ['name' => 'HİSAR YAPI KONUT SAN. İNŞ. DIŞ TİC. A.Ş',                                                  'quantity' => '37.000 m³'],
            ['name' => 'MARİTZA İNŞ. SAN. TİC. LTD. A.Ş',                                                          'quantity' => '51.000 m³'],
            ['name' => 'MERİÇ İNŞ. VE TİC. LTD. ŞTİ',                                                              'quantity' => '23.000 m³'],
            ['name' => 'BEGÜM YAPI TURİZM TARIM HAYVANCILIK SAN. LTD. ŞTİ',                                         'quantity' => '119.000 m³'],
            ['name' => 'PAYZİN İNŞ. EMLAK SAN. TİC. LTD. ŞTİ',                                                     'quantity' => '22.000 m³'],
            ['name' => 'MZA YAPI MAL. İNŞ. BİL. MED. SAN. VE TİC. LTD. ŞTİ',                                      'quantity' => '163.000 m³'],
            ['name' => 'SARIOĞULLARI İNŞ. SAN VE TİC. LTD ŞTİ',                                                    'quantity' => '11.800 m³'],
            ['name' => 'TUBA KUYUMCULUK İNŞ. TEKSTİL SAN. VE TİC. LTD. ŞTİ',                                       'quantity' => '253.000 m³'],
            ['name' => 'SEVGİ YAPI KUYUMCULUK',                                                                      'quantity' => '21.000 m³'],
            ['name' => 'GAP İNŞ. TİC. VE SAN. LTD. ŞTİ (2)',                                                        'quantity' => '169.000 m³'],
            ['name' => 'MEDA YAPI İNŞ. TAAH. SAN. TİC. LTD. ŞTİ',                                                  'quantity' => '45.000 m³'],
            ['name' => 'TOSUN İNŞ. YAPI TURİZM GIDA SAN. TİC. LTD. ŞTİ',                                           'quantity' => '77.000 m³'],
            ['name' => 'NUH OĞLU MAL. İNŞ. TAAH. HAF. TİC. SAN. LTD. ŞTİ',                                        'quantity' => '137.000 m³'],
            ['name' => 'TEKNOFOR İNŞ. TAAH. LTD. ŞTİ',                                                             'quantity' => '375.000 m³'],
            ['name' => 'GÖRKEM İNŞAAT',                                                                              'quantity' => '273.000 m³'],
            ['name' => 'VİZYON İNŞ. SAN. VE TİC. LTD. ŞTİ',                                                        'quantity' => '16.000 m³'],
            ['name' => 'İNTEK YAPI İNŞ. MÜH. SAN. LTD. ŞTİ',                                                       'quantity' => '93.000 m³'],
            ['name' => 'KARTAL GRUP ENERJİ İNŞ. HAF. NAK. MAD. SAN. TİC. LTD. ŞTİ',                                'quantity' => '58.730 m³'],
            ['name' => 'ENKAR YAPI SAN. VE TİC. LTD. ŞTİ',                                                         'quantity' => '41.125 m³'],
            ['name' => 'BM STAR YAPI İNŞ. SAN. TİC. LTD. ŞTİ',                                                     'quantity' => '29.741 m³'],
            ['name' => 'SORHAN GRUP TURİZM HAM. SAN. TİC. LTD. ŞTİ',                                               'quantity' => '190.000 m³'],
            ['name' => 'ÇEKOTAŞ İNŞ. TAAH. SAN. VE TİC. LTD. ŞTİ',                                                 'quantity' => '19.980 m³'],
            ['name' => 'TAŞ YAPI İNŞ. TURİZM SAN. TİC. LTD ŞTİ',                                                   'quantity' => '47.521 m³'],
            ['name' => 'İSTANBUL YAPI İNŞ. GIDA TURİZM BİL. TİC. LTD. ŞTİ',                                       'quantity' => '25.680 m³'],
            ['name' => 'ŞAFAK MÜH. İNŞ. SAN. LTD. ŞTİ',                                                            'quantity' => '40.945 m³'],
            ['name' => 'UKON İNŞ. TEKSTİL TURİZM ORG. TEMZ. HİZ. GIDA SAN. VE TİC. LTD. ŞTİ',                     'quantity' => '31.140 m³'],
            ['name' => 'DERBA YAPI İNŞ. SAN. TİC. LTD. ŞTİ',                                                       'quantity' => '36.478 m³'],
            ['name' => 'TEKNİKEL İNŞ MÜH. VE TİC LTD ŞTİ',                                                         'quantity' => '28.970 m³'],
            ['name' => 'F. TOSUN YAPI',                                                                              'quantity' => '42.560 m³'],
            ['name' => 'TEKNİK HOLDİNG',                                                                             'quantity' => '81.400 m³'],
            ['name' => 'SAFİR 34 MADENCİLİK PETROL İNŞAAT LOJ. SAN VE TİC LTD AŞ',                                 'quantity' => '245.400 m³'],
            ['name' => 'PANAROMA 33 HARMAN GRUP İNŞ. PET. MAD. ÖZ SAĞ. HİZM. TUR. İTH. İHR. SAN. TİC. AŞ',        'quantity' => '14.720 m³'],
            ['name' => 'ŞİMŞEK GÜL ADİ ORTAKLIĞI',                                                                  'quantity' => '150.000 m³'],
            ['name' => 'ÜÇKALE YAPI İNŞAAT SAN. TİC LTD ŞTİ',                                                      'quantity' => '34.790 m³'],
            ['name' => 'AYDIN İNŞAAT YOL YAPI',                                                                     'quantity' => '450.000 m³'],
            ['name' => 'ÜLPAŞ A.Ş',                                                                                  'quantity' => '36.650 m³'],
            ['name' => 'TELLİOĞLU İNŞAAT',                                                                          'quantity' => '104.500 m³'],
            ['name' => 'KAYIM YAPI İNŞ. SAN VE TİC. LTD ŞTİ',                                                      'quantity' => '48.658 m³'],
            ['name' => 'YÜKSELEN GRUP A.Ş',                                                                         'quantity' => '72.000 m³'],
            ['name' => 'BOĞAZİÇİ ENDÜSTRİ İNŞAAT SAN VE TİC LTD ŞTİ',                                             'quantity' => '123.000 m³'],
            ['name' => 'TURYAPI GRUP İNŞ. TAH. SAN. LTD ŞTİ',                                                      'quantity' => '46.000 m³'],
            ['name' => 'THREE SUN İNŞ VE SAN A.Ş',                                                                  'quantity' => '31.250 m³'],
            ['name' => 'ÇET YAPI İNŞAAT',                                                                           'quantity' => '97.200 m³'],
            ['name' => 'ÖZSOY İNŞAAT',                                                                              'quantity' => '54.860 m³'],
        ];

        foreach ($references as $i => $ref) {
            $slug = 'ref-' . str_pad($i + 1, 2, '0', STR_PAD_LEFT) . '-' . Str::slug(Str::limit($ref['name'], 40));
            Reference::firstOrCreate(['slug' => $slug], array_merge($ref, [
                'slug'      => $slug,
                'work_type' => 'Hafriyat',
                'status'    => 'tamamlanan',
                'company'   => 'Asel İnşaat Hafriyat',
                'order'     => $i + 1,
                'is_active' => true,
            ]));
        }
    }
}
