@extends('frontend.app')

@section('content')

@include('frontend.home.home-slider')
<!--End hero slider-->
    {{-- @include('frontend.home.home-feature-category') --}}
    <!--End category slider-->
    {{-- @include('frontend.home.home-banner') --}}
    <!--End banners-->
    @include('frontend.home.home-populer')
    @include('frontend.home.home-new-product')
    @include('frontend.home.home-all-product')

    <!--Products Tabs-->

    <!--End Best Sales-->

    <!-- TV Category -->


    <!--End TV Category -->

    <!-- Tshirt Category -->




    <!--Vendor List -->

    {{-- @include('frontend.home.home-sekolah-list') --}}
    <!--End Vendor List -->
@endsection
