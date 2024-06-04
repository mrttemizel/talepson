<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ReceivedRequestMail;
use App\Mail\RequestFoodMail;
use App\Mail\RequestFormBlade;
use App\Models\Food;
use App\Models\MailAdresleri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class FoodController extends Controller
{
    public array $treats = [
        'Çay',
        'Bardak Su',
        'Pet Su',
        'Çay + K. Pasta',
        'Çay + K. Pasta + K. Çerez',
        'Meyve Tabağı',
        'Tatlı Tabağı',
        'Çay + Kahve + Cips + Vip Karışık Çerez + K. Pasta + Kuridite (Havuç - Satalık)'
    ];

    public array $foods = [
        'VIP Kahvaltı',
        'VIP Yemek',
        'Açık Büfe Kahvaltı',
        'Self Servis Yemek',
        'Ekonomik Menü Kahvaltı',
        'Ekonomik Menü Yemek'
    ];

    public array $places = [
        [
            'name' => 'Personel Yemekhanesi (136 Kişilik)',
            'dorm' => false
        ],
        [
            'name' => 'Erkek Yurdu Yemekhanesi (160 Kişilik)',
            'dorm' => true
        ],
        [
            'name' => 'Kız Yurdu Yemekhanesi (150 Kişilik)',
            'dorm' => true
        ],
        [
            'name' => 'Öğrenci Yemekhanesi (Öğrenci Bölümü 96 Kişilik)',
            'dorm' => false
        ],
        [
            'name' => 'Öğrenci Yemekhanesi (Misafir Bölümü 172 Kişilik)',
            'dorm' => false
        ],
        [
            'name' => 'Senato Odası (26 Kişilik)',
            'dorm' => false
        ],
        [
            'name' => 'Rektörlük Toplantı Odası (RGS-28,24 Kişilik)',
            'dorm' => false
        ]
    ];

    public array $dormitories = [
        [
            'name' => '(Yurt) Açık Büfe Kahvaltı Toplam Sayı'
        ],
        [
            'name' => '(Yurt) Self Servis Öğle Yemeği Toplam Sayı'
        ],
        [
            'name' => '(Yurt) Self Servis Akşam Yemeği Toplam Sayı'
        ],
        [
            'name' => '(Yurt Misafir) Açık Büfe Kahvaltı Toplam Sayı'
        ],
        [
            'name' => '(Yurt Misafir) Self Servis Öğle Yemeği Toplam Sayı'
        ],
        [
            'name' => '(Yurt Misafir) Self Servis Akşam Yemeği Toplam Sayı'
        ],
        [
            'name' => 'Açık Büfe Kahvaltı Genel Toplam Sayı'
        ],
        [
            'name' => 'Self Servis Öğle Yemeği Genel Toplam Sayı'
        ],
        [
            'name' => 'Self Servis Akşam Yemeği Genel Toplam Sayı'
        ]
    ];

    public array $groups = [
        [
            'name' => 'Öğrenci'
        ],
        [
            'name' => 'Öğretim Görevlisi'
        ],
        [
            'name' => 'İş Adamı'
        ],
        [
            'name' => 'Protokol'
        ],
        [
            'name' => 'Personel'
        ]
    ];

    public array $paymentTypes = [
        [
            'name' => 'Kendisi Ödeyecek'
        ],
        [
            'name' => 'Okul Karşılayacak'
        ],
        [
            'name' => 'SKS'
        ],
        [
            'name' => 'Tanıtım Birimi'
        ]
    ];

    public function create(): View
    {
        return view('frontend.food_request')
            ->with('treats', $this->treats)
            ->with('foods', $this->foods)
            ->with('places', $this->places)
            ->with('dormitories', $this->dormitories)
            ->with('groups', $this->groups)
            ->with('paymentTypes', $this->paymentTypes)
        ;
    }

    public function store(Request $request)
    {
        $request->validate([
            'program_adi' => ['required', 'string', 'max:500'],
            'talep_yapan_birim' => ['required', 'string', 'max:200'],
            'talep_yapan_kisi' => ['required', 'string', 'max:200'],
            'email' => ['required', 'email'],
            'universite_sorumlu_isim' => ['required', 'string', 'max:200'],
            'program_sorumlu_telefon' => ['required', 'string', 'max:18'],
            'program_tarih' => ['required', 'date', 'dateFormat:Y-m-d'],
            'program_saat' => ['required', 'dateFormat:H:i'],
            'talep_tipi' => ['required'],
            'yer' => ['required'],
            'yurt.*' => ['nullable', 'string', 'max:255'],
            'grup_tanimi' => ['required'],
            'odeme_tipi' => ['required'],
            'aciklama' => ['nullable', 'string']
        ]);

        $emails = MailAdresleri::query()
            ->where('form_tanimi', '=', MailAdresleri::TYPE_FOOD_REQUEST)
            ->get();

        if ($emails->isEmpty()) {
            return redirect()->back()->with([
                'message' => 'Gönderilecek herhangi bir mail adresi bulunamadı.',
                'alert-type' => 'error'
            ]);
        }

        $ikram = $request->input('ikram');
        $yemek = $request->input('yemek');
        $yer = $request->input('yer');
        $yurt = $request->input('yurt');
        $talepTipi = $request->input('talep_tipi');
        $grup = $request->input('grup_tanimi');

        Food::query()->create([
            'program_adi' => $request->input('program_adi'),

            'talep_yapan_birim' => $request->input('talep_yapan_birim'),
            'talep_yapan_kisi' => $request->input('talep_yapan_kisi'),

            'universite_sorumlu_isim' => $request->input('universite_sorumlu_isim'),
            'program_sorumlu_telefon' => $request->input('program_sorumlu_telefon'),

            'program_tarihi' => $request->input('program_tarihi'),
            'program_saati' => $request->input('program_saati'),

            'talep_tipi' => $request->input('talep_tipi'),

            'ikram' => $this->treats[$ikram] ?? 'other',
            'ikram_diger' => $request->input('ikram_diger'),
            'ikram_kisi_sayisi' => $request->input('ikram_kisi'),

            'yemek_kahvalti_tipi' => $this->foods[$yemek] ?? 'other',
            'yemek_diger' => $request->input('yemek_diger'),
            'yemek_kisi_sayisi' => $request->input('yemek_kisi'),

            'yer' => $this->places[$yer]['name'] ?? 'other',
            'yer_diger' => $request->input('yer_diger'),

            'yurt_acik_bufe_kahvalti_sayisi' => $yurt[0] ?? null,
            'yurt_self_servis_ogle_yemegi_sayisi' => $yurt[1] ?? null,
            'yurt_self_servis_aksam_yemegi_sayisi' => $yurt[2] ?? null,
            'yurt_misafir_acik_bufe_kahvalti_sayisi' => $yurt[3] ?? null,
            'yurt_misafir_self_servis_ogle_yemegi_sayisi' => $yurt[4] ?? null,
            'yurt_misafir_self_servis_aksam_yemegi_sayisi' => $yurt[5] ?? null,
            'acik_bufe_kahvalti_genel_toplam' => $yurt[6] ?? null,
            'self_servis_ogle_yemegi_genel_toplam' => $yurt[7] ?? null,
            'self_servis_aksam_yemegi_genel_toplam' => $yurt[8] ?? null,

            'grup_tanimi' => $request->input('grup_tanimi'),
            'grup_tanimi_diger' => $request->input('grup_tanimi_diger'),

            'odeme_tipi' => $request->input('odeme_tipi'),
            'aciklama' => $request->input('aciklama')
        ]);

        $mailData = collect([
            [ 'key' => 'Program Adı', 'value' => $request->input('program_adi') ],
            [ 'key' => 'Talep Yapan Birim', 'value' => $request->input('talep_yapan_birim') ],
            [ 'key' => 'Talep Yapan Kişi', 'value' => $request->input('talep_yapan_kisi') ],
            [ 'key' => 'E-Posta Adresi', 'value' => $request->input('email') ],
            [ 'key' => 'Ünv. Adına Program Sorumlusu İsim', 'value' => $request->input('universite_sorumlu_isim') ],
            [ 'key' => 'Program Sorumlusu Telefon', 'value' => $request->input('program_sorumlu_telefon') ],
            [ 'key' => 'Program Tarihi', 'value' => $request->input('program_tarih') ],
            [ 'key' => 'Program Saati', 'value' => $request->input('program_saat') ],
            [ 'key' => 'Talep Tipi', 'value' => ucfirst($request->input('talep_tipi')) ],
        ]);

        if ($talepTipi == 'ikram') {
            $ikramValue = $ikram;
            if ($ikram == 'other') {
                $ikramValue = $request->input('ikram_diger');
            }

            $mailData = $mailData->merge([
                [
                    'key' => 'İkram', 'value' => $ikramValue
                ],
                [
                    'key' => 'İkram Kişi Sayısı', 'value' => $request->input('ikram_kisi')
                ]
            ]);
        }

        if ($talepTipi == 'yemek') {
            $yemekValue = $yemek;
            if ($yemek == 'other') {
                $yemekValue = $request->input('yemek_diger');
            }

            $mailData = $mailData->merge([
                [
                    'key' => 'Yemek & Kahvalti', 'value' => $yemekValue
                ],
                [
                    'key' => 'Yemek Kişi Sayısı', 'value' => $request->input('yemek_kisi')
                ]
            ]);
        }

        $yerValue = $this->places[$yer]['name'] ?? '';
        if ($yer == 'other') {
            $yerValue = $request->input('yer_diger');
        }

        $mailData->push([
            'key' => 'Yer', 'value' => $yerValue
        ]);

        if (in_array($yer, [1, 2])) { // yurtlar
            $mailData = $mailData->merge([
                [ 'key' => '(Yurt) Açık Büfe Kahvaltı Toplam Sayı', 'value' => $yurt[0] ?? '' ],
                [ 'key' => '(Yurt) Self Servis Öğle Yemeği Toplam Sayı', 'value' => $yurt[1] ?? '' ],
                [ 'key' => '(Yurt) Self Servis Akşam Yemeği Toplam Sayı', 'value' => $yurt[2] ?? '' ],
                [ 'key' => '(Yurt Misafir) Açık Büfe Kahvaltı Toplam Sayı', 'value' => $yurt[3] ?? '' ],
                [ 'key' => '(Yurt Misafir) Self Servis Öğle Yemeği Toplam Sayı', 'value' => $yurt[4] ?? '' ],
                [ 'key' => '(Yurt Misafir) Self Servis Akşam Yemeği Toplam Sayı', 'value' => $yurt[5] ?? '' ],
                [ 'key' => 'Açık Büfe Kahvaltı Genel Toplam Sayı', 'value' => $yurt[6] ?? '' ],
                [ 'key' => 'Açık Büfe Kahvaltı Genel Toplam Sayı', 'value' => $yurt[7] ?? '' ],
                [ 'key' => 'Self Servis Akşam Yemeği Genel Toplam Sayı', 'value' => $yurt[8] ?? '' ],
            ]);
        }

        $grupValue = $grup;
        if ($grup == 'other') {
            $grupValue = $request->input('grup_tanimi_diger');
        }
        $mailData->push([
            'key' => 'Grup Tanımı', 'value' => $grupValue
        ]);

        $mailData = $mailData->merge([
            [ 'key' => 'Ödeme Tipi', 'value' => $this->paymentTypes[$request->input('odeme_tipi')]['name'] ?? '' ],
            [ 'key' => 'Açıklama', 'value' => $request->input('aciklama') ]
        ]);

        Mail::to($request->input('email'))->queue(new ReceivedRequestMail());

        Mail::to($emails->pluck('mail')->toArray())
            ->cc($emails->pluck('cc')->toArray())
            ->queue(new RequestFormBlade([
                'title' => 'İkram & Kahvaltı Talebi',
                'tableData' => $mailData->toArray()
            ]));

        return redirect()->route('request.index')->with([
            'message' => 'Yemek & Kahvaltı talebiniz alınmıştır.',
            'alert-type' => 'success'
        ]);
    }
}
