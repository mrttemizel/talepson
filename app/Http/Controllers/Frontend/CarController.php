<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\RequestFormBlade;
use App\Models\Car;
use App\Models\MailAdresleri;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use TimeHunter\LaravelGoogleReCaptchaV2\Validations\GoogleReCaptchaV2ValidationRule;

class CarController extends Controller
{
    public function index(): View
    {
        return view('frontend.car-form');
    }
    public function store(Request $request): RedirectResponse
    {
        $notification = array(
            'message' => 'Başvuru İşlemi Başarılı',
            'alert-type' => 'success'
        );

        $notification_error = array(
            'message' => 'Gönderilecek Mail Adresi Bulunamadı',
            'alert-type' => 'error'
        );

        $request->validate([
            'program_adi' => 'required',
            'program_sorumlusu_ismi' => 'required',
            'program_sorumlusu_telefon' => 'required',
            'talep_yapan_kisi' => 'required',
            'email' => 'email|required',
            'kalkis_yeri' => 'required',
            'gidilecek_yer' => 'required',
            'kalkis_tarihi' => 'required',
            'kalkis_saati' => 'required',
            'donus_tarihi' => 'required',
            'donus_saati' => 'required',
            'odeme_tipi' => 'required|integer',
            'grup_tanimi' => 'required|integer',
            'aciklama' => 'required',
            'g-recaptcha-response' => [new GoogleReCaptchaV2ValidationRule()]
        ]);


        $odeme_tipi = [
            '1' => 'Kendisi Ödeyecek',
            '2' => 'Okul Karşılayacak',
            '3' => 'SKS',
            '4' => 'Tanıtım Birimi',
        ];

        $grup_tanimi = [
            '1' => 'Öğrenci',
            '2' => 'Öğretim Görevlisi',
            '3' => 'İş Adamı',
            '4' => 'Protokol',
            '5' => 'Personel',
            '6' => 'Diğer',
        ];

        $mail = [
            'title' => 'Araç Talep Formu',
            'tableData' => [
                ['key' => 'Program Adı', 'value' => $request->input('program_adi')],
                ['key' => 'Program Sorumlusu İsmi', 'value' => $request->input('program_sorumlusu_ismi')],
                ['key' => 'Program Sorumlusu Telefon', 'value' => $request->input('program_sorumlusu_telefon')],
                ['key' => 'Talep Yapan Kisi', 'value' => $request->input('talep_yapan_kisi')],
                ['key' => 'Email', 'value' => $request->input('email')],
                ['key' => 'Kalkıs Yeri', 'value' => $request->input('kalkis_yeri')],
                ['key' => 'Name', 'value' => $request->input('gidilecek_yer')],
                ['key' => 'Gidilecek Yer', 'value' => $request->input('kalkis_tarihi')],
                ['key' => 'Kalkis Saati', 'value' => $request->input('kalkis_saati')],
                ['key' => 'Donus Tarihi', 'value' => $request->input('donus_tarihi')],
                ['key' => 'Donus Saati', 'value' => $request->input('donus_saati')],
                ['key' => 'Odeme Tipi', 'value' => $odeme_tipi[$request->input('odeme_tipi')]],
                ['key' => 'Grup Tanımı', 'value' => $grup_tanimi[$request->input('grup_tanimi')]],
                ['key' => 'Aciklama', 'value' => $request->input('aciklama')],

            ]
        ];

        $data = new Car();

        $basvuru_id = IdGenerator::generate(['table' => 'cars', 'field' => 'basvuru_id', 'length' => 10, 'prefix' => 'BSV-CAR-']);
        $data->basvuru_id = $basvuru_id;

        $data->program_adi = $request->input('program_adi');
        $data->program_sorumlusu_ismi = $request->input('program_sorumlusu_ismi');
        $data->program_sorumlusu_telefon = $request->input('program_sorumlusu_telefon');
        $data->talep_yapan_kisi = $request->input('talep_yapan_kisi');
        $data->email = $request->input('email');
        $data->kalkis_yeri = $request->input('kalkis_yeri');
        $data->gidilecek_yer = $request->input('gidilecek_yer');
        $data->kalkis_tarihi = $request->input('kalkis_tarihi');
        $data->kalkis_saati = $request->input('kalkis_saati');
        $data->donus_tarihi = $request->input('donus_tarihi');
        $data->donus_saati = $request->input('donus_saati');
        $data->odeme_tipi = $request->input('odeme_tipi');
        $data->grup_tanimi = $request->input('grup_tanimi');
        $data->aciklama = $request->input('aciklama');
        $data->basvuru_durumu = 0;
        $query = $data->save();


        $mailAdresi = MailAdresleri::where('form_tanimi', 1)->first();

        $models = MailAdresleri::all()->where('form_tanimi',1);
        if ($models->isEmpty()) {
            return back()->with($notification_error);
        } else {
            Mail::to($mailAdresi->mail)->cc($mailAdresi->cc)->send(new RequestFormBlade($mail));
        }

        if (!$query) {
            return back()->with('error', 'Kullanıcı eklenirken bir hata oluştu!');
        } else {
            return redirect()->route('request.index')->with($notification);
        }

    }


}
