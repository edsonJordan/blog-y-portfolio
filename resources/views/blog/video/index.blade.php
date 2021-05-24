<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class=" mx-4 md:mx-0 overflow-hidden  ">
                    <div class="grid gap-x-8 gap-y-12 mb-8  md:grid-cols-2 lg:grid-cols-3 grid-cols-1 ">
                        @foreach ($videos as $video)
                            <article class=" bg-cover w-full h-60  bg-center" 
                            style=" background-image:url({{"https://i.ytimg.com/vi/$video->url/hqdefault.jpg"}})">
                               <div class="w-full h-full px-8 flex flex-col justify-center">
                                   <div class="">
                                   </div>
                                    
                               </div>   
                               <h1 class="text-1xl text-gray-500 leading-8 font-bold">
                                <a href="{{route('blog.video.show', $video) }}">      
                                    {{$video->tittle}}
                                </a>
                             </h1>                      
                            </article>
                        @endforeach
                    </div>
                   
                </div>
                <div class="mt-2">
                    {{$videos->links()}}
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>