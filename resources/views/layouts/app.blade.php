@include('layouts.head')
@include('layouts.header')
<div class="flex">
<div class="w-1/5">
    @include('layouts.sidebar')
</div>
<div class="w-4/5">
    @yield('content') 
</div>
</div>

@include('layouts.footer')