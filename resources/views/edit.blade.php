<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>EDIT DATA SISWA</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-200">
<div class="min-h-full">
        <div class="bg-blue-400 p-6 rounded-md shadow-md w-96">
            <h2 class="text-center text-xl font-bold mb-6">Edit Data Siswa</h2>
            <form action="{{ route('siswa.update', ['id' => $student->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700">Nama</label>
                    <input type="text" name="nama" id="nama" value="{{ $student->nama }}" class="w-full p-2 border border-gray-300 rounded">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Tanggal Lahir</label>
                    <input type="date" name="ttl" value="{{ $student->ttl }}"
                        class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Input Tanggal Lahir">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Sekolah</label>
                        <input type="text" name="sekolah" value="{{ $student->sekolah }}"
                            class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Sekolah">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Keterangan</label>
                    <select name="keterangan" class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="LULUS" {{ $student->keterangan == 'LULUS' ? 'selected' : '' }}>LULUS</option>
                        <option value="TIDAK LULUS" {{ $student->keterangan == 'TIDAK LULUS' ? 'selected' : '' }}>TIDAK LULUS</option>
                    </select>                    
                </div>
                <div class="flex justify-between">
                    <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md">
                        <a href="/">Batal</a>
                    </button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                        Edit
                    </button>
                </div>
            </form>
        </div>
</div>
</body>
</html>
