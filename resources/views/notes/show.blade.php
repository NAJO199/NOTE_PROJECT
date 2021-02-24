@extends ('notes.layout')

@section('content')

<div class="container" style="padding-top: 12%"  >

    <div class="card" >

        <div class="card-body">
            <a href="{{route ('notes.index')}}"> Back </a>
          <p class="card-text"> Title :{{$note->title}}</p>
        </div>
      </div>

      <div class="container"  style="padding-top: 2%">



        <div class="form-group">
          <label for="exampleFormControlInput1">{{$note->title}}</label>

        </div>


        <div class="form-group">
             {!! $note->content !!}
          </div>











</div>
@endsection
