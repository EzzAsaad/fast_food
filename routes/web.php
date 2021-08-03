<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix'=>'admin'],function (){
    Auth::routes(['register'=>false]);
});


Route::get('/home', function(){
    return redirect(route('Admin.listUsers'));
})->name('home');

Route::get('/customer/home', function(){
    return redirect(url('/'));
})->name('customer.home');

Route::get('/test', [App\Http\Controllers\HomeController::class, 'index1'])->name('home');
/*
    Admin Routes
*/
Route::group(['prefix' => 'admin', 'middleware'=> ['Lang','AdminEmployee','auth']], function () {
    Route::get('/listUsers', [App\Http\Controllers\Admin\UserController::class, 'listUsers'])->name('Admin.listUsers');
    Route::get('/user/{id}/delete', [App\Http\Controllers\Admin\UserController::class, 'destroyUser'])->name('Admin.deleteUser');
    Route::get('/user/{id}/view', [App\Http\Controllers\Admin\UserController::class, 'ViewUser'])->name('Admin.ViewUser');
    Route::get('/user/{id}/edit', [App\Http\Controllers\Admin\UserController::class, 'ViewEditForm'])->name('Admin.EditUser');
    Route::post('/user/{id}/edit', [App\Http\Controllers\Admin\UserController::class, 'EditUser'])->name('Admin.UpdateUser');
    Route::get('/user/create', [App\Http\Controllers\Admin\UserController::class, 'AddUser'])->name('Admin.AddUser');
    Route::post('/user/store', [App\Http\Controllers\Admin\UserController::class, 'StoreUser'])->name('Admin.UserStore');

   // Employee
    Route::get('/listEmployees', [App\Http\Controllers\Admin\EmployeeController::class, 'listEmployees'])->name('Admin.listEmployees');
    Route::get('/employee/{id}/delete', [App\Http\Controllers\Admin\EmployeeController::class, 'destroyEmployee'])->name('Admin.deleteemployee');
    Route::get('/employee/{id}/view', [App\Http\Controllers\Admin\EmployeeController::class, 'ViewEmployee'])->name('Admin.Viewemployee');
    Route::get('/employee/{id}/edit', [App\Http\Controllers\Admin\EmployeeController::class, 'ViewEditFormE'])->name('Admin.Editemployee');
    Route::post('/employee/{id}/edit', [App\Http\Controllers\Admin\EmployeeController::class, 'EditEmployee'])->name('Admin.Updateemployee');
    Route::get('/employee/create', [App\Http\Controllers\Admin\EmployeeController::class, 'AddEmployee'])->name('Admin.Addemployee');
    Route::post('/employee/store', [App\Http\Controllers\Admin\EmployeeController::class, 'StoreEmployee'])->name('Admin.EmployeeStore');

    // Setting
    Route::get('/settigns/Menus/add' , [App\Http\Controllers\Admin\SettingsController::class, 'addMenu'])->name('Admin.MenusAdd');
    Route::post('/settigns/Menus/add' , [App\Http\Controllers\Admin\SettingsController::class, 'saveMenu'])->name('Admin.storeNewMenu');
    Route::get('/settigns/Menus/list' , [App\Http\Controllers\Admin\SettingsController::class, 'listMenus'])->name('Admin.MenuList');
    Route::get('/settigns/Menus/{id}/delete' , [App\Http\Controllers\Admin\SettingsController::class, 'DeleteMenu'])->name('Admin.DeleteMenu');
    Route::get('/settigns/Menus/{id}/edit' , [App\Http\Controllers\Admin\SettingsController::class, 'editeMenu'])->name('Admin.MenusEdit');
    Route::post('/settigns/Menus/{id}/edit' , [App\Http\Controllers\Admin\SettingsController::class, 'savaEdited'])->name('Admin.storeMenuEdit');


//    Route::get('/listEmployees', [App\Http\Controllers\Admin\UserController::class, 'listEmployees'])->name('Admin.ViewAllEmployees');
//    Route::get('/employee/{id}/delete', [App\Http\Controllers\Admin\UserController::class, 'destroyEmployee'])->name('Admin.deleteEmployee');
//    Route::get('/employee/{id}/view', [App\Http\Controllers\Admin\UserController::class, 'ViewEmployee'])->name('Admin.ViewEmployee');


    Route::get('/permission/add', [App\Http\Controllers\Admin\PermissionController::class, 'add'])->name('Admin.CreatePermission');
    Route::get('/Group/add' , [App\Http\Controllers\Admin\PermissionController::class, 'AddGroup'])->name('Admin.AddGroup');
    Route::post('/Group/store' , [App\Http\Controllers\Admin\PermissionController::class, 'storeGroup'])->name('Admin.StoreGroup');

    Route::get('/permissionToGroup/add' , [App\Http\Controllers\Admin\PermissionController::class, 'AddPermissionToGroup'])->name('Admin.AddPermissionToGroup');

    Route::post('/permissionToGroup/store' , [App\Http\Controllers\Admin\PermissionController::class, 'StorePermissionToGroup'])->name('Admin.StorePermissionToGroup');




    Route::get('/permission/methods/get/{id}', [App\Http\Controllers\Admin\PermissionController::class, 'getMethods'])->name('Admin.GetMethods');
    Route::get('/permission', [App\Http\Controllers\Admin\PermissionController::class, 'listPermissions'])->name('Admin.GetAllPermissions');
    Route::post('/permission/add', [App\Http\Controllers\Admin\PermissionController::class, 'store'])->name('Admin.addPermission');

    Route::get('/permission/{id}/delete', [App\Http\Controllers\Admin\PermissionController::class, 'destroy'])->name('Admin.DeletePermission');
    Route::get('/permission/{id}/edit', [App\Http\Controllers\Admin\PermissionController::class, 'edit'])->name('Admin.EditPermission');
    Route::post('/permission/{id}/update', [App\Http\Controllers\Admin\PermissionController::class, 'update'])->name('Admin.UpdatePermission');

    Route::get('/viewAllGroups', [App\Http\Controllers\Admin\PermissionController::class, 'viewGroups'])->name('Admin.ViewAllGroups');
    Route::get('/EditGroup/{id}', [App\Http\Controllers\Admin\PermissionController::class, 'EditGroup'])->name('Admin.EditGroup');

    Route::get('/EditGroupPermission/{id}', [App\Http\Controllers\Admin\PermissionController::class, 'EditGroupPermission'])->name('EditGrouPermissions');

    Route::get('/viewPermissionsForSpecificGroup/{id}', [App\Http\Controllers\Admin\PermissionController::class, 'ViewPermissionFroGroup'])->name('viewPermissionForSpecificGroup');


    Route::get('/settigns/edit' , [App\Http\Controllers\Admin\SettingsController::class, 'edit'])->name('Admin.EditSettings');
    Route::post('/settigns/update' , [App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('Admin.UpdateSettings');

    Route::get('/settigns/Social/add' , [App\Http\Controllers\Admin\SettingsController::class, 'addSocial'])->name('Admin.AddSocialMedia');
    Route::post('/settigns/Social/store' , [App\Http\Controllers\Admin\SettingsController::class, 'storeSocialMedia'])->name('Admin.storeSocialMedia');
    Route::get('/settigns/Social/list' , [App\Http\Controllers\Admin\SettingsController::class, 'list'])->name('Admin.listSocialMedia');
    Route::get('/settigns/Social/{id}/delete' , [App\Http\Controllers\Admin\SettingsController::class, 'delete'])->name('Admin.DeleteSocialMedia');
    Route::get('/settigns/Social/{id}/edit' , [App\Http\Controllers\Admin\SettingsController::class, 'editSocial'])->name('Admin.EditSocialMedia');
    Route::post('/settigns/Social/{id}/update' , [App\Http\Controllers\Admin\SettingsController::class, 'UpdateSocial'])->name('Admin.updateSocialMedia');

    Route::get('/settigns/test/' , [App\Http\Controllers\Admin\SettingsController::class, 'test']);

    Route::get('/profile/edit' , [App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('Admin.EditPersonalInformation');

    // Addones
    Route::get('/listAddones', [App\Http\Controllers\Admin\AddonController::class, 'listAddons'])->name('Admin.ViewAllAddons');
    Route::get('/changeAddonesStatus/{id}', [App\Http\Controllers\Admin\AddonController::class, 'ChangeStatus'])->name('Admin.ChangeStatus');
    Route::get('/deleteAddones/{id}', [App\Http\Controllers\Admin\AddonController::class, 'deleteAddone'])->name('Admin.DeleteAddone');
    Route::get('/addone/create',[App\Http\Controllers\Admin\AddonController::class,'create'])->name('Admin.AddAddone');
    Route::post('/addone/store',[App\Http\Controllers\Admin\AddonController::class,'store'])->name('Admin.StoreAddone');
    Route::get('/addone/update/{id}',[App\Http\Controllers\Admin\AddonController::class,'update'])->name('Admin.UpdateAddone');
    Route::post('/addone/edit',[App\Http\Controllers\Admin\AddonController::class,'edit'])->name('Admin.editAddone');
    Route::get('/addone/show/{id}',[App\Http\Controllers\Admin\AddonController::class,'show'])->name('Admin.ShowAddone');

    // Products
    Route::get('/listProducts', [App\Http\Controllers\Admin\ProductController::class, 'listProducts'])->name('Admin.ViewAllProducts');
    Route::get('/deleteProduct/{id}', [App\Http\Controllers\Admin\ProductController::class, 'deleteProduct'])->name('Admin.DeleteProduct');
    Route::get('/product/create',[App\Http\Controllers\Admin\ProductController::class,'createProduct'])->name('Admin.AddProduct');
    Route::post('/product/store',[App\Http\Controllers\Admin\ProductController::class,'storeProduct'])->name('Admin.StoreProduct');
    Route::get('/product/show/{id}',[App\Http\Controllers\Admin\ProductController::class,'showProduct'])->name('Admin.ShowProduct');
    Route::get('/product/update/{id}',[App\Http\Controllers\Admin\ProductController::class,'updateProduct'])->name('Admin.UpdateProduct');
    Route::post('/product/edit',[App\Http\Controllers\Admin\ProductController::class,'editProduct'])->name('Admin.editProduct');

    // Categories
    Route::get('/listCategories', [App\Http\Controllers\Admin\CategoryController::class, 'listCategories'])->name('Admin.ViewAllCategories');
    Route::get('/deleteCategory/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'deleteCategory'])->name('Admin.DeleteCategory');
    Route::get('/category/create',[App\Http\Controllers\Admin\CategoryController::class,'createCategory'])->name('Admin.AddCategory');
    Route::post('/category/store',[App\Http\Controllers\Admin\CategoryController::class,'storeCategory'])->name('Admin.StoreCategory');
    Route::get('/category/show/{id}',[App\Http\Controllers\Admin\CategoryController::class,'showCategory'])->name('Admin.ShowCategory');
    Route::get('/category/update/{id}',[App\Http\Controllers\Admin\CategoryController::class,'updateCategory'])->name('Admin.UpdateCategory');
    Route::post('/category/edit',[App\Http\Controllers\Admin\CategoryController::class,'editCategory'])->name('Admin.EditCategory');
    Route::get('/category/deleteSubcategory/{id}',[App\Http\Controllers\Admin\CategoryController::class,'deleteSub']);

   // Orders
    Route::get('/listOrders', [App\Http\Controllers\Admin\OrderCotroller::class, 'listAllOrders'])->name('Admin.ViewAllOrders');
    Route::get('/deleteOrder/{id}', [App\Http\Controllers\Admin\OrderCotroller::class, 'deleteOrder'])->name('Admin.DeleteOrder');
    Route::get('/order/create',[App\Http\Controllers\Admin\OrderCotroller::class,'createOrder'])->name('Admin.AddOrder');
    Route::get('/order/getaddress/{id}',[App\Http\Controllers\Admin\OrderCotroller::class,'getaddresses']);
    Route::post('/order/store',[App\Http\Controllers\Admin\OrderCotroller::class,'storeOrder'])->name('Admin.StoreOrder');
    Route::get('/order/getproductsizes/{id}',[App\Http\Controllers\Admin\OrderCotroller::class,'getprodsize']);

    // Drivers
    Route::get('/listDrivers', [App\Http\Controllers\Admin\DriverController::class, 'listAllDrivers'])->name('Admin.ViewAllDrivers');
    Route::get('/deleteDriver/{id}', [App\Http\Controllers\Admin\DriverController::class, 'deleteDriver'])->name('Admin.DeleteDriver');
    Route::get('/driver/create',[App\Http\Controllers\Admin\DriverController::class,'createDriver'])->name('Admin.AddDriver');
    Route::post('/driver/store',[App\Http\Controllers\Admin\DriverController::class,'storeDriver'])->name('Admin.StoreDriver');
    Route::get('/driver/show/{id}',[App\Http\Controllers\Admin\DriverController::class,'showDriver'])->name('Admin.ShowDriver');
    Route::get('/driver/update/{id}',[App\Http\Controllers\Admin\DriverController::class,'updateDriver'])->name('Admin.UpdateDriver');
    Route::post('/driver/edit',[App\Http\Controllers\Admin\DriverController::class,'editDriver'])->name('Admin.EditDriver');
    Route::get('/driver/orders',[App\Http\Controllers\Admin\DriverController::class,'show_new_orders'])->name('Admin.AssignOrders');
    Route::post('driver/assignorders',[App\Http\Controllers\Admin\DriverController::class,'assign_orders'])->name('Admin.AssignOrdersDrivers');
    // Reports
    Route::get('/listOrdersDone', [App\Http\Controllers\Admin\ReportController::class, 'index'])->name('Admin.ViewAllDoneOrders');
    Route::get('/export', [App\Http\Controllers\Admin\ReportController::class, 'export'])->name('Admin.ExportOrders');

    //Route::get('/settigns/Menus/add' , [App\Http\Controllers\Admin\SettingsController::class, 'addMenu'])->name('Admin.MenusAdd');




});


Route::group(['middleware' => 'Lang'], function(){
    Route::get('/', function () {
        return view('front.welcome');
    });

});

Route::get('lang/{lang}', function ($lang){
    if(in_array($lang, ['ar', 'en']))
    {
        if(auth()->user())
        {
            $user = auth()->user();
            $user->lang = $lang;
            $user->save();
        }else{
            if(session()->has('lang'))
            {
                session()->forget('lang');
            }
            session()->put('lang', $lang);
        }
    }else{
        if(auth()->user())
        {
            $user = auth()->user();
            $user->lang = 'en';
            $user->save();
        }else{
            if(session()->has('lang'))
            {
                session()->forget('lang');
            }
        session()->put('lang', 'en');
    }
}
    return back();
})->name('changeSiteLanguage');

Route::group(['prefix'=>'customer'], function () {
//  Route::get('/login', [App\Http\Controllers\CustomerAuth\LoginController::class,'showLoginForm'])->name('customer.login');
  Route::post('/login', [App\Http\Controllers\CustomerAuth\LoginController::class,'login']);
  Route::post('/logout', [App\Http\Controllers\CustomerAuth\LoginController::class,'logout'])->name('customer.logout');

//  Route::get('/register', [App\Http\Controllers\CustomerAuth\RegisterController::class,'showRegistrationForm'])->name('customer.register');
  Route::post('/register', [App\Http\Controllers\CustomerAuth\RegisterController::class,'register']);

  Route::post('/password/email', [App\Http\Controllers\CustomerAuth\ForgotPasswordController::class,'sendResetLinkEmail'])->name('customer.password.request');
  Route::post('/password/reset', [App\Http\Controllers\CustomerAuth\ResetPasswordController::class,'reset'])->name('customer.password.email');
  Route::get('/password/reset', [App\Http\Controllers\CustomerAuth\ForgotPasswordController::class,'showLinkRequestForm'])->name('customer.password.reset');
  Route::get('/password/reset/{token}', [App\Http\Controllers\CustomerAuth\ResetPasswordController::class,'showResetForm']);

});

Route::get('/registerandlogin',[App\Http\Controllers\FrontController::class,'registerandlogin'])->middleware(['customer.guest','Lang'])->name('Front.loginregister');

Route::group(['middleware'=>['customer','Lang']], function () {
    Route::get('/booking/{prod_id}',[App\Http\Controllers\FrontController::class,'booking'])->name('Front.Booknow');
    Route::post('/booking/{prod_id}',[App\Http\Controllers\FrontController::class,'savetocart']);
    Route::get('/cart',[App\Http\Controllers\FrontController::class,'showcart'])->name('Front.ShowCart');
    Route::post('/create/order',[App\Http\Controllers\FrontController::class,'creatorder']);
    Route::get('/cart/delete/{id}',[App\Http\Controllers\FrontController::class,'deletecart']);
});
