@extends('layout.navbar')

@section('content')

<div class="title-cont">
    <h1>List of podcasts</h1>
    <a href="{{ route('addPodcast') }}">Add Podcast</a>
</div>


<div class="cards-cont">

    <div class="empty">
        @if ($podcasts->isEmpty())
        <h2>Sorry, no podcasts found. Create a new one!</h2>
        @endif
    </div>

    @foreach ($podcasts as $item)

    <a href="{{ route('showPodcast',$item->id) }}">
        <div class="card text-right">
            <img class="card-img-top" src="{{ $item->image }}">
            <div class="card-body">
                <h4 class="card-title">{{ $item->name }}</h4>
                <p class="card-text">{{ $item->description }}</p>
            </div>
        </div>
    </a>

    @endforeach

</div>


@endsection