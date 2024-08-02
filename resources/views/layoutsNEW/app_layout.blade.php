@extends('layoutsNEW.principal')

@section('main')
    @include('layoutsNEW.partials.header')
    @include('layoutsNEW.partials.sidebar')
    <div class="mobile-menu-overlay"></div>
    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="title pb-20">
                <h2 class="h3 mb-0">@yield('content_title')</h2>
            </div>
        </div>
        @yield('content2')<br/>
        @include('layoutsNEW.partials.footer')
    </div>
@endsection