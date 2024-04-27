<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

  <div class="container mt-5">
    <form action="{{ route('mahasiswa.update', ['mahasiswa' => $mahasiswa->id]) }}" method="POST">
    @csrf
    @method('PUT')

      <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control" id="nim" name="nim" value="{{ old('nim', $mahasiswa->nim) }}">
        <div id="nim" class="form-text text-danger">@error('nim') {{ $message }} @enderror</div>
      </div>

      <div class="mb-3">
        <label for="name" class="form-label">NAME</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $mahasiswa->name) }}">
        <div id="name" class="form-text text-danger">@error('name') {{ $message }} @enderror</div>
      </div>

      <div class="mb-3">
        <label for="jurusan" class="form-label">JURUSAN</label>
        <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ old('jurusan', $mahasiswa->jurusan) }}">
        <div id="jurusan" class="form-text text-danger">@error('jurusan') {{ $message }} @enderror</div>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
