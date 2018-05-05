<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contratiempos Model
 *
 * @property \Cake\ORM\Association\HasMany $Tickets
 *
 * @method \App\Model\Entity\Contratiempo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Contratiempo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Contratiempo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Contratiempo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contratiempo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Contratiempo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Contratiempo findOrCreate($search, callable $callback = null, $options = [])
 */
class ContratiemposTable extends Table
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

        $this->setTable('contratiempos');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Tickets', [
            'foreignKey' => 'contratiempo_id'
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

        $validator
            ->allowEmpty('descripcion');

        return $validator;
    }
}
