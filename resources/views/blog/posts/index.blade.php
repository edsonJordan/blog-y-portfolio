<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class=" mx-4 md:mx-0 overflow-hidden  sm:rounded-lg">
                    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 grid-cols-1 ">
                        @foreach ($posts as $post)
                            <article class=" shadow-xl w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2  @endif"style="background-image:url({{ Storage::url($post->image->url) }})">
                               <div class="w-full h-full px-8 flex flex-col justify-center">
                                   <div class="">
                                       @foreach ($post->technologies as $technology)
                                            <a class="inline-block px-3 h-6 text-white bg-{{$technology->color}}-600  rounded-full"
                                             href="">{{ $technology->name }}</a>
                                       @endforeach  
                                   </div>
                                    <h1 class="text-4xl text-white leading-8 font-bold">
                                       <a href="{{route('blog.posts.show', $post) }}">      
                                           {{$post->name}}
                                       </a>
                                    </h1>
                               </div>                         
                            </article>
                        @endforeach
                    </div>
                    <div class="mt-4">
                    {{$posts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>