<?php

use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
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
        });
        Employee::create([
            "name" => 'Rasul',
            "phone" => '+998999541667',
            "password" => Hash::make('12345'),
        ]);
        Employee::create([
            "name" => 'Ashirbek',
            "phone" => '+998883545350',
            "password" => Hash::make('12345'),
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
