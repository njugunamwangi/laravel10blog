    <article class="flex flex-col shadow my-4">
        <!-- Article Image -->
        <a href="{{ route('view', $post)}}" class="hover:opacity-75" >
            <img src="{{ $post->getThumbnail() }}" alt="{{ $post->title }}" class="aspect-[4/3] object-contain">
        </a>
        <div class="bg-white flex flex-col justify-start p-6">

            <a href="{{ route('view', $post) }}" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $post->title }}</a>
            <p class="text-sm pb-3">
                By <a href="#" class="font-semibold hover:text-gray-800">{{ $post->user->name }}</a>,
                Published on
                {{$post->getFormattedDate()}} | {{ $post->human_read_time }}
            </p>
            <div class="pb-6">
                {{$post->shortBody()}}
            </div>
            <a href="{{ route('view', $post)}}" class="uppercase text-gray-800 hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
        </div>
    </article>
