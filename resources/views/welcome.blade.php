@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => 'KaWUI'])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
          <h1 class="text-white text-center">{{ __('This is Kali Web User Interface landing page. Please log in to do use the system.') }}</h1>
      </div>
  </div>
</div>
@endsection
