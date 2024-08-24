<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Khóa Học</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 40px;
            padding: 20px;
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
            margin-top: 20px;
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
            font-size: 18px;
        }

        td {
            font-size: 16px;
            background-color: #f9f9f9; /* Màu nền nhạt cho các ô */
        }

        tr:nth-child(even) td {
            background-color: #f2f2f2; /* Màu nền khác cho các hàng chẵn */
        }

        tr:hover td {
            background-color: #d1e7dd; /* Màu nền khi di chuột qua hàng */
        }

        a {
            color: #2a7ae4;
            text-decoration: none; /* Loại bỏ gạch chân dưới link */
        }

        a:hover {
            text-decoration: underline; /* Thêm gạch chân khi di chuột qua link */
        }
    </style>
</head>

<body>

    <div class="container">
        <h1 style="color: #154f9c;">Danh sách Khóa Học theo Chuyên Ngành: {{ $majors->name }}</h1>
        <table class="table" id="coursesTable2">
            <thead>
                <tr>
                    <th>Mã Khóa Học</th>
                    <th>Tên Khóa Học</th>
                    <th>Học Kỳ</th>
                    <th>Tín chỉ</th>
                    <th>Điều kiện tiên quyết</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($majors->courses as $course)
                    <tr>
                        <td>{{ $course->code }}</td>
                        <td><a href="{{ route('guest.detail', $course->id) }}">
                                {{ $course->name }}
                            </a></td>
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
                            {{ $prerequisiteName ? $prerequisiteName : 'Không có điều kiện tiên quyết' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#coursesTable2').DataTable();
        });
    </script>
</body>
</html>
