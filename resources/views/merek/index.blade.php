@extends('app')

@section('title', 'elaptop - Merek')

@section('content')
    <div class="page-heading">
        <h3>Merek</h3>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="row" id="table-bordered">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tabel Merek</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <a href="{{ url('/merek/create') }}" class="btn btn-primary rounded-pill">+ Tambah</a>
                            </div>
                            <!-- table bordered -->
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Logo</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($merek as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td><img src="{{ asset('assets/images/merek/' . $item->logo) }}" width="150vh"
                                                        alt="{{ $item->logo }}"></td>
                                                <td>
                                                    <button class="btn btn-success">edit</button>
                                                    <button class="btn btn-danger">hapus</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
