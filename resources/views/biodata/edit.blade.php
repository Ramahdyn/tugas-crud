<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Biodata</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css">
</head>

<body class="bg-gray-100 text-gray-800">

    <div class="min-h-screen flex items-center justify-center">
        <!-- Form Container -->
        <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-md">
            <!-- Title -->
            <h1 class="text-3xl font-bold mb-6 text-center">Edit Biodata</h1>

            <!-- Form -->
            <form action="{{ route('biodata.update', $biodata->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Nama Depan -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text text-black">Nama Depan:</span>
                    </label>
                    <input type="text" name="nama_depan" value="{{ $biodata->nama_depan }}"
                        placeholder="Masukkan nama depan" class="input input-bordered w-full  bg-black text-white"
                        required>
                </div>

                <!-- Nama Belakang -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text  text-black">Nama Belakang:</span>
                    </label>
                    <input type="text" name="nama_belakang" value="{{ $biodata->nama_belakang }}"
                        placeholder="Masukkan nama belakang" class="input input-bordered w-full  bg-black text-white"
                        required>
                </div>

                <!-- Jenis Kelamin -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text  text-black">Jenis Kelamin:</span>
                    </label>
                    <select name="jenis_kelamin" class="select select-bordered w-full  bg-black text-white" required>
                        <option disabled>Pilih jenis kelamin</option>
                        <option value="L" {{ $biodata->jenis_kelamin == 'L' ? 'selected' : '' }}>
                            Laki-laki
                        </option>
                        <option value="P" {{ $biodata->jenis_kelamin == 'P' ? 'selected' : '' }}>
                            Perempuan
                        </option>
                    </select>
                </div>

                <!-- Buttons -->
                <div class="form-control mt-6">
                    <button type="submit" class="btn btn-success w-full">Simpan</button>
                </div>
                <div class="form-control mt-6">
                    <a href="{{ route('biodata.index') }}" class="btn btn-error mb-6">Kembali</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
