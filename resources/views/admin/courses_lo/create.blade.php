<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #dee2e6;
        }

        th {
            background-color: #f8f9fa;
            font-weight: bold;
            color: #333;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
            box-shadow: none;
            transition: border-color 0.2s ease-in-out;
            height: 40px;
            width: 100%;
            box-sizing: border-box;
        }

        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        }

        .form-group textarea {
            height: 100px;
            resize: vertical;
        }

        .btn-custom {
            border-radius: 5px;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            color: white;
            cursor: pointer;
        }

        .btn-remove {
            background-color: #dc3545;
        }

        .btn-remove:hover {
            background-color: #c82333;
        }

        .btn-add {
            background-color: #6c757d;
        }

        .btn-add:hover {
            background-color: #5a6268;
        }

        .btn-submit {
            background-color: #007bff;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="container">
        <a href="{{ route('courses_lo') }}" class="btn btn-secondary">Back</a>
        <div class="py-14">
            <h1>Tạo Learning Outcomes</h1>
            <form action="{{ route('courses_lo.store') }}" method="POST">
                @csrf

                <table>
                    <thead>
                        <tr>
                            <th>Chọn Khóa Học</th>
                            <th>Tên Learning Outcomes</th>
                            <th>Chi Tiết</th>
                            <th>Kiến Thức</th>
                            <th>Kỹ Năng</th>
                            <th>Trách Nhiệm</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="learning-outcomes-container">
                        <tr class="learning-outcome">
                            <td>
                                <div class="form-group">
                                    <select id="course_id" name="course_id[]" class="form-control select2" required>
                                        @foreach ($allcourses as $course)
                                            <option value="{{ $course->id }}">{{ $course->code }} - {{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('course_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="name" name="name[]" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                            <td>
                                <textarea class="form-control" id="detail" name="detail[]">{{ old('detail') }}</textarea>
                                @error('detail')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                            <td>
                                <input type="text" class="form-control" id="knowledge" name="knowledge[]" value="{{ old('knowledge') }}">
                                @error('knowledge')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                            <td>
                                <input type="text" class="form-control" id="skills" name="skills[]" value="{{ old('skills') }}">
                                @error('skills')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                            <td>
                                <input type="text" class="form-control" id="autonomy_responsibility" name="autonomy_responsibility[]" value="{{ old('autonomy_responsibility') }}">
                                @error('autonomy_responsibility')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                            <td>
                                <button type="button" class="btn btn-custom btn-remove">Remove</button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <button type="button" id="add-outcome" class="btn btn-custom btn-add">Add More</button>
                <button type="submit" class="btn btn-custom btn-submit">Lưu</button>
            </form>
        </div>
    </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function() {
    // Initialize select2 for the initial dropdown
    $('.select2').select2({
        placeholder: "Chọn Khóa học",
        allowClear: true
    });

    // Add more learning outcomes
    $('#add-outcome').click(function() {
        const $container = $('#learning-outcomes-container');
        const $newOutcome = $('.learning-outcome').first().clone();

        // Clear the values of the input fields in the cloned row
        $newOutcome.find('input, textarea').val('');
        
        // Reinitialize select2 for the cloned select element
        $newOutcome.find('.select2').select2({
            placeholder: "Chọn Khóa học",
            allowClear: true
        });

        // Append the cloned row to the container
        $container.append($newOutcome);
    });

    // Remove a learning outcome
    $(document).on('click', '.btn-remove', function() {
        $(this).closest('.learning-outcome').remove();
    });
});
</script>
