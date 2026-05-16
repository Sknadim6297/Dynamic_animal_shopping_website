<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\HomeBannerController;
use App\Http\Controllers\Admin\HomeAboutController;
use App\Http\Controllers\Admin\MainAboutController;
use App\Http\Controllers\Admin\HomeServiceController;
use App\Http\Controllers\Admin\GroomingPackageController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\HeaderController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\VideoGalleryController;
use App\Http\Controllers\Admin\FooterAddressController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
*/

// Login routes (public)
Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [AdminController::class, 'login']);

// Protected admin routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    
    // Home Banner routes
    Route::get('/home-banner', [HomeBannerController::class, 'index'])->name('admin.homebanner.index');
    Route::get('/home-banner/create', [HomeBannerController::class, 'create'])->name('admin.homebanner.create');
    Route::post('/home-banner', [HomeBannerController::class, 'store'])->name('admin.homebanner.store');
    Route::get('/home-banner/{id}/edit', [HomeBannerController::class, 'edit'])->name('admin.homebanner.edit');
    Route::put('/home-banner/{id}', [HomeBannerController::class, 'update'])->name('admin.homebanner.update');
    Route::delete('/home-banner/{id}', [HomeBannerController::class, 'destroy'])->name('admin.homebanner.destroy');
    
    // Home About routes
    Route::get('/home-about', [HomeAboutController::class, 'index'])->name('admin.homeabout.index');
    Route::get('/home-about/create', [HomeAboutController::class, 'create'])->name('admin.homeabout.create');
    Route::post('/home-about', [HomeAboutController::class, 'store'])->name('admin.homeabout.store');
    Route::get('/home-about/{id}/edit', [HomeAboutController::class, 'edit'])->name('admin.homeabout.edit');
    Route::put('/home-about/{id}', [HomeAboutController::class, 'update'])->name('admin.homeabout.update');
    Route::delete('/home-about/{id}', [HomeAboutController::class, 'destroy'])->name('admin.homeabout.destroy');

    // Main About (About page) routes
    Route::get('/main-about', [MainAboutController::class, 'index'])->name('admin.mainabout.index');
    Route::get('/main-about/create', [MainAboutController::class, 'create'])->name('admin.mainabout.create');
    Route::post('/main-about', [MainAboutController::class, 'store'])->name('admin.mainabout.store');
    Route::get('/main-about/{id}/edit', [MainAboutController::class, 'edit'])->name('admin.mainabout.edit');
    Route::put('/main-about/{id}', [MainAboutController::class, 'update'])->name('admin.mainabout.update');
    Route::delete('/main-about/{id}', [MainAboutController::class, 'destroy'])->name('admin.mainabout.destroy');
    
    // Main About routes (About Page)
    Route::get('/main-about', [MainAboutController::class, 'index'])->name('admin.mainabout.index');
    Route::get('/main-about/create', [MainAboutController::class, 'create'])->name('admin.mainabout.create');
    Route::post('/main-about', [MainAboutController::class, 'store'])->name('admin.mainabout.store');
    Route::get('/main-about/{id}/edit', [MainAboutController::class, 'edit'])->name('admin.mainabout.edit');
    Route::put('/main-about/{id}', [MainAboutController::class, 'update'])->name('admin.mainabout.update');
    Route::delete('/main-about/{id}', [MainAboutController::class, 'destroy'])->name('admin.mainabout.destroy');
    
    // Home Service routes
    Route::get('/home-service', [HomeServiceController::class, 'index'])->name('admin.homeservice.index');
    Route::get('/home-service/create', [HomeServiceController::class, 'create'])->name('admin.homeservice.create');
    Route::post('/home-service', [HomeServiceController::class, 'store'])->name('admin.homeservice.store');
    Route::get('/home-service/{id}/edit', [HomeServiceController::class, 'edit'])->name('admin.homeservice.edit');
    Route::put('/home-service/{id}', [HomeServiceController::class, 'update'])->name('admin.homeservice.update');
    Route::delete('/home-service/{id}', [HomeServiceController::class, 'destroy'])->name('admin.homeservice.destroy');

    // Grooming Package routes
    Route::get('/grooming-package', [GroomingPackageController::class, 'index'])->name('admin.grooming-package.index');
    Route::get('/grooming-package/create', [GroomingPackageController::class, 'create'])->name('admin.grooming-package.create');
    Route::post('/grooming-package', [GroomingPackageController::class, 'store'])->name('admin.grooming-package.store');
    Route::get('/grooming-package/{grooming_package}/edit', [GroomingPackageController::class, 'edit'])->name('admin.grooming-package.edit');
    Route::put('/grooming-package/{grooming_package}', [GroomingPackageController::class, 'update'])->name('admin.grooming-package.update');
    Route::delete('/grooming-package/{grooming_package}', [GroomingPackageController::class, 'destroy'])->name('admin.grooming-package.destroy');
    
    // Gallery routes
    Route::get('/gallery', [GalleryController::class, 'index'])->name('admin.gallery.index');
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('admin.gallery.create');
    Route::post('/gallery', [GalleryController::class, 'store'])->name('admin.gallery.store');
    Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit'])->name('admin.gallery.edit');
    Route::put('/gallery/{id}', [GalleryController::class, 'update'])->name('admin.gallery.update');
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('admin.gallery.destroy');
    
    // Testimonial routes
    Route::get('/testimonial', [TestimonialController::class, 'index'])->name('admin.testimonial.index');
    Route::get('/testimonial/create', [TestimonialController::class, 'create'])->name('admin.testimonial.create');
    Route::post('/testimonial', [TestimonialController::class, 'store'])->name('admin.testimonial.store');
    Route::get('/testimonial/{id}/edit', [TestimonialController::class, 'edit'])->name('admin.testimonial.edit');
    Route::put('/testimonial/{id}', [TestimonialController::class, 'update'])->name('admin.testimonial.update');
    Route::delete('/testimonial/{id}', [TestimonialController::class, 'destroy'])->name('admin.testimonial.destroy');
    
    // Blog routes
    Route::get('/blog', [BlogController::class, 'index'])->name('admin.blog.index');
    Route::get('/blog/create', [BlogController::class, 'create'])->name('admin.blog.create');
    Route::post('/blog', [BlogController::class, 'store'])->name('admin.blog.store');
    Route::get('/blog/{id}/edit', [BlogController::class, 'edit'])->name('admin.blog.edit');
    Route::put('/blog/{id}', [BlogController::class, 'update'])->name('admin.blog.update');
    Route::delete('/blog/{id}', [BlogController::class, 'destroy'])->name('admin.blog.destroy');
    
    // Header Settings routes
    Route::get('/header', [HeaderController::class, 'edit'])->name('admin.header.edit');
    Route::put('/header', [HeaderController::class, 'update'])->name('admin.header.update');
    
    // Appointment routes
    Route::get('/appointment', [AppointmentController::class, 'index'])->name('admin.appointment.index');
    Route::put('/appointment/{id}/status', [AppointmentController::class, 'updateStatus'])->name('admin.appointment.updateStatus');
    Route::delete('/appointment/{id}', [AppointmentController::class, 'destroy'])->name('admin.appointment.destroy');
    
    // Contact routes
    Route::get('/contact', [ContactController::class, 'index'])->name('admin.contact.index');
    Route::get('/contact/{id}', [ContactController::class, 'show'])->name('admin.contact.show');
    Route::put('/contact/{id}/status', [ContactController::class, 'updateStatus'])->name('admin.contact.updateStatus');
    Route::delete('/contact/{id}', [ContactController::class, 'destroy'])->name('admin.contact.destroy');


    // Video Gallery routes
Route::get('/video-gallery', [VideoGalleryController::class, 'index'])
    ->name('admin.video.gallery');

Route::get('/video-gallery/create', [VideoGalleryController::class, 'create'])
    ->name('admin.video.gallery.create');

Route::post('/video-gallery', [VideoGalleryController::class, 'store'])
    ->name('admin.video.gallery.store');

Route::get('/video-gallery/{id}/edit', [VideoGalleryController::class, 'edit'])
    ->name('admin.video.gallery.edit');

Route::put('/video-gallery/{id}', [VideoGalleryController::class, 'update'])
    ->name('admin.video.gallery.update');

Route::delete('/video-gallery/{id}', [VideoGalleryController::class, 'destroy'])
    ->name('admin.video.gallery.destroy');

Route::get('/footer-address', [FooterAddressController::class, 'index'])->name('admin.footer.address.index');
Route::get('/footer-address/create', [FooterAddressController::class, 'create'])->name('admin.footer.address.create');
Route::post('/footer-address', [FooterAddressController::class, 'store'])->name('admin.footer.address.store');
Route::get('/footer-address/{id}/edit', [FooterAddressController::class, 'edit'])->name('admin.footer.address.edit');
Route::put('/footer-address/{id}', [FooterAddressController::class, 'update'])->name('admin.footer.address.update');
Route::delete('/footer-address/{id}', [FooterAddressController::class, 'destroy'])->name('admin.footer.address.destroy');
});

