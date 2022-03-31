@extends('layouts.app')
@section('content')
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
    <div class="inline-flex align-bottom items-center px-2 py-2 text-sm font-medium bg-gray-200 rounded-lg text-left  transform  sm:align-middle sm:max-w-lg sm:h-full">
      <!-- ITEM -->
      <form action="#" method="post">
        @csrf
        <div class="relative h-3">
          <a href="dashboard"><svg class="h-3 w-2 absolute top-0 right-0 h-3 w-15" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg></a>
        </div>

        <div class="flex">
          @foreach($subscription as $subscriptions)
          <div class="py-8 box-border h-61 w-40 p-4 border-4">
            <div class="meta-categories text-blue-600"><a href="#">Web design {{ $subscriptions->plan }}</a></div>
            <div class="meta-categories ml-8 text-blue-800"><a href="#">{{ $subscriptions->validity }}</a></div><br>
            <div class="price ml-8 text-gray-500">{{$subscriptions->price==0?'Free':'$'.$subscriptions->price}}</div><br>
            <h4><a href="#">The Complete Digital Photography Course Amazon Top Seller</a></h4><br>

            <div class="bg-gray-50 px-2 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
              <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm hover:bg-blue-500"><a href="{{ route('subscription.id', $subscriptions->id) }}">Subscribe</a></button>
            </div>
          </div>
          @endforeach
        </div>
      </form>
      <!-- END / ITEM -->
    </div>
  </div>
</div>




@endsection