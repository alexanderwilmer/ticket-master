<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

use Cake\Datasource\ConnectionManager;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */

 


    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');



    //Metodo para la autenticacion de los usuarios
  


             $this->loadComponent('Auth', [



             'authenticate' => [
            'Form' => [
                'fields' => ['username' => 'user']
              ]
            ],

            'loginRedirect' => [
                'controller' => 'Dashboards',
                'action' => 'principal'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login',
                'home'
            ]
        ]);



            


/*
          parent::initialize();
    $this->loadComponent('Auth', [
        'authenticate' => [
            'Form' => [
                'fields' => ['username' => 'email', 'password' => 'password']
            ]
        ]
    ]);
  */  
       $this->islogin();
        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }
   

      public function getMensajesSinRevisar(){
      /*   $this->Auth->allow();
        $this->autoRender = false;
        */
 
        $user_actual=$this->Auth->user('id');
       $conn = ConnectionManager::get('default');
       
       $users = $conn->execute("SELECT m.*, CONCAT_WS(' ',r.nombre,r.apellido) as receptor,CONCAT_WS(' ',e.nombre,e.apellido) as emisor ,r.imagen as imgr, e.imagen as imge  , e.id as ide FROM mensajes as m 
      inner join users as r on r.id=m.receptor_id
            inner join users as e on e.id = m.emisor_id
            where ( 
            r.id = $user_actual) AND m.estado=0  ")->fetchAll('assoc');
      $this->set('mensajes', $users );
       return $users;
       /*foreach ($users as $user ) {
         $posicion ="pull-right";
         $imagen =$user["imge"];
         $usuario=$user["emisor"];
         $time = strtotime($user['fecha']);
$date_f = date("Y/m/d ", $time);
$hora = date("H:i:s", $time);
      //   $date = new DateTime($user['fecha']);
       
      

    
         }*/
    
    }



    public function islogin(){
      if ($this->Auth->user()) {
        $user["name"] = $this->Auth->user('user');
        $user["image"] = $this->Auth->user('imagen');
        $user["id"] = $this->Auth->user('id');
        
        $this->set("userl",$user);
        $this->GetTicket($user["id"]);
        $this->GetPendientes($user["id"]);
        $this->GetLUser();
        $this->getMensajesSinRevisar();
    }
                
    }


    public function GetTicket($user){

        $conn = ConnectionManager::get('default');
        $ticket_pendientes = $conn->execute("SELECT t.name, t.fecha, u.user,u.imagen,t.id FROM tickets as t inner join  users as u on u.id = t.user_id where t.responsable=$user and t.estado_id <>3")->fetchAll('assoc');
        $this->set('TICKETP', $ticket_pendientes );
       
    
    }

    public function GetLUser(){

        $conn = ConnectionManager::get('default');
         $user_actual=$this->Auth->user('id');
        $ticket_pendientes = $conn->execute("SELECT u.* ,d.name as departamento from users as u inner join  departamentos as d on d.id = u.departamento_id  where u.id<>$user_actual")->fetchAll('assoc');
        $this->set('LUSERS', $ticket_pendientes );
       
    
    }


    public function GetPendientes($user){

        $conn = ConnectionManager::get('default');
        $ticket_pendientes = $conn->execute("SELECT count(*) as tareas, (sum(t.progreso)/count(*)) as porcentaje FROM tickets as t inner join  users as u on u.id = t.user_id where t.responsable=$user and t.estado_id <>3")->fetchAll('assoc');

        $this->set('Pendientes', $ticket_pendientes );
       
    
    }


    public function error_pr($model){
           
                if($model->errors()){
                    $error_msg = [];
                    foreach( $model->errors() as $errors){
                        if(is_array($errors)){
                            foreach($errors as $error){
                                $error_msg[]    =   $error;
                            }
                        }else{
                            $error_msg[]    =   $errors;
                        }
                    }

                    if(!empty($error_msg)){
                           $this->Flash->error(
                            ("Error en los datos : ".implode("\n \r", $error_msg))
                            );
                        
                    }else{
                        return "";
                    }
             }

    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }











     public function beforeFilter(Event $event)
    {
       // $this->Auth->allow(['index', 'view', 'display']);
    }

}
