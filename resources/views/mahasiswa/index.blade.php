<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <div class="container mt-5">

        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif

        <a href="{{ route('mahasiswa.create') }}">
          <button class="btn btn-dark mb-3">Tambah Data</button>
        </a>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">NIM</th>
                <th scope="col">Name</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($mahasiswas as $mahasiswa)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $mahasiswa->nim }}</td>
                    <td>{{ $mahasiswa->name }}</td>
                    <td>{{ $mahasiswa->jurusan }}</td>
                    <td>
                        <button class="btn btn-sm btn-primary">view</button>
                        <a href="{{ route('mahasiswa.edit', ['mahasiswa' => $mahasiswa->id]) }}">
                            <button class="btn btn-sm btn-success">update</button>
                        </a>
                        <form action="{{ route('mahasiswa.destroy', ['mahasiswa' => $mahasiswa->id]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('are you sure?')">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
          </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
