<?php

use App\Models\Career;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

//use Spatie\Permission\Models\Role;

function localImage($file, $default = '') //  get an image from the local driver
{
    if (! empty($file)) {
        return Str::of(Storage::disk('local')->url($file))->replace('storage', 'uploads');
    }

    return $default;
}

function storageImage($file, $default = '') // get the image from the storage driver
{
    if (Str::contains($file, 'picsum.photos')) {
        return $file;
    }
    if (! empty($file)) {
        return str_replace('\\', '/', Storage::disk('public')->url($file));
    }

    return $default;
}

function secToMin($seconds) // transfer from a second to a minute
{
    return $seconds / 60;
}

function newStd($array = []): stdClass  // to create a new object .. we pass an array
{                                       // then the function create the object with the same attribute
    $std = new \stdClass();            // The stdClass is the empty class in PHP which is used to cast other types to object.
    foreach ($array as $key => $value) {
        $std->$key = $value;
    }

    return $std;
}

function getUsers()
{
    return User::all();
}

function getRoles()
{
    return Role::all();
}

//function getProfessionVariables(): array
//{
//    $Graphic_Designer = newStd(
//        [
//            'name' => 'Graphic Designer',
////            'title' => 'Graphic Designer',
//            'value' => Career::Graphic_Designer,
////            'id' => Career::Graphic_Designer,
//        ]);
//    $Front_End_Developer = newStd(
//        [
//            'name' => 'Front End Developer',
////            'title' => 'Front End Developer',
//            'value' => Career::Front_End_Developer,
////            'id' => Career::Front_End_Developer,
//        ]);
//    $Back_End_Developer = newStd(
//        [
//            'name' => 'Back End Developer',
////            'title' => 'Back_End_Developer',
//            'value' => Career::Back_End_Developer,
////            'id' => Career::Back_End_Developer,
//        ]);
//    $Full_Stack_Web_Developer = newStd(
//        [
//            'name' => 'Full Stack Web Developer',
////            'title' => 'Full Stack Web Developer',
//            'value' => Career::Full_Stack_Web_Developer,
////            'id' => Career::Full_Stack_Web_Developer,
//        ]);
//    $Mobile_App_Developer = newStd(
//        [
//            'name' => 'Mobile App Developer',
////            'title' => 'Mobile App Developer',
//            'value' => Career::Mobile_App_Developer,
////            'id' => Career::Mobile_App_Developer,
//        ]);
//
//    return [$Graphic_Designer, $Front_End_Developer, $Back_End_Developer, $Full_Stack_Web_Developer, $Mobile_App_Developer];
//}

function getCareerStatusVariables(): array
{
    $Career_Hidden = newStd(
        [
            'name' => 'Career Hidden',
            'value' => Career::Career_Hidden,
        ]);
    $Career_Visible = newStd(
        [
            'name' => 'Career Visible',
            'value' => Career::Career_Visible,
        ]);

    return [$Career_Hidden, $Career_Visible];
}

function getEmployeeStatusVariables(): array
{
    $Employee_Rejected = newStd(
        [
            'name' => 'Employee Rejected',
            'value' => Employee::Employee_Rejected,
        ]);
    $Employee_Approved = newStd(
        [
            'name' => 'Employee Approved',
            'value' => Employee::Employee_Approved,
        ]);

    return [$Employee_Rejected, $Employee_Approved];
}
