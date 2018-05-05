<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Secretarias Controller
 *
 * @property \App\Model\Table\SecretariasTable $Secretarias
 *
 * @method \App\Model\Entity\Secretaria[] paginate($object = null, array $settings = [])
 */
class SecretariasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $secretarias = $this->paginate($this->Secretarias);

        $this->set(compact('secretarias'));
        $this->set('_serialize', ['secretarias']);
    }

    /**
     * View method
     *
     * @param string|null $id Secretaria id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $secretaria = $this->Secretarias->get($id, [
            'contain' => ['Tickets']
        ]);

        $this->set('secretaria', $secretaria);
        $this->set('_serialize', ['secretaria']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $secretaria = $this->Secretarias->newEntity();
        if ($this->request->is('post')) {
            $secretaria = $this->Secretarias->patchEntity($secretaria, $this->request->getData());
            if ($this->Secretarias->save($secretaria)) {
                $this->Flash->success(__('The secretaria has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The secretaria could not be saved. Please, try again.'));
        }
        $this->set(compact('secretaria'));
        $this->set('_serialize', ['secretaria']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Secretaria id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $secretaria = $this->Secretarias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $secretaria = $this->Secretarias->patchEntity($secretaria, $this->request->getData());
            if ($this->Secretarias->save($secretaria)) {
                $this->Flash->success(__('The secretaria has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The secretaria could not be saved. Please, try again.'));
        }
        $this->set(compact('secretaria'));
        $this->set('_serialize', ['secretaria']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Secretaria id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $secretaria = $this->Secretarias->get($id);
        if ($this->Secretarias->delete($secretaria)) {
            $this->Flash->success(__('The secretaria has been deleted.'));
        } else {
            $this->Flash->error(__('The secretaria could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
