@extends('layout.navbar')

@section('content')

<div class="add-title-cont">

    <div class="row align-items-center">
        <a href="/podcast/{{ $podcasts->id }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </a>
        <h1>Add Episodes</h1>
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

    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
</div>

<form class="podcast-form" action="{{ route('storeEpisode') }}" method="POST">
    @csrf

    <input type="hidden" name="podcast_id" value="{{ $podcasts->id }}">

    <div class="form-content">
        <label for="pod-name">Episode Name : </label>
        <input type="text" name="name">
    </div>

    <div class="form-content">
        <label for="pod-name">Episode Description : </label>
        <textarea name="description"></textarea>
    </div>

    <div class="podcast-form-input-cont">
        <button type="submit">Add Episode</button>
    </div>

</form>

@endsection