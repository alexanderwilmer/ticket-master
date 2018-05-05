<?php
namespace App\Test\TestCase\Controller;

use App\Controller\SecretariasController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\SecretariasController Test Case
 */
class SecretariasControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.secretarias',
        'app.tickets',
        'app.estados',
        'app.historicos',
        'app.prioridads',
        'app.departamentos',
        'app.users',
        'app.contratiempos',
        'app.ticket_asignados'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
