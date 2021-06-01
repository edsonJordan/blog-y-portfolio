<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class=" mx-4 md:mx-0 overflow-hidden  sm:rounded-lg  ">
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">
                    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 lg:col-span-4 grid-cols-1  ">   
                        @foreach ($videos as $video)
                            <article class="my-5 bg-cover w-full h-60  bg-center" 
                            style=" background-image:url({{"https://i.ytimg.com/vi/$video->url/hqdefault.jpg"}})">
                               <div class="w-full h-full px-8 flex flex-col justify-center hover:bg-green-800 hover:bg-opacity-100  text-bold opacity-80 hover:text-white">
                                   <div class=" ">
                                    <a class="h-full text-opacity-5" href="{{route('blog.video.show', $video) }}">      
                                        {{$video->tittle}}
                                    </a>
                                   </div>                                    
                               </div>   
                               <h1 class="text-1xl text-gray-500 leading-8 font-bold">
                                <a href="{{route('blog.video.show', $video) }}">      
                                    {{$video->tittle}}
                                </a>
                             </h1>                      
                            </article>
                        @endforeach
                        <div class="mt-4 lg:col-span-3 ">
                            {{$videos->links()}}
                        </div>
                    </div>
                    <div class="gap-6 ">
                        <h1 class="text-2xl font-bold text-green-400 mb-4 text-center">Asuntos</h1>
                        <aside class="text-center">
                            <ul class="grid grid-cols-2" >
                                @foreach ($technologies as $technology)
                                    <li class="m-1" >
                                        <a class="bg-{{$technology->color}}-600 text-white border-transparent rounded-md	 border-2 hover:border-{{$technology->color}}-600 hover:text-{{$technology->color}}-600 hover:bg-white block" href="{{route('blog.video.technology', $technology)}}">
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