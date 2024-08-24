<x-app-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold text-gray-900 mb-6 pl-6">
            {{ __('Quản lý Majors') }}
        </h1>
    </x-slot>

    <div class="container mx-auto px-6 py-8 bg-gray-100">
        <a href="{{ 'dashboard' }}" class="text-blue-700 hover:text-blue-900 mb-8 inline-block text-lg font-medium border-b-2 border-blue-700 pb-1">Quay lại</a>

        <div class="bg-white shadow-lg sm:rounded-lg p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Danh sách Chuyên Ngành</h1>
            <div class="text-center mb-6">
                <a href="{{ route('majors.create') }}" class="bg-blue-600 text-white py-3 px-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">Tạo Chuyên Ngành Mới</a>
            </div>

            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead>
                    <tr>
                        <th class="py-4 px-6 bg-yellow-500 text-white">Mã</th>
                        <th class="py-4 px-6 bg-yellow-500 text-white">Tên</th>
                        <th class="py-4 px-6 bg-yellow-500 text-white">Ngày Tải Lên</th>
                        <th class="py-4 px-6 bg-yellow-500 text-white">Mô Tả</th>
                        <th class="py-4 px-6 bg-yellow-500 text-white">Số Quyết Định</th>
                        <th class="py-4 px-6 bg-yellow-500 text-white">Total Credit</th>
                        <th class="py-4 px-6 bg-yellow-500 text-white">Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($majors as $major)
                        <tr class="hover:bg-gray-50 border-b">
                            <td class="py-3 px-6">{{ $major->code }}</td>
                            <td class="py-3 px-6"><a href="{{ route('majors.courses', $major->id) }}" class="text-blue-600 hover:text-blue-800">{{ $major->name }}</a></td>
                            <td class="py-3 px-6">{{ $major->created_at }}</td>
                            <td class="py-3 px-6">{{ $major->description }}</td>
                            <td class="py-3 px-6">{{ $major->decision_number }}</td>
                            <td class="py-3 px-6">{{ $major->total_credits }}</td>
                            <td class="py-3 px-6">
                                <div class="flex justify-between space-x-2">
                                    <a href="{{ route('majors.edit', $major) }}" class="bg-yellow-600 text-white py-2 px-4 rounded-lg hover:bg-yellow-700 transition duration-300 flex-1 text-center">Sửa</a>
                                    <form action="{{ route('majors.destroy', $major) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?')" class="flex-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition duration-300 w-full">Xóa</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

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

        .bg-blue-600 {
            padding: 15px;
            background-color: #1d4ed8; /* Màu xanh đậm cho nút tạo mới */
        }

        .bg-blue-600:hover {
            background-color: #1e40af; /* Màu xanh đậm hơn khi hover */
        }

        .bg-yellow-600 {
            background-color: #fbbf24; /* Màu vàng cho nút sửa */
        }

        .bg-yellow-600:hover {
            background-color: #f59e0b; /* Màu vàng đậm hơn khi hover */
        }

        .bg-red-600 {
            background-color: #dc2626; /* Màu đỏ đậm cho nút xóa */
        }

        .bg-red-600:hover {
            background-color: #b91c1c; /* Màu đỏ đậm hơn khi hover */
        }
    </style>
</x-app-layout>
