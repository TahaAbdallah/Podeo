@extends('layout.navbar')

@section('content')

@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif

<div class="title-cont">
    <h1>List of Episodes</h1>
</div>

<div class="episodes-cont">

    @php
    $i = 1;
    @endphp
    @foreach ($episodes as $item)

    <div class="mb-5 episodes-card">
        <div class="episode-cont-titles mb-3">
            <p>{{ $item->name }} | الحلقة {{ $i++ }}</p>
            <div class="row">
                <div class="mr-5">
                    <a href="{{ route('editEpisode',$item->id) }}">Edit Episode</a>
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </div>

                <div>
                    <a href="{{ route('deleteEpisode',$item->id) }}">Delete Episode</a>
                    <i class="fa fa-times" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <p>{{ $item->description }}</p>
    </div>
    @endforeach

</div>

@endsection