<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>TAMBAH DATA SISWA</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-200">
<div class="min-h-full">
    <main>
        <div class="bg-blue-300 p-6 rounded-md shadow-md w-96">
            <h2 class="text-center text-xl font-bold mb-6">Tambah Data</h2>
            @if (session('success'))
                <div class="alert success">
                    {{ session('success') }}
                </div>
                @endif
                @if ($errors->any())
                <div class="alert danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            <form action="{{ route('siswa.tambah') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama"
                           class="w-full @error('nama') is-invalid @enderror p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="Masukkan Nama">
                </div>                
                <div class="mb-4">
                    <label for="ttl" class="block text-gray-700">Tempat Tanggal Lahir</label>
                    <input type="date" name="ttl"
                            class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masuka Tanggal Lahir">
                </div>
                <div class="mb-4">
                    <label for="sekolah" class="block text-gray-700">Sekolah</label>
                    <input type="text" name="sekolah"
                            class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukan Sekolah">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Keterangan</label>
                    <select name="keterangan" class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="LULUS">LULUS</option>
                        <option value="TIDAK LULUS">TIDAK LULUS</option>
                    </select>
                </div>
                
                <div class="flex justify-between"> <!-- Tombol diletakkan di sini -->
                    <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md">Batal</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:ring-2 focus:ring-blue-500">Simpan</button>
                </div>
            </form>
        </div>
    </main>
</div>
</body>
</html>


