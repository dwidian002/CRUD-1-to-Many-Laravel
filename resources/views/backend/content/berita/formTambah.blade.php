@extends('backend/layout/main')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Form Tambah Berita</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('berita.prosesTambah') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Judul Berita</label>
                        <input type="text" name="judul_berita" value="{{ old('judul_berita') }}"
                            class="form-control @error('judul_berita') is-invalid @enderror">
                        @error('judul_berita')
                            <span style="color: red; font-weight: 600; font-size:9pt">{{ $message }}</font-sixe:9pt></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kategori Berita</label>
                        <select name="id_kategori"
                            class="form-control @error('id_kategori') is-invalid
                        @enderror">

                            @foreach ($kategori as $row)
                                <option value="{{ $row->id_kategori }}">{{ $row->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('id_kategori')
                            <span style="color: red; font-weight: 600; font-size:9pt">{{ $message }}</font-sixe:9pt></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto Berita</label>
                        <input type="file" name="gambar_berita" class="form-control @error('gambar_berita') is-invalid @enderror"
                        accept="images/*" onchange="tampilkanPreview(this, 'tampilFoto')">
                        @error('judul_berita')
                            <span style="color: red; font-weight: 600; font-size:9pt">{{ $message }}</font-sixe:9pt></span>
                        @enderror
                        <p></p>
                        <img id="tampilFoto" onerror="this.enerror=null;this.src='https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg';"
                        src="" alt="" width="15%">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Isi Berita</label>
                        <textarea id="editor" name="isi_berita" class="form-control @error('isi_berita') is-invalid @enderror">{{ old('isi_berita') }}</textarea>
                        @error('isi_berita')
                            <span style="color: red; font-weight: 600; font-size:9pt">{{ $message }}</font-sixe:9pt></span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
