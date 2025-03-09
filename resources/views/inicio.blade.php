@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Welcome')

{{-- Content body: main page content --}}

@section('content_body')
    <p>Welcome to this beautiful admin panel.</p>
    <p>{{ $usuario}}</p>
    <form action="{{ route('auth.logout') }}" method="post">
        @csrf
        <button class="btn btn-sm btn-sedondary" type="submit">Salir</button>
    </form>
@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}    
@endpush

{{-- Push extra scripts --}}

@push('js')
    
@endpush