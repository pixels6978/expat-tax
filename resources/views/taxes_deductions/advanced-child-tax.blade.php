@extends('basetheme')

@section('title', 'General Questions')

@section('pageheader', 'General Questions')

@section('content')

<div class="row mt-4 content-port">


	<div class="row mt-4">

	   @livewire('taxes-deductions.advanced-child-tax')

     </div>
</div>


@endsection
