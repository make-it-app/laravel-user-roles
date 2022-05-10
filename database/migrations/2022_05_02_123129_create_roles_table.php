<?php

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
        Schema::connection( 'public' )->create( 'roles', function ( Blueprint $table )
        {
            $table->bigIncrements( 'id' );
            $table->string( 'name' );
            $table->string( 'label' )->nullable();
            $table->string( 'comment' )->nullable();
            $table->boolean( 'is_protected' )->default( false )->index();
            $table->timestamps();
            $table->softDeletes();
        } );
        Schema::connection( 'public' )->create( 'role_user', function ( Blueprint $table )
        {
            $table->bigInteger( 'role_id' );
            $table->uuid( 'user_id' );
            $table->primary( [
                'role_id',
                'user_id',
            ] );
            $table->foreign( 'role_id' )->references( 'id' )->on( 'roles' )->onDelete( 'cascade' );
            $table->foreign( 'user_id' )->references( 'id' )->on( 'users' )->onDelete( 'cascade' );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection( 'public' )->drop( 'role_user' );
        Schema::connection( 'public' )->drop( 'roles' );
    }
};
