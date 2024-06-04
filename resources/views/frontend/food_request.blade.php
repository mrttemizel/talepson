@extends('backend.components.master-withoutnavbar')

@push('title', 'Yemek - İkram Talep Formu')

@push('css')
    <link href="{{asset('backend/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                @include('frontend.partials.error_and_success')

                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">YEMEK - İKRAM TALEP FORMU</h4>
                        <a href="{{ route('request.index') }}"
                           class="btn btn-primary waves-effect waves-light d-flex justify-content-between"><i
                                class="ri-arrow-go-back-fill"></i> &nbsp; Geri Dön</a>

                    </div><!-- end card header -->
                    <ul class="list-group">
                        <li class="list-group-item bg-danger bg-opacity-10">- Yemek talepleri en az 2 gün önceden mesai saatleri içinde yapılmalıdır.</li>
                        <li class="list-group-item bg-info bg-opacity-10">- Büyük organizasyonlar için(100 kişilik ve üzeri) talepler bir hafta önceden bildirilmelidir.</li>
                        <li class="list-group-item bg-danger bg-opacity-10">- Hafta sonu yapılan talepler, mesai günlerinde dikkate alınacaktır.</li>
                        <li class="list-group-item bg-info bg-opacity-10">- Organizasyon iptalleri en az 1 gün önceden bildirilmelidir.</li>
                        <li class="list-group-item bg-danger bg-opacity-10">- Telefonla yapılan ve form üzerinde detayı olmayan talepler dikkate alınmayacaktır.</li>
                    </ul>

                    <form action="{{route('frontend.request-food.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="live-preview">
                                <div class="row gy-3">
                                    <!-- Program Adı -->
                                    <div class="col-12">
                                        <div class="form-group {{ $errors->has('program_adi') ? 'has-error' : null }}">
                                            <label for="programAdi" class="form-label">
                                                Program Adı
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text"
                                                   name="program_adi"
                                                   placeholder="Program Adı"
                                                   class="form-control {{ $errors->has('program_adi') ? 'is-invalid' : null }}"
                                                   value="{{ old('program_adi') }}"
                                                   id="programAdi"
                                            />
                                            @if ($errors->has('program_adi'))
                                                <span class="invalid-feedback">{{ $errors->first('program_adi') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- END Program Adı -->

                                    <!-- Talep Yapan Birim -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group {{ $errors->has('talep_yapan_birim') ? 'has-error' : null }}">
                                            <label for="talebiYapanBirim" class="form-label">
                                                Talep Yapan Birim
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text"
                                                   name="talep_yapan_birim"
                                                   placeholder="Talep Yapan Birim"
                                                   class="form-control {{ $errors->has('talep_yapan_birim') ? 'is-invalid' : null }}"
                                                   value="{{ old('program_adi') }}"
                                                   id="talebiYapanBirim"
                                            />
                                            @if ($errors->has('talep_yapan_birim'))
                                                <span class="invalid-feedback">{{ $errors->first('talep_yapan_birim') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- END Talep Yapan Birim -->

                                    <!-- Talep Yapan Kişi -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group {{ $errors->has('talep_yapan_kisi') ? 'has-error' : null }}">
                                            <label for="talepYapanKisi" class="form-label">
                                                Talep Yapan Kişi
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text"
                                                   name="talep_yapan_kisi"
                                                   placeholder="Talep Yapan Kişi"
                                                   class="form-control {{ $errors->has('talep_yapan_kisi') ? 'is-invalid' : null }}"
                                                   value="{{ old('talep_yapan_kisi') }}"
                                                   id="talepYapanKisi"
                                            />
                                            @if ($errors->has('talep_yapan_kisi'))
                                                <span class="invalid-feedback">{{ $errors->first('talep_yapan_kisi') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- END Talep Yapan Kişi -->

                                    <!-- E-Posta Adresi -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group {{ $errors->has('email') ? 'has-error' : null }}">
                                            <label for="epostaAdresi" class="form-label">
                                                E-Posta Adresi
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="email"
                                                   name="email"
                                                   placeholder="E-Posta Adresi"
                                                   class="form-control {{ $errors->has('email') ? 'is-invalid' : null }}"
                                                   value="{{ old('email') }}"
                                                   id="epostaAdresi"
                                            />
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- END E-Posta Adresi -->

                                    <!-- Ünv. Adına Program Sorumlusu İsim -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group {{ $errors->has('universite_sorumlu_isim') ? 'has-error' : null }}">
                                            <label for="uniSorumlu" class="form-label">
                                                Ünv. Adına Program Sorumlusu İsim
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text"
                                                   name="universite_sorumlu_isim"
                                                   placeholder="Program Adı"
                                                   class="form-control {{ $errors->has('universite_sorumlu_isim') ? 'is-invalid' : null }}"
                                                   value="{{ old('universite_sorumlu_isim') }}"
                                                   id="uniSorumlu"
                                            />
                                            @if ($errors->has('universite_sorumlu_isim'))
                                                <span class="invalid-feedback">{{ $errors->first('universite_sorumlu_isim') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- END Ünv. Adına Program Sorumlusu İsim -->

                                    <!-- Program Sorumlusu Telefon -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group {{ $errors->has('program_sorumlu_telefon') ? 'has-error' : null }}">
                                            <label for="programSorumluTelefon" class="form-label">
                                                Program Sorumlusu Telefon
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text"
                                                   name="program_sorumlu_telefon"
                                                   placeholder="Program Sorumlusu Telefon"
                                                   class="form-control telephone {{ $errors->has('program_sorumlu_telefon') ? 'is-invalid' : null }}"
                                                   value="{{ old('program_sorumlu_telefon') }}"
                                                   id="programSorumluTelefon"
                                            />
                                            @if ($errors->has('program_sorumlu_telefon'))
                                                <span class="invalid-feedback">{{ $errors->first('program_sorumlu_telefon') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- END Program Sorumlusu Telefon -->

                                    <!-- Program Tarihi -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group {{ $errors->has('program_tarih') ? 'has-error' : null }}">
                                            <label for="programTarih" class="form-label">
                                                Program Tarihi
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text"
                                                   name="program_tarih"
                                                   placeholder="Program Tarihi"
                                                   class="form-control date {{ $errors->has('program_tarih') ? 'is-invalid' : null }}"
                                                   value="{{ old('program_tarih') }}"
                                                   id="programTarih"
                                            />
                                            @if ($errors->has('program_tarih'))
                                                <span class="invalid-feedback">{{ $errors->first('program_tarih') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- END Program Tarihi -->

                                    <!-- Program Saati -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group {{ $errors->has('program_saat') ? 'has-error' : null }}">
                                            <label for="programSaat" class="form-label">
                                                Program Saati
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text"
                                                   name="program_saat"
                                                   placeholder="Program Saati"
                                                   class="form-control clock {{ $errors->has('program_saat') ? 'is-invalid' : null }}"
                                                   value="{{ old('program_saat') }}"
                                                   id="programSaat"
                                            />
                                            @if ($errors->has('program_saat'))
                                                <span class="invalid-feedback">{{ $errors->first('program_saat') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- END Program Saati -->

                                    <!-- Talep Tipi -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group {{ $errors->has('talep_tipi') ? 'has-error' : null }}">
                                            <label for="talepTipi" class="form-label">
                                                Talep Tipi
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="talep_tipi" id="talepTipi" class="form-control {{ $errors->has('talep_tipi') ? 'is-invalid' : null }}">
                                                <option value="" disabled selected>Talep Tipi</option>
                                                <option value="ikram" {{ old('talep_tipi') == 'ikram' ? 'selected' : null }}>İkram</option>
                                                <option value="yemek" {{ old('talep_tipi') == 'yemek' ? 'selected' : null }}>Yemek & Kahvaltı</option>
                                            </select>
                                            @if ($errors->has('talep_tipi'))
                                                <span class="invalid-feedback">{{ $errors->first('talep_tipi') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12" id="ikramWrapper" style="display: {{ old('talep_tipi') == 'ikram' ? 'block' : 'none' }};">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="form-group {{ $errors->has('ikram') ? 'has-error' : null }}">
                                                    <label for="ikram">İkram</label>
                                                    <select name="ikram" id="ikram" class="form-control">
                                                        @foreach ($treats as $index => $treat)
                                                            <option value="{{ $index }}">{{ $treat }}</option>
                                                        @endforeach
                                                        <option value="other">Diğer</option>
                                                    </select>
                                                    @if ($errors->has('ikram'))
                                                        <span class="invalid-feedback">{{ $errors->first('ikram') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <div class="form-group {{ $errors->has('ikram_kisi') ? 'has-error' : null }}">
                                                    <label for="ikramKisi" class="form-label">
                                                        Kişi Sayısı
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text"
                                                           name="ikram_kisi"
                                                           placeholder="Kişi Sayısı"
                                                           class="form-control {{ $errors->has('ikram_kisi') ? 'is-invalid' : null }}"
                                                           value="{{ old('ikram_kisi') }}"
                                                           id="ikramKisi"
                                                    />
                                                    @if ($errors->has('ikram_kisi'))
                                                        <span class="invalid-feedback">{{ $errors->first('ikram_kisi') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-12 mt-3 ikramOther" style="display: none">
                                                <div class="form-group {{ $errors->has('ikram_diger') ? 'has-error' : null }}">
                                                    <label for="ikramDiger" class="form-label">
                                                        Diğer
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text"
                                                           name="ikram_diger"
                                                           placeholder="Diğer"
                                                           class="form-control {{ $errors->has('ikram_diger') ? 'is-invalid' : null }}"
                                                           value="{{ old('ikram_diger') }}"
                                                           id="ikramDiger"
                                                    />
                                                    @if ($errors->has('ikram_diger'))
                                                        <span class="invalid-feedback">{{ $errors->first('ikram_diger') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-12 mt-2">
                                                <p class="text-danger">Bu menüleri seçmeden önce Rektörlük ve Genel Sekreterlikten onay alınız. Lütfen onay işleminden sonra talep giriniz.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12" id="yemekWrapper" style="display: {{ old('talep_tipi') == 'yemek' ? 'block' : 'none' }};">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="form-group {{ $errors->has('yemek') ? 'has-error' : null }}">
                                                    <label for="yemek">Yemek & Kahvaltı</label>
                                                    <select name="yemek" id="yemek" class="form-control">
                                                        @foreach ($foods as $index => $food)
                                                            <option value="{{ $index }}">{{ $food }}</option>
                                                        @endforeach
                                                        <option value="other">Diğer</option>
                                                    </select>
                                                    @if ($errors->has('yemek'))
                                                        <span class="invalid-feedback">{{ $errors->first('yemek') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <div class="form-group {{ $errors->has('yemek_kisi') ? 'has-error' : null }}">
                                                    <label for="yemekKisi" class="form-label">
                                                        Yemek Kişi Sayısı
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text"
                                                           name="yemek_kisi"
                                                           placeholder="Yemek Kişi Sayısı"
                                                           class="form-control {{ $errors->has('yemek_kisi') ? 'is-invalid' : null }}"
                                                           value="{{ old('yemek_kisi') }}"
                                                           id="yemekKisi"
                                                    />
                                                    @if ($errors->has('yemek_kisi'))
                                                        <span class="invalid-feedback">{{ $errors->first('yemek_kisi') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-12 mt-3 yemek-diger" style="display: none;">
                                                <div class="form-group {{ $errors->has('yemek_diger') ? 'has-error' : null }}">
                                                    <label for="ikramDiger" class="form-label">
                                                        Diğer
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text"
                                                           name="yemek_diger"
                                                           placeholder="Diğer"
                                                           class="form-control {{ $errors->has('yemek_diger') ? 'is-invalid' : null }}"
                                                           value="{{ old('yemek_diger') }}"
                                                           id="ikramDiger"
                                                    />
                                                    @if ($errors->has('yemek_diger'))
                                                        <span class="invalid-feedback">{{ $errors->first('yemek_diger') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-12 mt-2">
                                                <p class="text-danger">Bu menüleri seçmeden önce Rektörlük ve Genel Sekreterlikten onay alınız. Lütfen onay işleminden sonra talep giriniz.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Talep Tipi -->

                                    <!-- Yer -->
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <div class="form-group {{ $errors->has('yer') ? 'has-error' : null }}">
                                                    <label for="yer" class="form-label">
                                                        Yer
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <select name="yer" id="yer" class="form-control {{ $errors->has('yer') ? 'is-invalid' : null }}">
                                                        @foreach($places as $index => $place)
                                                            <option value="{{ $index }}" data-dorm="{!! $place['dorm'] !!}" {{ old('yer') == $index ? 'selected' : null }}>{{ $place['name'] }}</option>
                                                        @endforeach
                                                        <option value="other" {{ old('yer') == 'other' ? 'selected' : null }}>Diğer</option>
                                                    </select>
                                                    @if ($errors->has('yer'))
                                                        <span class="invalid-feedback">{{ $errors->first('yer') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-12 yer-diger" style="display: none">
                                                <div class="form-group {{ $errors->has('yer_diger') ? 'has-error' : null }}">
                                                    <label for="yerDiger" class="form-label">
                                                        Diğer
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text"
                                                           name="yer_diger"
                                                           placeholder="Diğer"
                                                           class="form-control {{ $errors->has('yer_diger') ? 'is-invalid' : null }}"
                                                           value="{{ old('yer_diger') }}"
                                                           id="yerDiger"
                                                    />
                                                    @if ($errors->has('yer_diger'))
                                                        <span class="invalid-feedback">{{ $errors->first('yer_diger') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            @foreach ($dormitories as $index => $dormit)
                                                <div class="col-12 col-md-6 mb-3 yurt-sayilar" style="display: none">
                                                    <div class="form-group {{ $errors->has('yurt.' . $index) ? 'has-error' : null }}">
                                                        <label for="yurt{{$index}}" class="form-label">
                                                            {{ $dormit['name'] }}
                                                        </label>
                                                        <input type="number"
                                                               name="yurt[{{ $index }}]"
                                                               placeholder="{{ $dormit['name'] }}"
                                                               class="form-control {{ $errors->has('yurt.' . $index) ? 'is-invalid' : null }}"
                                                               value="{{ old('yurt.' . $index) }}"
                                                               id="yurt{{$index}}"
                                                        />
                                                        @if ($errors->has('yurt.' . $index))
                                                            <span class="invalid-feedback">{{ $errors->first('yurt.' . $index) }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    <!-- END Yer -->

                                    <!-- Grup Tanımı -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group {{ $errors->has('grup_tanimi') ? 'has-error' : null }}">
                                            <label for="grup_tanimi" class="form-label">
                                                Grup Tanımı
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="grup_tanimi" id="grup_tanimi" class="form-control {{ $errors->has('grup_tanimi') ? 'is-invalid' : null }}">
                                                @foreach($groups as $index => $group)
                                                    <option value="{{ $index }}" {{ old('grup_tanimi') == $index ? 'selected' : null }}>{{ $group['name'] }}</option>
                                                @endforeach
                                                <option value="other" {{ old('grup_tanimi') == 'other' ? 'selected' : null }}>Diğer</option>
                                            </select>
                                            @if ($errors->has('grup_tanimi'))
                                                <span class="invalid-feedback">{{ $errors->first('grup_tanimi') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 grup-tanimi-diger" style="display: none">
                                        <div class="form-group {{ $errors->has('grup_tanimi_diger') ? 'has-error' : null }}">
                                            <label for="grupTanimiDiger" class="form-label">
                                                Diğer
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text"
                                                   name="grup_tanimi_diger"
                                                   placeholder="Diğer"
                                                   class="form-control {{ $errors->has('grup_tanimi_diger') ? 'is-invalid' : null }}"
                                                   value="{{ old('grup_tanimi_diger') }}"
                                                   id="grupTanimiDiger"
                                            />
                                            @if ($errors->has('grup_tanimi_diger'))
                                                <span class="invalid-feedback">{{ $errors->first('grup_tanimi_diger') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- END Grup Tanımı -->

                                    <!-- Ödeme Tipi -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group {{ $errors->has('odeme_tipi') ? 'has-error' : null }}">
                                            <label for="odeme_tipi" class="form-label">
                                                Ödeme Tipi
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="odeme_tipi" id="odeme_tipi" class="form-control {{ $errors->has('odeme_tipi') ? 'is-invalid' : null }}">
                                                @foreach($paymentTypes as $index => $paymentType)
                                                    <option value="{{ $index }}" {{ old('odeme_tipi') == $index ? 'selected' : null }}>{{ $paymentType['name'] }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('odeme_tipi'))
                                                <span class="invalid-feedback">{{ $errors->first('odeme_tipi') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- END Ödeme Tipi -->

                                    <!-- Açıklama -->
                                    <div class="col-12">
                                        <div class="form-group {{ $errors->has('aciklama') ? 'has-error' : null }}">
                                            <label for="aciklama" class="form-label">
                                                Açıklama
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text"
                                                   name="aciklama"
                                                   placeholder="Açıklama"
                                                   class="form-control {{ $errors->has('aciklama') ? 'is-invalid' : null }}"
                                                   value="{{ old('aciklama') }}"
                                                   id="aciklama"
                                            />
                                            @if ($errors->has('aciklama'))
                                                <span class="invalid-feedback">{{ $errors->first('aciklama') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- END Açıklama -->
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('addjs')
    <script>
        $(document).ready(function () {
            const body = $('body');

            body.find('.telephone').mask('0 (000) 000 00 00');

            body.find('.clock').mask('00:00');

            body.find('.date').datepicker({
                language: 'tr',
                orientation: 'bottom',
                autoclose: true,
                format: 'yyyy-mm-dd',
            });

            body.on('change', 'select[name="talep_tipi"]', function (e) {
                e.preventDefault();
                let ths = $(this);
                let value = ths.val();

                body.find('#ikramWrapper').css({ 'display': 'none' });
                body.find('#yemekWrapper').css({ 'display': 'none' });


                if (value == 'ikram') {
                    body.find('#ikramWrapper').css({ 'display': 'block' });
                }

                if (value == 'yemek') {
                    body.find('#yemekWrapper').css({ 'display': 'block' });
                }
            });

            body.on('change', 'select[name="ikram"]', function (e) {
                e.preventDefault();
                let select = $(this);
                let value = select.find('option:selected').val();

                body.find('.ikramOther').css({ 'display': 'none' });

                if (value === 'other') {
                    body.find('.ikramOther').css({ 'display': 'block' });
                }
            });

            body.on('change', 'select[name="yemek"]', function (e) {
                e.preventDefault();
                let select = $(this);
                let value = select.find('option:selected').val();

                body.find('.yemek-diger').css({ 'display': 'none' });

                if (value === 'other') {
                    body.find('.yemek-diger').css({ 'display': 'block' });
                }
            });

            body.on('change', 'select[name="yer"]', function (e) {
                e.preventDefault();
                let select = $(this);
                let value = select.find('option:selected').val();

                body.find('.yer-diger').css({ 'display': 'none' });
                body.find('.yurtlar').css({ 'display': 'none' });
                body.find('.yurt-sayilar').css({ 'display': 'none' });

                if (value === 'other') {
                    body.find('.yer-diger').css({ 'display': 'block' });
                }

                if (select.find('option:selected').attr('data-dorm').length) {
                    body.find('.yurtlar').css({ 'display': 'block' });
                    body.find('.yurt-sayilar').css({ 'display': 'block' });
                }
            });

            body.on('change', 'select[name="grup_tanimi"]', function (e) {
                e.preventDefault();
                let select = $(this);
                let value = select.find('option:selected').val();

                body.find('.grup-tanimi-diger').css({ 'display': 'none' });
                if (value === 'other') {
                    body.find('.grup-tanimi-diger').css({ 'display': 'block' });
                }
            });
        });

    </script>

    {!!  GoogleReCaptchaV2::render('recaptcha_form_register') !!}

@endsection
