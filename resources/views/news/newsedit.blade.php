@extends('layouts.default')

@section('title', 'News bearbeiten')

@section('content')
<div class="page-header mt-5">
    <h3 class="text-center"></h3>
</div>
<div class="container mt-5">
    <div class="container mt-5  h-100">
        <a href="{{ url()->previous() }}" class="btn btn-primary mb-3">Zurück</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" class="form-control bg-dark p-5 mt-5">
                        <h1 class="text-center mb-5 text-info">News bearbeiten</h1>
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="topic" class="text-white col-form-label text-md-right">Überschrift</label>
                                <input id="headline" type="text" class="form-control bg-secondary text-white" name="topic" value="{{ $post->topic }}" required>
                            </div>
                            <div class="col-md-12 form-outline">
                                <label for="content" class="col-form-label text-md-right text-white ">Beschreibung:</label>
                                <textarea class="form-control bg-secondary text-white" id="textAreaExample1" name="content" rows="6" value="">{{ $post->content }}</textarea>
                            </div>
                    
                            <div class="col-md-12">
                                <input type="submit" class="form-control btn btn-primary mt-3" value="Speichern">
                            </div>

                        
                    </form>

</div>
@endsection