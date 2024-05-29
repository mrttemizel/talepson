@extends('backend.components.master')
@section('title')
    Mail Listesi
@endsection
@section('css')
    <link href="{{asset('backend/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>

    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"/>
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css"/>

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

@endsection
@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1')
            Mail
        @endslot
        @slot('title')
            Mail Listesi
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            @if (session()->get('success'))
                <div class="alert alert-success alert-dismissible alert-solid alert-label-icon fade show"
                     role="alert">
                    <i class="ri-check-double-line label-icon"></i><strong>  {{ session()->get('success') }}</strong></strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                </div>
            @endif
            @if (session()->get('error'))
                <div class="alert alert-danger alert-dismissible alert-solid alert-label-icon fade show"
                     role="alert">
                    <i class="ri-check-double-line label-icon"></i><strong>  {{ session()->get('error') }}</strong></strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-4">

                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Mail Adresi Ekle</h5>
                        </div>
                        <form action="{{route('mail.store')}}" method="POST">
                            @csrf
                        <div class="card-body">
                            <div class="col">
                                <div>
                                    <label for="labelInput" class="form-label">Form Adı / Tanımı</label> <span
                                        class="text-danger">*</span>
                                    <select class="form-select" name="form_tanimi"  aria-label="Default select example">
                                        <option selected disabled>Form Adı / Tanımı Seçiniz</option>
                                        <option value="1">ARAÇ TALEP FORMU</option>
                                        <option value="2">TEKNİK SERVİS TALEP FORMU</option>
                                        <option value="3">YEMEK/İKRAM TALEP FORMU</option>
                                        <option value="4">TOPLANTI-SALON TALEP FORMU</option>
                                        <option value="5">TEMİZLİK - EŞYA TAŞIMA - KARGO - KIRTASİYE TALEP FORMU</option>
                                        <option value="6">DOWNTOWN TEKNİK SERVİS TALEP FORMU</option>

                                    </select>
                                    <span class="text-danger">
                                    @error('form_tanimi')
                                        {{ $message }}
                                        @enderror
                            </span>
                                </div>
                            </div>
                            <div class="col mt-3">
                                <div>
                                    <label for="basiInput" class="form-label">Gönderilcek Mail Adresi <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="mail" placeholder="Gönderilcek Mail Adresi" class="form-control"
                                           value="{{ old('mail') }}">
                                    <span class="text-danger">@error('mail')
                                        {{ $message }}
                                        @enderror
                            </span>
                                </div>
                            </div>
                            <div class="col mt-3">
                                <div>
                                    <label for="basiInput" class="form-label">CC Koyulcak Mail Adresi <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="cc" placeholder="CC Koyulcak Mail Adresi" class="form-control"
                                           value="{{ old('cc') }}">
                                    <span class="text-danger">@error('cc')
                                        {{ $message }}
                                        @enderror
                            </span>
                                </div>
                            </div>
                            <div class="col mt-3">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="submit" class="btn btn-primary">Kaydet</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>


                </div>

                <div class="col-lg-8">


                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Mail Adresleri</h5>
                        </div>
                        <div class="card-body">
                            <div class="live-preview">
                                <div class="row gy-3">
                                    <!-- Striped Rows -->
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">Form Adı</th>
                                            <th scope="col">Mail</th>
                                            <th scope="col">CC</th>
                                            <th scope="col">Düzenle</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $form_tanimi = [
                                                     '1' => 'ARAÇ TALEP FORMU',
                                                     '2' => 'TEKNİK SERVİS TALEP FORMU',
                                                     '3' => 'YEMEK/İKRAM TALEP FORMU',
                                                     '4' => 'TOPLANTI-SALON TALEP FORMU',
                                                     '5' => 'TEMİZLİK - EŞYA TAŞIMA - KARGO - KIRTASİYE TALEP FORMU',
                                                     '6' => 'DOWNTOWN TEKNİK SERVİS TALEP FORMU',
                                                 ];
                                         @endphp
                                        @foreach($data as $datas)
                                            <tr>
                                                <td>{{ $form_tanimi[$datas->form_tanimi] }}</td>
                                                <td>{{$datas->mail}}</td>
                                                <td>{{$datas->cc}}</td>
                                                <td><a href="javascript:void(0)" data-url={{route('mail.delete', ['id'=>$datas->id]) }} data-id={{ $datas->id }} class="link-danger" id="delete_mail"><i class="ri-delete-bin-5-line"></i></a></td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>


                </div>

            </div><!--end col-->
        </div><!--end row-->
    </div>


@endsection

@section('addjs')

    <script src="{{ asset('backend/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/sweetalerts.init.js') }}"></script>

    <!--datatable js-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>


    <script src="{{asset('backend/assets/js/pages/datatables.init.js')}}"></script>

    <script>
        $(document).on('click', '#delete_mail', function () {


            var user_id = $(this).attr('data-id');
            const url = $(this).attr('data-url');
            Swal.fire({
                title: 'Emin misiniz?',
                text: "Bu Tanımlı Mail Adresini Silmek İstediğinize Emin Misiniz?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Evet, sil!',
                cancelButtonText: 'Vazgeç'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });

        setTimeout(function(){
            $("div.alert").remove();
        }, 1000 ); // 2 secs

    </script>

@endsection

