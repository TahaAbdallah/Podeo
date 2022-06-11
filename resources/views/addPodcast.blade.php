@extends('layout.navbar')

@section('content')

<div class="add-title-cont">

    <div class="row align-items-center">
        <a href="/">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </a>
        <h1>Add Podcast</h1>
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

<form class="podcast-form" action="{{ route('storePodcast') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-content">
        <label for="pod-name">Podcast Name : </label>
        <input type="text" name="name">
    </div>

    <div class="form-content">
        <label for="pod-name">Podcast Description : </label>
        <textarea name="description"></textarea>
    </div>

    <div class="form-content">
        <label for="pod-name">Podcast Image : </label>
        <input type="file" name="image">
    </div>

    <div class="podcast-form-input-cont">
        <button type="submit">Add Podcast</button>
    </div>

</form>

@endsection