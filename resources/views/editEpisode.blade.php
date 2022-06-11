@extends('layout.navbar')

@section('content')

<form action="{{ route('updateEpisode',$episodes->id) }}" method="POST">
    @csrf
    @method("PUT")

    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif

    <div class="edit-title-cont">
        <a href="/podcast/{{ $episodes->podcast_id }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </a>
        <h1>Edit Episode</h1>
    </div>

    <div class="episodes-cont">

        <div class="mb-5 episodes-card">
            <div class="episode-cont-titles mb-3">
                <input type="text" name="name" value="{{ $episodes->name }}">
                <div class="row">
                    <div class="mr-5">
                        <a href="">Edit Episode</a>
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <textarea class="w-100" name="description" id="" cols="30" rows="5">{{ $episodes->description }}</textarea>
            <button class="add-episode" type="submit">Save</button>
        </div>


    </div>

</form>
@endsection