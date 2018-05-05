<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Historicos Controller
 *
 * @property \App\Model\Table\HistoricosTable $Historicos
 *
 * @method \App\Model\Entity\Historico[] paginate($object = null, array $settings = [])
 */
class HistoricosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Estados', 'Users']
        ];
        $historicos = $this->paginate($this->Historicos);

        $this->set(compact('historicos'));
        $this->set('_serialize', ['historicos']);
    }

    /**
     * View method
     *
     * @param string|null $id Historico id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $historico = $this->Historicos->get($id, [
            'contain' => ['Estados', 'Users']
        ]);

        $this->set('historico', $historico);
        $this->set('_serialize', ['historico']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $historico = $this->Historicos->newEntity();
        if ($this->request->is('post')) {
            $historico = $this->Historicos->patchEntity($historico, $this->request->getData());
            if ($this->Historicos->save($historico)) {
                $this->Flash->success(__('The historico has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The historico could not be saved. Please, try again.'));
        }
        $estados = $this->Historicos->Estados->find('list', ['limit' => 200]);
        $users = $this->Historicos->Users->find('list', ['limit' => 200]);
        $this->set(compact('historico', 'estados', 'users'));
        $this->set('_serialize', ['historico']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Historico id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $historico = $this->Historicos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $historico = $this->Historicos->patchEntity($historico, $this->request->getData());
            if ($this->Historicos->save($historico)) {
                $this->Flash->success(__('The historico has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The historico could not be saved. Please, try again.'));
        }
        $estados = $this->Historicos->Estados->find('list', ['limit' => 200]);
        $users = $this->Historicos->Users->find('list', ['limit' => 200]);
        $this->set(compact('historico', 'estados', 'users'));
        $this->set('_serialize', ['historico']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Historico id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $historico = $this->Historicos->get($id);
        if ($this->Historicos->delete($historico)) {
            $this->Flash->success(__('The historico has been deleted.'));
        } else {
            $this->Flash->error(__('The historico could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
