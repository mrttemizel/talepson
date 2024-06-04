@extends('backend.components.master-withoutnavbar')

@push('title', 'Teknik Servis Talep Formu')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                @include('frontend.partials.error_and_success')

                <div class="card ">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">TEKNİK SERVİS TALEP FORMU</h4>
                        <a href="{{ route('request.index') }}"
                           class="btn btn-primary waves-effect waves-light d-flex justify-content-between"><i
                                class="ri-arrow-go-back-fill"></i> &nbsp; Geri Dön</a>

                    </div><!-- end card header -->
                    <ul class="list-group">
                        <li class="list-group-item bg-danger bg-opacity-10">- Taleplerin mesai saatleri içerisinde ve en
                            az 4 saat önceden yapılması gerekmektedir.
                        </li>
                        <li class="list-group-item bg-info bg-opacity-10">- Talepleriniz sıraya konularak
                            yapılacaktır.
                        </li>
                        <li class="list-group-item bg-danger bg-opacity-10">- Acil durumlara öncelik verilecektir.</li>
                        <li class="list-group-item bg-info bg-opacity-10">- Hafta sonu yapılan talepler,mesai günlerinde
                            dikkate alınacaktır.
                        </li>
                        <li class="list-group-item bg-danger bg-opacity-10">- Telefonla yapılan ve form üzerinde detayı
                            olmayan talepler dikkate alınmayacaktır.
                        </li>
                    </ul>
                    <form action="{{route('frontend.request-technical.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="live-preview">
                                <div class="row gy-3">
                                    <div class="col-xl-12 col-md-12">
                                        <div>
                                            <label for="basiInput" class="form-label">Talep Yapan Birim <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="talep_yapan_birim" placeholder="Talep Yapan Birim"
                                                   class="form-control"
                                                   value="{{ old('talep_yapan_birim') }}">
                                            <span class="text-danger">
                                                @error('talep_yapan_birim')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xl-6 col-md-6">
                                        <div>
                                            <label for="basiInput" class="form-label">Talep Yapan  Kişi <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="talep_yapan_kisi"
                                                   placeholder="Talep Yapan Kişi" class="form-control"
                                                   value="{{ old('talep_yapan_kisi') }}">
                                            <span class="text-danger">
                                                @error('talep_yapan_kisi')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-md-6">
                                        <div>
                                            <label for="labelInput" class="form-label">
                                                Telefon
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="telefon"
                                                   placeholder="Program Sorumlusu Telefon"
                                                   class="form-control" value="{{ old('telefon') }}">
                                            <span class="text-danger">
                                                @error('telefon')
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
                                            <label for="basiInput" class="form-label">Taleple İlgili Yer <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="taleple_ilgili_yer" placeholder="Taleple İlgili Yer"
                                                   class="form-control"
                                                   value="{{ old('taleple_ilgili_yer') }}">
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
                                            <label for="labelInput" class="form-label">Talep Saati <span
                                                    class="text-danger">*</span></label>
                                            <input type="time" name="talep_saati"
                                                   class="form-control" value="{{ old('talep_saati') }}">
                                            <span class="text-danger">
                                                @error('talep_saati')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <div class="col-xl-12 col-md-12">
                                        <div>
                                            <label for="labelInput" class="form-label">Talep Tipi <span
                                                    class="text-danger">*</span></label>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" name="talep_tipi" value="1" id="flexRadioDefault1" {{ old('talep_tipi') && old('talep_tipi') == '1' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="flexRadioDefault1">Arıza - Tamir - Onarım</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" name="talep_tipi" value="2"  id="flexRadioDefault5" {{ old('talep_tipi') && old('talep_tipi') == '2' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="flexRadioDefault5">Elektirik</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" name="talep_tipi" value="3"  id="flexRadioDefault2" {{ old('talep_tipi') && old('talep_tipi') == '3' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="flexRadioDefault2">İmalat</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" name="talep_tipi" value="4"  id="flexRadioDefault3" {{ old('talep_tipi') && old('talep_tipi') == '4' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="flexRadioDefault3">Montaj</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" name="talep_tipi" value="5"  id="flexRadioDefault4" {{ old('talep_tipi') && old('talep_tipi') == '5' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="flexRadioDefault4">Peyzaj İşleri</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" name="talep_tipi"  value="diger"  id="talepdiger" {{ old('talep_tipi') && old('talep_tipi') == 'diger' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="talepdiger">Diğer</label>
                                            </div>
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
                                    <!--end col-->

                                    <div class="col-xl-12 col-md-12">
                                        <div>
                                            <label for="labelInput" class="form-label">Talep Detayı <span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control" name="aciklama" rows="3"
                                                      placeholder="Talep ile ilgili detayları lütfen buraya yazınız."></textarea>
                                            <span class="text-danger">
                                                @error('aciklama')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="mb-3">

                                        <div id="recaptcha_form"></div>
                                        <span class="text-danger">
                                            @error('g-recaptcha-response')
                                                {{ $message }}
                                            @enderror
                                        </span>
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
    </div>
@endsection

@section('addjs')
    <script>


        $('.diger,.talepdiger').hide();

        $('input').click(function(){
            if($('#talepdiger').is(':checked')) {
                $('.talepdiger').fadeIn();
            } else {
                $('.talepdiger').fadeOut();
            }
        });

        if($('#talepdiger').is(':checked')) {
            $('.talepdiger').fadeIn();
        } else {
            $('.talepdiger').fadeOut();
        }
    </script>

    {!!  GoogleReCaptchaV2::render('recaptcha_form') !!}
@endsection
