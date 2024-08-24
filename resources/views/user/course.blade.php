<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-4"> <!-- Giảm khoảng cách giữa thanh điều hướng và phần nội dung chính -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6" style="color: #154f9c;">
                        Danh sách hiển thị khóa học theo chuyên ngành: {{ $majors->name }}
                    </h1>
                    <div class="overflow-x-auto">
                        <table id="coursesTable" class="min-w-full bg-white border-collapse border border-gray-200">
                            <thead>
                                <tr class="bg-yellow-500 text-white">
                                    <th class="py-3 px-4 border-b border-gray-200">Mã Khóa Học</th>
                                    <th class="py-3 px-4 border-b border-gray-200">Tên Khóa Học</th>
                                    <th class="py-3 px-4 border-b border-gray-200">Học Kỳ</th>
                                    <th class="py-3 px-4 border-b border-gray-200">Tín chỉ</th>
                                    <th class="py-3 px-4 border-b border-gray-200">Điều kiện tiên quyết</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @foreach ($majors->courses as $course)
                                    <tr class="border-b hover:bg-gray-100">
                                        <td class="py-3 px-4">{{ $course->code }}</td>
                                        <td class="py-3 px-4">
                                            <a href="{{ route('user.detail', $course->id) }}" class="text-blue-600 hover:underline">
                                                {{ $course->name }}
                                            </a>
                                        </td>
                                        <td class="py-3 px-4">{{ $course->semester }}</td>
                                        <td class="py-3 px-4">{{ $course->credits }}</td>
                                        <td class="py-3 px-4">
                                            @php
                                                $prerequisiteName = '';

                                                if (!empty($course->prerequisites)) {
                                                    $prerequisiteId = $course->prerequisites;
                                                    $prerequisiteCourse = \App\Models\Course::find($prerequisiteId);
                                                    if ($prerequisiteCourse) {
                                                        $prerequisiteName = $prerequisiteCourse->name;
                                                    }
                                                }
                                            @endphp
                                            {{ $prerequisiteName }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        th {
            background-color: #f1c615;
            color: white;
            font-size: 17px;
        }

        td {
            font-size: 16px;
            background-color: #f9f9f9;
        }

        tr:nth-child(even) td {
            background-color: #f2f2f2;
        }

        tr:hover td {
            background-color: #d1e7dd;
        }

        a {
            color: #2a7ae4;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script>
        $(document).ready(function() {
            $('#coursesTable').DataTable({
                "paging": true,
                "searching": true,
                "info": true,
                "lengthChange": false
            });
        });
    </script>
</x-app-layout>
