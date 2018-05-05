<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
/**
 * Mensajes Controller
 *
 * @property \App\Model\Table\MensajesTable $Mensajes
 *
 * @method \App\Model\Entity\Mensaje[] paginate($object = null, array $settings = [])
 */
class MensajesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Emisors', 'Receptors']
        ];
        $mensajes = $this->paginate($this->Mensajes);

        $this->set(compact('mensajes'));
        $this->set('_serialize', ['mensajes']);
    }

    /**
     * View method
     *
     * @param string|null $id Mensaje id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mensaje = $this->Mensajes->get($id, [
            'contain' => ['Emisors', 'Receptors']
        ]);

        $this->set('mensaje', $mensaje);
        $this->set('_serialize', ['mensaje']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {  

      
        $mensaje = $this->Mensajes->newEntity();
        if ($this->request->is('post')) {

         
            $mensaje = $this->Mensajes->patchEntity($mensaje,$this->request->getData());
            if ($this->Mensajes->save($mensaje)) {
                $this->Flash->success(__('The mensaje has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mensaje could not be saved. Please, try again.'));
        }
        $emisors = $this->Mensajes->Emisors->find('list', ['limit' => 200]);
        $receptors = $this->Mensajes->Receptors->find('list', ['limit' => 200]);
        $this->set(compact('mensaje', 'emisors', 'receptors'));
        $this->set('_serialize', ['mensaje']);
    }


        public function addMensajes()
    {

        $this->Auth->allow();
        $this->autoRender = false;
        $mensaje = $this->Mensajes->newEntity();
        if ($this->request->is('post')) {
            $data= $this->request->getData();
            $data["emisor_id"]=  $this->Auth->user('id');
            $data["fecha"]=Time::now();
            $mensaje = $this->Mensajes->patchEntity($mensaje, $data);
            if ($this->Mensajes->save($mensaje)) {
               
            }
           // $this->Flash->error(__('The mensaje could not be saved. Please, try again.'));
        }
     
    }





    /**
     * Edit method
     *
     * @param string|null $id Mensaje id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mensaje = $this->Mensajes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mensaje = $this->Mensajes->patchEntity($mensaje, $this->request->getData());
            if ($this->Mensajes->save($mensaje)) {
                $this->Flash->success(__('The mensaje has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mensaje could not be saved. Please, try again.'));
        }
        $emisors = $this->Mensajes->Emisors->find('list', ['limit' => 200]);
        $receptors = $this->Mensajes->Receptors->find('list', ['limit' => 200]);
        $this->set(compact('mensaje', 'emisors', 'receptors'));
        $this->set('_serialize', ['mensaje']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Mensaje id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mensaje = $this->Mensajes->get($id);
        if ($this->Mensajes->delete($mensaje)) {
            $this->Flash->success(__('The mensaje has been deleted.'));
        } else {
            $this->Flash->error(__('The mensaje could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
