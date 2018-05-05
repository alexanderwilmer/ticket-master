<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Prioridads Controller
 *
 * @property \App\Model\Table\PrioridadsTable $Prioridads
 *
 * @method \App\Model\Entity\Prioridad[] paginate($object = null, array $settings = [])
 */
class PrioridadsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $prioridads = $this->paginate($this->Prioridads);

        $this->set(compact('prioridads'));
        $this->set('_serialize', ['prioridads']);
    }

    /**
     * View method
     *
     * @param string|null $id Prioridad id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $prioridad = $this->Prioridads->get($id, [
            'contain' => ['Tickets']
        ]);

        $this->set('prioridad', $prioridad);
        $this->set('_serialize', ['prioridad']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $prioridad = $this->Prioridads->newEntity();
        if ($this->request->is('post')) {
            $prioridad = $this->Prioridads->patchEntity($prioridad, $this->request->getData());
            if ($this->Prioridads->save($prioridad)) {
                $this->Flash->success(__('The prioridad has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prioridad could not be saved. Please, try again.'));
        }
        $this->set(compact('prioridad'));
        $this->set('_serialize', ['prioridad']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Prioridad id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $prioridad = $this->Prioridads->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $prioridad = $this->Prioridads->patchEntity($prioridad, $this->request->getData());
            if ($this->Prioridads->save($prioridad)) {
                $this->Flash->success(__('The prioridad has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prioridad could not be saved. Please, try again.'));
        }
        $this->set(compact('prioridad'));
        $this->set('_serialize', ['prioridad']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Prioridad id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $prioridad = $this->Prioridads->get($id);
        if ($this->Prioridads->delete($prioridad)) {
            $this->Flash->success(__('The prioridad has been deleted.'));
        } else {
            $this->Flash->error(__('The prioridad could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
