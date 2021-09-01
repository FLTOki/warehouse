@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="wrapper bg-gray-400 antialiased text-gray-900">
                    <main>
                        <ul id="cards">
                            <li class="card" id="card_1">
                                <div class="card__content">
                                    <div>
                                        <h4 class=" mt-1 text-xl font-semibold uppercase leading-tight truncate">{{ $post->title }}</h4>

                                        <div class=" mt-1 text-l font-semibold uppercase leading-tight">
                                            $ {{ $post->price }}
                                            <span class="text-gray-600 text-sm"> </span>
                                        </div>

                                        <div class=" mt-4">
                                            <p class="text-teal-600 text-md font-semibold">Description </p>
                                            <p class="text-sm text-gray-600">{{ $post->description }}</p>
                                        </div>
                                        <div>
                                            <paypal-button></paypal-button>
                                        </div>
                                    </div>
                                    <figure>
                                        <div class="post">
                                            <img src="/storage/{{ $post->image }}" alt="" class="w-100" height="800px">
                                        </div>
                                    </figure>
                                </div>
                            </li>
                        </ul>
                    </main>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection