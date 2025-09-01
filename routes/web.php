<?php

use App\Mail\AppointmentMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\Validatecontroller;
use App\Http\Controllers\Validatecontroller1;
use App\Http\Controllers\Validatecontroller2;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ParlorController;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\Admin1Controller;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PackageController1;
use App\Http\Controllers\AllbookingController;
use App\Http\Controllers\Specialist;
use App\Http\Controllers\SpecialistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\BlogController;
use App\Models\customer;
use App\Models\Userdetail;
use App\Http\Controllers\LocationController;
use App\Models\Location; 
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;



//pages
Route::get('/',[LayoutController::class,'index'])->name('homepage');
Route::get('/product',[LayoutController::class,'product'])->name('productpage');
Route::get('/service',[LayoutController::class,'service'])->name('servicepage');
Route::get('/packages',[LayoutController::class,'packages'])->name('packages');

Route::get('/appointment',[LayoutController::class,'appointment'])->name('appointment');
Route::get('/get-subservices/{serviceId}', [LayoutController::class, 'getSubServices']);

Route::post('/storedata3',[AppointmentController::class,'store']);
Route::get('/contact',[LayoutController::class,'contact'])->name('contact');
Route::post('/storedata',[ValidateController::class,'store']);
Route::get('/contactemail',[LayoutController::class,'contactemail']);
Route::get('/haircuts',[LayoutController::class,'haircuts']);
Route::get('/facials',[LayoutController::class,'facials']);
Route::get('/makeup',[LayoutController::class,'makeup']);
Route::get('/waxing',[LayoutController::class,'waxing']);
Route::get('/manicure',[LayoutController::class,'manicure']);
Route::get('/eyebrowlash',[LayoutController::class,'eyebrowlash']);
Route::get('/henna',[LayoutController::class,'henna']);
Route::get('/bridal',[LayoutController::class,'bridal']);


Route::get('/about',[AboutController::class,'about'])->name('aboutpage');
Route::get('/admin/about', [AboutController::class, 'edit'])->name('about.edit');
Route::put('/admin/about/{id}', [AboutController::class, 'update'])->name('about.update');
Route::get('/addabout',[AboutController::class,'addabout'])->name('addaboutpage');
Route::get('/aboutshow',[AboutController::class,'aboutshow'])->name('aboutshow');
Route::post('store8', [AboutController::class, 'store8'])->name('store8'); 

Route::delete('aboutshow/delete/{id}', [AboutController::class, 'destroy'])->name('aboutshowdelete');



//all booking
Route::get('/allbooking/{id}',[AllbookingController::class,'allbooking']);
Route::post('/store9',[AllbookingController::class,'store9'])->name('store9');


// service ni ander service
Route::get('/haircut',[LayoutController::class,'haircut']);
Route::get('/haircolour',[LayoutController::class,'haircolour']);
Route::get('/hairspa',[LayoutController::class,'hairspa']);
Route::get('/hairstyling',[LayoutController::class,'hairstyling']);


//facial 
Route::get('/acnetreatment',[LayoutController::class,'acnetreatment']);
Route::get('/antiagingtreatment',[LayoutController::class,'antiagingtreatment']);
Route::get('/goldfacial',[LayoutController::class,'goldfacial']);
Route::get('/herbalfacial',[LayoutController::class,'herbalfacial']);


//
Route::get('/addservicesshow',[PackageController1::class,'addservicesshow'])->name('addservicesshow.page');
Route::get('/addnewservice',[PackageController1::class,'create'])->name('create.page');;
Route::post('/addnewservice/store4',[PackageController1::class,'store4'])->name('store4.page');

//
Route::get('/addspecialistshow',[PackageController1::class,'addspecialistshow'])->name('addspecialistshow.page');
Route::get('/addspecialist', [PackageController1::class, 'addspecialist'])->name('specialist.add');
Route::post('/addspecialist/store6', [PackageController1::class, 'store6'])->name('specialist.store');
Route::get('staffavailability', [PackageController1::class, 'staffavailability'])->name('staffavailability');
Route::put('/specialist/toggle-status/{id}', [PackageController1::class, 'toggleStatus'])->name('specialist.toggleStatus');



//delete edit
Route::get('/specialist/edit/{id}', [PackageController1::class, 'edit'])->name('specialist.edit');
Route::post('/specialist/update/{id}', [PackageController1::class, 'update'])->name('specialist.update');
Route::delete('/specialist/delete/{id}', [PackageController1::class, 'destroy'])->name('specialist.delete');



//dynamic add service routes
Route::get('/facialpackage', [PackageController1::class, 'facialpackage'])->name('facialpackage.page');

//userview
Route::get('userview',[LayoutController::class,'userview'])->name('userviewpage');
Route::get('/userview/trash',[LayoutController::class,'trash']);
Route::get('/appointmentview', [AppointmentController::class, 'appointmentview'])->name('appointmentviewpage');
Route::get('/appointmentview/trash', [AppointmentController::class, 'trash']);
Route::get('/upcomingappointments', [AppointmentController::class, 'upcomingappointments'])->name('upcomingappointments');
Route::get('/complatedappointments', [AppointmentController::class, 'complatedappointments'])->name('complatedappointments');
Route::get('/cancellationsappointments', [AppointmentController::class, 'cancellationsappointments'])->name('cancellationsappointments');

//admin pages
Route::get('/appointmentview1', [Admin1Controller::class, 'appointmentview1'])->name('appointmentviewpage1');
Route::get('/upcomingappointments1', [Admin1Controller::class, 'upcomingappointments1'])->name('upcomingappointments1');
Route::get('/complatedappointments1', [Admin1Controller::class, 'complatedappointments1'])->name('complatedappointments1');
Route::get('/cancellationsappointments1', [Admin1Controller::class, 'cancellationsappointments1'])->name('cancellationsappointments1');

//userview delete update restore softdelete for signup
Route::get('userdelete/{id}',[LayoutController::class,'destroy'])->name('userdel');
Route::get('userrestore/{id}',[LayoutController::class,'restore'])->name('userrestore');
Route::get('userforcedelete/{id}',[LayoutController::class,'forcedestroy'])->name('userforcedel');
Route::get('useredit/{id}',[LayoutController::class,'edit'])->name('useredit');
Route::post('userupdate/{id}',[LayoutController::class,'update'])->name('userupdate');



//appview delete update restore softdelete for appointment
Route::get('userdelete/{id}', [AppointmentController::class, 'destroy'])->name('userdel');
Route::get('userrestore/{id}', [AppointmentController::class, 'restore'])->name('userrestore');
Route::get('userforcedelete/{id}', [AppointmentController::class, 'forcedestroy'])->name('userforcedel');
Route::get('useredit/{id}', [AppointmentController::class, 'edit'])->name('useredit');
Route::post('userupdate/{id}', [AppointmentController::class, 'update'])->name('userupdate');
Route::get('/appointment/approve/{id}', [AppointmentController::class, 'approveAppointment'])->name('userapprove');
Route::get('/appointment/done/{id}', [AppointmentController::class, 'doneAppointment'])->name('userdone');
Route::get('/appointment/cancel/{id}', [AppointmentController::class, 'cancelAppointment'])->name('usercancel');

//addserviceshow delte
Route::get('/userdelete2/{id}', [ServiceController::class, 'destroy'])->name('userdel2');
// Show edit form
Route::get('edit-package/{id}', [ServiceController::class, 'edit'])->name('edit.package');

// Update package
Route::put('update-package/{id}', [ServiceController::class, 'update'])->name('update.package');



//allserviceshow
    Route::get('/allserviceshow', [AllbookingController::class, 'allserviceshow'])->name('allserviceshow');
    Route::get('/booking/{id}', [AllbookingController::class, 'show'])->name('vendor.show');
    Route::put('/booking/{id}/status', [AllbookingController::class, 'updateStatus'])->name('useredit2');
    Route::delete('/booking/{id}', [AllbookingController::class, 'destroy'])->name('userdelete2');



//login

// Email Verification
Auth::routes(['verify' => true]);

Route::get('/login',[Validatecontroller1::class,'login'])->name('login');
Route::post('/storedata2',[Validatecontroller2::class,'store2']);
Route::post('/logout',[Validatecontroller1::class,'logout'])->name('logout');

//signup
Route::get('/signup',[LayoutController::class,'signup'])->name('signuppage');
Route::post('/storedata1',[Validatecontroller1::class,'store1']);

Route::post('/verify-code', [Validatecontroller1::class, 'verifyCode'])->name('code.verify');
Route::get('/verify-code', [Validatecontroller1::class, 'showCodeForm'])->name('code.form');


Route::post('/login-user', [Validatecontroller1::class, 'loginUser'])->name('login.user');

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     });
// });

//for nearest appointment
Route::get('/nearest-parlors', [ParlorController::class, 'findNearestParlors']);


//pakagecontrollers
Route::get('/data',[PackageController::class,'index']);
Route::get('/show',[PackageController::class,'index2']);

//admin
Route::middleware(['admin.auth'])->group(function(){


Route::get('/dashboard',[admincontroller::class,'dashboard'])->name('Dashboard.page');
Route::get('/adminappointments',[admincontroller::class,'appointments'])->name('adminappointmentspage');
Route::get('/services',[admincontroller::class,'services'])->name('services.page');
Route::get('/blogs',[admincontroller::class,'blogs'])->name('blogs.page');
Route::get('/pricing',[admincontroller::class,'pricing'])->name('pricing.page');
Route::get('/customers',[admincontroller::class,'customers'])->name('customers.page');
Route::get('/settings',[admincontroller::class,'settings'])->name('settings.page');
Route::get('/logout',[admincontroller::class,'logout'])->name('logout');
Route::get('/upcominguserview',[Admin1Controller::class,'upcominguserview'])->name('userviewpage');
Route::get('/newappointments',[Admin1Controller::class,'newappointments'])->name('newppointments.page');
// Route::get('/addnewservice', [Admin1Controller::class, 'addnewservice'])->name('addnewservice');
// Route::get('/addnewservices', [Admin1Controller::class, 'addnewservices'])->name('addnewservices');
Route::resource('blogs', BlogController::class);

});
//admin1 vendor
Route::middleware(['vendor.auth'])->group(function () {

});


route::get('/customer',function(){
    $customer=customer::all();
    echo"<pre>";
    print_r($customer->toArray());
});

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/about.html', function () {
//     return view('about');
// });

// Route::get('/product', function () {
//     return view('product');
// });



Route::get('/service/{id}',[ServiceController::class,'index'])->name('service.show');

//addcart
// Cart operations
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::get('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');

// Checkout handled by RazorpayController
Route::get('/checkout', [RazorpayController::class, 'checkout'])->name('checkout');
Route::post('/payment/complete', [RazorpayController::class, 'complete'])->name('payment.complete');
//payment

Route::get('/checkout', [RazorpayController::class, 'checkout'])->name('checkout');
Route::post('/payment', [RazorpayController::class, 'payment'])->name('payment');
Route::post('/update-payment-status', [BookingController::class, 'updatePaymentStatus']);


//
Route::post('/generate-order', [AllbookingController::class, 'generateOrder'])->name('generate.order');

// Store Booking Data after Payment
Route::post('/store-booking', [AllbookingController::class, 'store7'])->name('store7');



Route::post('/payment-success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
Route::get('/thank-you', function () {
    return view('thank-you');
});


//edit pprofile


Route::middleware(['auth'])->group(function () {
    Route::get('/editprofile', [ProfileController::class, 'editprofile'])->name('editprofile');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

});


Route::post('/storedata3', [AppointmentController::class, 'store'])->name('appointment.store');
Route::post('/generate-order', [AppointmentController::class, 'generateOrder'])->name('razorpay.generateOrder');



Route::get('/blog', [BlogController::class, 'blog'])->name('blogpage');
Route::get('/addblog', [BlogController::class, 'addblog'])->name('addblog');
Route::post('/store10', [BlogController::class, 'store10'])->name('store10');
Route::get('/blogshow', [BlogController::class, 'showAll'])->name('blogshow');
Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit'); 
Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy'); 
Route::get('/blog/{id}', [BlogController::class, 'showDetail'])->name('blog.detail');




Route::get('/appointment1/approve/{id}', [AllbookingController::class, 'approve'])->name('userapprove1');
Route::get('/appointment1/done/{id}', [AllbookingController::class, 'done'])->name('userdone1');
Route::get('/appointment1/cancel/{id}', [AllbookingController::class, 'cancel'])->name('usercancel1');
Route::put('/booking/status/{id}', [AllbookingController::class, 'updateStatus2'])->name('updateStatus2');

Route::get('/appointment1/delete/{id}', [AllbookingController::class, 'trash'])->name('userdel1');
Route::get('package/delete1/{id}', [AllbookingController::class, 'delete'])->name('userdelete1');
Route::get('/appointment1/edit/{id}', [AllbookingController::class, 'edit'])->name('useredit1');
Route::post('/appointment1/update/{id}', [AllbookingController::class, 'update'])->name('userupdate1');
Route::get('/complatedservices', [AllbookingController::class, 'complatedservices'])->name('done.bookings1');
Route::get('/cancelledservices', [AllbookingController::class, 'cancelledservices'])->name('cancelled.bookings1');

Route::get('/get-available-slots', [AppointmentController::class, 'getAvailableSlots']);


Route::get('/showlocation', [Layoutcontroller::class, 'showlocation'])->name('showlocation');


// Show the form to create a new location
Route::get('/addnewlocation', [Layoutcontroller::class, 'addnewlocation'])->name('addnewlocation');

// Store a newly created location
Route::post('store11', [Layoutcontroller::class, 'store11'])->name('store11');

// Show the form to edit an existing location
Route::get('locationshow/{location}/edit', [Layoutcontroller::class, 'locationedit'])->name('locationedit');

// Update the existing location
Route::put('locations/{location}', [Layoutcontroller::class, 'update1'])->name('update1');

// Delete a location
Route::delete('locationshow/{location}', [Layoutcontroller::class, 'destroy1'])->name('locationdestroy1');

//login forget pass



Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm']);
Route::post('/forgot-password', [AuthController::class, 'sendResetLink']);
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword']);
Route::get('/forgot-password', [AuthController::class, 'showOtpRequestForm']);
Route::post('/send-otp', [AuthController::class, 'sendOtp']);
Route::get('/verify-otp', [AuthController::class, 'showOtpVerifyForm']);
Route::post('/verify-otp', [AuthController::class, 'verifyOtpAndResetPassword']);
Route::get('/resend-otp', [AuthController::class, 'resendOtp']);



//newsleter 
Route::post('/subscribe-newsletter', [NewsletterController::class, 'store12'])->name('newsletter.store12');
Route::get('/dashboard1',[DashboardController::class,'dashboard1'])->name('Dashboard1.page');
