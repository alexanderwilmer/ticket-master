<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TicketAsignadosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TicketAsignadosTable Test Case
 */
class TicketAsignadosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TicketAsignadosTable
     */
    public $TicketAsignados;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ticket_asignados',
        'app.tickets',
        'app.estados',
        'app.historicos',
        'app.users',
        'app.departamentos',
        'app.rols',
        'app.prioridads',
        'app.secretarias',
        'app.contratiempos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TicketAsignados') ? [] : ['className' => 'App\Model\Table\TicketAsignadosTable'];
        $this->TicketAsignados = TableRegistry::get('TicketAsignados', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TicketAsignados);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
