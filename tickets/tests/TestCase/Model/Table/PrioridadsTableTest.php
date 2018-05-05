<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrioridadsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrioridadsTable Test Case
 */
class PrioridadsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PrioridadsTable
     */
    public $Prioridads;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.prioridads',
        'app.tickets',
        'app.estados',
        'app.historicos',
        'app.departamentos',
        'app.users',
        'app.secretarias',
        'app.contratiempos',
        'app.ticket_asignados'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Prioridads') ? [] : ['className' => 'App\Model\Table\PrioridadsTable'];
        $this->Prioridads = TableRegistry::get('Prioridads', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Prioridads);

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
}
