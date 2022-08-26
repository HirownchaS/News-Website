@extends('layout')

@section('content')

<div class="card-deck">
    <div class="card">
      <img class="card-img-top" src="assets/images/image1.jpg" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Breaking news</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
      <div class="card-footer">
        {{-- <small class="text-muted">Last updated 3 mins ago</small> --}}
        <button type="submit" class="btn btn-info">Read more</button>
      </div>
    </div>
    <div class="card">
      <img class="card-img-top" src="assets/images/image1.jpg" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Travel</h5>
        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      </div>
      <div class="card-footer">
        {{-- <small class="text-muted">Last updated 3 mins ago</small> --}}
        <button type="submit" class="btn btn-info">Read more</button>
      </div>
    </div>
    <div class="card">
      <img class="card-img-top" src="assets/images/image1.jpg" alt="">
      <div class="card-body">
        <h5 class="card-title">Breaking News</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      </div>
      <div class="card-footer">
        {{-- <small class="text-muted">Last updated 3 mins ago</small> --}}
        <button type="submit" class="btn btn-info">Read more</button>
      </div>
    </div>
  </div>
@endsection
