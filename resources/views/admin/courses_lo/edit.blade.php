<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('courses_lo') }}" class="btn btn-primary">Quay lại</a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('courses_lo.update', $coursesLo) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-6">
                            <label for="course_id" class="block text-lg font-medium text-gray-700">Khóa học</label>
                            <select id="course_id" name="course_id" class="form-control select3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <option value="">Chọn Khóa Học</option>
                                @foreach ($lecturerCourses as $course)
                                    <option value="{{ $course->id }}" {{ $course->id == $currentCourse ? 'selected' : '' }}>
                                        {{ $course->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="name" class="block text-lg font-medium text-gray-700">Tên LO</label>
                            <input type="text" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" id="name" name="name" value="{{ old('name', $coursesLo->name) }}" required>
                            @error('name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="detail" class="block text-lg font-medium text-gray-700">Chi tiết</label>
                            <input type="text" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" id="detail" name="detail" value="{{ old('detail', $coursesLo->detail) }}">
                            @error('detail')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="knowledge" class="block text-lg font-medium text-gray-700">Kiến thức</label>
                            <input type="number" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" id="knowledge" name="knowledge" value="{{ old('knowledge', $coursesLo->knowledge) }}">
                            @error('knowledge')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="skill" class="block text-lg font-medium text-gray-700">Kỹ Năng</label>
                            <input type="number" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" id="skill" name="skill" value="{{ old('skill', $coursesLo->skill) }}">
                            @error('skill')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="autonomy_responsibility" class="block text-lg font-medium text-gray-700">Trách nhiệm</label>
                            <input type="number" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" id="autonomy_responsibility" name="autonomy_responsibility" value="{{ old('autonomy_responsibility', $coursesLo->autonomy_responsibility) }}">
                            @error('autonomy_responsibility')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
