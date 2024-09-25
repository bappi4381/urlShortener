@extends('user.admin')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
          </span> Dashboard
        </h3>
        <nav aria-label="breadcrumb">
          <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
              <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
          </ul>
        </nav>
      </div>
        <form action="{{ route('url.shorten') }}" method="POST">
            @csrf
            <div class="d-flex">
                <div class="w-75 mr-sm-2">
                    <input class="form-control " type="url" name="original_url" placeholder="Enter the URL" required>
                </div>
                <div class="my-2 my-sm-0"> 
                    <button class="btn btn-outline-primary " type="submit">URL Shortener</button>
                </div>
            </div>
        </form>
        <div class="mt-5 table-responsive">
          <table class="table">
              <h2>URL Statistics</h2>
              <thead class="table-primary">
              <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Original URL</th>
                  <th scope="col">Short URL</th>
                  <th scope="col">Clicks</th>
              </tr>
              </thead>
              <tbody>
                  @if($urls->isEmpty())
                      <tr>
                          <td colspan="4" class="text-center">No URLs found.</td>
                      </tr>
                  @else
                      @foreach($urls as $url)
                          <tr>
                              <td>{{ $url->id }}</td>
                              <td>{{ $url->original_url }}</td>
                              <td><a href="{{ url('/' . $url->short_code) }}">{{ url('/' . $url->short_code) }}</a></td>
                              <td>{{ $url->clicks }}</td>
                          </tr>
                      @endforeach
                  @endif
              </tbody>
          </table>
      </div>      
    </div>
</div>

@endsection