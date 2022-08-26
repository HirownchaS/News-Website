@extends('admindashboard')

@section('content')
<div class="container">

    <form action="adminAddnews" method="post" enctype="multipart/form-data">
      @csrf
      <h1><center> ADD NEWS </center></h1>
  <div class="row">
      <div class="col-12">


      <div class="form-group" >
          <label for="pwd">Name:</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
        </div>
        <div class="form-group" >
          <label for="pwd">Title:</label>
          <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
        </div>

      <div class="form-group" >
          <label for="pwd">Description:</label>
          <input type="text" name="description" class="form-control"  id="description" placeholder="Enter description">
      </div>
      <div class="form-group" >
          <label for="pwd">Image:</label>
          <input type="file" name="image" id="image" class="form-control">
      </div>
      <div class="col-md-4">
          <button type="submit" class="btn btn-primary">upload</button>
          @csrf
      </div>


      </div>
  </div>
    </form>
  </div>
@endsection
