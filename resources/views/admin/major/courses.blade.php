<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Quản lý Majors') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ 'dashboard' }}" class="text-blue-600 hover:text-blue-800 mb-4 inline-block text-lg font-semibold transition duration-200 ease-in-out">
                ← Quay lại
            </a>
            <div class="bg-white shadow-lg rounded-xl overflow-hidden">
                <div class="p-8 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6">Danh sách hiển thị khóa học theo chuyên ngành {{ $majors->name }}</h1>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border rounded-lg" id="coursesTable">
                            <thead>
                                <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Mã Khóa Học</th>
                                    <th class="py-3 px-6 text-left">Tên Khóa Học</th>
                                    <th class="py-3 px-6 text-left">Học Kỳ</th>
                                    <th class="py-3 px-6 text-left">Tín chỉ</th>
                                    <th class="py-3 px-6 text-left">Điều kiện tiên quyết</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                @foreach ($majors->courses as $course)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200 ease-in-out">
                                        <td class="py-3 px-6">{{ $course->code }}</td>
                                        <td class="py-3 px-6">
                                            <a href="{{ route('courses.detail', $course->id) }}" class="text-blue-600 hover:text-blue-800 transition duration-200 ease-in-out">
                                                {{ $course->name }}
                                            </a>
                                        </td>
                                        <td class="py-3 px-6">{{ $course->semester }}</td>
                                        <td class="py-3 px-6">{{ $course->credits }}</td>
                                        <td class="py-3 px-6">
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
</x-app-layout>

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
