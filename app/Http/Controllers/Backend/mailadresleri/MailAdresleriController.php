<?php

namespace App\Http\Controllers\Backend\mailadresleri;

use App\Http\Controllers\Controller;
use App\Models\MailAdresleri;
use Illuminate\Http\Request;

class MailAdresleriController extends Controller
{
   public  function index()
   {
       $data = MailAdresleri::query()
           ->orderBy('form_tanimi', 'asc')
           ->get();
       return view('backend.mailadresleri.index',compact('data'));
   }

    public  function store(Request $request)
    {
        $request->validate([
            'form_tanimi' => 'required|unique:mail_adresleris',
            'cc' => 'required|string|email|max:255',
            'mail' => 'required|string|email|max:255',
        ]);



        $data = new MailAdresleri();
        $data->form_tanimi = $request->input('form_tanimi');
        $data->mail = $request->input('mail');
        $data->cc = $request->input('cc');

        $query = $data->save();
        if (!$query) {
            return back()->with('error', 'Kullanıcı eklenirken bir hata oluştu!');
        } else {
            return back()->with('success', 'Mail Ekleme İşlemi Başarılı');
        }
    }

    public function delete($id)
    {
        $data = MailAdresleri::find($id);

        $query = $data->delete();
        if (!$query) {
            return back()->with('error', 'Bölüm Silinirken bir hata oluştu!');
        } else {
            return back()->with('success', 'Mail silme işlemi başarılı.');
        }
    }
}
