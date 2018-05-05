<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Permisos Controller
 *
 * @property \App\Model\Table\PermisosTable $Permisos
 */
class PermisosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
     private $_LisPermisos=1;
    public function initialize()
    {
        parent::initialize();
        //Retorna una lista de permisos relacionado al rol del usuario 
        $this->_LisPermisos= $this->getPermisos();   

    }

    public function index()
    {

        //Se invoca el metodo para validar si tiene permiso de entrar en esta acción, se define el id del modulo -1  y la acción a realizar
        $this->IsAutirizado($this->_LisPermisos[0]["view"]);  

        $this->paginate = [
            'contain' => ['Rols', 'Modulos']
        ];
      //  $permisos = $this->paginate($this->Permisos);
                $Permisos =  $this->Permisos->find('all',['contain' =>['Rols', 'Modulos']]);
        
        $this->set(compact('permisos'));
        $this->set('_serialize', ['permisos']);
    }

    /**
     * View method
     *
     * @param string|null $id Permiso id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        //Se invoca el metodo para validar si tiene permiso de entrar en esta acción, se define el id del modulo -1  y la acción a realizar
        $this->IsAutirizado($this->_LisPermisos[0]["view"]);  



        $permiso = $this->Permisos->get($id, [
            'contain' => ['Rols', 'Modulos']
        ]);

        $this->set('permiso', $permiso);
        $this->set('_serialize', ['permiso']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {


        //Se invoca el metodo para validar si tiene permiso de entrar en esta acción, se define el id del modulo -1  y la acción a realizar
        $this->IsAutirizado($this->_LisPermisos[0]["agregar"]);  

        $permiso = $this->Permisos->newEntity();
        if ($this->request->is('post')) {
            $permiso = $this->Permisos->patchEntity($permiso, $this->request->data);
            if ($this->Permisos->save($permiso)) {
                $this->Flash->success(__('The permiso has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The permiso could not be saved. Please, try again.'));
            }
        }
        $rols = $this->Permisos->Rols->find('list', ['limit' => 200]);
        $modulos = $this->Permisos->Modulos->find('list', ['limit' => 200]);
        $this->set(compact('permiso', 'rols', 'modulos'));
        $this->set('_serialize', ['permiso']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Permiso id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {


        //Se invoca el metodo para validar si tiene permiso de entrar en esta acción, se define el id del modulo -1  y la acción a realizar
        $this->IsAutirizado($this->_LisPermisos[0]["editar"]);  
    
        $permiso = $this->Permisos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $permiso = $this->Permisos->patchEntity($permiso, $this->request->data);
            if ($this->Permisos->save($permiso)) {
                $this->Flash->success(__('The permiso has been saved.'));

             //   return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The permiso could not be saved. Please, try again.'));
            }
        }
        $rols = $this->Permisos->Rols->find('list', ['limit' => 200]);
        $modulos = $this->Permisos->Modulos->find('list', ['limit' => 200]);
        $this->set(compact('permiso', 'rols', 'modulos'));
        $this->set('_serialize', ['permiso']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Permiso id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {

        //Se invoca el metodo para validar si tiene permiso de entrar en esta acción, se define el id del modulo -1  y la acción a realizar
        $this->IsAutirizado($this->_LisPermisos[0]["eliminar"]);  
    
        $this->request->allowMethod(['post', 'delete']);
        $permiso = $this->Permisos->get($id);
        if ($this->Permisos->delete($permiso)) {
            $this->Flash->success(__('The permiso has been deleted.'));
        } else {
            $this->Flash->error(__('The permiso could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
