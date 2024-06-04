<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\RequestFormBlade;
use App\Models\MailAdresleri;
use App\Models\Technical;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use TimeHunter\LaravelGoogleReCaptchaV2\Validations\GoogleReCaptchaV2ValidationRule;

class TechnicalController extends Controller
{
    public function index(): View
    {
        return view('frontend.technical-form');
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
            'talep_yapan_birim' => 'required',
            'talep_yapan_kisi' => 'required',
            'telefon' => 'required',
            'email' => 'email|required',
            'taleple_ilgili_yer' => 'required',
            'talep_tarihi' => 'required',
            'talep_saati' => 'required',
            'talep_tipi' => 'required',
            'talep_tipi_diger' => 'required_if:talep_tipi,diger',
            'aciklama' => 'required',
            'g-recaptcha-response' => [new GoogleReCaptchaV2ValidationRule()]
        ]);


        $talep_tipi = [
            '1' => 'Arıza - Tamir - Onarım',
            '2' => 'Elektirik',
            '3' => 'İmalat',
            '4' => 'Montaj',
            '5' => 'Peyzaj İşleri',
            '6' => 'Diğer',
        ];

        $mail = [
            'title' => 'Teknik Servis Talep Formu',
            'tableData' => [
                ['key' => 'Talep Yapan Birim ', 'value' => $request->input('talep_yapan_birim')],
                ['key' => 'Talep Yapan  Kişi', 'value' => $request->input('talep_yapan_kisi')],
                ['key' => 'Telefon', 'value' => $request->input('telefon')],
                ['key' => 'E-Posta Adresi', 'value' => $request->input('email')],
                ['key' => 'Taleple İlgili Yer', 'value' => $request->input('taleple_ilgili_yer')],
                ['key' => 'Talep Tarihi ', 'value' => $request->input('talep_tarihi')],
                ['key' => 'Talep Saati', 'value' => $request->input('talep_saati')],
                ['key' => 'Talep Tipi', 'value' => $talep_tipi[$request->input('talep_tipi')]],
                ['key' => 'Talep Tipi Diğer', 'value' => $request->input('talep_tipi_diger')],
                ['key' => 'Aciklama', 'value' => $request->input('aciklama')],
            ]
        ];


        $data = new Technical();
        $basvuru_id = IdGenerator::generate(['table' => 'cars', 'field' => 'basvuru_id', 'length' => 10, 'prefix' => 'BSV-CAR-']);
        $data->basvuru_id = $basvuru_id;

        $data->talep_yapan_birim = $request->input('talep_yapan_birim');
        $data->talep_yapan_kisi = $request->input('talep_yapan_kisi');
        $data->telefon = $request->input('telefon');
        $data->email = $request->input('email');
        $data->taleple_ilgili_yer = $request->input('taleple_ilgili_yer');
        $data->talep_tarihi = $request->input('talep_tarihi');
        $data->talep_saati = $request->input('talep_saati');
        $data->talep_tipi = $talep_tipi[$request->input('talep_tipi')];
        $data->talep_tipi_diger = $request->input('talep_tipi_diger');
        $data->aciklama = $request->input('aciklama');
        $data->basvuru_durumu = 0;
        $query = $data->save();

        $mailAdresi = MailAdresleri::where('form_tanimi', 1)->first();

        $models = MailAdresleri::all()->where('form_tanimi',2);
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
