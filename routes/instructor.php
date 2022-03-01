<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Instructor\CourseController;
use App\Http\Livewire\Instructor\CourseCurriculum;
use App\Http\Livewire\Instructor\CourseStudents;

Route::redirect('', 'instructor/course');

Route::resource('course', CourseController::class)->names('courses');

Route::get('course/{course}/curriculum', CourseCurriculum::class)->middleware('can:Actualizar Cursos')->name('courses.curriculum');

Route::get('course/{course}/goals', [CourseController::class, 'goals'])->name('courses.goals');

Route::get('course/{course}/students', CourseStudents::class)->middleware('can:Actualizar Cursos')->name('courses.students');
 
Route::post('course/{course}/status', [CourseController::class, 'status'])->name('courses.status');

Route::get('course/{course}/observation', [CourseController::class, 'observation'])->name('courses.observation');
