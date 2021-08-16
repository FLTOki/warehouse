@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="wrapper bg-gray-400 antialiased text-gray-900">
                    <div class="">
                        <div class="post">
                            <img src="/storage/{{ $post->image }}" alt="" >
                        </div>

                        <div class="relative px-4 -mt-16  ">
                            <div class="bg-white p-6 rounded-lg shadow-lg">
                                <div class="flex items-baseline">
                                    <span class="bg-teal-200 text-teal-800 text-xs px-2 inline-block rounded-full  uppercase font-semibold tracking-wide">
                                        New
                                    </span>
                                    <!-- <div class="ml-2 text-gray-600 uppercase text-xs font-semibold tracking-wider">
                                        2 baths &bull; 3 rooms
                                    </div> -->
                                </div>

                                <h4 class=" mt-1 text-xl font-semibold uppercase leading-tight truncate">{{ $post->title }}</h4>

                                <div class=" mt-1 text-l font-semibold uppercase leading-tight">
                                    $ {{ $post->price }}
                                    <span class="text-gray-600 text-sm"> </span>
                                    <br>
                                </div>

                                <div class=" mt-4">
                                    <p class="text-teal-600 text-md font-semibold">Description </p>
                                    <p class="text-sm text-gray-600">{{ $post->description }}</p>
                                </div>
                                <div class="pay-options d-flex pt-3">
                                    <button class="btn btn-sm btn-success">Mpesa</button>
                                    <span class="pr-3"></span>
                                    <button class="btn btn-primary">Paypal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection