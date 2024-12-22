<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Biodata</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css">
</head>

<body class="bg-gray-100 text-gray-800">

    <div class="min-h-screen flex items-center justify-center">
        <!-- Form Container -->
        <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-md">

            <!-- Title -->
            <h1 class="text-3xl font-bold mb-6 text-center">Tambah Biodata</h1>

            <!-- Form -->
            <form action="{{ route('biodata.store') }}" method="POST" class="space-y-10" id="biodataForm">
                @csrf

                <!-- Nama Depan -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text text-black">Nama Depan:</span>
                    </label>
                    <input type="text" name="nama_depan" placeholder="Masukkan nama depan"
                        class="input input-bordered w-full bg-black text-white" required>
                </div>

                <!-- Nama Belakang -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text text-black">Nama Belakang:</span>
                    </label>
                    <input type="text" name="nama_belakang" placeholder="Masukkan nama belakang"
                        class="input input-bordered w-full bg-black text-white" required>
                </div>

                <!-- Jenis Kelamin -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text text-black">Jenis Kelamin:</span>
                    </label>
                    <select name="jenis_kelamin" class="select select-bordered w-full bg-black text-white" required>
                        <option class="text-white" disabled selected>Pilih jenis kelamin</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="form-control mt-6">
                    <button type="button" id="submitBtn" class="btn btn-success w-full">Simpan</button>
                </div>

                <!-- Kembali Button -->
                <div class="form-control mt-6">
                    <button type="button" id="backBtn" class="btn btn-error mb-6">Kembali</button>
                </div>

            </form>
        </div>
    </div>

    <!-- Tailwind Modal untuk konfirmasi Simpan -->
    <div id="confirmModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-8 rounded-lg shadow-lg w-96 text-center">
            <h2 class="text-xl font-semibold mb-4">Apakah Anda yakin?</h2>
            <p class="mb-4">Data yang Anda masukkan akan disimpan.</p>
            <div>
                <button id="confirmYes" class="btn btn-success mr-2 w-32">Ya</button>
                <button id="confirmNo" class="btn btn-error w-32">Tidak</button>
            </div>
        </div>
    </div>

    <!-- Modal untuk Kembali -->
    <div id="backModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-8 rounded-lg shadow-lg w-96 text-center">
            <h2 class="text-xl font-semibold mb-4">Apakah Anda yakin ingin kembali?</h2>
            <p class="mb-4">Data yang belum disimpan akan hilang.</p>
            <div>
                <button id="backYes" class="btn btn-success mr-2 w-32">Ya</button>
                <button id="backNo" class="btn btn-error w-32">Tidak</button>
            </div>
        </div>
    </div>

    <!-- Modal untuk alert jika input kosong -->
    <div id="alertModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-8 rounded-lg shadow-lg w-96 text-center">
            <h2 class="text-xl font-semibold mb-4">Perhatian</h2>
            <p class="mb-4">Silakan isi semua input terlebih dahulu.</p>
            <div>
                <button id="alertClose" class="btn btn-error w-32">Tutup</button>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk memeriksa apakah semua input sudah diisi
        function checkFormInputs() {
            const inputs = document.querySelectorAll("input, select");
            let formFilled = true;

            inputs.forEach(input => {
                if (input.value.trim() === "") {
                    formFilled = false; // Jika ada yang kosong
                }
            });

            return formFilled;
        }

        // Tombol Simpan
        document.getElementById("submitBtn").addEventListener("click", function() {
            if (!checkFormInputs()) {
                document.getElementById("alertModal").classList.remove("hidden");
                return; // Cegah modal muncul jika ada input kosong
            }
            document.getElementById("confirmModal").classList.remove("hidden");
        });

        // Tombol Yes di modal (Simpan)
        document.getElementById("confirmYes").addEventListener("click", function() {
            document.querySelector("form").submit(); // Submit form
            document.getElementById("confirmModal").classList.add("hidden");
        });

        // Tombol No di modal (Simpan)
        document.getElementById("confirmNo").addEventListener("click", function() {
            document.getElementById("confirmModal").classList.add("hidden");
        });

        // Tombol Kembali
        document.getElementById("backBtn").addEventListener("click", function() {
            document.getElementById("backModal").classList.remove("hidden");
        });

        // Tombol Yes di modal (Kembali)
        document.getElementById("backYes").addEventListener("click", function() {
            window.location.href = "{{ route('biodata.index') }}"; // Redirect to index page
        });

        // Tombol No di modal (Kembali)
        document.getElementById("backNo").addEventListener("click", function() {
            document.getElementById("backModal").classList.add("hidden");
        });

        // Tombol Tutup di modal alert
        document.getElementById("alertClose").addEventListener("click", function() {
            document.getElementById("alertModal").classList.add("hidden");
        });
    </script>

</body>

</html>
