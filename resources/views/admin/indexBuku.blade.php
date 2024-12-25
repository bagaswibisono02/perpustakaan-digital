@extends('layouts.sidebar')

@section('body')

<a href="/buku/create" class=" m-2 btn btn-primary">Tambah Buku</a>
<div class="container ">
    <div class="d-flex flex-wrap">
        @foreach ($bukus as $b)
        <div class="col-md-3" style="background-image: url('{{ env('APP_URL').'/file?file='. encrypt($b->cover) }}');">
            <div class="card book-card position-relative">
                <img style="max-height:400px ;object-fit: cover; width: 100%;" src="/file?file={{ encrypt($b->cover) }}" class="card-img-top" alt="Book Cover">
                <div class="card-body position-absolute bottom-0 rounded-1  rounded-bottom" id="coverBuku" style="">
                    <b class="card-title"><a id="judul" style="color:rgb(255, 0, 0)" class=" text-decoration-none" href="">{{ $b->judul }}</a></b>
                    <p class="card-text">Author: {{ $b->penulis }}</p>
                    <small>Terbit {{ $b->tahun_terbit }}</small>
                    <p class="card-text">Description: This is a brief descdription of the book. It is intriguing and makes you want to read more.</p>
                    <div class="d-flex justify-content-between ">
                        <a href="/buku/{{ $b->id }}/edit" class="btn btn-success">Edit</a>
                        <form action="/buku/{{ $b->id }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>
        @endforeach
      
    </div>
</div>

@endsection