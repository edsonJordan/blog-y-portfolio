<x-app-layout>
    <div class="py-12 max-w-6xl mx-auto sm:px-6 lg:px-8  px-8">
       
            <h1 class=" uppercase text-center font-bold text-3xl mb-4  text-{{$technology->color}}-600">{{$technology->name}}</h1>
            {{-- @foreach ($technologies as $technology)
                {{$technology->posts}}
            @endforeach --}}
    {{--         @foreach ($technologies as $technology) --}}
              
                @foreach ($technologies as $technology)
                    @foreach ($technology->videos as $video)
                            <article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
                                <img class="w-full h-72 object-cover object-center" src="https://i.ytimg.com/vi/{{$video->url}}/hqdefault.jpg" alt="">    
                                <div class="px-8 py-8">
                                    <h1 class="font-bold text-xl mb-2">
                                        <a href="{{route('blog.video.show', $video)}}">{{$video->tittle}}</a>                                    
                                    </h1>    
                                    <div class="text-gray-700">
                                        {{$video->description}}
                                    </div>
                                </div> 
                            </article>  
                           {{--  <article class="my-5 bg-cover w-full h-60  bg-center" 
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
                            </article> --}}

                        
                    @endforeach
                       
                      
                      
                        
                @endforeach
                   
            {{-- @endforeach --}}
            
            {{-- @foreach ($posts as $post)
                    <article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
                        <img class="w-full h-72 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">    
                        <div class="px-8 py-8">
                            <h1 class="font-bold text-xl mb-2">
                                <a href="{{route('blog.post.show', $post)}}">{{$post->name}}</a>                                    
                            </h1>    
                            <div class="text-gray-700">
                                {{$post->extract}}
                            </div>
                        </div> 

                        <div class="px-6 pt-4 pb-2">
                            @foreach ($post->technologies as $technology)
                                <a class="inline-block bg-{{$technology->color}}-600 rounded-full px-2 py-2 text-sm text-white mr-2"  
                                    href="">{{$technology->name}}</a>
                            @endforeach
                        </div>
                    </article>                
            @endforeach   --}}  
            {{-- <div class="mt-4 ">
                {{$posts->links()}}
            </div> --}}
                
    </div>
</x-app-layout>