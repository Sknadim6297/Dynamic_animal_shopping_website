<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/service-details', [HomeController::class, 'serviceDetails'])->name('service.details');
Route::get('/pet-clinic', [HomeController::class, 'petClinic'])->name('petclinic');
Route::get('/pet-food', [HomeController::class, 'petFood'])->name('pet.food');
Route::get('/pet-treats', [HomeController::class, 'petTreats'])->name('pet.treats');
Route::get('/pet-supplements', [HomeController::class, 'petSupplements'])->name('pet.supplements');
Route::get('/pet-accessories', [HomeController::class, 'petAccessories'])->name('pet.accessories');
Route::get('/aquariums-accessories', [HomeController::class, 'aquariumsAccessories'])->name('pet.aquariums');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/blog-details/{id}', [HomeController::class, 'blogDetails'])->name('blog.details');
Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/gallery/photos', [HomeController::class, 'photoGallery'])->name('gallery.photos');
Route::get('/gallery/videos', [HomeController::class, 'videoGallery'])->name('gallery.videos');
Route::get('/video-gallery', [HomeController::class, 'videoGallery'])->name('video.gallery');
Route::get('/grooming-booking', [HomeController::class, 'grooming'])->name('grooming');
Route::get('/clinic-booking', [HomeController::class, 'clinicBooking'])->name('clinic.booking');
Route::get('/groomer-details/{id}', [HomeController::class, 'groomerDetails'])->name('groomer.details');
Route::post('/appointment', [App\Http\Controllers\AppointmentController::class, 'store'])->name('appointment.store');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');