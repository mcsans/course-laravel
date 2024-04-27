<x-admin.app title='Mahasiswa Index'>
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

</x-admin.app>
