@extends('backend.components.master-withoutnavbar')

@push('title', 'IT Talep Formu')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                @include('frontend.partials.error_and_success')

                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">IT TALEP FORMU</h4>
                        <a href="{{ route('request.index') }}"
                           class="btn btn-primary waves-effect waves-light d-flex justify-content-between">
                            <i class="ri-arrow-go-back-fill"></i> &nbsp; Geri Dön
                        </a>

                    </div><!-- end card header -->
                    <ul class="list-group">
                        <li class="list-group-item bg-danger bg-opacity-10">- Taleplerinizin mesai saatleri içerisinde yapılması gerekmektedir.</li>
                        <li class="list-group-item bg-info bg-opacity-10">- Acil durumlara öncelik verilecektir.</li>
                        <li class="list-group-item bg-danger bg-opacity-10">- Talepleriniz önem sırasına göre yapılacaktır.</li>

                    </ul>
                    <form action="{{route('frontend.request-it.store')}}" method="POST">
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

                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-primary" id="submitButton">Gönder</button>
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
        $(document).on('click', '#submitButton', function () {
            let timerInterval;
            Swal.fire({
                title: "Başvurunuz Alınıyor",
                html: "Mail Gönderiliyor... <b></b> milliseconds.",
                timer: 3000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                    const timer = Swal.getPopup().querySelector("b");
                    timerInterval = setInterval(() => {
                        timer.textContent = `${Swal.getTimerLeft()}`;
                    }, 100);
                },
                willClose: () => {
                    clearInterval(timerInterval);
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log("I was closed by the timer");
                }
            });
        });
    </script>
@endsection
