@extends('basetheme')

@section('title', 'Instructions')

@section('pageheader', 'Booking List')

@section('content')
 
<div class="row mt-4 content-port">   
     
     <div class="col-md-11 ml-5 mt-5">
       <p class="light-grey">Welcome {{ session()->get('name') }}</p>
     </div>
   
	
	<div class="row margin-big">
      
	   @livewire('instructions')
                                                                                                                      
     </div>                                                      
</div>                                                       
                                                    
                                                 
@endsection