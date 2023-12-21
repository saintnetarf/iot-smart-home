@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 120px;">
    <div class="row">
        @foreach ($lamps as $lamp)
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm rounded-2">
                <div class="card-header @if($lamp->status == 1) bg-success @else bg-danger @endif text-white" id="headerlamp-{{ $lamp->id }}">
                    <h5 class="mb-0 text-uppercase">{{ $lamp->name }}</h5>
                </div>
                <div class="card-body text-center">
                    <img src="@if($lamp->status == 1) images/on.png @else images/off.png @endif" class="mt-3" width="80" id="lamp-{{ $lamp->id }}">
                    <div class="mt-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input status-{{ $lamp->id }}" onclick="updateLamp(this)" type="checkbox" role="switch" id="{{ $lamp->id }}" {{ $lamp->status == 1 ? 'checked' : '' }}>
                            <label class="form-check-label ms-3 mt-1" for="{{ $lamp->id }}">
                                <h4>
                                    <span class="@if($lamp->status == 1) text-success @else text-danger @endif" id="lampStatus-{{ $lamp->id }}">@if($lamp->status == 1) ON @else OFF @endif</span>
                                </h4>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
