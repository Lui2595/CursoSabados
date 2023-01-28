@extends('layouts.blog')

@section("titulo-pagina")
    Somos una escuela de programación
@endsection

@section("subtitulo-pagina")
    Aprende PHP,HTML,CSS, Laravel,VueJS
@endsection

@section("imagen"){{ asset('assets/img/post-bg.jpg') }}@endsection

@section("content")
<div class="row gx-4 gx-lg-5 justify-content-center">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam fugit ducimus voluptates similique, possimus voluptatibus laudantium soluta explicabo iusto vero rerum corrupti saepe fugiat obcaecati. Ducimus doloremque ipsum dolorum repudiandae.
</div>
@endsection
