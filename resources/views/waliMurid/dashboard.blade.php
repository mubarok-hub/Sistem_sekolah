@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Dashboard Wali Murid</h1>
        <p>Halo {{ Auth::user()->name }}, pantau perkembangan anak Anda di sini.</p>
    </div>
@endsection
