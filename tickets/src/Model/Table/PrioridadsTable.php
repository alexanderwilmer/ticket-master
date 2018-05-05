<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Prioridads Model
 *
 * @property \Cake\ORM\Association\HasMany $Tickets
 *
 * @method \App\Model\Entity\Prioridad get($primaryKey, $options = [])
 * @method \App\Model\Entity\Prioridad newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Prioridad[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Prioridad|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Prioridad patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Prioridad[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Prioridad findOrCreate($search, callable $callback = null, $options = [])
 */
class PrioridadsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('prioridads');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Tickets', [
            'foreignKey' => 'prioridad_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('name');

        return $validator;
    }
}
