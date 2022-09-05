@extends('basetheme')

@section('title', 'Foreign Income')

@section('pageheader', 'Foreign Income')

@section('content')

<div class="row mt-4 content-port">

	<div class="row mt-4">
         @livewire('income.foreign-income')
     </div>
</div>


@endsection
