<!DOCTYPE html>
<html>
<head>
    <title>Tidak Ada Tugas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">

    <div class="bg-white p-10 shadow rounded-lg text-center">
        <h1 class="text-xl font-bold text-gray-800 mb-2">
            Tidak Ada Tugas
        </h1>

        <p class="text-gray-600 mb-4">
            Mata kuliah <strong>{{ $course_name }}</strong> belum memiliki tugas.
        </p>

        <a href="{{ route('tugas.index') }}"
           class="inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
           Kembali
        </a>
    </div>

</body>
</html>
