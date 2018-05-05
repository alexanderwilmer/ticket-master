<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
/**
 * Rols Controller
 *
 * @property \App\Model\Table\RolsTable $Rols
 */
class RolsController extends AppController
{

    private $_LisPermisos=1;

    
    public function initialize()
    {
        parent::initialize();
        $this->_LisPermisos= $this->getPermisos();   
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */

     
    
    public function index()
    {
      $this->IsAutirizado($this->_LisPermisos[2]["view"]);

       $rols = $this->paginate($this->Rols);
         //$this->$_LisPermisos= 1;//$this->getPermisos();  
       $session = $this->request->session();
       $name =$this->Auth->user('username');
       $this->set('sessuibb', $this->_LisPermisos[2]["view"]);
          
          
        $this->set(compact('rols'));
        $this->set('_serialize', ['rols']);
       // $this->returPageInicio(0);    



    }

    /**
     * View method
     *
     * @param string|null $id Rol id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $this->IsAutirizado($this->_LisPermisos[2]["view"]);

        $rol = $this->Rols->get($id, [
            'contain' => ['Permisos','Modulos']
        ]);
        
       $conn = ConnectionManager::get('default');
       $permisos = $conn->execute("select m.name, p.* from  permisos as p inner join modulos as m on m.id = p.modulo_id where p.rol_id=$id order by m.id ")->fetchAll('assoc');
       $this->set('permisos', $permisos);


        $this->set('rol', $rol);
        $this->set('_serialize', ['rol']);
    }




    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $this->IsAutirizado($this->_LisPermisos[2]["agregar"]);

        $rol = $this->Rols->newEntity();
        if ($this->request->is('post')) {
            $rol = $this->Rols->patchEntity($rol, $this->request->data);
            if ($this->Rols->save($rol)) {
                $this->Flash->success(__('The rol has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rol could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('rol'));
        $this->set('_serialize', ['rol']);
    }


    public function agregar(){

     $this->IsAutirizado($this->_LisPermisos[2]["agregar"]);

       $rol = $this->Rols->newEntity();
         if ($this->request->is('post')) {
            $data["name"]=$this->request->data["name"];
            $data["description"]=$this->request->data["description"];
            $modulos = $this->request->data;
            $rol = $this->Rols->patchEntity($rol, $data);
            
            //Defino un array para listar los parametros que obtengo para la lista
            $permisos = array();  
            foreach ($modulos as $key =>$modulo){
                if($key!="name" || $key !="id" ){
                    $peticion=explode( '-', $key);
                     if($peticion[0]==="id"){
                         $permisos[$peticion[1]]["modulo_id"]=$modulos[$key]; 
                     }
                     if($peticion[0]==="ver"){
                         $permisos[$peticion[1]]["view"]=1; 
                     }
                     if($peticion[0]==="edit"){
                         $permisos[$peticion[1]]["agregar"]=1; 
                     }
                     if($peticion[0]==="add"){
                         $permisos[$peticion[1]]["editar"]=1; 
                     }
                     if($peticion[0]==="delete"){
                         $permisos[$peticion[1]]["eliminar"]=1; 
                     }   
                }
            }    

            $this->set('permiso',$permisos);
            if ($this->Rols->save($rol)) {
                
                $this->_permisos = TableRegistry::get('Permisos');
                foreach ($permisos as $permiso) {
                    $entity = $this->_permisos->newEntity();
                    $permiso["rol_id"]= $rol->id;  
                    $add =   $this->_permisos->patchEntity($entity, $permiso);
                    $post =  $this->_permisos->save($add);
                }

                $this->Flash->success(__('Se ha grabado el rol'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('No se pudo agregar rol, try again.'));
            }
        }



       $this->set(compact('rol'));
       $this->set('_serialize', ['rol']);
       $conn = ConnectionManager::get('default');
       $modulos = $conn->execute('SELECT * FROM modulos ')->fetchAll('assoc');
       $this->set('modulos', $modulos);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rol id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $this->IsAutirizado($this->_LisPermisos[2]["editar"]);

        $rol = $this->Rols->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $rol = $this->Rols->patchEntity($rol, $this->request->data);
            if ($this->Rols->save($rol)) {
                $this->Flash->success(__('The rol has been saved.'));

              //  return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rol could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('rol'));
        $this->set('_serialize', ['rol']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rol id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {

          $this->IsAutirizado($this->_LisPermisos[2]["eliminar"]);

        $this->request->allowMethod(['post', 'delete']);
        $rol = $this->Rols->get($id);
        if ($this->Rols->delete($rol)) {
            $this->Flash->success(__('The rol has been deleted.'));
        } else {
            $this->Flash->error(__('The rol could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
