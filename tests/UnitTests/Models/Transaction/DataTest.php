<?php
namespace Midnite81\GoCardless\Tests\Models\Transaction;

use Illuminate\Database\Eloquent\Model;
use Midnite81\GoCardless\Models\Transaction;
use Midnite81\GoCardless\Models\Transaction\Data as DataModel;
use Midnite81\GoCardless\Tests\BaseTestCase;
use Midnite81\GoCardless\Tests\TestCases\ModelTestCase;

class DataTest extends ModelTestCase
{
    protected function setUp()
    {
        parent::setUp();
        $this->model = new DataModel();
    }

    /**
     * @test
     */
    public function it_is_an_instance_of_model()
    {
        $this->assertInstanceOf(Model::class, $this->model);
    }

    /**
     * @test
     */
    public function it_has_transaction_relationship_set_up_correctly()
    {
        $this->belongsTo('transaction', Transaction::class);
    }
}