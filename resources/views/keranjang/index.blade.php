@extends('app')

@section('title', 'elaptop - Keranjang')

@section('content')
    <div class="page-heading">
        <h3>Keranjang</h3>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="row" id="table-bordered">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tabel Keranjang</h4>
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
                                            <th>Nama Produk</th>
                                            <th>Harga Produk</th>
                                            <th>Banyak</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($keranjang as $item)
                                            <tr>
                                                <td>{{ $loop->iteration + 5 * ($keranjang->currentPage() - 1) }}</td>
                                                <td>{{ $item->produk->nama }}</td>
                                                <td>Rp{{ number_format($item->produk->harga) }}</td>
                                                <td>{{ $item->banyak }}</td>
                                                <td>Rp{{ number_format($item->total_harga) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $keranjang->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
