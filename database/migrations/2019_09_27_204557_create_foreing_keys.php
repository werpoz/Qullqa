<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeingKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users',function ($table)
        {
            $table->foreign('images_id')->references('id')->on('images');
        });

        Schema::table('products',function ($table)
        {
            $table->foreign('images_id')->references('id')->on('images');
            $table->foreign('categories_id')->references('id')->on('categories');
            $table->foreign('patterns_id')->references('id')->on('patterns');

        });

        Schema::table('prices',function ($table)
        {
            $table->foreign('products_id')->references('id')->on('products');
        });

        Schema::table('proformas',function ($table)
        {
            $table->foreign('users_id')->references('id')->on('users');
        });

        Schema::table('evidence',function ($table)
        {
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('proformas_id')->references('id')->on('users');

        });

        Schema::table('categories',function ($table)
        {
            $table->foreign('providers_id')->references('id')->on('providers');
        });


        
        Schema::table('adresses',function ($table)
        {
            $table->foreign('providers_id')->references('id')->on('providers');
            $table->foreign('clients_id')->references('id')->on('clients');
        });

        
        Schema::table('telephones',function ($table)
        {
            $table->foreign('providers_id')->references('id')->on('providers');
            $table->foreign('clients_id')->references('id')->on('clients');
        });
        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users',function ($table)
        {
            $table->dropForeign('users_images_id_foreign');
        });

        Schema::table('products',function ($table)
        {
            $table->dropForeign('products_images_id_foreign');
            $table->dropForeign('products_categories_id_foreign');
            $table->dropForeign('products_patterns_id_foreign');
        });

        Schema::table('prices',function ($table)
        {
            $table->dropForeign('prices_products_id_foreign');

        });

        Schema::table('proformas',function ($table)
        {
            $table->dropForeign('proformas_users_id_foreing');
        });

        Schema::table('evidence',function ($table)
        {
            $table->dropForeign('evidence_users_id_foreing');
            $table->dropForeign('evidence_proformas_id_foreing');

        });

        Schema::table('categories',function ($table)
        {
            $table->dropForeign('categories_providers_id_foreing');
           

        });

        Schema::table('adresses',function ($table)
        {
            $table->dropForeign('adresses_providers_id_foreing');
            $table->dropForeign('adresses_clients_id_foreing');
        });

        Schema::table('telephones',function ($table)
        {
            $table->dropForeign('telephones_providers_id_foreing');
            $table->dropForeign('telephones_clients_id_foreing');
        });
        
        
        
    }
}
