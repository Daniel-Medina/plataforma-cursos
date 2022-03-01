<?php

use App\Http\Controllers\PaymentController;
use App\Models\Course;
use Illuminate\Support\Facades\Route;

Route::get('{course}/checkout', [PaymentController::class, 'checkout'])->name('checkout');

Route::get('{course}/pay', [PaymentController::class, 'pay'])->name('pay');

Route::get('{course}/approved', [PaymentController::class, 'approved'])->name('approved');

//Rutas de validacion y cancelacion para prueba
Route::get('{course}/cancel', function (Course $course) {
    return redirect()->route('payments.checkout', $course)->with('info', 'Pago no completado');
});
Route::get('{course}/success', function (Course $course) {
    
    $course->students()->attach(auth()->user()->id);
    return redirect()->route('courses.status', $course);
    
});