<?php

use Illuminate\Support\Facades\Route;
use App\Models\Module;
// use Auth;
// use DB;
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

// Route::get('/', function () {
//     return view('base.main');
// });

 
Route::get('/clear-all', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('cache:clear');
    dd("cache, route and config are cleared!");
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// route::group(['middleware'=> ['auth', 'CheckUrlAccess'],'prefix'=> 'admin'], function(){
//  });
route::group(['middleware'=> ['auth', 'CheckUrlAccess']], function(){
    Route::get('/', function () {

    
    return view('layouts.main');
});

       view()->composer('*',function($view){
    //        $modulesAll=Module::where('parent_id',0)->get();
    //         foreach ($modulesAll as $module) 
    //           {
    //          $module->children = Module::where('parent_id',$module->id)->where('visibility', '=', 1)->get();
    //           }
    //    $view->with('modulesAll',$modulesAll);
       if (Auth::check())
{
   $role_id = Auth::user()->role_id;
        $modulesAll = DB::table('modules')
        ->join('permissions', 'modules.id', '=', 'permissions.module_id')//perm instad of module_right
        ->where('parent_id',0)
        ->where('role_id', '=', $role_id)
        ->get();

        foreach ($modulesAll as $module) {
            $module->children = DB::table('modules')
            ->join('permissions', 'modules.id', '=', 'permissions.module_id')//perm instad of module_right
            ->where('parent_id', $module->module_id)
            ->where('visibility', 1)
            ->where('role_id', '=', $role_id)
            ->get();
        }
        $view->with('modulesAll',$modulesAll);
}else{
    return redirect()->route('login');
}
        

       
        });
//@@@@@@@@@@@@@@@@@@@@@@@$ for resource routes $@@@@@@@@@@@@@@@@@@@@@@@@@
Route::resource('users','App\Http\Controllers\UserController'); //done
Route::resource('modules','App\Http\Controllers\ModuleController'); //done
// Route::resource('permissions','App\Http\Controllers\PermissionController');
Route::resource('roles','App\Http\Controllers\RoleController'); //roles
Route::resource('students','App\Http\Controllers\StudentController'); //done
Route::resource('bloods','App\Http\Controllers\BloodGroupController'); //done
Route::resource('casts','App\Http\Controllers\CastController'); // done
Route::resource('religions','App\Http\Controllers\ReligionController'); //done
Route::resource('cities','App\Http\Controllers\CityController'); //done
Route::resource('provinces','App\Http\Controllers\ProvinceController'); //done
Route::resource('countries','App\Http\Controllers\CountryController'); //done
Route::resource('levels','App\Http\Controllers\LevelController'); //done
Route::resource('sections','App\Http\Controllers\SectionController'); //done
Route::resource('sessions','App\Http\Controllers\SessionController'); //done
Route::resource('free_classes','App\Http\Controllers\FreeClassController'); //done
Route::resource('class_section_session','App\Http\Controllers\ClassSectionSessionController'); //done
Route::resource('schools','App\Http\Controllers\SchoolController'); //done
Route::resource('campuses','App\Http\Controllers\CampusController'); // done
Route::resource('branches','App\Http\Controllers\BranchController'); //done
Route::resource('banks','App\Http\Controllers\BankController'); // done
Route::resource('bank_accounts','App\Http\Controllers\BankAccountController'); // done
Route::resource('departments','App\Http\Controllers\DepartmentController'); // done
Route::resource('designations','App\Http\Controllers\DesignationController'); // done
Route::resource('enrollments','App\Http\Controllers\EnrollmentRegisterController'); // done
Route::resource('examtypes','App\Http\Controllers\ExamTypeController'); //done
Route::resource('exams','App\Http\Controllers\ExaminationController'); //done
Route::resource('expenses','App\Http\Controllers\ExpenseController'); //done
Route::resource('expense_categories','App\Http\Controllers\ExpenseCategoryController'); //done 
Route::resource('fees','App\Http\Controllers\FeeController'); //done
Route::resource('fee_categories','App\Http\Controllers\FeeCategoryController'); //done
Route::resource('grades','App\Http\Controllers\GradeController'); //done
Route::resource('healths','App\Http\Controllers\HealthController'); //done
Route::resource('occupations','App\Http\Controllers\OccupationController'); //done
Route::resource('class_tarrifs','App\Http\Controllers\ClassTarrifController'); //done
Route::resource('fee_tarrifs','App\Http\Controllers\FeeTarrifController'); //done
Route::resource('fee_structures','App\Http\Controllers\FeeStructureController'); //done
Route::resource('staff_categories','App\Http\Controllers\StaffCategoryController'); //done
Route::resource('staffs','App\Http\Controllers\StaffController'); //done
Route::resource('dmos','App\Http\Controllers\DmoModelController'); //done

//@@@@@@@@@@@@@@@@@@@@@@@$End of resource routes $@@@@@@@@@@@@@@@@@@@@@@@@@
// ================For every model Delete======================
Route::get('staff-delete/{id}', [App\Http\Controllers\StaffController::class, 'destroy'])->name('staff-delete.destroy');
Route::get('staff_category-delete/{id}', [App\Http\Controllers\StaffCategoryController::class, 'destroy'])->name('staff_category.destroy');
Route::get('class_tarrif-delete/{id}', [App\Http\Controllers\ClassTarrifController::class, 'destroy'])->name('class_tarrif.destroy');
Route::get('fee-delete/{id}', [App\Http\Controllers\FeeController::class, 'destroy'])->name('fee-delete.destroy');
Route::get('bank-delete/{id}', [App\Http\Controllers\BankController::class, 'destroy'])->name('bank-delete.destroy');
Route::get('expense_category-delete/{id}', [App\Http\Controllers\ExpenseCategoryController::class, 'destroy'])->name('expense_category-delete.destroy');
Route::get('fee_category-delete/{id}', [App\Http\Controllers\FeeCategoryController::class, 'destroy'])->name('fee_category-delete.destroy');
Route::get('grade-delete/{id}', [App\Http\Controllers\GradeController::class, 'destroy'])->name('grade-delete.destroy');
Route::get('occupation-delete/{id}', [App\Http\Controllers\OccupationController::class, 'destroy'])->name('occupation-delete.destroy');
Route::get('health-delete/{id}', [App\Http\Controllers\HealthController::class, 'destroy'])->name('health-delete.destroy');
Route::get('examtype-delete/{id}', [App\Http\Controllers\ExamTypeController::class, 'destroy'])->name('examtype-delete.destroy');
Route::get('enrollment-delete/{id}', [App\Http\Controllers\EnrollmentRegisterController::class, 'destroy'])->name('enrollment-delete.destroy');
Route::get('department-delete/{id}', [App\Http\Controllers\DepartmentController::class, 'destroy'])->name('department-delete.destroy');
Route::get('designation-delete/{id}', [App\Http\Controllers\DesignationController::class, 'destroy'])->name('designation-delete.destroy');
Route::get('campus-delete/{id}', [App\Http\Controllers\CampusController::class, 'destroy'])->name('campus-delete.destroy');
Route::get('student-delete/{id}', [App\Http\Controllers\StudentController::class, 'destroy'])->name('student-delete.destroy');
Route::get('section-delete/{id}', [App\Http\Controllers\SectionController::class, 'destroy'])->name('section-delete.destroy');
Route::get('school-delete/{id}', [App\Http\Controllers\SchoolController::class, 'destroy'])->name('school-delete.destroy');
Route::get('religion-delete/{id}', [App\Http\Controllers\ReligionController::class, 'destroy'])->name('religion-delete.destroy');
Route::get('province-delete/{id}', [App\Http\Controllers\ProvinceController::class, 'destroy'])->name('province-delete.destroy');
Route::get('country-delete/{id}', [App\Http\Controllers\CountryController::class, 'destroy'])->name('country-delete.destroy');
Route::get('class-delete/{id}', [App\Http\Controllers\LevelController::class, 'destroy'])->name('class-delete.destroy');
Route::get('city-delete/{id}', [App\Http\Controllers\CityController::class, 'destroy'])->name('city-delete.destroy');
Route::get('cast-delete/{id}', [App\Http\Controllers\CastController::class, 'destroy'])->name('cast-delete.destroy');
Route::get('blood-delete/{id}', [App\Http\Controllers\BloodGroupController::class, 'destroy'])->name('blood-delete.destroy');
Route::get('modules-delete/{id}', [App\Http\Controllers\ModuleController::class, 'destroy'])->name('modules-delete.destroy');
Route::get('roles-delete/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('roles-delete.destroy');
Route::get('users-delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users-delete.destroy');
Route::get('bank_accounts-delete/{id}', [App\Http\Controllers\BankAccountController::class, 'destroy'])->name('bank_accounts-delete.destroy');
// get branch code through ajax
Route::get('getBranch', [App\Http\Controllers\BranchController::class, 'getBranch'])->name('get.Branch');
Route::get('getFee', [App\Http\Controllers\FeeTarrifController::class, 'getFee'])->name('get.Fee');

Route::get('feeDetail', [App\Http\Controllers\FeeTarrifController::class, 'feeDetail'])->name('feeDetail');
Route::get('getCSS', [App\Http\Controllers\FeeTarrifController::class, 'getCSS'])->name('getCSS');
Route::post('dataSubmit', [App\Http\Controllers\FeeTarrifController::class, 'dataSubmit'])->name('dataSubmit');
Route::get('dataGet', [App\Http\Controllers\FeeTarrifController::class, 'dataGet'])->name('dataGet');
Route::get('classWiseRecord', [App\Http\Controllers\FeeTarrifController::class, 'classWiseRecord'])->name('classWiseRecord');
// ===========================payment fee=======================
Route::get('paymentFee', [App\Http\Controllers\FeeStructureController::class, 'paymentFee'])->name('paymentFee');
Route::get('feeDetailGet', [App\Http\Controllers\FeeStructureController::class, 'feeDetailGet'])->name('feeDetailGet');
Route::get('getStudentRecord', [App\Http\Controllers\FeeStructureController::class, 'getStudentRecord'])->name('getStudentRecord');
Route::get('getfeePayment/{id}', [App\Http\Controllers\FeeStructureController::class, 'getfeePayment'])->name('getfeePayment');
Route::post('paidPayment', [App\Http\Controllers\FeeStructureController::class, 'paidPayment'])->name('paidPayment');
// ================For every model Delete======================
// ================For Attendance======================
Route::resource('student_attendances','App\Http\Controllers\StudentAttendanceController'); //

Route::get('att_list', [App\Http\Controllers\StudentAttendanceController::class, 'attendanceList'])->name('att_list');
Route::get('att_list_show', [App\Http\Controllers\StudentAttendanceController::class, 'attendanceListShow'])->name('att_list_show');

Route::get('sessionList', [App\Http\Controllers\StudentAttendanceController::class, 'sessionList'])->name('sessionList');
Route::get('sectionList', [App\Http\Controllers\StudentAttendanceController::class, 'sectionList'])->name('sectionList');
Route::get('sectionListShow', [App\Http\Controllers\StudentAttendanceController::class, 'sectionListShow'])->name('sectionListShow');
Route::post('submitAttendance', [App\Http\Controllers\StudentAttendanceController::class, 'submitAttendance'])->name('submitAttendance');
// ================For Attendance======================
// ================For Staff Attendance======================
Route::resource('staff_attendances','App\Http\Controllers\StaffAttendanceController'); //
Route::get('staff_attendance_list', [App\Http\Controllers\StaffAttendanceController::class, 'staffAttendanceList'])->name('staff_attendance_list');
Route::get('add_attendance', [App\Http\Controllers\StaffAttendanceController::class, 'addStaffAttendance'])->name('add_attendance');

// get staff
Route::get('staffCommonList', [App\Http\Controllers\StaffAttendanceController::class, 'staffCommonList'])->name('staffCommonList');
Route::get('staffListShow', [App\Http\Controllers\StaffAttendanceController::class, 'staffListShow'])->name('staffListShow');
Route::post('submitStaffAttendance', [App\Http\Controllers\StaffAttendanceController::class, 'submitStaffAttendance'])->name('submitStaffAttendance');
// ================For Staff Attendance======================

});



Route::get('/routes', function () {
    $routeCollection = Route::getRoutes();

    echo "<table style='width:100%'>";
    echo "<tr>";
    echo "<td width='10%'><h4>HTTP Method</h4></td>";
    echo "<td width='10%'><h4>Route</h4></td>";
    echo "<td width='10%'><h4>Name</h4></td>";
    echo "<td width='70%'><h4>Corresponding Action</h4></td>";
    echo "</tr>";
    foreach ($routeCollection as $value) {
        echo "<tr>";
        echo "<td>" . $value->methods()[0] . "</td>";
        echo "<td>" . $value->uri() . "</td>";
        echo "<td>" . $value->getName() . "</td>";
        echo "<td>" . $value->getActionName() . "</td>";
        echo "</tr>";
    }
    echo "</table>";
});