<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tickets Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Estados
 * @property \Cake\ORM\Association\BelongsTo $Prioridads
 * @property \Cake\ORM\Association\BelongsTo $Departamentos
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Secretarias
 * @property \Cake\ORM\Association\BelongsTo $Contratiempos
 * @property \Cake\ORM\Association\HasMany $TicketAsignados
 *
 * @method \App\Model\Entity\Ticket get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ticket newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ticket[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ticket|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ticket patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ticket[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ticket findOrCreate($search, callable $callback = null, $options = [])
 */
class TicketsTable extends Table
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

        $this->setTable('tickets');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Estados', [
            'foreignKey' => 'estado_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Prioridads', [
            'foreignKey' => 'prioridad_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Departamentos', [
            'foreignKey' => 'departamento_id'
        ]);
   $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);

/*
$this->belongsTo('Users', [
    'className' => 'Users',
    'foreignKey' => 'user_id',
    'propertyName' => 'users',
    
]);*/

        $this->belongsTo('responsable', [
    'className' => 'Users',
    'foreignKey' => 'responsable',
    'propertyName' => 'responsables',
 
]);    

                $this->belongsTo('Estados', [
    'className' => 'Estados',
    'foreignKey' => 'estado_id',
    'propertyName' => 'estadohistorico',
 
]);


         $this->belongsTo('Estados', [
            'foreignKey' => 'estado_id'
        ]);

        $this->belongsTo('Secretarias', [
            'foreignKey' => 'secretaria_id'
        ]);
        $this->belongsTo('Contratiempos', [
            'foreignKey' => 'contratiempo_id'
        ]);
        $this->hasMany('TicketAsignados', [
            'foreignKey' => 'ticket_id'
        ]);
        $this->hasMany('Historicos', [
            'foreignKey' => 'ticket_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('descripcion', 'create')
            ->notEmpty('descripcion');

    

 
      

         
  
        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['estado_id'], 'Estados'));
        $rules->add($rules->existsIn(['prioridad_id'], 'Prioridads'));
        $rules->add($rules->existsIn(['departamento_id'], 'Departamentos'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['secretaria_id'], 'Secretarias'));
        $rules->add($rules->existsIn(['contratiempo_id'], 'Contratiempos'));

        return $rules;
    }
}
