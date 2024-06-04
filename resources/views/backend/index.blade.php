@extends('backend.components.master')

@push('title', 'Ana Sayfa')

@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1') Admin @endslot
        @slot('title') Dashboard  @endslot
    @endcomponent

    <div class="row">
       TEST
    </div>
@endsection


