@extends('layouts.app')

@section('content')
<section class="bg-red text-white skrollable skrollable-before" data-top-top="transform: translateY(0px);" data-top-bottom="transform: translateY(200px);" style="transform: translateY(0px);">
    <div class="container">
    <div class="row align-items-center">
        <div class="col-md-4">
        <h2 class="fs-24 text-uppercase letter-spacing"><b>01.</b> skills</h2>
        </div>
        <div class="col-md-8">
        <div class="row">
            <div class="col-12">
            <h4 class="progress-title">UI / UX Design</h4>
            <div class="progress-item">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"><span>40%</span></div>
                </div>
            </div>
            </div>
            <div class="col-12 mt-4">
            <h4 class="progress-title">HTML / CSS / JS</h4>
            <div class="progress-item">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"><span>90%</span></div>
                </div>
            </div>
            </div>
            <div class="col-12 mt-4">
            <h4 class="progress-title">Adobe Creative Suite</h4>
            <div class="progress-item">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 55%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"><span>55%</span></div>
                </div>
            </div>
            </div>
            <div class="col-12 mt-4">
            <h4 class="progress-title">Social Media Marketing</h4>
            <div class="progress-item">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"><span>65%</span></div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
@endsection
