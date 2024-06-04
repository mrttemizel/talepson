@extends('backend.components.master-withoutnavbar')

@push('title', 'Temizlik Talep Formu')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                @include('frontend.partials.error_and_success')

                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">TEMİZLİK - TAŞIMA - KARGO - KIRTASİYE TALEP FORMU</h4>
                        <a href="{{ route('request.index') }}"
                           class="btn btn-primary waves-effect waves-light d-flex justify-content-between"><i
                                class="ri-arrow-go-back-fill"></i> &nbsp; Geri Dön</a>

                    </div><!-- end card header -->
                    <ul class="list-group">
                        <li class="list-group-item bg-danger bg-opacity-10">- Taleplerinizin mesai saatleri içerisinde yapılması gerekmektedir.</li>
                        <li class="list-group-item bg-info bg-opacity-10">- Bu sistem üzerinden sadece kurumsal kargo talebi yapılabilmektedir.</li>
                        <li class="list-group-item bg-danger bg-opacity-10">- Kırtasiye dağıtım günleri Salı ve Cuma’dır. Kırtasiye taleplerinizi bu günler öncesinden yapılması gerekmektedir.</li>
                        <li class="list-group-item bg-info bg-opacity-10">- Taşıma taleplerinde sadece ağır yük taşımaları yapılmaktadır.</li>
                        <li class="list-group-item bg-danger bg-opacity-10">- Acil durumlara öncelik verilecektir.</li>
                        <li class="list-group-item bg-info bg-opacity-10">- Talepleriniz önem sırasına göre yapılacaktır.</li>

                    </ul>
                    <form action="{{route('frontend.request-cleaning.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="live-preview">
                                <div class="row gy-3">
                                    <div class="col-xl-6 col-md-6">
                                        <div>
                                            <label for="labelInput" class="form-label">
                                                Talep Yapan Birim
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="talep_yapan_birim" placeholder="Talep Yapan Birim"
                                                   class="form-control" value="{{ old('talep_yapan_birim') }}">
                                            <span class="text-danger">
                                                @error('talep_yapan_birim')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-md-6">
                                        <div>
                                            <label for="basiInput" class="form-label">
                                                Talep Yapan Kişi
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="talep_yapan_kisi" placeholder="Talep Yapan Birim / Kişi" class="form-control"
                                                   value="{{ old('talep_yapan_kisi') }}">
                                            <span class="text-danger">
                                                @error('talep_yapan_kisi')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xl-6 col-md-6">
                                        <div>
                                            <label for="labelInput" class="form-label">E-Posta Adresi <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="email" placeholder="E-Posta Adresi"
                                                   class="form-control" value="{{ old('email') }}">
                                            <span class="text-danger">
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xl-6 col-md-6">
                                        <div>
                                            <label for="basiInput" class="form-label">Cep Telefonu <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="cep_telefonu" placeholder="Cep Telefonu " class="form-control"
                                                   value="{{ old('cep_telefonu') }}">
                                            <span class="text-danger">
                                                @error('cep_telefonu')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xl-6 col-md-6">
                                        <div>
                                            <label for="labelInput" class="form-label">Taleple İlgili Yer <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="taleple_ilgili_yer" placeholder="Taleple İlgili Yer"
                                                   class="form-control" value="{{ old('taleple_ilgili_yer') }}">
                                            <span class="text-danger">
                                                @error('taleple_ilgili_yer')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xl-6 col-md-6">
                                        <div>
                                            <label for="labelInput" class="form-label">Talep Tarihi <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" name="talep_tarihi"
                                                   class="form-control" value="{{ old('talep_tarihi') }}">
                                            <span class="text-danger">
                                                @error('talep_tarihi')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xl-6 col-md-6">
                                        <div>
                                            <label for="basiInput" class="form-label">Talep Saati <span
                                                    class="text-danger">*</span></label>
                                            <input type="time" name="talep_saati"  class="form-control"
                                                   value="{{ old('talep_saati') }}">
                                            <span class="text-danger">
                                                @error('talep_saati')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-md-6">
                                        <div>
                                            <label for="labelInput" class="form-label">Talep Tipi  <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" name="talep_tipi"  aria-label="Default select example">
                                                <option selected disabled>Talep Tipi Seçiniz</option>
                                                <option value="1" {{ old('talep_tipi') == 1 ? 'selected' : '' }}>Temizlik</option>
                                                <option value="2" {{ old('talep_tipi') == 2 ? 'selected' : '' }}>Taşıma</option>
                                                <option value="3" {{ old('talep_tipi') == 3 ? 'selected' : '' }}>Kargo</option>
                                                <option value="4" {{ old('talep_tipi') == 4 ? 'selected' : '' }}>Kırtasiye</option>
                                                <option value="diger"  id="talepdiger" {{ old('talep_tipi') == 'diger' ? 'selected' : '' }}>Diğer</option>
                                            </select>
                                            <span class="text-danger">
                                                @error('talep_tipi')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xl-12 col-md-12 talepdiger">
                                        <div>
                                            <label for="basiInput" class="form-label">Diğer (Açıklayınız) <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="talep_tipi_diger" placeholder="Diğer (Açıklayınız)"
                                                   class="form-control"
                                                   value="{{ old('talep_tipi_diger') }}">
                                            <span class="text-danger">
                                                @error('talep_tipi_diger')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-md-12">
                                        <div>
                                            <label for="labelInput" class="form-label">Talep Detayı <span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control" name="aciklama"  rows="3" placeholder="Lütfen talep detayını ve ek isteklerinizi buraya yazınız."></textarea>
                                            <span class="text-danger">
                                                @error('aciklama')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="mb-3">

                                        <div id="recaptcha_form_register"></div>
                                        <span class="text-danger">
                                        @error('g-recaptcha-response')
                                        {{ $message }}
                                        @enderror

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-primary btn-load btn-request-loading">
                                                <span class="d-flex align-items-center">
                                                    <span class="flex-grow-1 submit-text">
                                                        Gönder
                                                    </span>
                                                    <span class="spinner-border flex-shrink-0 d-none" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </form>
                </div>
            </div>
        </div>

@endsection

@section('addjs')
    <script>
        $('.diger,.talepdiger').hide();

        $('select[name="talep_tipi"]').change(function(){
            if($(this).val() === 'diger') {
                $('.talepdiger').fadeIn();
            } else {
                $('.talepdiger').fadeOut();
            }
        });

        if($('select[name="talep_tipi"]').val() === 'diger') {
            $('.talepdiger').fadeIn();
        } else {
            $('.talepdiger').fadeOut();
        }

    </script>

    {!!  GoogleReCaptchaV2::render('recaptcha_form_register') !!}

@endsection
