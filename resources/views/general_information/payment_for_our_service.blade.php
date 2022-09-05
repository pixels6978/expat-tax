@extends('basetheme')

@section('title', 'Id Verification')

@section('pageheader', 'Id Verification')

@section('content')

<div class="row mt-4 content-port">

  @livewire('generalinfo.payment-for-our-service')

     <!-- Modal -->
     <div class="modal fade" id="cardComment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title" id="exampleModalLabel">Add Comment:</h6>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              {{-- <form> --}}
                <textarea wire:modal="cardComment" class="form-control" rows="5"></textarea>
              {{-- </form> --}}

            </div>
            <div class="modal-footer">

              <button type="button" class="btn btn-primary">Save</button>
            </div>
          </div>
        </div>
      </div>

</div>


@endsection
