<link rel="stylesheet" href="{{ asset('/css/app.css')}}">

<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3">
        <h3 class="text-2xl font-bold text-center">Post</h3>
        <form action="{{ route('post') }}" method="POST">
            @csrf
            <div class="mt-4">
                <div>
                    <label class="block" for="title">title<label>
                            <input id="title" type="text" placeholder="title" title="title" value="{{old('title')}}" 
                               name="title"  class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
                <div class="mt-4">
                    <label class="block" for="description">Description<label>
                            <textarea id="description" type="text" placeholder="description" title="description" value="{{old('description')}}"
                              name="description"  class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"></textarea>
                </div>
                <div class="flex">
                    <button class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Post</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- <h1>hello amruta</h1> -->