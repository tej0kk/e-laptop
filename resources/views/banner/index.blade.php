@extends('app')

@section('title', 'elaptop - Banner')

@section('content')
    <div class="page-heading">
        <h3>Banner {{ $angka }}</h3>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="row" id="table-bordered">
                <div class="col-12">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link @if (Request::segment(2) == 'satu') active @endif"
                                href="{{ url('/banner/satu') }}">Banner Satu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if (Request::segment(2) == 'dua') active @endif"
                                href="{{ url('/banner/dua') }}">Banner Dua</a>
                        </li>
                    </ul>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tabel Banner</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <a href="{{ url('/merek/create') }}" class="btn btn-primary rounded-pill">
                                            <i class="fa-solid fa-file-circle-plus"></i> Tambah</a>
                                    </div>
                                    <div class="col">
                                        <form action="">
                                            <input style="border-radius:25px;" type="text" name="q" value="">
                                            <button class="btn btn-secondary rounded-pill" type="submit"><i
                                                    class="fa-solid fa-magnifying-glass-plus"></i></button>
                                        </form>
                                    </div>
                                </div>
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
                                        @foreach ($banner as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td><img src="{{ asset('assets/images/merek/' . $item->logo) }}"
                                                        width="150vh" alt="{{ $item->logo }}"></td>
                                                <td>
                                                    <a href="{{ url('/banner/' . $item->id . '/edit/' . $angka) }}"
                                                        class="btn btn-success rounded-pill"><i
                                                            class="fa-solid fa-pen-ruler"></i></a>
                                                    <button id="buttonHapus" type="button"
                                                        class="btn btn-danger rounded-pill" data-id="{{ $item->id }}"><i
                                                            class="fa-solid fa-trash-can"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $banner->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal Hapus-->
    <div class="modal fade" id="modalHapus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Hapus Merek</h1>
                </div>
                <form id="formHapus" action="" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('DELETE')
                        <h4>Apakah anda yakin ? 😮‍💨🫥🤔</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger rounded-pill">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
    <script>
        $('body').on('click', '#buttonHapus', function(event) {
            var id = $(this).data('id');
            var url = "{{ url('/merek') }}/" + id;
            $('#modalHapus').modal('show');
            var form = document.getElementById('formHapus');
            form.action = url;
        });
    </script>
@endsection
