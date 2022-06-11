@extends('layout.navbar')

@section('content')

<div class="podcast-page-top-cont">
    <div>
        <a class="add-episode" href="{{ route('addEpisode',$podcasts->id) }}">Add Episode</a>
    </div>

    <div class="edit-delete-cont">
        <div>
            <i class="fa fa-pencil" aria-hidden="true"></i>
            <a href="{{ route('editPodcast',$podcasts->id) }}">Edit Podcast</a>
        </div>
        <div>
            <i class="fa fa-times" aria-hidden="true"></i>
            <a href="{{ route('deletePodcast',$podcasts->id) }}">Delete Podcast</a>
        </div>
    </div>

</div>

<div class="podcast-page__cont">

    <div class="podcast-side">
        <img class="podcast-page__img" src={{ asset($podcasts->image )}}>
        <h1>{{ $podcasts->name }}</h1>
    </div>

    <div class="episodes-side">
        <div class="episodes-side-titles">
            <a href="{{ route('showEpisodes',$podcasts->id) }}">Edit Episodes</a>
            <h1>الحلقات</h1>
        </div>
        @php
        $i = 1;
        @endphp
        @foreach ($podcasts->episodes as $episode)
        <p>{{ $episode->name }} | الحلقة {{ $i++ }}</p>
        <p class="episode-desc">{{ $episode->description }}</p>
        @endforeach

        <div class="empty">
            @if ($podcasts->episodes->isEmpty())
            <p>Sorry, no Episodes found. Create a new one!</h2>
                @endif
        </div>

    </div>

</div>

@endsection