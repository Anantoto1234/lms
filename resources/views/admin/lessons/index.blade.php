<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Danh sách Lessons') }}
        </h2>
    </x-slot>
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
        }

        th, td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f1c615;
            color: white;
            font-size: 16px;
        }

        td {
            font-size: 14px;
            background-color: #f9f9f9;
        }

        tr:nth-child(even) td {
            background-color: #f2f2f2;
        }

        tr:hover td {
            background-color: #e5f6f3;
        }

        a {
            color: #2a7ae4;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn-primary {
            padding: 15px;
            background-color: #1d4ed8;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #1e40af;
        }

        .btn-edit {
            padding: 8px 12px;
            background-color: #fbbf24;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            text-align: center;
            display: inline-block;
            text-decoration: none;
        }

        .btn-edit:hover {
            background-color: #f59e0b;
        }

        .btn-delete {
            padding: 8px 12px;
            background-color: #dc2626;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            text-align: center;
            display: inline-block;
            text-decoration: none;
        }

        .btn-delete:hover {
            background-color: #b91c1c;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }
    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('lessons.create') }}" class="btn btn-primary">Tạo lessons Mới</a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Danh sách Lessons</h1>
                    <table class="table" id="coursesTable">
                        <thead>
                            <tr>
                                <th>Khóa học</th>
                                <th>Nội dung</th>
                                <th>Số buổi</th>
                                <th>Mục tiêu</th>
                                <th>CLO</th>
                                <th>Phương pháp giảng dạy</th>
                                <th>Hoạt động sinh viên</th>
                                <th>Documents</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lessons as $lesson)
                                <tr>
                                    <td>{{ $lesson->course->name }}</td>
                                    <td>{{ $lesson->topic }}</td>
                                    <td>{{ $lesson->number_of_periods }}</td>
                                    <td>{{ $lesson->objectives }}</td>
                                    <td>
                                        @if ($lesson->coursesLo->isNotEmpty())
                                            @foreach ($lesson->coursesLo as $courseLo)
                                                <p>{{ $courseLo->name }}</p> <!-- Hiển thị tên của CLO -->
                                            @endforeach
                                        @else
                                            Không có CLO
                                        @endif
                                    </td>
                                    <td>{{ $lesson->lecture_method }}</td>
                                    <td>{{ $lesson->active }}</td>
                                    <td>
                                        @if($lesson->s_download)
                                            <a href="{{ route('download', ['filename' => $lesson->s_download]) }}">{{$lesson->s_download}}</a>
                                        @else
                                            Không có tệp
                                        @endif
                                    </td>
                                    
                                    <td class="action-buttons">
                                        <a href="{{ route('lessons.edit', $lesson) }}" class="btn-edit">Sửa</a>
                                        <form action="{{ route('lessons.destroy', $lesson) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                                        </form>
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
