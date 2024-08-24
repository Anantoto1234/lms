<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('assignments.index') }}" class="text-blue-500 hover:underline">Back</a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="py-12">
                        <h1 class="text-2xl font-bold mb-6">Tạo Assignments</h1>

                        <form action="{{ route('assignments.store') }}" method="POST" class="space-y-4">
                            @csrf

                            <div>
                                <label for="course_id" class="block text-sm font-medium text-gray-700">Chọn Khóa Học</label>
                                <select id="course_id" name="course_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" required>
                                    @foreach ($allcourses as $course)
                                        <option value="{{ $course->id }}">{{ $course->code }} - {{ $course->name }}</option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="component_name" class="block text-sm font-medium text-gray-700">Tên thành phần đánh giá</label>
                                <input type="text" id="component_name" name="component_name" value="{{ old('component_name') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                                @error('component_name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="weight" class="block text-sm font-medium text-gray-700">Trọng số</label>
                                <input type="text" id="weight" name="weight" value="{{ old('weight') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                                @error('weight')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="clo_ids" class="block text-sm font-medium text-gray-700">CLO</label>
                                <select id="clo_ids" name="clo_ids[]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" multiple>
                                    @foreach ($courselos as $clo)
                                        <option value="{{ $clo->id }}">{{ $clo->name }} - {{ $clo->detail }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="assessment_type" class="block text-sm font-medium text-gray-700">Hình Thức</label>
                                <input type="text" id="assessment_type" name="assessment_type" value="{{ old('assessment_type') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                                @error('assessment_type')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="assessment_tool" class="block text-sm font-medium text-gray-700">Công cụ</label>
                                <input type="text" id="assessment_tool" name="assessment_tool" value="{{ old('assessment_tool') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                                @error('assessment_tool')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="clo_weight" class="block text-sm font-medium text-gray-700">Trọng số CLO</label>
                                <input type="text" id="clo_weight" name="clo_weight" value="{{ old('clo_weight') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                                @error('clo_weight')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="plos" class="block text-sm font-medium text-gray-700">PLO liên quan</label>
                                <input type="text" id="plos" name="plos" value="{{ old('plos') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                                @error('plos')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
    Lưu
</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Chọn Khóa học",
            allowClear: true
        });
    });

    $('#course_id').change(function() {
        var courseId = $(this).val();
        if (courseId) {
            $.ajax({
                url: `/admin/courses/${courseId}/clos`,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var cloSelect = $('#clo_ids');
                    cloSelect.empty();
                    $.each(data, function(index, clo) {
                        cloSelect.append('<option value="' + clo.id + '" data-detail="' + clo.detail + '">' + clo.name + ' - ' + clo.detail + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                }
            });
        } else {
            $('#clo_ids').empty();
        }
    });
</script>
