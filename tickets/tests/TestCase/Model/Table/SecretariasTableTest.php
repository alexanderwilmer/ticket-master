<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SecretariasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SecretariasTable Test Case
 */
class SecretariasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SecretariasTable
     */
    public $Secretarias;

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
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Secretarias') ? [] : ['className' => 'App\Model\Table\SecretariasTable'];
        $this->Secretarias = TableRegistry::get('Secretarias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Secretarias);

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
