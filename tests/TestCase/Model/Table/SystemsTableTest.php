<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SystemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SystemsTable Test Case
 */
class SystemsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SystemsTable
     */
    protected $Systems;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Systems',
        'app.Users',
        'app.Activities',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Systems') ? [] : ['className' => SystemsTable::class];
        $this->Systems = TableRegistry::getTableLocator()->get('Systems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Systems);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
