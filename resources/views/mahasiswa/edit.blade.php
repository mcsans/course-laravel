<x-admin.app>
  <div class="container mt-5">
    <form action="{{ route('mahasiswa.update', ['mahasiswa' => $mahasiswa->id]) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control" id="nim" name="nim" value="{{ old('nim', $mahasiswa->nim) }}">
        <div id="nim" class="form-text text-danger">
          @error('nim')
            {{ $message }}
          @enderror
        </div>
      </div>

      <div class="mb-3">
        <label for="name" class="form-label">NAME</label>
        <input type="text" class="form-control" id="name" name="name"
          value="{{ old('name', $mahasiswa->name) }}">
        <div id="name" class="form-text text-danger">
          @error('name')
            {{ $message }}
          @enderror
        </div>
      </div>

      <div class="mb-3">
        <label for="jurusan" class="form-label">JURUSAN</label>
        <input type="text" class="form-control" id="jurusan" name="jurusan"
          value="{{ old('jurusan', $mahasiswa->jurusan) }}">
        <div id="jurusan" class="form-text text-danger">
          @error('jurusan')
            {{ $message }}
          @enderror
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</x-admin.app>
