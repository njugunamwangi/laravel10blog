<?php
    /** @var $posts \Illuminate\Pagination\LengthAwarePaginator */
?>
<x-app-layout meta-description="">
    <div class="container mx-auto  py-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Latest Post -->
            <div class="col-span-2">
                <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
                    Latest News
                </h2>

                <x-post-item :post="$latestPost"></x-post-item>
            </div>

            <!-- Popular Post -->
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
                    Popular News
                </h2>
                @foreach($popularPosts  as $popularPost)
                    <div class="grid grid-cols-4 gap-2 mb-4">
                        <div class="pt-2">
                            <a href="{{ route('view', $popularPost) }}">
                                <img src="{{ $popularPost->getThumbnail() }}" alt="{{$popularPost->title}}" />
                            </a>
                        </div>
                        <div class="col-span-3">
                            <a href="{{ route('view', $popularPost) }}">
                                <h3 class="text-bold text-blue-500 whitespace-nowrap truncate">{{$popularPost->title}}</h3>
                            </a>
                            <div class="text-xs p-2">
                                {{ $popularPost->human_read_time }}
                            </div>
                            <div class="text-sm">
                                {{$popularPost->shortBody(10)}}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <!-- Recommended Post -->
        <div>
            <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
                Recommended Posts
            </h2>
        </div>

        <!-- Latest categories -->
        <div>
            <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
                Latest Categories
            </h2>
        </div>
    </div>
</x-app-layout>
