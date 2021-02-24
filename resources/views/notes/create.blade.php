@extends('notes.layout')

@section('content')




        <div class="container" style="padding-top: 5%">
            <form action="{{route('notes.store')}}" method="POST" >
           @csrf
                <h2 style="padding-top:2% center " >Create New Notes</h2>

                <div class="form-group">
                  <label for="exampleFormControlInput1">Title</label>
                  <input type="text" class="form-control" name="title" placeholder="Title">
                </div>

                <div class="form-group"style="padding-top:2% " >
                    <label for="exampleFormControlInput1">Content</label>
                    <textarea class="form-control" name="content" rows="5" placeholder="Tap here your note"></textarea>
                </div>



                <div class="form-group" style="padding-top:2% ">
                    <button type="submit" class="btn btn-outline-success btn-lg ">Save Note</button>

                  </div>
              </form>

            </div>



@endsection
