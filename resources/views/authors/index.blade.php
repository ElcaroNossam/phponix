@extends('layouts.app')

@section('content')
    <div class="container">
        
    <livewire:author-manager />
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        

    </div>
@endsection
