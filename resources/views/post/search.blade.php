<?php
/** @var $posts \Illuminate\Pagination\LengthAwarePaginator */
?>
<x-app-layout>
    <section class="w-full md:w-2/3 flex flex-wrap justify-between ">

        <div class="flex flex-wrap">
            @foreach($posts as $post)
                <div>
                    <a href="{{ route('view', $post) }}">
                        <h2 class="text-blue-700 font-bold text-lg sm:text-xl mb-2">{{$post->title}}</h2>
                    </a>
                    <div>
                        {{$post->shortBody(50)}}
                    </div>
                </div>
                <hr class="my-4" />
            @endforeach
        </div>

        <!-- Pagination -->
        {{$posts->onEachSide(1)->links()}}
    </section>

    <x-sidebar />
</x-app-layout>
