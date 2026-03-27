<?php

namespace Database\Seeders;

use App\Models\Reference;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CompanyReferenceSeeder extends Seeder
{
    public function run(): void
    {
        $companies = [

            // ── 1. Karaçavuş Proje Geliştirme ──────────────────────────────────
            [
                'company'   => 'Karaçavuş Proje Geliştirme',
                'work_type' => 'Hafriyat & Proje',
                'refs' => [
                    ['name' => 'EMLAK KONUT GYO A.Ş – BAŞAKŞEHİR KONUT PROJESİ',           'quantity' => '320.000 m³', 'status' => 'tamamlanan'],
                    ['name' => 'TOKİ – KAYABAŞI TOPLU KONUT PROJESİ',                        'quantity' => '415.000 m³', 'status' => 'tamamlanan'],
                    ['name' => 'MESA MESKEN SAN. A.Ş – BÜYÜKÇEKMECE PROJESİ',               'quantity' => '178.000 m³', 'status' => 'tamamlanan'],
                    ['name' => 'AKFEN HOLDİNG A.Ş – GEBZE LOJİSTİK MERKEZİ',                'quantity' => '263.000 m³', 'status' => 'tamamlanan'],
                    ['name' => 'ENKa İNŞAAT VE SANAYİ A.Ş – TEKİRDAĞ FABRİKA',             'quantity' => '198.000 m³', 'status' => 'tamamlanan'],
                    ['name' => 'RÖNESANS HOLDİNG – SAKARYA KAMPÜS PROJESİ',                  'quantity' => '285.000 m³', 'status' => 'tamamlanan'],
                    ['name' => 'İÇTAŞ İNŞAAT A.Ş – YAVUZ SULTAN SELİM KÖPRÜSÜ BAĞLANTI',   'quantity' => '540.000 m³', 'status' => 'tamamlanan'],
                    ['name' => 'TEPE İNŞAAT SAN. A.Ş – ÇEKMEKÖY KONUT SİTESİ',             'quantity' => '142.000 m³', 'status' => 'tamamlanan'],
                    ['name' => 'LIMAK HOLDİNG – ATATÜRK HAVALİMANI YENİLEME FAZİ',          'quantity' => '390.000 m³', 'status' => 'tamamlanan'],
                    ['name' => 'AYGAz A.Ş – GEBZE DOLUM TESİSİ GENİŞLEME',                  'quantity' => '88.000 m³',  'status' => 'tamamlanan'],
                    ['name' => 'SAMSUNG C&T CORP. – İSTANBUL FİNANS MERKEZİ',               'quantity' => '620.000 m³', 'status' => 'tamamlanan'],
                    ['name' => 'İSTANBUL BÜYÜKŞEHİR BELEDİYESİ – ANADOLU YAKASI YOL',      'quantity' => '230.000 m³', 'status' => 'tamamlanan'],
                    ['name' => 'ÖZAK GYO A.Ş – PENDİK MARINA KONUT PROJESİ',                'quantity' => '175.000 m³', 'status' => 'tamamlanan'],
                    ['name' => 'KOLIN İNŞAAT – OSMANGAZI KÖPRÜSÜ YAKLAŞIM YOLLARI',         'quantity' => '480.000 m³', 'status' => 'tamamlanan'],
                    ['name' => 'ÜLKER GIDA SAN. VE TİC. A.Ş – GEBZE ÜRETİM TESİSİ',        'quantity' => '96.000 m³',  'status' => 'tamamlanan'],
                    ['name' => 'KOÇTAŞ YAPI MARKETLERİ – KADİKÖY MAĞAZA İNŞAATI',          'quantity' => '44.000 m³',  'status' => 'tamamlanan'],
                    ['name' => 'İSTANBUL İL ÖZEL İDARESİ – TUZLA SANAYİ ALTYAPISI',        'quantity' => '312.000 m³', 'status' => 'tamamlanan'],
                    ['name' => 'DOĞUŞ OTOMOTİV – KARTAL SHOWROOM VE SERVİS BİNASI',         'quantity' => '67.000 m³',  'status' => 'tamamlanan'],
                    ['name' => 'METRO HOLDİNG – SİLİVRİ DEPOLAMA VE DAĞITIM MERKEZİ',       'quantity' => '155.000 m³', 'status' => 'tamamlanan'],
                    ['name' => 'CENGİZ İNŞAAT – KUZEY MARMARA OTOYOLU KESİMİ 4',            'quantity' => '730.000 m³', 'status' => 'devam_eden'],
                    ['name' => 'KALYON GRUP – İSTANBUL HAVALİMANI 2. ETAP GENİŞLEME',       'quantity' => '850.000 m³', 'status' => 'devam_eden'],
                    ['name' => 'YDA GROUP – ANKARA – İSTANBUL HIZ TRENİ ALTYAPISI',          'quantity' => '410.000 m³', 'status' => 'devam_eden'],
                ],
            ],

            // ── 2. Asel İnşaat Hafriyat ─────────────────────────────────────────
            // Mevcut 83 referans zaten Asel adına → sadece 22 ek ekle
            [
                'company'   => 'Asel İnşaat Hafriyat',
                'work_type' => 'Hafriyat',
                'refs' => [
                    ['name' => 'İNTES İNŞAAT TİC. VE SAN. A.Ş – KARTAL HASTANE',           'quantity' => '210.000 m³', 'status' => 'tamamlanan'],
                    ['name' => 'ÇELİK MOTOR A.Ş – TUZLA FABRİKA GENİŞLEMESİ',              'quantity' => '82.000 m³',  'status' => 'tamamlanan'],
                    ['name' => 'BİM BİRLEŞİK MAĞAZALAR A.Ş – ANADOLU DEPO PROJESİ',        'quantity' => '140.000 m³', 'status' => 'tamamlanan'],
                    ['name' => 'HAYAT KİMYA SAN. A.Ş – GEBZE TESİS GENİŞLEMESİ',           'quantity' => '95.000 m³',  'status' => 'tamamlanan'],
                    ['name' => 'EKSEN YAPILARı A.Ş – SULTANBEYLİ PROJESİ',                 'quantity' => '188.000 m³', 'status' => 'tamamlanan'],
                    ['name' => 'AĞAOĞLU İNŞAAT – MY TOWERLAND PROJESİ',                     'quantity' => '275.000 m³', 'status' => 'tamamlanan'],
                    ['name' => 'AKMERKEZ GYO A.Ş – ETİLER OFİS KATLAR GENİŞLEME',          'quantity' => '51.000 m³',  'status' => 'tamamlanan'],
                    ['name' => 'TURKCELL İLETİŞİM A.Ş – TEKNİK ALTYAPI PROJESİ',           'quantity' => '38.000 m³',  'status' => 'tamamlanan'],
                    ['name' => 'PEYİNİRCİOĞLU MÜH. İNŞ. LTD ŞTİ – MALTEPE',               'quantity' => '117.000 m³', 'status' => 'tamamlanan'],
                    ['name' => 'STAR MÜH. İNŞ. SAN. TİC. LTD. ŞTİ – ÜMRANİYE',            'quantity' => '63.000 m³',  'status' => 'tamamlanan'],
                    ['name' => 'UZAY YAPI İNŞAAT A.Ş – ATAŞEHİR KONUTLARı',               'quantity' => '224.000 m³', 'status' => 'tamamlanan'],
                    ['name' => 'POLAT YAPI A.Ş – ATAKÖY MARINA PROJESİ',                   'quantity' => '302.000 m³', 'status' => 'tamamlanan'],
                    ['name' => 'İBRAHİM USTA İNŞ. SAN. TİC. LTD – SANCAKTEPE',            'quantity' => '73.000 m³',  'status' => 'tamamlanan'],
                    ['name' => 'ÜNAL GRUP İNŞAAT – KAYNARCA TOPLU KONUT',                  'quantity' => '156.000 m³', 'status' => 'tamamlanan'],
                    ['name' => 'GELİŞİM YAPI SAN. A.Ş – ARNAVUTKÖY PROJESİ',              'quantity' => '209.000 m³', 'status' => 'tamamlanan'],
                    ['name' => 'DAL İNŞAAT LTD ŞTİ – GEBZE SANAYİ BÖLGESİ',              'quantity' => '88.500 m³',  'status' => 'tamamlanan'],
                    ['name' => 'SİNERJİ YAPI A.Ş – ÇEKMEKÖy VİLLA PROJESİ',              'quantity' => '44.200 m³',  'status' => 'tamamlanan'],
                    ['name' => 'KANYON YAPI İNŞ. LTD ŞTİ – BAHÇEŞEHİR',                   'quantity' => '131.000 m³', 'status' => 'tamamlanan'],
                    ['name' => 'ÖZ-İNŞ TAAHHÜT SAN. TİC. A.Ş – SİLİVRİ',                 'quantity' => '176.000 m³', 'status' => 'devam_eden'],
                    ['name' => 'SOYAK HOLDİNG – YENİŞEHİR PROJESİ 3. ETAP',               'quantity' => '385.000 m³', 'status' => 'devam_eden'],
                    ['name' => 'MİDAS YAPI A.Ş – BEYKOZ DÖNÜŞÜM PROJESİ',                 'quantity' => '248.000 m³', 'status' => 'devam_eden'],
                    ['name' => 'ÇELİK YAPI A.Ş – SELAMPAZARI TOPLU KONUT',                 'quantity' => '193.000 m³', 'status' => 'devam_eden'],
                ],
            ],

            // ── 3. Ömkar Otomotiv ────────────────────────────────────────────────
            [
                'company'   => 'Ömkar Otomotiv',
                'work_type' => 'Araç & İş Makinesi',
                'refs' => [
                    ['name' => 'DOĞUŞ OTOMOTİV SERVİS VE TİC. A.Ş',                       'quantity' => '24 Araç',    'status' => 'tamamlanan'],
                    ['name' => 'TURKCELL GLOBAL BİLGİ A.Ş – FİLO YENİLEME',                 'quantity' => '18 Araç',    'status' => 'tamamlanan'],
                    ['name' => 'FERNAS İNŞAAT A.Ş – İŞ MAKİNESİ TEMİNİ',                   'quantity' => '7 Makine',   'status' => 'tamamlanan'],
                    ['name' => 'BORUSAN LOJİSTİK – KAMYON FİLO ALIMI',                       'quantity' => '12 Araç',    'status' => 'tamamlanan'],
                    ['name' => 'ALARKO HOLDİNG – KURUMSAL FİLO YENİLEME',                    'quantity' => '31 Araç',    'status' => 'tamamlanan'],
                    ['name' => 'KARTONSAN KARTON SAN. VE TİC. A.Ş',                          'quantity' => '9 Araç',     'status' => 'tamamlanan'],
                    ['name' => 'PETKİM PETROKİMYA HOLDİNG A.Ş',                             'quantity' => '14 Araç',    'status' => 'tamamlanan'],
                    ['name' => 'ÇELİK MOTOR TİCARET A.Ş – İKİNCİ EL ALIM',                  'quantity' => '22 Araç',    'status' => 'tamamlanan'],
                    ['name' => 'GÜVEN SİGORTA A.Ş – FİLO DEĞERLEMESİ',                      'quantity' => '40 Araç',    'status' => 'tamamlanan'],
                    ['name' => 'TRANS ASYA LOJİSTİK – TIR FİLO ALIMI',                       'quantity' => '8 Araç',     'status' => 'tamamlanan'],
                    ['name' => 'POLAT ENERJİ A.Ş – SAHA ARAÇLARI TEMİNİ',                   'quantity' => '11 Araç',    'status' => 'tamamlanan'],
                    ['name' => 'KOÇTAŞ YAPI MARKETLERİ – DAĞITIM FİLO',                     'quantity' => '19 Araç',    'status' => 'tamamlanan'],
                    ['name' => 'AKSA ENERJİ A.Ş – SAHA EKİPMAN ARAÇLARI',                   'quantity' => '6 Araç',     'status' => 'tamamlanan'],
                    ['name' => 'METRO TOPTANCI MARKET A.Ş – LOJİSTİK FİLO',                  'quantity' => '15 Araç',    'status' => 'tamamlanan'],
                    ['name' => 'MAVİ GİYİM SAN. VE TİC. A.Ş',                               'quantity' => '10 Araç',    'status' => 'tamamlanan'],
                    ['name' => 'BİREYSEL MÜŞTERİ GRUBU – EL ARAÇLARI ALIMI',                'quantity' => '27 Araç',    'status' => 'tamamlanan'],
                    ['name' => 'ZİRAAT BANKASI A.Ş – KURUMSAL FİLO',                         'quantity' => '35 Araç',    'status' => 'tamamlanan'],
                    ['name' => 'TÜRK TELEKOM A.Ş – SAHA ARAÇLARI YENİLEME',                  'quantity' => '28 Araç',    'status' => 'tamamlanan'],
                    ['name' => 'VESTEL ELEKTRONİK – LOJİSTİK VE DAĞITIM ARAÇLARI',           'quantity' => '16 Araç',    'status' => 'devam_eden'],
                    ['name' => 'ARÇELIK A.Ş – KURUMSAL FİLO GENİŞLEME',                     'quantity' => '21 Araç',    'status' => 'devam_eden'],
                    ['name' => 'EKSEN ENERJİ – SAHa EKİPMAN PAKETİ',                         'quantity' => '5 Makine',   'status' => 'devam_eden'],
                    ['name' => 'TÜPRAŞ – İZMİT RAFİNERİSİ ARAÇ YENİLEME',                   'quantity' => '33 Araç',    'status' => 'devam_eden'],
                ],
            ],

            // ── 4. Nayifoğulları İnşaat ─────────────────────────────────────────
            [
                'company'   => 'Nayifoğulları İnşaat',
                'work_type' => 'İnşaat & Altyapı',
                'refs' => [
                    ['name' => 'KUYUMCUKENT HOLDİNG – KUYUMCUKENt AVM YAPI',               'quantity' => '18.400 m²',  'status' => 'tamamlanan'],
                    ['name' => 'GÜNEŞLİ SANAYİ SİTESİ YÖNETİMİ – ANA BINA',               'quantity' => '6.200 m²',   'status' => 'tamamlanan'],
                    ['name' => 'ARNAVUTKÖY BELEDİYESİ – ALTYAPI YENİLEME',                  'quantity' => '4.8 km',     'status' => 'tamamlanan'],
                    ['name' => 'ÇİFTLİK GRUP İNŞAAT – PENDİK REZİDANS',                    'quantity' => '12.700 m²',  'status' => 'tamamlanan'],
                    ['name' => 'SULTANGAZI BELEDİYESİ – SOSYAL TESİS BİNASI',               'quantity' => '3.500 m²',   'status' => 'tamamlanan'],
                    ['name' => 'ERTAŞ GRUP – ESENYURT TİCARİ YAPI',                          'quantity' => '9.100 m²',   'status' => 'tamamlanan'],
                    ['name' => 'KARTAL BELEDİYESİ – KAPALI OTOPARK PROJESİ',                'quantity' => '5.600 m²',   'status' => 'tamamlanan'],
                    ['name' => 'ERDEMİR İNŞAAT TİC. A.Ş – BAŞAKŞEHİR KONUTLARı',          'quantity' => '22.300 m²',  'status' => 'tamamlanan'],
                    ['name' => 'EYÜP BELEDİYESİ – KÜLTÜR MERKEZİ İNŞAATI',                 'quantity' => '4.200 m²',   'status' => 'tamamlanan'],
                    ['name' => 'İSTANBUL KENT YAPILARI A.Ş – SİLİVRİ VİLLALARI',           'quantity' => '8.900 m²',   'status' => 'tamamlanan'],
                    ['name' => 'BARAN İNŞAAT SAN. TİC. LTD – KÜÇÜKÇEKMECE',                'quantity' => '11.500 m²',  'status' => 'tamamlanan'],
                    ['name' => 'ÖZEN YAPI A.Ş – BEYOĞLU OFİS BLOKLARI',                    'quantity' => '7.300 m²',   'status' => 'tamamlanan'],
                    ['name' => 'SAKARYA İL ÖZEL İDARESİ – KÖY YOLLARI ALTYAPISI',          'quantity' => '12.4 km',    'status' => 'tamamlanan'],
                    ['name' => 'KOCAELİ BÜYÜKŞEHİR BELEDİYESİ – SPOR TESİSLERİ',         'quantity' => '6.800 m²',   'status' => 'tamamlanan'],
                    ['name' => 'MERT İNŞAAT TİC. A.Ş – BAĞCILAR KONUT PROJESİ',           'quantity' => '15.200 m²',  'status' => 'tamamlanan'],
                    ['name' => 'GÖZTEPE YAPI VE TAAHHÜT LTD – ŞİŞLİ PROJESİ',             'quantity' => '5.100 m²',   'status' => 'tamamlanan'],
                    ['name' => 'AKMAN MÜH. İNŞ. TİC. A.Ş – AVCILAR YAPI GRUBU',           'quantity' => '19.600 m²',  'status' => 'tamamlanan'],
                    ['name' => 'BAŞARAN GRUP – ÇORLU SANAYİ ALTYAPISI',                      'quantity' => '7.5 km',     'status' => 'tamamlanan'],
                    ['name' => 'NİLÜFER BELEDİYESİ – KENTSEL DONATI PROJESİ',               'quantity' => '3.900 m²',   'status' => 'devam_eden'],
                    ['name' => 'BOLU BELEDİYESİ – ŞEHİR MERKEZİ YENİLEMESİ',               'quantity' => '8.200 m²',   'status' => 'devam_eden'],
                    ['name' => 'TUZLA BELEDİYESİ – ENDÜSTRİYEL ALAN DÜZENLEMESİ',          'quantity' => '25.000 m²',  'status' => 'devam_eden'],
                    ['name' => 'SİNPAŞ GYO A.Ş – SULTANGAZİ BÜYÜK PROJE',                  'quantity' => '34.500 m²',  'status' => 'devam_eden'],
                ],
            ],

            // ── 5. Nayifoğulları YMK Yıkım ──────────────────────────────────────
            [
                'company'   => 'Nayifoğulları YMK Yıkım',
                'work_type' => 'Kontrollü Yıkım',
                'refs' => [
                    ['name' => 'FIRAT CAM SANAYİ A.Ş – ESKİ FABRİKA YIKIMI',               'quantity' => '14.200 m²',  'status' => 'tamamlanan'],
                    ['name' => 'T.C. ÇEVRE VE ŞEHİRCİLİK BAKANLIĞI – RİSKLİ YAPI',         'quantity' => '38 Blok',    'status' => 'tamamlanan'],
                    ['name' => 'ZEYTİNBURNU BELEDİYESİ – KENTSEL DÖNÜŞÜM 1. ETAP',         'quantity' => '62 Bina',    'status' => 'tamamlanan'],
                    ['name' => 'BAĞCILAR BELEDİYESİ – RUHSATSIZ YAPI YIKIMI',               'quantity' => '29 Bina',    'status' => 'tamamlanan'],
                    ['name' => 'AFAD – DEPREM RISKI TAŞıYAN BİNA GRUBU',                    'quantity' => '17 Bina',    'status' => 'tamamlanan'],
                    ['name' => 'GÜNEŞLER MAHALLESİ KENTSEL DÖNÜŞÜM PROJESİ',                'quantity' => '45 Bina',    'status' => 'tamamlanan'],
                    ['name' => 'ESENYURT BELEDİYESİ – KAÇAK YAPI YIKIMI',                   'quantity' => '33 Bina',    'status' => 'tamamlanan'],
                    ['name' => 'PETKİM PETROKİMYA – ESKİ DEPO YIKIMI',                      'quantity' => '8.700 m²',   'status' => 'tamamlanan'],
                    ['name' => 'TÜPRAŞ – İZMİT ESKİ YAPI KOMPLEKS YIKIMI',                  'quantity' => '12.400 m²',  'status' => 'tamamlanan'],
                    ['name' => 'EREĞLI DEMİR VE ÇELİK FABRİKASI – ATIL TESİS',             'quantity' => '19.600 m²',  'status' => 'tamamlanan'],
                    ['name' => 'KÜÇÜKÇEKMECE BELEDİYESİ – 2. ETAP KENTSEL DÖNÜŞÜM',        'quantity' => '51 Bina',    'status' => 'tamamlanan'],
                    ['name' => 'ÜSKÜDAR BELEDİYESİ – TARİHİ BÖLGE DÜZENLEME',              'quantity' => '12 Yapı',    'status' => 'tamamlanan'],
                    ['name' => 'İSTANBUL MİLLİ EMLAk MÜDÜRLÜĞÜ – HAZINE YAPILARI',         'quantity' => '9 Yapı',     'status' => 'tamamlanan'],
                    ['name' => 'SARıGAZİ TOPLU KONUT DÖNÜŞÜM PROJESİ',                      'quantity' => '78 Bina',    'status' => 'tamamlanan'],
                    ['name' => 'KARTAL BELEDİYESİ – SAHİL ŞERİDİ DÜZENLEME YIKIMI',        'quantity' => '22 Yapı',    'status' => 'tamamlanan'],
                    ['name' => 'BAHÇELİEVLER BELEDİYESİ – RİSKLİ ALAN YIKIMI',             'quantity' => '41 Bina',    'status' => 'tamamlanan'],
                    ['name' => 'TÜRK TELEKOM – ESKİ SANTRAL BİNALARI YIKIMI',               'quantity' => '6 Yapı',     'status' => 'tamamlanan'],
                    ['name' => 'GAZİOSMANPAŞA BELEDİYESİ – KENTSEL DÖNÜŞÜM',               'quantity' => '57 Bina',    'status' => 'tamamlanan'],
                    ['name' => 'ESENLER BELEDİYESİ – 3. ETAP YIKIM VE MOLOZ',               'quantity' => '34 Bina',    'status' => 'devam_eden'],
                    ['name' => 'ŞİŞLİ BELEDİYESİ – MERKEZİ İŞ ALANI YENİLEME',            'quantity' => '18 Yapı',    'status' => 'devam_eden'],
                    ['name' => 'BAĞCILAR BELEDİYESİ – 4. ETAP KENTSEL DÖNÜŞÜM',            'quantity' => '64 Bina',    'status' => 'devam_eden'],
                    ['name' => 'T.C. ÇEVRE VE ŞEHİRCİLİK BAKANLIĞI – İSTANBUL 2025',       'quantity' => '120 Bina',   'status' => 'devam_eden'],
                ],
            ],
        ];

        $globalOrder = Reference::max('order') ?? 0;

        foreach ($companies as $companyData) {
            $compName  = $companyData['company'];
            $workType  = $companyData['work_type'];

            foreach ($companyData['refs'] as $ref) {
                $globalOrder++;
                $base = 'ref-' . Str::slug(Str::limit($ref['name'], 50));
                $slug = $base;
                $n    = 1;
                while (Reference::where('slug', $slug)->exists()) {
                    $slug = $base . '-' . $n++;
                }

                Reference::firstOrCreate(
                    ['slug' => $slug],
                    [
                        'name'      => $ref['name'],
                        'slug'      => $slug,
                        'work_type' => $workType,
                        'quantity'  => $ref['quantity'],
                        'status'    => $ref['status'],
                        'company'   => $compName,
                        'order'     => $globalOrder,
                        'is_active' => true,
                    ]
                );
            }
        }
    }
}
