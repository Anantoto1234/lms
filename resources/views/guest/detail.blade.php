<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Khóa Học</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
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

        h2 {
            color: #154f9c; /* Màu tiêu đề */
            font-weight: 700;
            margin-bottom: 20px;
        }

        a {
            color: #2a7ae4;
            text-decoration: none; /* Loại bỏ gạch chân dưới link */
        }

        a:hover {
            text-decoration: underline; /* Thêm gạch chân khi di chuột qua link */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
            border-radius: 4px; /* Bo góc các ô */
        }

        th {
            background-color: #f1c615; /* Màu nền cho tiêu đề */
            color: white; /* Màu chữ trắng */
            font-size: 17px;
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

        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            font-size: 16px;
            color: #2a7ae4;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        /* Định dạng cụ thể cho cột */
        #coursesTable2 th:nth-child(1), #coursesTable2 td:nth-child(1) {
            width: 10%; /* Chiều rộng của cột ID */
        }

        #coursesTable2 th:nth-child(2), #coursesTable2 td:nth-child(2) {
            width: 25%; /* Chiều rộng của cột Tên Khóa Học */
        }

        #coursesTable2 th:nth-child(3), #coursesTable2 td:nth-child(3),
        #coursesTable2 th:nth-child(4), #coursesTable2 td:nth-child(4),
        #coursesTable2 th:nth-child(5), #coursesTable2 td:nth-child(5) {
            width: 15%; /* Chiều rộng cho các cột khác */
        }
    </style>
</head>
<body>

    <div class="container">
        <a class="back-link" href="{{ url()->previous() }}">&larr; Quay lại</a>
        <h2>Chi Tiết Khóa Học: {{ $courses->name }}</h2>

        @if ($courses->syllabus)
            <a href="{{ Storage::url('uploads/' . $courses->syllabus) }}" target="_blank">Tải xuống đề cương</a>
        @endif

        <table id="coursesTable2">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $courses->id }}</td>
                </tr>
                <tr>
                    <th>Tên Khóa Học</th>
                    <td>{{ $courses->name }}</td>
                </tr>
                <tr>
                    <th>Mã Khóa Học</th>
                    <td>{{ $courses->code }}</td>
                </tr>
                <tr>
                    <th>Tín Chỉ</th>
                    <td>{{ $courses->credits }}</td>
                </tr>
                <tr>
                    <th>Degree Level</th>
                    <td>{{ $courses->degree_level }}</td>
                </tr>
                <tr>
                    <th>Time Allocation</th>
                    <td>{{ $courses->time_allocation }}</td>
                </tr>
                <tr>
                    <th>Bắt Buộc</th>
                    <td>{{ $courses->is_mandatory ? 'Có' : 'Không' }}</td>
                </tr>
                <tr>
                    <th>Điều Kiện Tiên Quyết</th>
                    <td>
                        @php
                            $prerequisiteName = '';
                            if (!empty($courses->prerequisites)) {
                                $prerequisiteId = $courses->prerequisites;
                                $prerequisiteCourse = \App\Models\Course::find($prerequisiteId);
                                if ($prerequisiteCourse) {
                                    $prerequisiteName = $prerequisiteCourse->name;
                                }
                            }
                        @endphp
                        {{ $prerequisiteName ? $prerequisiteName : 'Không có điều kiện tiên quyết' }}
                    </td>
                </tr>
                <tr>
                    <th>Mô Tả</th>
                    <td>{{ $courses->description }}</td>
                </tr>
                <tr>
                    <th>Nhiệm Kỳ</th>
                    <td>{{ $courses->semester }}</td>
                </tr>
                <tr>
                    <th>Số Quyết Định</th>
                    <td>{{ $courses->decision_no }}</td>
                </tr>
                <tr>
                    <th>Ngày Ban Hành</th>
                    <td>{{ $courses->approved_date }}</td>
                </tr>
                <tr>
                    <th>Note</th>
                    <td>{{ $courses->note }}</td>
                </tr>
                <tr>
                    <th>Is Approved</th>
                    <td>{{ $courses->is_approved ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <th>Is Active</th>
                    <td>{{ $courses->is_active ? 'Yes' : 'No' }}</td>
                </tr>
            </tbody>
        </table>

        <h2>Danh Sách Assignments</h2>
        <table id="assignmentsTable">
            <thead>
                <tr>
                    <th>Tên Thành Phần Đánh Giá</th>
                    <th>Trọng Số</th>
                    <th>CLO</th>
                    <th>Hình Thức</th>
                    <th>Công Cụ</th>
                    <th>Trọng Số CLO</th>
                    <th>PLO Liên Quan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assignments as $assignment)
                    <tr>
                        <td>{{ $assignment->component_name }}</td>
                        <td>{{ $assignment->weight }}</td>
                        <td>
                            @if ($assignment->coursesLo->isNotEmpty())
                                @foreach ($assignment->coursesLo as $courseLo)
                                    <p>{{ $courseLo->name }}</p> <!-- Hiển thị tên của CLO -->
                                @endforeach
                            @else
                                Không có CLO
                            @endif
                        </td>
                        <td>{{ $assignment->assessment_type }}</td>
                        <td>{{ $assignment->assessment_tool }}</td>
                        <td>{{ $assignment->clo_weight }}</td>
                        <td>{{ $assignment->plos }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#coursesTable2').DataTable();
            $('#assignmentsTable').DataTable();
        });
    </script>
</body>
</html>

