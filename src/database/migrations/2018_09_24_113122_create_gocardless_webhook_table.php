<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGocardlessWebhookTable extends Migration
{
    protected $tableName;

    /**
     * CreateGocardlessTransactionsTable constructor.
     */
    public function __construct()
    {
        $this->tableName = gocardless_table_prefix('gocardless_webhooks');
    }


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('data');
            $table->string('ip');
            $table->string('url');
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
        Schema::dropIfExists($this->tableName);
    }
}
