<?php
namespace App\Test\TestCase\Controller;

use App\Controller\DepartamentosController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\DepartamentosController Test Case
 */
class DepartamentosControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.departamentos',
        'app.tickets',
        'app.estados',
        'app.historicos',
        'app.prioridads',
        'app.users',
        'app.secretarias',
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
