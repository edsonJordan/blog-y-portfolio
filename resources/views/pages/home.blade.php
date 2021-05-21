@foreach ($videos['items'] as $item)
        <li>{{$item['id']['videoId']}}</li>
@endforeach
@dump($videos)
@dump($videos['items'][0]['id']['videoId'])