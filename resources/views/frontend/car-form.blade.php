@extends('backend.components.master-withoutnavbar')

@push('title', 'Araç Talep Formu')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                @include('frontend.partials.error_and_success')

                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">ARAÇ TALEP FORMU</h4>
                        <a href="{{ route('request.index') }}"
                           class="btn btn-primary waves-effect waves-light d-flex justify-content-between"><i
                                class="ri-arrow-go-back-fill"></i> &nbsp; Geri Dön</a>

                    </div><!-- end card header -->
                    <ul class="list-group">
                        <li class="list-group-item bg-danger bg-opacity-10">- Binek araçlar için talepler mesai saati içerisinde en az 5 saat önceden bildirilmelidir.</li>
                        <li class="list-group-item bg-info bg-opacity-10">- Servis organizasyonlarında(16,27,35 üstü)talepler en az 2 gün önceden yapılmalıdır.</li>
                        <li class="list-group-item bg-danger bg-opacity-10">- Büyük organizasyonlar için(100 kişilik ve üzeri) talepler bir hafta önceden bildirilmelidir.</li>
                        <li class="list-group-item bg-info bg-opacity-10">- Hafta sonu yapılan talepler,mesai günlerinde dikkate alınacaktır.</li>
                        <li class="list-group-item bg-danger bg-opacity-10">- Organizasyon iptalleri en az 1 gün önceden bildirilmelidir.</li>
                        <li class="list-group-item bg-info bg-opacity-10">- Telefonla yapılan ve form üzerinde detayı olmayan talepler dikkate alınmayacaktır.</li>
                    </ul>

                    <form  action="{{ route('frontend.request-car.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="live-preview">
                                <div class="row gy-3">
                                    <div class="col-xl-12 col-md-12">
                                        <div>
                                            <label for="basiInput" class="form-label">Program Adı / Tanımı <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="program_adi" placeholder="Program Adı / Tanımı" class="form-control"
                                                   value="{{ old('program_adi') }}">
                                            <span class="text-danger">@error('program_adi')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xl-6 col-md-6">
                                        <div>
                                            <label for="labelInput" class="form-label">Program Sorumlusu İsmi  <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="program_sorumlusu_ismi" placeholder="Program Sorumlusu İsmi"
                                                   class="form-control" value="{{ old('program_sorumlusu_ismi') }}">
                                            <span class="text-danger">
                                                @error('program_sorumlusu_ismi')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-md-6">
                                        <div>
                                            <label for="labelInput" class="form-label">Program Sorumlusu Telefon <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="program_sorumlusu_telefon" placeholder="Program Sorumlusu Telefon"
                                                   class="form-control" value="{{ old('program_sorumlusu_telefon') }}">
                                            <span class="text-danger">
                                                @error('program_sorumlusu_telefon')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-md-6">
                                        <div>
                                            <label for="basiInput" class="form-label">Talep Yapan Birim / Kişi <span
                                                    class="text-danger">*</span></label>
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
                                            <label for="basiInput" class="form-label">Kalkış Yeri <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="kalkis_yeri" placeholder="Kalkış Yeri " class="form-control"
                                                   value="{{ old('kalkis_yeri') }}">
                                            <span class="text-danger">
                                                @error('kalkis_yeri')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xl-6 col-md-6">
                                        <div>
                                            <label for="labelInput" class="form-label">Gidilecek Yer <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="gidilecek_yer" placeholder="Gidilecek Yer"
                                                   class="form-control" value="{{ old('gidilecek_yer') }}">
                                            <span class="text-danger">
                                                @error('gidilecek_yer')
                                                    {{ $message }}
                                                @enderror
                                                </span>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xl-6 col-md-6">
                                        <div>
                                            <label for="labelInput" class="form-label">Kalkış Tarihi <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" name="kalkis_tarihi"
                                                   class="form-control" value="{{ old('kalkis_tarihi') }}">
                                            <span class="text-danger">
                                                @error('kalkis_tarihi')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xl-6 col-md-6">
                                        <div>
                                            <label for="basiInput" class="form-label">Kalkış Saati <span
                                                    class="text-danger">*</span></label>
                                            <input type="time" name="kalkis_saati"  class="form-control"
                                                   value="{{ old('kalkis_saati') }}">
                                            <span class="text-danger">
                                                @error('kalkis_saati')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xl-6 col-md-6">
                                        <div>
                                            <label for="basiInput" class="form-label">DÖnüş Tarihi <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" name="donus_tarihi"  class="form-control"
                                                   value="{{ old('donus_tarihi') }}">
                                            <span class="text-danger">
                                                @error('donus_tarihi')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xl-6 col-md-6">
                                        <div>
                                            <label for="labelInput" class="form-label">Dönüş Saati <span
                                                    class="text-danger">*</span></label>
                                            <input type="time" name="donus_saati"
                                                   class="form-control" value="{{ old('donus_saati') }}">
                                            <span class="text-danger">
                                                @error('donus_saati')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xl-6 col-md-6">
                                        <div>
                                            <label for="labelInput" class="form-label">Ödeme Tipi <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" name="odeme_tipi"  aria-label="Default select example">
                                                <option selected disabled>Ödeme Tipi Seçiniz</option>
                                                <option value="1" {{ old('odeme_tipi') == 1 ? 'selected' : '' }}>Kendisi Ödeyecek</option>
                                                <option value="2" {{ old('odeme_tipi') == 2 ? 'selected' : '' }}>Okul Karşılayacak</option>
                                                <option value="3" {{ old('odeme_tipi') == 3 ? 'selected' : '' }}>SKS</option>
                                                <option value="4" {{ old('odeme_tipi') == 4 ? 'selected' : '' }}>Tanıtım Birimi</option>
                                            </select>
                                            <span class="text-danger">
                                                @error('odeme_tipi')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xl-6 col-md-6">
                                        <div>
                                            <label for="labelInput" class="form-label">Grup Tanımı  <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" name="grup_tanimi"  aria-label="Default select example">
                                                <option selected disabled>Grup Tanımı Seçiniz</option>
                                                <option value="1" {{ old('grup_tanimi') == 1 ? 'selected' : '' }}>Öğrenci</option>
                                                <option value="2" {{ old('grup_tanimi') == 2 ? 'selected' : '' }}>Öğretim Görevlisi</option>
                                                <option value="3" {{ old('grup_tanimi') == 3 ? 'selected' : '' }}>İş Adamı</option>
                                                <option value="4" {{ old('grup_tanimi') == 4 ? 'selected' : '' }}>Protokol</option>
                                                <option value="5" {{ old('grup_tanimi') == 5 ? 'selected' : '' }}>Personel</option>
                                                <option value="6" {{ old('grup_tanimi') == 6 ? 'selected' : '' }}>Diğer</option>
                                            </select>
                                            <span class="text-danger">
                                                @error('grup_tanimi')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xl-12 col-md-12">
                                        <div>
                                            <label for="labelInput" class="form-label">Açıklama <span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control" name="aciklama"  rows="3" placeholder="Lütfen güzergah detayını ve ek isteklerinizi buraya yazınız."></textarea>
                                            <span class="text-danger">
                                                @error('aciklama')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <!--end col-->
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
    {!!  GoogleReCaptchaV2::render('recaptcha_form_register') !!}

@endsection
