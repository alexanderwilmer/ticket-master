<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TicketAsignados Controller
 *
 * @property \App\Model\Table\TicketAsignadosTable $TicketAsignados
 *
 * @method \App\Model\Entity\TicketAsignado[] paginate($object = null, array $settings = [])
 */
class TicketAsignadosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tickets', 'Users']
        ];
        $ticketAsignados = $this->paginate($this->TicketAsignados);

        $this->set(compact('ticketAsignados'));
        $this->set('_serialize', ['ticketAsignados']);
    }

    /**
     * View method
     *
     * @param string|null $id Ticket Asignado id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ticketAsignado = $this->TicketAsignados->get($id, [
            'contain' => ['Tickets', 'Users']
        ]);

        $this->set('ticketAsignado', $ticketAsignado);
        $this->set('_serialize', ['ticketAsignado']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ticketAsignado = $this->TicketAsignados->newEntity();
        if ($this->request->is('post')) {
            $ticketAsignado = $this->TicketAsignados->patchEntity($ticketAsignado, $this->request->getData());
            if ($this->TicketAsignados->save($ticketAsignado)) {
                $this->Flash->success(__('The ticket asignado has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ticket asignado could not be saved. Please, try again.'));
        }
        $tickets = $this->TicketAsignados->Tickets->find('list', ['limit' => 200]);
        $users = $this->TicketAsignados->Users->find('list', ['limit' => 200]);
        $this->set(compact('ticketAsignado', 'tickets', 'users'));
        $this->set('_serialize', ['ticketAsignado']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ticket Asignado id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ticketAsignado = $this->TicketAsignados->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ticketAsignado = $this->TicketAsignados->patchEntity($ticketAsignado, $this->request->getData());
            if ($this->TicketAsignados->save($ticketAsignado)) {
                $this->Flash->success(__('The ticket asignado has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ticket asignado could not be saved. Please, try again.'));
        }
        $tickets = $this->TicketAsignados->Tickets->find('list', ['limit' => 200]);
        $users = $this->TicketAsignados->Users->find('list', ['limit' => 200]);
        $this->set(compact('ticketAsignado', 'tickets', 'users'));
        $this->set('_serialize', ['ticketAsignado']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ticket Asignado id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ticketAsignado = $this->TicketAsignados->get($id);
        if ($this->TicketAsignados->delete($ticketAsignado)) {
            $this->Flash->success(__('The ticket asignado has been deleted.'));
        } else {
            $this->Flash->error(__('The ticket asignado could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
