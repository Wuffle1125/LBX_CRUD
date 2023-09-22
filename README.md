<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Instruction of Laravel API Router

I have implemented LBX test project using Laravel 10 framework. I have implemented API resource router to integrate this to outside frontend area in api.php file.

```
Route::apiResource('employee', EmployeeController::class);
```

And I have built Employee Model for saving employeer's info and EmployeeController to process the all api requests.

```
Schema::create('employees', function (Blueprint $table) {
    $table->id();
    $table->string('name_prefix');
    $table->string('first_name');
    $table->string('middle_initial');
    $table->string('last_name');
    $table->string('gender');
    $table->string('e_mail');
    $table->date('date_of_birth');
    $table->time('time_of_birth');
    $table->integer('age');
    $table->date('date_of_joining');
    $table->integer('age_in_company');
    $table->string('phone_no');
    $table->string('place_name');
    $table->string('county');
    $table->string('city');
    $table->string('zip');
    $table->string('region');
    $table->string('username');
    $table->timestamps();
});
```
``- Store the employee infos``

```
public function store(Request $request)
{
    //
    $request->validate([
        'csv_file' => 'required|file|mimes:csv,txt',
    ]);

    // Get the uploaded file
    $file = $request->file('csv_file');

    $csv = array_map('str_getcsv', file($file));
    foreach ($csv as $row) {
        Employee::create([
            'id' => $row[0],
            'name_prefix' => $row[1],
            'first_name' => $row[1],
            'middle_initial' => $row[1],
            'last_name' => $row[1],
            'gender' => $row[1],
            'e_mail' => $row[1],
            'date_of_birth' => $row[1],
            'time_of_birth' => $row[1],
            'age' => $row[1],
            'date_of_joining' => $row[1],
            'age_in_company' => $row[1],
            'phone_no' => $row[1],
            'place_name' => $row[1],
            'county' => $row[1],
            'city' => $row[1],
            'zip' => $row[1],
            'region' => $row[1],
            'username' => $row[1],
        ]);
    }

    return redirect()->back()->with('success', 'CSV data imported successfully');
}
```

## Commands

run: ``php artisan serve``

You can input this command in terminal panel of root direction - ``php artisan serve``.
And after that, you can test this project using Postman.

```
POST /api/employee
GET /api/employee
GET /api/employee/{id}
DELETE /api/employee/{id}
```