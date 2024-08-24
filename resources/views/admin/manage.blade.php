<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-gray-900 mb-6 border-b-4 border-yellow-500 pb-2">
            {{ __('Quản lý Giảng Viên') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <a href="{{ 'dashboard' }}" class="text-blue-600 hover:text-blue-800 mb-6 inline-block text-lg font-medium">Quay lại</a>
        
        <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-6">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="py-3 px-4 text-left text-sm font-medium text-gray-700">ID</th>
                        <th class="py-3 px-4 text-left text-sm font-medium text-gray-700">Tên</th>
                        <th class="py-3 px-4 text-left text-sm font-medium text-gray-700">Email</th>
                        <th class="py-3 px-4 text-left text-sm font-medium text-gray-700">Quyền Quản Lý</th>
                        <th class="py-3 px-4 text-left text-sm font-medium text-gray-700">Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lecturers as $lecturer)
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 text-sm text-gray-600">{{ $lecturer->id }}</td>
                            <td class="py-3 px-4 text-sm text-gray-600">{{ $lecturer->name }}</td>
                            <td class="py-3 px-4 text-sm text-gray-600">{{ $lecturer->email }}</td>
                            <td class="py-3 px-4 text-sm text-gray-600">{{ $lecturer->can_manage_content ? 'Có' : 'Không' }}</td>
                            <td class="py-3 px-4 text-sm text-gray-600">
                                <form action="{{ route('admin.toggleLecturerPermission', $lecturer->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600 transition">
                                        {{ $lecturer->can_manage_content ? 'Thu hồi quyền' : 'Cấp quyền' }}
                                    </button>
                                </form>
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
            background-color: #f4f4f4; /* Màu nền nhạt cho toàn bộ trang */
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f1c615; /* Màu nền cho tiêu đề */
            color: rgb(234, 151, 5);
            font-size: 16px;
        }

        td {
            font-size: 17px;
            background-color: #fff; /* Màu nền trắng cho các ô */
        }

        tr:nth-child(even) td {
            background-color: #f9f9f9; /* Màu nền cho các hàng chẵn */
        }

        tr:hover td {
            background-color: #f1f1f1; /* Màu nền khi di chuột qua hàng */
        }

        a {
            color: #1d4ed8;
            text-decoration: none; /* Loại bỏ gạch chân dưới link */
            font-weight: 600;
        }

        a:hover {
            text-decoration: underline; /* Thêm gạch chân khi di chuột qua link */
        }

        button {
            background-color: #4CAF50; /* Màu nền xanh lá cây cho nút */
            color: white; /* Màu chữ trắng */
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s, transform 0.3s;
        }

        button:hover {
            background-color: #45a049; /* Màu nền khi di chuột qua nút */
            transform: scale(1.02);
        }
    </style>
</x-app-layout>
