<?php
    /** @var $posts \Illuminate\Pagination\LengthAwarePaginator */
?>
<x-app-layout :meta-title="$location->title" meta-description="By location">
    <section class="w-full md:w-2/3 flex flex-wrap justify-between ">
        
        @foreach($posts as $post)
            <x-post-item :post="$post"></x-post-item>
        @endforeach

        <!-- Pagination -->
        {{$posts->onEachSide(1)->links()}}
    </section>

    <x-sidebar />
</x-app-layout>
