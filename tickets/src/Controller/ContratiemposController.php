<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Contratiempos Controller
 *
 * @property \App\Model\Table\ContratiemposTable $Contratiempos
 *
 * @method \App\Model\Entity\Contratiempo[] paginate($object = null, array $settings = [])
 */
class ContratiemposController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $contratiempos = $this->paginate($this->Contratiempos);

        $this->set(compact('contratiempos'));
        $this->set('_serialize', ['contratiempos']);
    }

    /**
     * View method
     *
     * @param string|null $id Contratiempo id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contratiempo = $this->Contratiempos->get($id, [
            'contain' => ['Tickets']
        ]);

        $this->set('contratiempo', $contratiempo);
        $this->set('_serialize', ['contratiempo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contratiempo = $this->Contratiempos->newEntity();
        if ($this->request->is('post')) {
            $contratiempo = $this->Contratiempos->patchEntity($contratiempo, $this->request->getData());
            if ($this->Contratiempos->save($contratiempo)) {
                $this->Flash->success(__('The contratiempo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contratiempo could not be saved. Please, try again.'));
        }
        $this->set(compact('contratiempo'));
        $this->set('_serialize', ['contratiempo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contratiempo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contratiempo = $this->Contratiempos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contratiempo = $this->Contratiempos->patchEntity($contratiempo, $this->request->getData());
            if ($this->Contratiempos->save($contratiempo)) {
                $this->Flash->success(__('The contratiempo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contratiempo could not be saved. Please, try again.'));
        }
        $this->set(compact('contratiempo'));
        $this->set('_serialize', ['contratiempo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contratiempo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contratiempo = $this->Contratiempos->get($id);
        if ($this->Contratiempos->delete($contratiempo)) {
            $this->Flash->success(__('The contratiempo has been deleted.'));
        } else {
            $this->Flash->error(__('The contratiempo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
