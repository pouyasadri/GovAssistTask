@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if(session('msg'))
                <div class="alert alert-success" role="alert">
                    {{ session('msg') }}
                </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1>Url Shortening</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route("storeUrl")}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="destination" placeholder="http://example.com"
                                       class="form-control" aria-describedby="UrlHelp">
                                <div id="UrlHelp" class="form-text">Enter the URL you want to shorten</div>
                            </div>
                            <button type="submit" class="btn btn-primary">Shorten URL</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <td>SlUG</td>
                    <td>URL</td>
                    <td>Created At</td>
                </tr>
                </thead>
                <tbody>
                @forelse($data as $result)
                    <tr>
                        <td><a href="{{url('')."/".$result->slug}}">{{url('')."/".$result->slug}}</a></td>
                        <td><a href="{{$result->destination}}">{{$result->destination}}</a></td>
                        <td>{{$result->created_at}}</td>
                    </tr>
                @empty
                    <tr>
                        <td>
                            Not Founded
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
