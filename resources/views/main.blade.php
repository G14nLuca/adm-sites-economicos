@extends('layouts.template')
@section('main')

<div class="wrapper">
    <div class="main-panel">
        <div class="content">
            @if ($view == 'empty')
            <h1 class="mx-5 mt-5">Selecione uma opção do menu ao lado</h1>
            @elseif($view == 'about')
               <x-edit-form :fields="$fields"/>
            @endif
        </div>
    </div>
</div>

@endsection