@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-lg-12">
                <div class="card" style="width: 100%">
                    <div class="card-body">
                        @yield('fragment')
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/dist/Chart.extension.js') }}"></script>
@endpush
