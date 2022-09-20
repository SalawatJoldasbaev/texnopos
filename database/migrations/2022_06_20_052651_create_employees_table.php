<?php

use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone', 13)->unique();
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();
        });
        Employee::create([
            "name" => 'Rasul',
            "phone" => '+998900957117',
            "password" => Hash::make('7117'),
        ]);

        Employee::create([
            "name" => 'Telegram bot',
            "phone" => '+998907091931',
            "password" => Hash::make('7117'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
