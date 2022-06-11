@extends('layout.navbar')

@section('content')

<form action="{{ route('updatePodcast',$podcasts->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="podcast-page-top-cont">
        <div>
            <button class="add-episode" type="submit">Save Changes</button>
        </div>

        <div class="edit-delete-cont">
            <div>
                <i class="fa fa-times" aria-hidden="true"></i>
                <a href="{{ route('deletePodcast',$podcasts->id) }}">Delete Podcast</a>
            </div>
        </div>

    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
    @endif



    <div class="podcast-page__cont">

        <div class="podcast-side">
            <label for="image">Change Podcast Image</label>
            <input type="file" id="image" name="image">
            <img class="podcast-page__img mt-3" src={{ asset($podcasts->image )}}>
            <label for="name">Change Podcast Name</label>
            <input type="text" id="name" name="name" value="{{ $podcasts->name }}">
        </div>

        <div class="episodes-side">
            <h1>الحلقات</h1>
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

</form>

@endsection