<?php
namespace App\Controller;

use App\Controller\AppController;
 
use App\Form\EnquiryForm;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use Cake\Network\Email\Email;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

      public function initialize()
    {
        parent::initialize();
          $this->loadComponent('Upload');
      /*   $this->loadComponent('RequestHandler');
      
        $this->_LisPermisos= $this->getPermisos();   
      */
                 $this->Auth->allow(['lostpassw','email','add']);
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['add', 'logout']);
    }

  public function login()
    {

            $this->viewBuilder()->layout('plantilla_login');
            if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {

                              $data=  $this->request->data;
                              $user   =$data["user"];
                              $password   =$data["password"];
                         
                                   
                           
                                 
              
                                 $dat=  $this->getUsuario($user);
                                 print_r($dat);

                                 //    print_r($query);
                                  $usuario["id"]= $dat[0]["id"];
                                  $usuario["name"]= $dat[0]["name"];
                                  $usuario["user"]= $dat[0]["user"];
                                  $usuario["rol"]= $dat[0]["rol_id"];
                                  $usuario["imagen"]= $dat[0]["imagen"];
                                  $usuario["departamento"]= $dat[0]["departamento_id"];

                                  $this->Auth->setUser($usuario);
                                    return $this->redirect($this->Auth->redirectUrl()); 
                //$this->Auth->setUser($user);
               // return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalido usuario o contraseña, intente de nuevo'));
        }
    }
 /*
     public function login() {
        $this->viewBuilder()->layout('plantilla_login');
         
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Tu usuario o tu contraseña son incorrectos'));
        }
   }

*/
    public function index()
    {
        $this->paginate = [
            'contain' => ['Departamentos', 'Rols']
        ];
        #$users = $this->paginate($this->Users);
        $users =  $this->Users->find('all',['contain' =>['Departamentos','Rols']]);
        
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }


     public function principal(){


          //$this->autoRender = false;
        //   $this->viewBuilder()->layout('plantilla_principal');
    }
   
    public function loginmail($user){


            $dat=  $this->getUsuario($user);
        if(!empty($dat)){

                                 //    print_r($query);
                                  $usuario["id"]= $dat[0]["id"];
                                  $usuario["name"]= $dat[0]["name"];
                                  $usuario["user"]= $dat[0]["user"];
                                  $usuario["rol"]= $dat[0]["rol_id"];
                                  $usuario["imagen"]= $dat[0]["imagen"];
                                  $usuario["departamento"]= $dat[0]["departamento_id"];

                                  $this->Auth->setUser($usuario);
                                //  return $this->redirect($this->Auth->redirectUrl());
        }
         return $this->redirect($this->Auth->redirectUrl());
    }


    public function logins(){

          $this->viewBuilder()->layout('plantilla_login');
    

                // $this->Auth->user('id');
                 if ($this->request->is('post')) {    
                        $data=  $this->request->data;
                        $user   =$data["user"];
                        $password   =$data["password"];
                         
                    
                           
                                 
              
                                $dat=  $this->getUsuario($user);
                                

                                 
                                  $usuario["id"]= $dat[0]["id"];
                                  $usuario["name"]= $dat[0]["name"];
                                  $usuario["user"]= $dat[0]["user"];
                                  $usuario["rol"]= $dat[0]["rol_id"];
                                  $usuario["imagen"]= $dat[0]["imagen"];
                                  $usuario["departamento"]= $dat[0]["departamento_id"];

                                  $this->Auth->setUser($usuario);
                                  
 

                                    $usuario["id"]= $dat[0]["id"];
                                  $usuario["name"]= $dat[0]["name"];
                                  $usuario["user"]= $dat[0]["user"];
                                  $usuario["rol"]= $dat[0]["rol_id"];
                                      $usuario["imagen"]= $dat[0]["imagen"];
                                    $usuario["departamento"]= $dat[0]["departamento_id"];

                                      $this->Auth->setUser($usuario);
                                
                                      
                                     return $this->redirect($this->Auth->redirectUrl());
                               
                        }

                    
 
    }


    public function lostpassw(){

       $this->viewBuilder()->layout('plantilla_login');
       

        $email = new Email();
        $email->transport('mailjet');
        if ($this->request->is('post')) {
          $data=  $this->request->data;

          $usuario=$this->getUsuarioPorEmailOrUser($data["usuario"]);


           $mensaje= "Hola " . $data["usuario"]."\n";
           $mensaje= "Hola "  .$data["usuario"]."\n";
           $mensaje= "Ingrese a este link para autenticarse ".$data["usuario"]."\n";

            try {
                       $res = $email->from("wgomez@miambiente.gob.hn")
                      ->to([$usuario[0]["correo"] =>$usuario[0]["nombre"]])
                      ->subject("Soporte miambiente")                   
                      ->send($mensaje);
           $this->Flash->error(__('Se envio el correo electronico, revise su correo para ingresar en el enlace'));

              echo "<script type='text/javascript'>alert('Se envio el correo electronico, revise su correo para ingresar en el enlace')<script/>";
            } catch (Exception $e) {

                echo 'Exception : ',  $e->getMessage(), "\n";

            }
        }





    }


    public function email(){
       

         $this->Auth->allow();
                $this->autoRender = false;
                $email = new Email();
           $email->transport('mailjet');

           $to='jjxxx@gmail.com';
           $subject='testing';
           $message='hello, dfsfsdfsdf sdfsdf';

           $email->from(['jjxxx@gmail.com' => 'test'])
                      ->to($to)
                      ->subject( $subject)                   
                      ->send($message);

    }


    public function getUsuario($usuario){

        $conn = ConnectionManager::get('default');
        $data = $conn->execute("SELECT * FROM `users` where user like '$usuario'")->fetchAll('assoc');
        
        return $data; 
    }

    public function getUsuarioPorEmailOrUser($usuario){

        $conn = ConnectionManager::get('default');
        $data = $conn->execute("SELECT * FROM `users` where user like '$usuario'  or correo like '$usuario'  ")->fetchAll('assoc');
        
        return $data; 
    }

    private function register($data){
    
           $user = $this->Users->newEntity();
           $datau["name"]=$data["user"];
           $datau["user"]=$data["user"];
           $datau["rol_id"]=1;
           $datau["estado"]=0;

           $datau["imagen"]="head.jpg";

//$this->Users->getLastInsertId()
           $user = $this->Users->patchEntity($user,$datau);
           $result =$this->Users->save($user);
           
           if($result) {
               $this->Flash->success(__('The user has been saved.'));
        //return $this->redirect(array('/edit/'."12"));
                ///return $this->redirect(['action' => 'index']);
            


                  $usuario["id"]= $result->id;
                  $usuario["name"]= $datau["name"];
                  $usuario["user"]= $datau["user"];
                  $usuario["rol"]= $datau["rol_id"];
                  $usuario["imagen"]="head.jpg";
                 $this->Auth->setUser($usuario);

                 return   $this->redirect(array(
                 'controller' => 'Users',
                 'action' => 'editperfil',
                  $result->id

                ));

      //  header ("Location: ".$this->Html->url(array('controller'=>'Users','action'=>'edit/12')));
           }
           $this->Flash->error(__('The user could not be saved. Please, try again.'));
    }



     public function logout(){
         $this->Flash->success('You are logged out');
         return $this->redirect($this->Auth->logout());
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Departamentos', 'Rols', 'TicketAsignados', 'Tickets']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */

    public function add()
    {  $this->viewBuilder()->layout('plantilla_login');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $departamentos = $this->Users->Departamentos->find('list', ['limit' => 200]);
        $rols = $this->Users->Rols->find('list', ['limit' => 200]);
        $this->set(compact('user', 'departamentos', 'rols'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $data=$this->request->getData();
            $data["estado"]=1;

            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                 

                 return   $this->redirect(array(
                                        'controller' => 'users',
                                        'action' => 'index'

                                        ));    
 
            }



            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $departamentos = $this->Users->Departamentos->find('list', ['limit' => 200]);
        $rols = $this->Users->Rols->find('list', ['limit' => 200]);
        $this->set(compact('user', 'departamentos', 'rols'));
        $this->set('_serialize', ['user']);
    }

    public function editperfil($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $data=$this->request->getData();
            $data["estado"]=1;
            $data["rol"]=1;
            $result=true;


            if(empty($data["imagen"]["name"])){
                   unset($data["imagen"]);
            }else{
             
            $time = time();
            $file= $this->request->data;
            $filename=$time.'-'.$file['imagen']['name'];
            $file['imagen']['name'] = $filename;
            $data['imagen']=$filename;

          
            

              $result= $this->Upload->send($file['imagen'],"usuarios"); 
              

            } 

            


            if(!$result){
                   $this->Flash->error(__('Verifique que el archivo sea una imagen o que el tamaño sea menor de 1 MB'));
            }else{  






            $user = $this->Users->patchEntity($user, $data);
            

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                 $this->Auth->user('imagen',$data["imagen"]);
               //   $this->Auth->setUser($usuario);
                 return   $this->redirect(array(
                                        'controller' => 'Users',
                                        'action' => 'login'

                                        ));    
 
            }

          }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $departamentos = $this->Users->Departamentos->find('list', ['limit' => 200]);
        $rols = $this->Users->Rols->find('list', ['limit' => 200]);
        $this->set(compact('user', 'departamentos', 'rols'));
        $this->set('_serialize', ['user']);
    }


    public function perfil($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $data=$this->request->getData();
            $data["estado"]=1;
        
            $result=true;


            if(empty($data["imagen"]["name"])){
                   unset($data["imagen"]);
            }else{
             
            $time = time();
            $file= $this->request->data;
            $filename=$time.'-'.$file['imagen']['name'];
            $file['imagen']['name'] = $filename;
            $data['imagen']=$filename;

          
            

              $result= $this->Upload->send($file['imagen'],"usuarios"); 
              

            } 

            


            if(!$result){
                   $this->Flash->error(__('Verifique que el archivo sea una imagen o que el tamaño sea menor de 1 MB'));
            }else{  






            $user = $this->Users->patchEntity($user, $data);
            

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                 $this->Auth->user('imagen',$data["imagen"]);
               //   $this->Auth->setUser($usuario);
                 return   $this->redirect(array(
                                        'controller' => 'Tickets',
                                        'action' => 'index'

                                        ));    
 
            }

          }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $departamentos = $this->Users->Departamentos->find('list', ['limit' => 200]);
        $rols = $this->Users->Rols->find('list', ['limit' => 200]);
        $this->set(compact('user', 'departamentos', 'rols'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

   


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Usuario eliminado.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
