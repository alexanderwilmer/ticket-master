<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Mensajes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Emisors
 * @property \Cake\ORM\Association\BelongsTo $Receptors
 *
 * @method \App\Model\Entity\Mensaje get($primaryKey, $options = [])
 * @method \App\Model\Entity\Mensaje newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Mensaje[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Mensaje|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mensaje patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Mensaje[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Mensaje findOrCreate($search, callable $callback = null, $options = [])
 */
class MensajesTable extends Table
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

        $this->setTable('mensajes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

      




        $this->belongsTo('responsable', [
    'className' => 'Users',
    'foreignKey' => 'emisor_id',
    'propertyName' => 'responsables',
 
]);  



    $this->belongsTo('emisor', [
    'className' => 'Users',
    'foreignKey' => 'responsable_id',
    'propertyName' => 'emisor',
 
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
            ->allowEmpty('mensaje');
 

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
   
}
