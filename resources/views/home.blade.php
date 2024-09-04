@extends('layouts.app')

@section('content')
<div class="container">
    @if(\Session::has('success'))
        <div class="alert alert-success">
            {{\Session::get('success')}}
        </div>
    @endif
   
    <div class="row">
       <a href="{{url('/create/buku')}}" class="btn btn-success">Tambah data buku</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
              <td>ID</td>
              <td>Judul</td>
              <td>Keterangan</td>
              <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($buku2 as $buku)4swadsaASFGHFDSAwethhrewq  wertrewERREWAW$44w34q $eee
            <tr>
                <td>{{$buku->id}}</td>
                <td>{{$buku->judul}}</td>
                <td>{{$buku->keterangan}}</td>
                <td>
                    <a href="{{action('BukuController@edit',$buku->id)}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                   <form action="{{action('BukuController@destroy', $buku->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
                   <button class="btn btn-danger" type="submit">Hapus</button>
                   </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection