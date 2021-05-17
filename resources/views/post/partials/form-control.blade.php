<div class="form-group">
    <label for="judul">Judul</label>
<input type="text" name="judul" value="{{old('judul') ?? $post->judul}}" id="judul" class="form-control">
    @error('judul')
        <div class="text-danger mt-2">
            {{$message}}
        </div>
    @enderror
</div>
<div class="form-group">
    <input type="file" name="gambar" id="gambar">
        @error('gambar')
            <div class="text-danger mt-2">
                {{$message}}
            </div>
        @enderror
</div>
<div class="form-group">
    <label for="penerbit">Penerbit</label>
<input type="text" name="penerbit" value="{{old('penerbit') ?? $post->penerbit}}" id="penerbit" class="form-control">
    @error('penerbit')
        <div class="text-danger mt-2">
            {{$message}}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="pengarang">Pengarang</label>
<input type="text" name="pengarang" value="{{old('pengarang') ?? $post->pengarang}}" id="pengarang" class="form-control">
    @error('pengarang')
        <div class="text-danger mt-2">
            {{$message}}
        </div>
    @enderror
</div>
<button type="submit" class="btn btn-primary">{{ $submit ?? 'update'}}</button>
