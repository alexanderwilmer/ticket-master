<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Secretarias Model
 *
 * @property \Cake\ORM\Association\HasMany $Tickets
 *
 * @method \App\Model\Entity\Secretaria get($primaryKey, $options = [])
 * @method \App\Model\Entity\Secretaria newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Secretaria[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Secretaria|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Secretaria patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Secretaria[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Secretaria findOrCreate($search, callable $callback = null, $options = [])
 */
class SecretariasTable extends Table
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

        $this->setTable('secretarias');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Tickets', [
            'foreignKey' => 'secretaria_id'
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
