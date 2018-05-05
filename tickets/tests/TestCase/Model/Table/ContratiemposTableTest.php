<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContratiemposTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContratiemposTable Test Case
 */
class ContratiemposTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ContratiemposTable
     */
    public $Contratiempos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.contratiempos',
        'app.tickets',
        'app.estados',
        'app.historicos',
        'app.prioridads',
        'app.departamentos',
        'app.users',
        'app.secretarias',
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
        $config = TableRegistry::exists('Contratiempos') ? [] : ['className' => 'App\Model\Table\ContratiemposTable'];
        $this->Contratiempos = TableRegistry::get('Contratiempos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Contratiempos);

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
