<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-4"> <!-- Giảm khoảng cách giữa thanh điều hướng và phần nội dung chính -->
        <div class="container mx-auto bg-white shadow-sm sm:rounded-lg p-6">
            <h1 class="text-3xl font-bold mb-6" style="color: #154f9c;">Danh sách chuyên ngành</h1>
            <div class="overflow-x-auto">
                <table id="coursesTable1" class="min-w-full bg-white border-collapse border border-gray-200">
                    <thead>
                        <tr>
                            <th class="py-3 px-4 text-left bg-yellow-500 text-white border-b border-gray-200">Mã</th>
                            <th class="py-3 px-4 text-left bg-yellow-500 text-white border-b border-gray-200">Tên</th>
                            <th class="py-3 px-4 text-left bg-yellow-500 text-white border-b border-gray-200">Ngày Tải Lên</th>
                            <th class="py-3 px-4 text-left bg-yellow-500 text-white border-b border-gray-200">Mô Tả</th>
                            <th class="py-3 px-4 text-left bg-yellow-500 text-white border-b border-gray-200">Số Quyết Định</th>
                            <th class="py-3 px-4 text-left bg-yellow-500 text-white border-b border-gray-200">Total Credit</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($majors as $major)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="py-3 px-4">{{ $major->code }}</td>
                                <td class="py-3 px-4">
                                    <a href="{{ route('user.courses', $major->id) }}" class="text-blue-600 hover:underline">
                                        {{ $major->name }}
                                    </a>
                                </td>
                                <td class="py-3 px-4">{{ $major->created_at->format('d-m-Y') }}</td>
                                <td class="py-3 px-4">{{ $major->description }}</td>
                                <td class="py-3 px-4">{{ $major->decision_number }}</td>
                                <td class="py-3 px-4">{{ $major->total_credits }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0; /* Loại bỏ margin của body */
            padding: 0; /* Loại bỏ padding của body */
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script>
        $(document).ready(function() {
            $('#coursesTable1').DataTable({
                "paging": true,
                "searching": true,
                "info": true,
                "lengthChange": false
            });
        });
    </script>
</x-app-layout>
