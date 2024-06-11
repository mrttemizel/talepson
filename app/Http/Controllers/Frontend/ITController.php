<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ReceivedRequestMail;
use App\Mail\RequestFormBlade;
use App\Models\IT;
use App\Models\MailAddress;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use TimeHunter\LaravelGoogleReCaptchaV2\Validations\GoogleReCaptchaV2ValidationRule;

class ITController extends Controller
{
    public function index(): View
    {
        return view('frontend.it');
    }

    public function store(Request $request)
    {
        $request->validate([
            'talep_yapan_birim' => ['required'],
            'talep_yapan_kisi' => ['required'],
            'email' => ['required', 'email'],
            'cep_telefonu' => ['required'],
            'aciklama' => ['required'],
            'g-recaptcha-response' => [new GoogleReCaptchaV2ValidationRule()]

        ]);

        $emails = MailAddress::query()->where('form_type', '=', MailAddress::TYPE_INTERNET_TECHNOLOGY_REQUEST)->get();

        if ($emails->isEmpty()) {
            return back()->with('error', [
                'message' => 'Kayıtlı bir mail adresi bulunamadı!',
                'alert-type' => 'error'
            ]);
        }

        IT::query()->create([
            'basvuru_id' => IdGenerator::generate(['table' => 'i_t_s', 'field' => 'basvuru_id', 'length' => 10, 'prefix' => 'BSV-IT-']),

            'talebi_yapan_birim' => $request->input('talebi_yapan_birim'),
            'talebi_yapan_kisi' => $request->input('talebi_yapan_kisi'),
            'email' => $request->input('email'),
            'cep_telefonu' => $request->input('cep_telefonu'),
            'aciklama' => $request->input('aciklama')
        ]);

        $mail = [
            'title' => 'Bilgi İşlem Talep',
            'tableData' => [
                [ 'key' => 'Talep Yapan Birim', 'value' => $request->input('talep_yapan_birim') ],
                [ 'key' => 'Talep Yapan Kişi', 'value' => $request->input('talep_yapan_kisi') ],
                [ 'key' => 'E-Posta', 'value' => $request->input('email') ],
                [ 'key' => 'Cep Telefonu', 'value' => $request->input('cep_telefonu') ],
                [ 'key' => 'Açıklama', 'value' => $request->input('aciklama') ]
            ]
        ];

        Mail::to($request->input('email'))->queue(new ReceivedRequestMail());

        $sendEmails = $emails->filter(function ($email) {
            return $email->mail_type == MailAddress::MAIL_TYPE_SEND;
        })->pluck('email')->toArray();
        $sendCC = $emails->filter(function ($email) {
            return $email->mail_type == MailAddress::MAIL_TYPE_CC;
        })->pluck('email')->toArray();

        Mail::to($sendEmails)->cc($sendCC)->send(new RequestFormBlade($mail));

        return redirect()->route('request.index')->with([
            'message' => 'Talebiniz Alınmıştır',
            'alert-type' => 'success'
        ]);
    }
}
