    <h1>Ini halaman create banner {{$angka}}</h1>

    <form action="{{url('/banner') }}" method="POST">
        @csrf
        <input type="hidden" name="angka" id="angka" value="{{$angka}}">
        <input type="text" name="nama" id="nama">
        <button type="submit">simpan</button>
    </form>
