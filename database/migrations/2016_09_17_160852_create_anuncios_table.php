<?php



use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



class CreateAnunciosTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('anuncios', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('cidade_id');

            $table->integer('ddd');

            $table->integer('user_id');

            $table->integer('categoria_id');

            $table->integer('moeda_id');

            $table->integer('forma_de_entrega_id');

            $table->string('titulo');

            $table->text('descricao', 4096);

            $table->float('valor', 12, 2);

            $table->string('condicao');

            $table->integer('status_id');

            $table->integer('tipo');

            $table->integer('views');

            $table->integer('gostei');

            $table->integer('nao_gostei');

            $table->integer('contato_email');
            $table->integer('contato_fone1');
            $table->integer('contato_whatsapp');            
            $table->integer('contato_facebook');
            $table->integer('contato_mensagem');

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

        Schema::drop('anuncios');

    }

}

