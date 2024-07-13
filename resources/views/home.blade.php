<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Document</title>
</head>
<body class="h-full">
<div class="min-h-full">
    <nav class="bg-blue-500">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0"></div>
                    <h1 class="text-2xl font-bold tracking-tight text-white">Data Siswa</h1>
                </div>
                <div class="flex ml-auto">
                    <form action="{{ route('home') }}" method="get" class="flex items-center space-x-2">
                        <input type="text" class="text-black px-4 py-2 rounded-md" name="search" value=""
                            placeholder="Cari peserta">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-md" type="submit">Cari</button>
                    </form>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6"></div>
                </div>
            </div>
        </div>
    </nav>
    <header class="bg-white shadow">
        <div class="text-right mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-center text-black">Data Siswa</h1>
            <form action="{{ route('siswa.tambah') }}" method="GET">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2">Tambah Data</button>
            </form>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 gap-4 mt-4">
                @foreach ($data as $student)
                <div class="bg-white p-4 rounded shadow">
                    <p>Nama: {{ $student->nama }}</p>
                    <p>Ttl: {{ $student->ttl }}</p>
                    <p>Sekolah: {{ $student->sekolah }}</p>
                    <p>Keterangan: {{ $student->keterangan }}</p>
                    <div class="flex justify-between mt-2">
                        <a href="{{ route('siswa.edit', $student->id) }}" class="bg-gray-400 text-white px-4 py-2 rounded">Edit</a>
                        <form action="{{ route('siswa.destroy', $student->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-gray-400 text-white px-4 py-2">Delete</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>
</div>
</body>
</html>
