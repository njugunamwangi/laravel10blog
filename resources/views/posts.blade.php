<?php
    /** @var $posts \Illuminate\Pagination\LengthAwarePaginator */
?>
<x-app-layout meta-description="">
    <section class="w-full md:w-2/3 flex flex-wrap justify-between ">

        <div class="grid grid-cols-2 gap-2 mb-4 justify-between">
            @foreach($posts as $post)
                <x-post-item :post="$post"></x-post-item>
            @endforeach
        </div>

        <!-- Pagination -->
        {{$posts->onEachSide(1)->links()}}
    </section>

    <x-sidebar />
</x-app-layout>
