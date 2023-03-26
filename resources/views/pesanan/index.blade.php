@extends('app')

@section('title', 'elaptop - Pesanan')

@section('content')
    <div class="page-heading">
        <h3>Pesanan</h3>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="row" id="table-bordered">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tabel Pesanan</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <form action="">
                                            <input style="border-radius:25px;" type="text" name="q" value="{{$q}}">
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
                                            <th>Alamat</th>
                                            <th>Telepon</th>
                                            <th>Pembayaran</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                        </tr> 
                                    </thead>
                                    <tbody>
                                        @foreach ($pesanan as $item)
                                            <tr>
                                                <td>{{ $loop->iteration + 5 * ($pesanan->currentPage() - 1) }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->alamat }}</td>
                                                <td>{{ $item->nomor_telepon }}</td>
                                                <td>{{ $item->metode_bayar }}</td>
                                                <td>Rp{{ number_format($item->total_tagihan) }}</td>
                                                <td>{{ $item->status_bayar }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $pesanan->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
