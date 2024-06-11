@extends('backend.components.master-withoutnavbar')

@push('title', 'Ana Sayfa')

@push('css')
    <style>
        html, body {
            height: 100%;
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
            box-shadow: rgba(0, 0, 0, 0.35) 0 5px 15px;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
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
            .card-body h5 {
                font-size: 2px;
            }

            .card {
                min-height: 220px;
            }
        }
    </style>
    <link href="{{asset('backend/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
    <div class="container h-100R">
        <div class="row">
            <div class="col-12 justify-content-center align-items-center d-flex py-5">
                <img src="{{asset('backend/my-image/abu-renkli.svg')}}" class="top-logo" alt="" />
            </div>
        </div>

        <div class="row">
            <div class="col-12 justify-content-center align-items-center">
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="{{route('frontend.request-car.index')}}">
                            <div class="card text-center d-flex align-items-stretch">
                                <div class="card-body">
                                    <img src="{{asset('frontend/1.svg')}}" alt="" class="bg-primary icon-image">
                                    <p class="text">ARAÇ TALEP FORMU</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="{{ route('frontend.request-technical.index') }}">
                            <div class="card text-center  d-flex align-items-stretch">
                                <div class="card-body">
                                    <img src="{{asset('frontend/2.svg')}}" alt="" class="bg-secondary icon-image">
                                    <p class="text">TEKNİK SERVİS TALEP FORMU</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="{{ route('frontend.request-food.index') }}">
                            <div class="card text-center  d-flex align-items-stretch">
                                <div class="card-body">
                                    <img src="{{asset('frontend/3.svg')}}" alt="" class="bg-success icon-image">
                                    <p class="text">YEMEK/İKRAM TALEP FORMU</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="{{ route('frontend.request-it.index') }}">
                            <div class="card text-center d-flex align-items-stretch">
                                <div class="card-body">
                                    <img src="{{asset('frontend/4.svg')}}" alt="" class="bg-info icon-image">
                                    <p class="text">BİLGİ İŞLEM TALEP</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="{{route('frontend.request-cleaning.index') }}" id="myLink3">
                            <div class="card text-center  d-flex align-items-stretch">
                                <div class="card-body">
                                    <img src="{{asset('frontend/6.svg')}}" alt="" class="bg-warning icon-image">
                                    <p class="text">TEMİZLİK - EŞYA TAŞIMA - KARGO - KIRTASİYE TALEP FORMU</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="{{route('frontend.request-downtown.index')}}" id="myLink4">
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
        </div>
    </div>
@endsection


