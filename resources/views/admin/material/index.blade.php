<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quản lý Material') }}
        </h2>
    </x-slot>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5; /* Màu nền nhạt */
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 100%; /* Mở rộng container ra toàn bộ chiều ngang */
            margin: 0 auto;
            background-color: #fff; /* Màu nền trắng cho container */
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Hiệu ứng bóng */
            border-radius: 8px; /* Bo góc container */
            overflow-x: auto; /* Cho phép cuộn ngang nếu bảng quá rộng */
        }

        table {
            width: 100%; /* Đảm bảo bảng chiếm toàn bộ chiều ngang của container */
            border-collapse: collapse;
        }

        th, td {
            padding: 20px;
            text-align: left;
            border: 1px solid #ddd;
            font-size: 15px;
        }

        th {
            background-color:#fed014; /* Màu nền cho tiêu đề */
            color: white; /* Màu chữ trắng */
            font-size: 16px;
        }

        td {
            background-color: #ffffff; /* Màu nền trắng cho các ô */
        }

        tr:nth-child(even) td {
            background-color: #f9f9f9; /* Màu nền nhạt cho các hàng chẵn */
        }

        tr:hover td {
            background-color: #f1f1f1; /* Màu nền khi di chuột qua hàng */
        }

        a {
            color: #4a90e2;
            text-decoration: none; /* Loại bỏ gạch chân dưới link */
        }

        a:hover {
            text-decoration: underline; /* Thêm gạch chân khi di chuột qua link */
        }

        .btn-primary {
            padding: 10px 20px;
            background-color: #1d4ed8; /* Màu xanh đậm cho nút tạo mới */
            color: white;
            border-radius: 5px; /* Bo góc nút */
            text-decoration: none;
            display: inline-block;
            font-weight: bold;
            transition: background-color 0.3s ease;
            margin-bottom: 15px;
        }

        .btn-primary:hover {
            background-color: #1e40af; /* Màu xanh đậm hơn khi hover */
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 16px; /* Tăng padding để nút dễ sử dụng hơn */
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            color: white;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            text-align: center;
        }

        .btn-edit {
            background-color: #fbbf24; /* Màu vàng */
        }

        .btn-edit:hover {
            background-color: #f59e0b; /* Màu vàng đậm hơn khi hover */
            transform: scale(1.05); /* Hiệu ứng phóng to khi hover */
        }

        .btn-delete {
            background-color: #dc2626; /* Màu đỏ */
        }

        .btn-delete:hover {
            background-color: #b91c1c; /* Màu đỏ đậm hơn khi hover */
            transform: scale(1.05); /* Hiệu ứng phóng to khi hover */
        }

        .action-buttons {
            display: flex;
            gap: 10px; /* Khoảng cách giữa các nút */
            justify-content: center; /* Canh giữa các nút */
        }

        .header-link {
            display: inline-block;
            margin-bottom: 20px;
            font-size: 16px;
            color: #4a90e2;
            text-decoration: none;
            font-weight: bold;
        }

        .header-link:hover {
            text-decoration: underline;
        }

        /* Cột Hành động */
        td.action-col {
            width: 200px; /* Chiều rộng cột hành động */
            text-align: center; /* Canh giữa nội dung trong cột */
        }
    </style>

    <div class="container py-12">
        <a href="{{ 'dashboard' }}" class="header-link">Quay lại</a>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="text-2xl font-semibold mb-4">Danh sách Material</h1>
                <a href="{{ route('material.create') }}" class="btn btn-primary">Tạo Learning Outcomes</a>
                <table id="coursesTable">
                    <thead>
                        <tr>
                            <th>Mô tả</th>
                            <th>Khóa học</th>
                            <th>Tài liệu chính</th>
                            <th>Isbn</th>
                            <th>Bản cứng</th>
                            <th>Tài liệu trực tuyến</th>
                            <th>Ghi chú</th>
                            <th>Tác giả</th>
                            <th>Nhà Xuất bản</th>
                            <th>Ngày xuất bản</th>
                            <th>Phiên bản</th>
                            <th class="action-col">Hành động</th> <!-- Thêm lớp cho cột hành động -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($materials as $material)
                            <tr>
                                <td>{{ $material->description_material }}</td>
                                <td>{{ $material->course->name ?? 'Tên khóa học không tồn tại' }}</td>
                                <td>
                                    <input type="checkbox" disabled
                                        {{ $material->is_main_material ? 'checked' : '' }}>
                                </td>
                                <td>{{ $material->isbn }}</td>
                                <td>
                                    <input type="checkbox" disabled {{ $material->is_hard_copy ? 'checked' : '' }}>
                                </td>
                                <td>
                                    <input type="checkbox" disabled {{ $material->is_online ? 'checked' : '' }}>
                                </td>
                                <td>{{ $material->note }}</td>
                                <td>{{ $material->author }}</td>
                                <td>{{ $material->publisher }}</td>
                                <td>{{ $material->published_date }}</td>
                                <td>{{ $material->edition }}</td>
                                <td class="action-col">
                                    <div class="action-buttons">
                                        <a href="{{ route('material.edit', $material->id) }}" class="btn-action btn-edit">Sửa</a>
                                        <form action="{{ route('material.destroy', $material->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
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
</x-app-layout>
