<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ReceivedRequestMail;
use App\Mail\RequestFormBlade;
use App\Models\IT;
use App\Models\MailAdresleri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

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
            'aciklama' => ['required']
        ]);

        $emails = MailAdresleri::query()->where('form_tanimi', '=', MailAdresleri::TYPE_INTERNET_TECHNOLOGY_REQUEST)->get();

        if ($emails->isEmpty()) {
            return redirect()->route('request.index')->with([
                'message' => 'Gönderilecek Mail Adresi Bulunamadı',
                'alert-type' => 'error'
            ]);
        }

        IT::query()->create([
            'talebi_yapan_birim' => $request->input('talebi_yapan_birim'),
            'talebi_yapan_kisi' => $request->input('talebi_yapan_kisi'),
            'email' => $request->input('email'),
            'cep_telefonu' => $request->input('cep_telefonu'),
            'aciklama' => $request->input('aciklama')
        ]);

        Mail::to($request->input('email'))->queue(new ReceivedRequestMail());

        Mail::to($emails->pluck('mail')->toArray())->cc($emails->pluck('cc')->toArray())->queue(new RequestFormBlade([
            'title' => 'Bilgi İşlem Talep',
            'tableData' => [
                [ 'key' => 'Talep Yapan Birim', 'value' => $request->input('talep_yapan_birim') ],
                [ 'key' => 'Talep Yapan Kişi', 'value' => $request->input('talep_yapan_kisi') ],
                [ 'key' => 'E-Posta', 'value' => $request->input('email') ],
                [ 'key' => 'Cep Telefonu', 'value' => $request->input('cep_telefonu') ],
                [ 'key' => 'Açıklama', 'value' => $request->input('aciklama') ]
            ]
        ]));

        return redirect()->route('request.index')->with([
            'message' => 'Talebiniz Alınmıştır',
            'alert-type' => 'success'
        ]);
    }
}
