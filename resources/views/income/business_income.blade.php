@extends('basetheme')

@section('title', 'Business Income')

@section('pageheader', 'Business Income')

@section('content')
 
<div class="row mt-4 content-port">   
     
	 <div class="row mt-4">
        @livewire('income.business-income')                                                          
     </div>                                                      
</div>                                                       
                                                    
                                                 
@endsection