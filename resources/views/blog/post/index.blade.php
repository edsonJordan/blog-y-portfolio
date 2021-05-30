<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class=" mx-4 md:mx-0 overflow-hidden  sm:rounded-lg">
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 lg:col-span-3 grid-cols-1 ">
                        @foreach ($posts as $post)
                            <article class=" shadow-xl w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2  @endif"style="background-image:url({{ Storage::url($post->image->url) }})">
                                <div class="w-full h-full px-8 flex flex-col justify-center">
                                    <div class="">
                                        @foreach ($post->technologies as $technology)
                                                <a class="inline-block px-3 h-6 text-white bg-{{$technology->color}}-600  rounded-full"
                                                href="{{route('blog.post.technology', $technology)}}">{{ $technology->name }}</a>
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
                                @foreach ($categories as $category)
                                    <li class="m-4" >
                                        <a class="p-2 bg-green-600 text-white border-transparent rounded-md	 border-2 hover:border-green-600 hover:text-green-600 hover:bg-white block" href="{{route('blog.post.category', $category)}}">
                                            {{$category->name}}
                                        </a>
                                        
                                    </li>
                                @endforeach
                            </ul>
                        </aside>
                        
                        <h1 class="text-2xl font-bold text-green-400 mb-4 text-center">Asuntos</h1>
                        <aside class="text-center">
                            <ul class="grid grid-cols-2" >
                                @foreach ($technologies as $technology)
                                    <li class="m-1" >
                                        <a class="bg-{{$technology->color}}-600 text-white border-transparent rounded-md	 border-2 hover:border-{{$technology->color}}-600 hover:text-{{$technology->color}}-600 hover:bg-white block" href="{{route('blog.post.technology', $technology)}}">
                                            {{$technology->name}}
                                        </a>
                                        
                                    </li>
                                @endforeach
                            </ul>
                        </aside>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>