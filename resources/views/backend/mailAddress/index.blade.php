@extends('backend.components.master')

@push('title', 'Mail Listesi')

@push('css')
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"/>
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css"/>

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

@endpush

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
                        <div class="card-body">
                            <form action="{{route('mail.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <div class="form-group {{ $errors->has('mail_type') ? 'has-error' : null }}">
                                            <label for="mailType" class="form-label">Mail Tipi</label>
                                            <select name="mail_type" class="form-control {{ $errors->has('mail_type') ? 'is-invalid' : null }}" id="mailType">
                                                <option value="" disabled selected>Gönderilecek Mail veya CC Seçiniz</option>
                                                <option value="{{ \App\Models\MailAddress::MAIL_TYPE_SEND }}"
                                                        {{ old('mail_type') == \App\Models\MailAddress::MAIL_TYPE_SEND ? 'selected' : null }}
                                                >Gönderilecek Adres</option>
                                                <option value="{{ \App\Models\MailAddress::MAIL_TYPE_CC }}"
                                                        {{ old('mail_type') == \App\Models\MailAddress::MAIL_TYPE_CC ? 'selected' : null }}
                                                >CC Adres</option>
                                            </select>
                                            @if ($errors->has('mail_type'))
                                                <span class="invalid-feedback">{{ $errors->first('mail_type') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <div class="form-group {{ $errors->has('form_type') ? 'has-error' : null }}">
                                            <label for="formType" class="form-label">Form Tipi</label>
                                            <select name="form_type" class="form-control {{ $errors->has('form_type') ? 'is-invalid' : null }}" id="formType">
                                                <option selected disabled>Form Adı / Tanımı Seçiniz</option>
                                                <option value="{{ \App\Models\MailAddress::TYPE_CAR_REQUEST }}"
                                                        {{ old('form_type') == \App\Models\MailAddress::TYPE_CAR_REQUEST ? 'selected' : null }}
                                                >
                                                    ARAÇ TALEP FORMU
                                                </option>

                                                <option value="{{ \App\Models\MailAddress::TYPE_TECHNICAL_REQUEST }}"
                                                    {{ old('form_type') == \App\Models\MailAddress::TYPE_TECHNICAL_REQUEST ? 'selected' : null }}
                                                >
                                                    TEKNİK SERVİS TALEP FORMU
                                                </option>
                                                <option value="{{ \App\Models\MailAddress::TYPE_FOOD_REQUEST }}"
                                                    {{ old('form_type') == \App\Models\MailAddress::TYPE_FOOD_REQUEST ? 'selected' : null }}
                                                >
                                                    YEMEK/İKRAM TALEP FORMU
                                                </option>
                                                <option value="{{ \App\Models\MailAddress::TYPE_MEETING_REQUEST }}"
                                                    {{ old('form_type') == \App\Models\MailAddress::TYPE_MEETING_REQUEST ? 'selected' : null }}
                                                >
                                                    TOPLANTI-SALON TALEP FORMU
                                                </option>
                                                <option value="{{ \App\Models\MailAddress::TYPE_CLEANING_REQUEST }}"
                                                    {{ old('form_type') == \App\Models\MailAddress::TYPE_CLEANING_REQUEST ? 'selected' : null }}
                                                >
                                                    TEMİZLİK - EŞYA TAŞIMA - KARGO - KIRTASİYE TALEP FORMU
                                                </option>
                                                <option value="{{ \App\Models\MailAddress::TYPE_CENTRAL_TECHNICAL_REQUEST }}"
                                                    {{ old('form_type') == \App\Models\MailAddress::TYPE_CENTRAL_TECHNICAL_REQUEST ? 'selected' : null }}
                                                >
                                                    DOWNTOWN TEKNİK SERVİS TALEP FORMU
                                                </option>
                                                <option value="{{ \App\Models\MailAddress::TYPE_INTERNET_TECHNOLOGY_REQUEST }}"
                                                    {{ old('form_type') == \App\Models\MailAddress::TYPE_INTERNET_TECHNOLOGY_REQUEST ? 'selected' : null }}
                                                >
                                                    BİLGİ İŞLEM TALEP FORMU
                                                </option>
                                            </select>
                                            @if ($errors->has('form_type'))
                                                <span class="invalid-feedback">{{ $errors->first('form_type') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <div class="form-group {{ $errors->has('email') ? 'has-error' : null }}">
                                            <label for="mailType" class="form-label">E-Posta</label>
                                            <input type="email"
                                                   name="email"
                                                   class="form-control {{ $errors->has('email') ? 'is-invalid' : null }}"
                                                   value="{{ old('email') }}"
                                            />
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-primary">Kaydet</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
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
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">Form Adı</th>
                                            <th scope="col">Mail Tipi</th>
                                            <th scope="col">E-Posta</th>
                                            <th scope="col">İşlemler</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $item)
                                            <tr>
                                                <td>{{ $item->getFormType() }}</td>
                                                <td>{{ $item->getMailType() }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>
                                                    <a href="{{ route('mail.delete', ['id' => $item->id]) }}"
                                                       class="link-danger btn-mail-delete"
                                                    >
                                                        <i class="ri-delete-bin-5-line"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('addjs')
    <!--datatable js-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>


    <script src="{{asset('backend/assets/js/pages/datatables.init.js')}}"></script>

    <script>
        $(document).ready(function () {
            const body = $(this);

            body.on('click', '.btn-mail-delete', function (e) {
                e.preventDefault();
                let btn = $(this);

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
                        window.location.href = btn.attr('href');
                    }
                });
            });
        });
    </script>
@endsection

