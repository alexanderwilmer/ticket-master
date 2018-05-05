<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Departamentos Controller
 *
 * @property \App\Model\Table\DepartamentosTable $Departamentos
 *
 * @method \App\Model\Entity\Departamento[] paginate($object = null, array $settings = [])
 */
class DepartamentosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $departamentos = $this->paginate($this->Departamentos);

        $this->set(compact('departamentos'));
        $this->set('_serialize', ['departamentos']);
    }

    /**
     * View method
     *
     * @param string|null $id Departamento id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $departamento = $this->Departamentos->get($id, [
            'contain' => ['Tickets', 'Users']
        ]);

        $this->set('departamento', $departamento);
        $this->set('_serialize', ['departamento']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $departamento = $this->Departamentos->newEntity();
        if ($this->request->is('post')) {
            $departamento = $this->Departamentos->patchEntity($departamento, $this->request->getData());
            if ($this->Departamentos->save($departamento)) {
                $this->Flash->success(__('The departamento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The departamento could not be saved. Please, try again.'));
        }
        $this->set(compact('departamento'));
        $this->set('_serialize', ['departamento']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Departamento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $departamento = $this->Departamentos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $departamento = $this->Departamentos->patchEntity($departamento, $this->request->getData());
            if ($this->Departamentos->save($departamento)) {
                $this->Flash->success(__('The departamento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The departamento could not be saved. Please, try again.'));
        }
        $this->set(compact('departamento'));
        $this->set('_serialize', ['departamento']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Departamento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $departamento = $this->Departamentos->get($id);
        if ($this->Departamentos->delete($departamento)) {
            $this->Flash->success(__('The departamento has been deleted.'));
        } else {
            $this->Flash->error(__('The departamento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
