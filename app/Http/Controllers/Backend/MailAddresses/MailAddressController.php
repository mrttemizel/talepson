<?php

namespace App\Http\Controllers\Backend\MailAddresses;

use App\Http\Controllers\Controller;
use App\Models\MailAddress;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MailAddressController extends Controller
{
   public  function index(): View
   {
       $data = MailAddress::query()
           ->orderBy('id', 'desc')
           ->get();

       return view('backend.mailAddress.index',compact('data'));
   }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'mail_type' => ['required', 'in:' . MailAddress::getMailTypes()->keys()->implode(',')],
            'form_type' => ['required', 'in:' . MailAddress::getFormTypes()->keys()->implode(',')],
            'email' => ['required', 'email', 'unique:mail_addresses,email']
        ]);

        return DB::transaction(function () use ($request) {
            try {
                MailAddress::query()->create([
                    'mail_type' => $request->input('mail_type'),
                    'form_type' => $request->input('form_type'),
                    'email' => $request->input('email')
                ]);

                return back()->with('success', 'Mail Ekleme İşlemi Başarılı');
            } catch (QueryException $e) {
                logger()->error($e);
                DB::rollBack();
                return back()->with('error', 'Kullanıcı eklenirken bir hata oluştu!');
            }
        });
    }

    public function delete(int $id): RedirectResponse
    {
        return DB::transaction(function () use ($id) {
            try {
                MailAddress::query()->findOrFail($id)->delete();

                return back()->with('success', 'Mail silme işlemi başarılı.');
            } catch (QueryException $e) {
                logger()->error($e);
                DB::rollBack();
                return back()->with('error', 'Bölüm Silinirken bir hata oluştu!');
            }
        });
    }
}
