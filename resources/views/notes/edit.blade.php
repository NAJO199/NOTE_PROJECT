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

    <form action="{{route ('notes.update',$note->id)}}" method="POST">
  @csrf
  @method('PUT')

        <div class="form-group">
          <label for="exampleFormControlInput1">Title</label>
          <input type="text" name="title" value="{{$note->title}}" class="form-control"  placeholder="Title">
        </div>


        <div class="form-group">
            <label for="exampleFormControlInput1">Content</label>
            <textarea class="form-control" name="content" rows="3"> {!! $note->content !!} </textarea>
          </div>




        <div class="form-group">

        <button type="submit" class="btn btn-primary">Update</button>
     </div>



     </form>


</div>
@endsection
