<?php
namespace App\Test\TestCase\Controller;

use App\Controller\HistoricosController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\HistoricosController Test Case
 */
class HistoricosControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.historicos',
        'app.estados',
        'app.tickets',
        'app.prioridads',
        'app.departamentos',
        'app.users',
        'app.rols',
        'app.ticket_asignados',
        'app.secretarias',
        'app.contratiempos'
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
