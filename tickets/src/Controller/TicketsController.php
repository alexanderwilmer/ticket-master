<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
 
use Cake\Datasource\ConnectionManager; 
use Cake\Network\Email\Email;
/**
 * Tickets Controller
 *
 * @property \App\Model\Table\TicketsTable $Tickets
 *
 * @method \App\Model\Entity\Ticket[] paginate($object = null, array $settings = [])
 */
class TicketsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    private  $rol;//= $this->Auth->user('rol');

   public function initialize()
    {

       # date_default_timezone_set('UTC');
        parent::initialize();
        $this->loadComponent('Upload');
        date_default_timezone_set("America/Tegucigalpa");
        $this->Auth->allow(['sendMail']);
     //   $this->_LisPermisos= $this->getPermisos();   

         $this->rol= $this->Auth->user('rol');


    }


public function downloadfile($id=null){
 $ticket = $this->Tickets->get($id);

    $file_path = WWW_ROOT.'img'.DS.'memos'.DS.$ticket['archivo'];
    $this->response->file($file_path, array(
        'download' => true,
        'name' => $ticket['archivo'] ,
    ));
    return $this->response;
}

public function ComprobanteFile($id=null){
 $ticket = $this->Tickets->get($id);

    $file_path = WWW_ROOT.'img'.DS.'comprobantes'.DS.$ticket['comprobante'];
    $this->response->file($file_path, array(
        'download' => true,
        'name' => $ticket['comprobante'] ,
    ));
    return $this->response;
}


 

// Prior to 3.4.0

    
    public function download($file=null) { 
        $file = $this->Attachments->getFile($id);
        $this->response->file($file['path']);
        // Return the response to prevent controller from trying to render
        // a view.
        return $this->response;

    }



    public function download2(){
        $file_path = WWW_ROOT.'uploads'.DS.'file_name.doc';
        $this->response->file($file_path, array(
            'download' => true,
            'name' => 'file_name.ppt',
        ));
        return $this->response;
    }




    public function index()
    {

 
         $user_id= $this->Auth->user('id');
       if($this->rol<2){
        return   $this->redirect(array(
                 'controller' => 'Dashboards',
                 'action' => 'principal'
                 

                ));
       }

        $this->paginate = [
            'contain' => ['Estados', 'Prioridads', 'Departamentos', 'Users', 'Secretarias', 'Contratiempos']
        ];
          $tickets=  $this->Tickets->find()->orWhere(['Tickets.responsable' => $user_id])->limit(10) ;
          
            
            $tickets = $this->paginate($tickets);

        $this->set(compact('tickets'));
        $this->set('_serialize', ['tickets']);
    }



    public function listticketc(){
            

             if($this->rol>1 && $this->rol<3){
        return   $this->redirect(array(
                 'controller' => 'Dashboards',
                 'action' => 'principal'
                 

                ));
       }




            $user_id= $this->Auth->user('id');
           $this->paginate = [
            'contain' => ['Estados', 'Prioridads', 'Departamentos', 'Users', 'Secretarias', 'Contratiempos']
            ];

            $tickets=  $this->Tickets->find()->orWhere(['Tickets.user_id' => $user_id])->limit(10) ;
          
            
            $tickets = $this->paginate($tickets);

        
        $this->set(compact('tickets'));
        $this->set('_serialize', ['tickets']);
    }



    public function adminlistticket(){
            

             if($this->rol<3){
        return   $this->redirect(array(
                 'controller' => 'Dashboards',
                 'action' => 'principal'
                 

                ));
       }




            $user_id= $this->Auth->user('id');
           $this->paginate = [
            'contain' => ['Estados', 'Prioridads', 'Departamentos', 'Users', 'Secretarias', 'Contratiempos']
            ];

            $tickets=  $this->Tickets->find()->orWhere(['Tickets.user_id >' => 0])->limit(10) ;
          
            
            $tickets = $this->paginate($tickets);

        
        $this->set(compact('tickets'));
        $this->set('_serialize', ['tickets']);
    }




    /**
     * View method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
      

        


        $ticket = $this->Tickets->get($id, [
            'contain' => ['Estados', 'Prioridads', 'Departamentos', 'Users', 'Secretarias', 'Contratiempos', 'Historicos','responsable']
        ]);

         $historicos = $this->Tickets->Historicos->find('list', ['limit' => 200]);   

         $estados = $this->Tickets->Estados->find('list', ['limit' => 200]);   
        $this->set('estados', $estados);



        $this->set('ticket', $ticket);
        $this->set('_serialize', ['ticket']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {


             if($this->rol>1 && $this->rol<3){
        return   $this->redirect(array(
                 'controller' => 'Dashboards',
                 'action' => 'principal'
                 

                ));
       }

        $ticket = $this->Tickets->newEntity();
        if ($this->request->is('post')) {
            
            $data= $this->request->getData();
            $data["user_id"]= $this->Auth->user('id');
            $responsable = $this->getSoporteResponsable();
            $data["fecha"]=Time::now();
            $data["responsable"]= $responsable[0]["id"];
           //  $data["fecha"]= time();//$responsable[0]["id"];
            $data["departamento_id"]= $this->Auth->user('departamento');
            $result=true;


            if(empty($data["archivo"]["name"])){
                   unset($data["archivo"]);
            }else{
             
            $time = time();
            $file= $this->request->data;
            $filename=$time.'-'.$file['archivo']['name'];
            $file['archivo']['name'] = $filename;
            $data['archivo']=$filename;
             
            

              $result= $this->Upload->send($file['archivo'],"memos"); 
              

            } 

            


            if(!$result){
                   $this->Flash->error(__('Verifique que el archivo sea una imagen o que el tamaño sea menor de 1 MB'));
            }else{  




            

            $ticket = $this->Tickets->patchEntity($ticket, $data);
            $save = $this->Tickets->save($ticket);
            if ($save) {
               
               $this->Flash->success(__('La tarea se a asignado.'));
               $datos["ticket"]=  $save->id;
               $datos["responsable"]= $data["responsable"];
              // $this->sendMail($datos);

                return $this->redirect(['action' => 'listticketc']);
                   
            } else {
                $this->Flash->error(__('The da expedient could not be saved. Please, try again.'));
            }

          } 
            $this->Flash->error(__('The ticket could not be saved. Please, try again.'));

           





            //$this->Flash->error(__($erro));
        }//Fin de if post
        $estados = $this->Tickets->Estados->find('list', ['limit' => 200]);
        $prioridads = $this->Tickets->Prioridads->find('list', ['limit' => 200]);
        $departamentos = $this->Tickets->Departamentos->find('list', ['limit' => 200]);
        $users = $this->Tickets->Users->find('list', ['limit' => 200]);
        $secretarias = $this->Tickets->Secretarias->find('list', ['limit' => 200]);
        $contratiempos = $this->Tickets->Contratiempos->find('list', ['limit' => 200]);
        $this->set(compact('ticket', 'estados', 'prioridads', 'departamentos', 'users', 'secretarias', 'contratiempos'));
        $this->set('_serialize', ['ticket']);
    }

   public function sendMail($data){
      
        $this->Auth->allow();
        $this->autoRender = false;
        $email = new Email();
        $email->transport('mailjet');
      //  if ($this->request->is('post')) {
          //$data=  $this->request->data;

           $tecnico =$this->getDatosDelTecnico($data['responsable']);
           $mensaje="<h1>Hola ".$tecnico[0]["nombre"]."  ".$tecnico[0]["apellido"]."</h1>"."\n";

           $mensaje.="<h2>Recibiste una nueva orden de trabajo</h2>"."\n";
           $mensaje .="<br><br> Ir a :<a target='_blank' href='http://soporte.miambiente.gob.hn/tickets/view/".$data['ticket']."'><h3> Dar click aqui</h3>  </a> ";//.$data["Phone"];
            try {
                      $res = $email->from("sinia@miambiente.gob.hn")

                       ->emailFormat('html')
                      ->to([$tecnico[0]["correo"] => 'Modulo de administración de soporte'])
                      ->subject("Sinia")                   
                      ->send($mensaje);
              echo "<script type='text/javascript'>alert('Se envio el mensaje')<script/>";
            } catch (Exception $e) {

                echo 'Exception : ',  $e->getMessage(), "\n";

            }
       // }


     //  return $this->redirect( $this->referer() );

    }


  
    public function addtsoporte()
    {




             if($this->rol<2 ){
        return   $this->redirect(array(
                 'controller' => 'Dashboards',
                 'action' => 'principal'
                 

                ));
       }
        $ticket = $this->Tickets->newEntity();
        if ($this->request->is('post')) {
            
            $data= $this->request->getData();
            $data["responsable"]= $this->Auth->user('id');
             $data["fecha"]=Time::now();
            $ticket = $this->Tickets->patchEntity($ticket, $data);
            
          $result=true;


            if(empty($data["archivo"]["name"])){
                   unset($data["archivo"]);
            }else{
             
            $time = time();
            $file= $this->request->data;
            $filename=$time.'-'.$file['archivo']['name'];
            $file['archivo']['name'] = $filename;
            $data['archivo']=$filename;
            
              $result= $this->Upload->send($file['archivo'],"memos"); 
            
            } 

            


            if(!$result){
                   $this->Flash->error(__('Verifique que el archivo sea una imagen o que el tamaño sea menor de 1 MB'));
            }else{  




            

            $ticket = $this->Tickets->patchEntity($ticket, $data);
            
            if ($this->Tickets->save($ticket)) {
                $this->Flash->success(__('The ticket has been saved.'));

                return $this->redirect(['action' => 'listticketc']);
                   
            } else {
                $this->Flash->error(__('The da expedient could not be saved. Please, try again.'));
            }

          } 
            $this->Flash->error(__('The ticket could not be saved. Please, try again.'));
  






            //$this->Flash->error(__($erro));
        }
        $estados = $this->Tickets->Estados->find('list', ['limit' => 200]);
        $prioridads = $this->Tickets->Prioridads->find('list', ['limit' => 200]);
        $departamentos = $this->Tickets->Departamentos->find('list', ['limit' => 200]);
        $users = $this->Tickets->Users->find('list', ['limit' => 200]);
        $secretarias = $this->Tickets->Secretarias->find('list', ['limit' => 200]);
        $contratiempos = $this->Tickets->Contratiempos->find('list', ['limit' => 200]);
        $this->set(compact('ticket', 'estados', 'prioridads', 'departamentos', 'users', 'secretarias', 'contratiempos'));
        $this->set('_serialize', ['ticket']);
    }



    public function getSoporteResponsable(){


        $conn = ConnectionManager::get('default');

        $responsable = $conn->execute("SELECT us.id,(SELECT count(t.id) FROM `tickets` as t WHERE t.responsable=us.id and (MONTH(t.fecha) = MONTH(CURRENT_DATE))) as total FROM `users` as us where us.rol_id>1 ORDER by total ASC ")->fetchAll('assoc');
        return $responsable;
    
    }



    public function getDatosDelTecnico($id){


        $conn = ConnectionManager::get('default');

        $responsable = $conn->execute("SELECT * FROM users where id  = $id")->fetchAll('assoc');
        return $responsable;
    
    }




    /**
     * Edit method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ticket = $this->Tickets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data= $this->request->getData();
           $data["responsable"]=$data["responsables"];
          
           $data["fecha"]=Time::now();
           $ticket = $this->Tickets->patchEntity($ticket,$data );
            

            if ($this->Tickets->save($ticket)) {

               $datos["ticket"]=  $id;
               $datos["responsable"]= $data["responsable"];
               $this->sendMail($datos);
                $this->Flash->success(__('The ticket has been saved.'));

                return $this->redirect(['action' => 'adminlistticket']);
            }
            $this->Flash->error(__('The ticket could not be saved. Please, try again.'));
        }
        $estados = $this->Tickets->Estados->find('list', ['limit' => 200]);
        $prioridads = $this->Tickets->Prioridads->find('list', ['limit' => 200]);
        $departamentos = $this->Tickets->Departamentos->find('list', ['limit' => 200]);
        $users = $this->Tickets->Users->find('list', ['limit' => 200]);
        $secretarias = $this->Tickets->Secretarias->find('list', ['limit' => 200]);
        $contratiempos = $this->Tickets->Contratiempos->find('list', ['limit' => 200]);
        $this->set(compact('ticket', 'estados', 'prioridads', 'departamentos', 'users', 'secretarias', 'contratiempos'));
        $this->set('_serialize', ['ticket']);
    }


    public function ActualizarTicket($id = null)
    {
        $ticket = $this->Tickets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
             

            $data= $this->request->getData();
            $result=true;

              $data["fecha"]=Time::now();
            if($data["estado_id"]==3){
              $data["progreso"]=100;
               $data["completado"]=1;
              
            }else if($data["progreso"]==100){
              $data["estado_id"]=3;
               $data["completado"]=1;
            }

            

            if(empty($data["comprobante"]["name"])){
                   unset($data["comprobante"]);
            }else{
             
            $time = time();
            $file= $this->request->data;
            $filename=$time.'-'.$file['comprobante']['name'];
            $file['comprobante']['name'] = $filename;
            $data['comprobante']=$filename;
             
            

              $result= $this->Upload->send($file['comprobante'],"comprobantes"); 
              

            } 

            


            if(!$result){
                   $this->Flash->error(__('Verifique que el archivo sea una imagen o que el tamaño sea menor de 1 MB'));
            }else{  

            $ticket = $this->Tickets->patchEntity($ticket, $data);
            if ($this->Tickets->save($ticket)) {
                $this->Flash->success(__('Se actualizo el ticket'));
                  
                  

                    $this->_historicos = TableRegistry::get('Historicos');
                
                    $entity = $this->_historicos->newEntity();
                   
                    $historico["descripcion"]=$data["descripciones"];
                       
                    $historico["estado_id"]=$data["estado_id"]; 

                    
                    $historico["ticket_id"]=$data["id"]; 
                    $historico["fecha"]=Time::now();
                    $historico["user_id"]=$this->Auth->user('id');
                    $add =   $this->_historicos->patchEntity($entity, $historico);
                    $post =  $this->_historicos->save($add);   








                 return $this->redirect( $this->referer() );
            } else {
                $this->Flash->error(__('The da expedient could not be saved. Please, try again.'));
            }

          } 
            $this->Flash->error(__('The ticket could not be saved. Please, try again.'));
        }
     
    }

    /**
     * Delete method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ticket = $this->Tickets->get($id);
        if ($this->Tickets->delete($ticket)) {
            $this->Flash->success(__('The ticket has been deleted.'));
        } else {
            $this->Flash->error(__('The ticket could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'adminlistticket']);
    }
}
