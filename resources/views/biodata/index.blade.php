<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Biodata</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css">
</head>

<body class="bg-gray-100 text-gray-800 p-20">

    <div class="min-h-screen">
        <!-- Title -->
        <h1 class="text-3xl font-bold mb-4">Data Biodata</h1>

        <!-- Add Biodata and Delete All Buttons -->
        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('biodata.create') }}" class="btn btn-primary">Tambah Biodata</a>
            <!-- Delete All Button -->
            <form action="{{ route('biodata.deleteAll') }}" method="POST"
                onsubmit="return confirm('Yakin ingin menghapus semua data? Data tidak dapat dikembalikan.');">
                @csrf
                <button type="submit" class="btn btn-error">Hapus Semua Data</button>
            </form>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr class="text-black">
                        <th>Nama Depan</th>
                        <th>Nama Belakang</th>
                        <th>Jenis Kelamin</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($biodatas->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center text-gray-500">Tidak ada data tersedia.</td>
                        </tr>
                    @else
                        @foreach ($biodatas as $biodata)
                            <tr>
                                <td>{{ $biodata->nama_depan }}</td>
                                <td>{{ $biodata->nama_belakang }}</td>
                                <td>{{ $biodata->jenis_kelamin }}</td>
                                <td>
                                    <a href="{{ route('biodata.edit', $biodata->id) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('biodata.destroy', $biodata->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-error">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
