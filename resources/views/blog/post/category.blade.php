<x-app-layout>
    <div class="py-12 max-w-6xl mx-auto sm:px-6 lg:px-8  px-8">
            <h1 class=" uppercase text-center font-bold text-3xl mb-4  text-green-600">{{$category->name}}</h1>
            @foreach ($posts as $post)
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
            @endforeach    
            <div class="mt-4 ">
                {{$posts->links()}}
            </div>
                
    </div>
</x-app-layout>