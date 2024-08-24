<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quản lý Courses') }}
        </h2>
    </x-slot>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5; /* Màu nền nhạt */
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff; /* Màu nền trắng cho container */
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Hiệu ứng bóng */
            border-radius: 8px; /* Bo góc container */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
            border-radius: 4px; /* Bo góc các ô */
        }

        th {
            background-color: #f1c615; /* Màu nền cho tiêu đề */
            color: white; /* Màu chữ trắng */
            font-size: 16px;
        }

        td {
            font-size: 14px;
            background-color: #f9f9f9; /* Màu nền nhạt cho các ô */
        }

        tr:nth-child(even) td {
            background-color: #f2f2f2; /* Màu nền khác cho các hàng chẵn */
        }

        tr:hover td {
            background-color: #e5f6f3; /* Màu nền khi di chuột qua hàng */
        }

        a {
            color: #2a7ae4;
            text-decoration: none; /* Loại bỏ gạch chân dưới link */
        }

        a:hover {
            text-decoration: underline; /* Thêm gạch chân khi di chuột qua link */
        }

        .btn-primary {
            padding: 15px;
            background-color: #1d4ed8; /* Màu xanh đậm cho nút tạo mới */
            color: white;
            border-radius: 5px; /* Bo góc nút */
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary:hover {
            background-color: #1e40af; /* Màu xanh đậm hơn khi hover */
        }

        /* Nút sửa */
        .btn-edit {
            padding: 10px 20px;
            background-color: #fbbf24; /* Màu vàng */
            color: white;
            border: none;
            border-radius: 5px; /* Bo góc nút */
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.3s ease; /* Hiệu ứng chuyển màu */
        }

        .btn-edit:hover {
            background-color: #f59e0b; /* Màu vàng đậm hơn khi hover */
        }

        /* Nút xóa */
        .btn-delete {
            padding: 10px 20px;
            background-color: #dc2626; /* Màu đỏ */
            color: white;
            border: none;
            border-radius: 5px; /* Bo góc nút */
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.3s ease; /* Hiệu ứng chuyển màu */
        }

        .btn-delete:hover {
            background-color: #b91c1c; /* Màu đỏ đậm hơn khi hover */
        }

        /* Căn chỉnh khoảng cách giữa các nút */
        .action-buttons {
            display: flex;
            gap: 10px; /* Khoảng cách giữa các nút */
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ 'dashboard' }}">Back</a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Danh sách Khóa Học</h1>

                    <a href="{{ route('courses.create') }}" class="btn-primary">Tạo Khóa Học Mới</a>
                    <table class="table" id="coursesTable">
                        <thead>
                            <tr>
                                <th>Mã Khóa Học</th>
                                <th>Tên Khóa Học</th>
                                <th>Học Kỳ</th>
                                <th>Tín Chỉ</th>
                                <th>Điều Kiện Tiên Quyết</th>
                                <th>Học phần học trước</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td>{{ $course->code }}</td>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->semester }}</td>
                                    <td>{{ $course->credits }}</td>
                                    <td>
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
                                    <td>
                                        @php
                                            $priorCourseName = '';

                                            if (!empty($course->prior_course)) {
                                                $priorCourseId = $course->prior_course;

                                                $priorCourse = \App\Models\Course::find($priorCourseId);

                                                if ($priorCourse) {
                                                    $priorCourseName = $priorCourse->name;
                                                }
                                            }
                                        @endphp
                                        {{ $priorCourseName }}
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('courses.edit', $course) }}" class="btn-edit">Sửa</a>
                                            <form action="{{ route('courses.destroy', $course) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
