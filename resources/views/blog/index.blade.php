<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class=" mx-4 md:mx-0 overflow-hidden  sm:rounded-lg">
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 lg:col-span-3 grid-cols-1 ">
                        @foreach ($posts as $post)
                            <article class=" shadow-xl w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2  @endif"
                                style="background-image:url(@if($post->image) {{ Storage::url($post->image->url) }} @else {{ Storage::url('profile-photos/post-default.jpg')}} @endif   )">
                                <div class="w-full h-full px-8 flex flex-col justify-center">
                                    <div class="">
                                        @foreach ($post->technologies as $technology)
                                                <a class="inline-block px-3 h-6 text-white bg-{{$technology->color}}-600  rounded-full"
                                                href="">{{ $technology->name }}</a>
                                        @endforeach  
                                    </div>
                                        <h1 class="text-4xl text-white leading-8 font-bold">
                                        <a href="{{route('blog.post.show', $post) }}">      
                                            {{$post->name}}
                                        </a>
                                        </h1>
                                </div>                         
                            </article>
                        @endforeach
                        <div class="mt-4 lg:col-span-3 ">
                            {{$posts->links()}}
                        </div>
                    </div>
                    <div class="gap-6 ">
                        <h1 class="text-2xl font-bold text-green-400 mb-4 text-center">Categorias</h1>
                        <aside class="text-center">
                            <ul >
                                {{-- @foreach ($categories as $category)
                                    <li class="mb-4 " >
                                        <a class="text-green-600" href="{{route('blog.post.category', $category)}}">
                                            {{$category->name}}
                                        </a>
                                        
                                    </li>
                                @endforeach --}}
                            </ul>
                        </aside>

                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>