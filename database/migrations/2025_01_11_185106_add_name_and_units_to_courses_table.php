<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('courses', function (Blueprint $table) {
        $table->renameColumn('course_name', 'name'); // تغییر نام ستون
    });
}

public function down()
{
    Schema::table('courses', function (Blueprint $table) {
        $table->renameColumn('name', 'course_name'); // بازگشت به نام قبلی
    });
}

};
