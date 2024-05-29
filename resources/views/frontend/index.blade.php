@extends('backend.components.master-withoutnavbar')
@section('title')
    Ana Sayfa | Talep Sistemi
@endsection

@section('css')

    <style>

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;

        }

        .icon-image {
            width: 80px;
            border-radius: 50%;
            padding: 10px;
        }

        .card {
            min-height: 180px;
            width: 100%;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            display: flex;
        }

        .card:hover {
            transform: scale(1.05);
            border-color: #007bff; /* Kartın üzerine gelindiğinde sınır rengi */
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        a {
            text-decoration: none;
        }

        .text {
            margin-top: 10px;
            color: #0B2C5F;
        }

        .top-logo {

            width: 360px;
        }

        @media (max-width: 992px) {
            .card {
                min-height: 200px;

            }

            .text {
                margin-top: 8px;
            }
        }


        @media (max-width: 576px) {
            .top-logo {
                margin-top: 160px;
            }

            .card-body h5 {
                font-size: 2px;
            }

            .card {
                min-height: 220px;

            }

            .top-logo {

                width: 200px;
            }


        }

    </style>
    <link href="{{asset('backend/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div>
        <img src="{{asset('backend/my-image/abu-renkli.svg')}}" class="top-logo" alt="">
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-6 col-sm-6 col-md-4">
                <a href="{{route('request.car')}}">
                    <div class="card text-center d-flex align-items-stretch">
                        <div class="card-body">
                            <img src="{{asset('frontend/1.svg')}}" alt="" class="bg-primary icon-image">
                            <p class="text">ARAÇ TALEP FORMU</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4">
                <a href="{{route('request.technical')}}">
                    <div class="card text-center  d-flex align-items-stretch">
                        <div class="card-body">
                            <img src="{{asset('frontend/2.svg')}}" alt="" class="bg-secondary icon-image">
                            <p class="text">TEKNİK SERVİS TALEP FORMU</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-6 col-md-4">
                <a href="" id="myLink1">
                    <div class="card text-center  d-flex align-items-stretch">
                        <div class="card-body">
                            <img src="{{asset('frontend/3.svg')}}" alt="" class="bg-success icon-image">
                            <p class="text">YEMEK/İKRAM TALEP FORMU</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-6 col-sm-6 col-md-4">
                <a href="" id="myLink2">
                    <div class="card text-center  d-flex align-items-stretch">
                        <div class="card-body">
                            <img src="{{asset('frontend/4.svg')}}" alt="" class="bg-info icon-image">
                            <p class="text">TOPLANTI-SALON TALEP FORMU</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-6 col-md-4">
                <a href="" id="myLink3">
                    <div class="card text-center  d-flex align-items-stretch">
                        <div class="card-body">
                            <img src="{{asset('frontend/6.svg')}}" alt="" class="bg-warning icon-image">
                            <p class="text">TEMİZLİK - EŞYA TAŞIMA - KARGO - KIRTASİYE TALEP FORMU</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-6 col-md-4">
                <a href="" id="myLink4">
                    <div class="card text-center d-flex align-items-stretch">
                        <div class="card-body">
                            <img src="{{asset('frontend/5.svg')}}" alt="" class="bg-danger icon-image">
                            <p class="text">DOWNTOWN TEKNİK SERVİS TALEP FORMU</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection




@section('addjs')

    <script src="{{ asset('backend/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/sweetalerts.init.js') }}"></script>
    <script>

        document.getElementById("myLink1").addEventListener("click", function (event) {
            event.preventDefault(); // Bu satır, linkin varsayılan tıklama davranışını engeller
            Swal.fire({
                title: "Sizler İçin Yeniliyoruz...",
                icon: "info",
                showCloseButton: true,
                confirmButtonText: `
     Tamam
  `,
            });
        });

        document.getElementById("myLink2").addEventListener("click", function (event) {
            event.preventDefault(); // Bu satır, linkin varsayılan tıklama davranışını engeller
            Swal.fire({
                title: "Sizler İçin Yeniliyoruz...",
                icon: "info",
                showCloseButton: true,
                confirmButtonText: `
     Tamam
  `,
            });
        });

        document.getElementById("myLink3").addEventListener("click", function (event) {
            event.preventDefault(); // Bu satır, linkin varsayılan tıklama davranışını engeller
            Swal.fire({
                title: "Sizler İçin Yeniliyoruz...",
                icon: "info",
                showCloseButton: true,
                confirmButtonText: `
     Tamam
  `,
            });
        });

        document.getElementById("myLink4").addEventListener("click", function (event) {
            event.preventDefault(); // Bu satır, linkin varsayılan tıklama davranışını engeller
            Swal.fire({
                title: "Sizler İçin Yeniliyoruz...",
                icon: "info",
                showCloseButton: true,
                confirmButtonText: `
     Tamam
  `,
            });
        });

    </script>
@endsection
