<?php

use App\Exports\NotesExport;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\AuthController;
use App\Http\Controllers\Back\NoteController;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\Back\ProductController;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\Back\CatalogueController;
use App\Http\Controllers\Back\CustomersController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\SubProductController;
use App\Http\Controllers\Back\SubCategoryController;
use App\Http\Controllers\Back\SerialNumberController;
use Maatwebsite\Excel\Facades\Excel;
// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Route::get('/', [FrontController::class,'home'])->name('home');

        Route::get('about_us', [FrontController::class,'about_us'])->name('about_us');

        Route::get('contact-us', [FrontController::class,'contact_us'])->name('contact-us');

        Route::post('contactus_Send', [FrontController::class,'contactus_Send'])->name('contactus_Send');

        
        Route::get('categories', [FrontController::class,'categories'])->name('categories');

        

        Route::get('categories/show/{slug}',[FrontController::class,'sub_category'] )->name('front.category.show');


        Route::get('sub/category/products/{slug}', [FrontController::class,'sub_category_product'])->name('front.subcategory.show');


        Route::get('product/show/{slug}', [FrontController::class,'products_show'])->name('front.products.show');
        Route::get('/products/search', [FrontController::class, 'search'])->name('products.search');


        Route::get('ewarranty', function () {
            return view('front.ewarranty.ewarranty');
        })->name('ewarranty');

        Route::get('user-warranty', function () {
            return view('front.ewarranty.user_warranty');
        })->name('user-warranty');


        Route::get('guest/add', [FrontController::class, 'guest_add'])->name('guest-add');

        Route::post('/customers', [FrontController::class, 'store_customer'])->name('customers.store');


        Route::get('guest/check', [FrontController::class,'guest_check'])->name('guest-check');
        Route::post('/check-code', [FrontController::class, 'checkCode'])->name('check.code');
    });


    Route::get('/admin/login', [AuthController::class,'login'])->name('login');
    Route::post('/login/form', [AuthController::class,'LoginForm'])->name('login.form');



    Route::group(['prefix' => 'admin'], function () {


      
    Route::get('/get/subcategory/by/{categoryId}', [ProductController::class, 'getSubcategories']);

    Route::get('/get/subproduct/by/{categoryId}', [SubProductController::class, 'getSubProductsBySubCategory']);
    });

    Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {


        Route::get('/logout', [AuthController::class,'logout'])->name('logout');
        Route::get('/edit/Profile', [AuthController::class,'editProfile'])->name('editProfile');
        Route::put('/update/Profile/{id}', [AuthController::class,'update'])->name('admin.update');

        Route::get('/dashboard', [DashboardController::class,'index'])->name('admin.index');
   
        ////////////////////////////////////    Categories \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
        Route::get('/Categories', [CategoryController::class,'index'])->name('Categories');
        Route::post('/Categories/Store', [CategoryController::class,'store'])->name('category.store');
        Route::post('/Categories/update/{id}', [CategoryController::class,'update'])->name('category.update');
        Route::get('/Categories/destroy/{id}', [CategoryController::class,'destroy'])->name('category.destroy');
        Route::post('/Categories/update-active/{id}', [CategoryController::class, 'updateActiveStatus'])->name('category.updateActive');


        ////////////////////////////////////  Sub  Categories \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
        Route::get('/Sub/Categories', [SubCategoryController::class,'index'])->name('sub.Categories');
        Route::post('/Sub/Categories/Store', [SubCategoryController::class,'store'])->name('sub.category.store');
        Route::post('/Sub/Categories/update/{id}', [SubCategoryController::class,'update'])->name('sub.category.update');
        Route::get('/Sub/Categories/destroy/{id}', [SubCategoryController::class,'destroy'])->name('sub.category.destroy');


        ////////////////////////////////////  Product \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
      

        Route::get('/product', [ProductController::class,'index'])->name('product');

        Route::get('/product/show/serial_number/{id}', [ProductController::class,'show'])->name('product.show');

        
        Route::get('/product/create', [ProductController::class,'create'])->name('product.create');
        Route::post('/product/Store', [ProductController::class,'store'])->name('product.store');

        Route::get('/product/edit/{id}', [ProductController::class,'edit'])->name('product.edit');
        Route::post('/product/update/{id}', [ProductController::class,'update'])->name('product.update');
        Route::get('/product/destroy/{id}', [ProductController::class,'destroy'])->name('product.destroy');



        ////////////////////////////////////  Sub Product \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
      

        Route::get('/sub/product', [SubProductController::class,'index'])->name('sub.product');
        Route::get('/sub/product/create', [SubProductController::class,'create'])->name('sub.product.create');
        Route::post('/sub/product/Store', [SubProductController::class,'store'])->name('sub.product.store');
       
        Route::get('/sub/product/edit/{id}', [SubProductController::class,'edit'])->name('sub.product.edit');
        Route::post('/sub/product/update/{id}', [SubProductController::class,'update'])->name('sub.product.update');
        Route::get('/sub/product/destroy/{id}', [SubProductController::class,'destroy'])->name('sub.product.destroy');


        ////////////////////////////////////  Catalogue \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
        Route::get('/Catalogue', [CatalogueController::class,'index'])->name('Catalogue');
        Route::post('/Catalogue/Store', [CatalogueController::class,'store'])->name('Catalogue.store');
        Route::post('/Catalogue/update/{id}', [CatalogueController::class,'update'])->name('Catalogue.update');
        Route::get('/Catalogue/destroy/{id}', [CatalogueController::class,'destroy'])->name('Catalogue.destroy');


          ////////////////////////////////////  Serial Number \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
          
          Route::post('/Serial/Number/update/{id}', [SerialNumberController::class,'update'])->name('SerialNumber.update');
          Route::get('/Serial/Number/destroy/{id}', [SerialNumberController::class,'destroy'])->name('SerialNumber.destroy');

        ////////////////////////////////////  customers \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
        Route::get('/customers', [CustomersController::class,'index'])->name('customers');
        Route::get('/customers/export', [CustomersController::class, 'export'])->name('customers.export');

        Route::get('/create/customers', [CustomersController::class,'create'])->name('create.customers');
        Route::post('/store/customers', [CustomersController::class,'store'])->name('store.customers');

        
        Route::get('/customers/show/{id}', [CustomersController::class,'show'])->name('customers.show');

        Route::get('/customers/edit/{id}', [CustomersController::class,'edit'])->name('customers.edit');
        Route::post('/customers/update/{id}', [CustomersController::class,'update'])->name('update.customers');
        Route::get('/filter/customers', [CustomersController::class,'filterCustomer'])->name('customers.filter');
        Route::get('/customers/destroy/{id}', [CustomersController::class,'destroy'])->name('customers.destroy');


        
        ////////////////////////////////////  Notes \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
        Route::get('/Notes', [NoteController::class,'index'])->name('Notes');
        Route::post('/Notes/Store', [NoteController::class,'store'])->name('Notes.store');
        Route::post('/Notes/update/{id}', [NoteController::class,'update'])->name('Notes.update');
        Route::get('/Notes/destroy/{id}', [NoteController::class,'destroy'])->name('Notes.destroy');

        Route::get('/export-notes', function () {
            return Excel::download(new NotesExport, 'notes.xlsx');
        })->name('note.export');

    });


    
