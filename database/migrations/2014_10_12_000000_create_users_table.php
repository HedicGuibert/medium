<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table
                ->string('facebookUrl')
                ->nullable()
                ->default(null)
            ;
            $table
                ->string('linkedInUrl')
                ->nullable()
                ->default(null)
            ;
            $table
                ->string('twitterUrl')
                ->nullable()
                ->default(null)
            ;
            $table->integer('role')->default(User::ROLE_USER);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
