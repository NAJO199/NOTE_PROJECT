@extends('notes.layout')

@section('content')


<div class="jumbotron container">
    <h1 class="display-4">Hello, {{$user->name}}!</h1>
    <hr class="my-4">
    <a class="btn btn-info btn-lg" href="{{route ('notes.create')}}">Create Note</a>

    <div class="container" style="padding-top:2%">
        @if ( $message = Session::get('success'))
        <div class="alert alert-primary" role="alert">
            {{$message}}
          </div>
        @endif



     <div class="container" style="padding-top:5%">
        <table class="table">
            <thead class="table-active" >
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

                @php
                $i = 0;
                @endphp

                @foreach ($notes as $item)

              <tr>
                <th scope="row">{{++$i}}</th>
                <td>{{$item->title}}</td>

                <td>

                    <div class="row">
                        <div class="col-sm">
                            <a class="btn btn-success" href="{{route ('notes.edit',$item->id)}}">Edit</a>
                        </div>
                        <div class="col-sm">
                            <a class="btn btn-warning" href="{{route ('notes.show',$item->id)}}">Show</a>
                        </div>
                        <div class="col-sm">
                  <form action="{{route ('notes.destroy', $item->id)}}" method="POST">
                        @csrf
                     @method('DELETE')
                       <button type="submit" class="btn btn-danger" > Delete</button>
                   </form>
                        </div>
                      </div>
                    </div>



                </td>
             </tr>

             @endforeach

            </tbody>
        </table>




  </div>
  {!! $notes->links() !!}
</div>

@endsection
