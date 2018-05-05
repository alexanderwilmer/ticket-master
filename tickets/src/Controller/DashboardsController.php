<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Datasource\ConnectionManager;
use Cake\Network\Email\Email;
/**
 * Sexos Controller
 *
 * @property \App\Model\Table\SexosTable $Sexos
 */
class DashboardsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
        */
    private $_LisPermisos=1;

    
        public function initialize()
        {

            parent::initialize();
            $this->Auth->allow(['logind'.'GetEquipos','sendMail','getTicketPorDepartamento']);
        //    $this->_LisPermisos= $this->getPermisos();   
        }


    public function index()
    {

          //$this->Auth->allow();
       /*   $this->viewBuilder()->layout('plantillazoo');
        
        $foto = $this->GetFotoAnimals(); 
         $animals = $this->GetAnimals(); 
        $zoologico = $this->GetDataZoologico();
           $eventos = $this->GetEventos();
           $equipos = $this->GetEquipos();
        $this->set('eventos', $eventos);
        $this->set('animals', $animals);
        $this->set('animalsFoto', $foto);
        $this->set('zoologico', $zoologico);
        $this->set('equipos', $equipos);*/

        //22313493 22131376 2239 8037 2153 
    }
  
    public function principal(){
       $contratiempos = $this->getContratiempos();
       $tmesresponsable = $this->getTotalTicketMesResponsable();
       $flujo = $this->getFlujoDeTrabajo();
        $tickets["todos"]= $this->getAllTickets();
        $tickets["completados"]= $this->getTicketCompletados();
        $tickets["rechazados"]= $this->getTicketRechazados();
        $tickets["pendientes"]= $this->getTicketPendientes();
        $tickets["anio"]= $this->getTicketAnio();
        $tickets["mes"]= $this->getTicketMes();
        $tickets["semana"]= $this->getTicketSemana();
        $tickets["dia"]= $this->getTicketDia();
       

        //$tickets[""]= $this->getAllTickets();

       $this->set('tickets', $tickets);  
       $this->set('contratiempos', $contratiempos);
       $this->set('tmesresponsable', $tmesresponsable);
       $this->set('flujos', $flujo);

          //$this->autoRender = false;
         
    }
 

    public  function menu(){
        
              

        
    }

     public function GetTareasPendientes(){
         $this->Auth->allow();
        $this->autoRender = false;
           $user = $this->Auth->user('id');
        $conn = ConnectionManager::get('default');
        $ticket_pendientes = $conn->execute("SELECT t.name, t.fecha, u.user,u.imagen,t.id FROM ticket.tickets as t inner join  ticket.users as u on u.id = t.user_id where t.responsable=$user and t.estado_id <>3")->fetchAll('assoc');

             echo json_encode($ticket_pendientes,JSON_NUMERIC_CHECK);
        
    }

    public  function getContratiempos(){
        
        
        $conn = ConnectionManager::get('default');

        $contratiempos = $conn->execute("SELECT * from contratiempos ")->fetchAll('assoc');
        return $contratiempos;
    }



    public  function getUsers(){
        
        $this->Auth->allow();
        $this->autoRender = false;

      if ($this->request->is('post')) {
 
        $conn = ConnectionManager::get('default');
        $name= $this->request->data["usuario"];  
         $user_actual=$this->Auth->user('id');
        $users = $conn->execute(" SELECT u.* ,d.name as departamento from users as u inner join  departamentos as d on d.id = u.departamento_id  where u.id<>$user_actual  and nombre like '%$name%'")->fetchAll('assoc');
        foreach ($users as $user) {
          echo ' <li id="'.$user['id'].'"  nombre ="'.$user['nombre'].' '.$user['apellido'].'" imagen = "'.$user['imagen'].'"  class="chaton" > <a href="#"><i  aria-hidden="true"><img src="/img/usuarios/'.$user["imagen"].'"       width=50px height=50px  style="    border-radius: 50%; -webkit-border-radius: 50%;  width:50px; height:50px;"                    ></i>'.$user["departamento"].'- '.$user["nombre"].' '.$user["apellido"].'  </a> </li>';          
        }
      }
       
    }


    public  function getAllTickets(){
        
        $conn = ConnectionManager::get('default');

        $contratiempos = $conn->execute("SELECT count(*) as total FROM `tickets` as t inner join users as u on u.id = t.responsable   ")->fetchAll('assoc');
        return $contratiempos;
    }
    public  function getTicketCompletados(){
        
        $conn = ConnectionManager::get('default');

        $contratiempos = $conn->execute("SELECT count(*) as total FROM `tickets` as t inner join users as u on u.id = t.responsable WHERE t.estado_id=3  ")->fetchAll('assoc');
        return $contratiempos;
    }
    public  function getTicketPendientes(){
        
        $conn = ConnectionManager::get('default');

        $contratiempos = $conn->execute("SELECT count(*) as total FROM `tickets` as t inner join users as u on u.id = t.responsable WHERE  t.estado_id<3 ")->fetchAll('assoc');
        return $contratiempos;
    }
    public  function getTicketRechazados(){
        
        $conn = ConnectionManager::get('default');

        $contratiempos = $conn->execute("SELECT count(*) as total FROM `tickets` as t inner join users as u on u.id = t.responsable WHERE  t.estado_id=4  ")->fetchAll('assoc');
        return $contratiempos;
    }


   public  function getTicketAnio(){
        
        $conn = ConnectionManager::get('default');

        $anio = $conn->execute("SELECT count(*) as total FROM `tickets` as t  WHERE year(fecha) = year(CURRENT_DATE)")->fetchAll('assoc');
        return $anio;
    }


   public  function getTicketMes(){
        
        $conn = ConnectionManager::get('default');

        $anio = $conn->execute("SELECT count(*) as total FROM `tickets` as t inner join users as u on u.id = t.responsable WHERE year(fecha) = year(CURRENT_DATE) and MONTH(fecha) = MONTH(CURRENT_DATE) ")->fetchAll('assoc');
        return $anio;
    }


     public  function getTicketSemana(){
        
        $conn = ConnectionManager::get('default');

        $anio = $conn->execute("SELECT count(*) as total FROM `tickets` as t inner join users as u on u.id = t.responsable WHERE  year(fecha) = year(CURRENT_DATE) and WEEKOFYEAR(fecha) = WEEKOFYEAR(CURRENT_DATE)")->fetchAll('assoc');
        return $anio;
    }

     public  function getTicketDia(){
        
        $conn = ConnectionManager::get('default');

        $anio = $conn->execute("SELECT count(*) as total FROM `tickets` as t inner join users as u on u.id = t.responsable WHERE year(fecha) = year(CURRENT_DATE) and DAY(fecha) = DAY(CURRENT_DATE)")->fetchAll('assoc');
        return $anio;
    }


   public function getTotalTicketMesResponsable(){
 
       $conn = ConnectionManager::get('default');

       $trabajos = $conn->execute(" SELECT u.id, u.nombre,u.apellido, count(*) as total FROM `tickets` as t inner join users as u on u.id = t.responsable WHERE MONTH(fecha) = MONTH(CURRENT_DATE)-1  or MONTH(fecha) = MONTH(CURRENT_DATE)  GROUP by u.id")->fetchAll('assoc');
        return $trabajos;
    }


   public function getFlujoDeTrabajo(){
 
       $conn = ConnectionManager::get('default');

       $trabajos = $conn->execute("
SELECT u.id, u.nombre,u.apellido,
( ((SELECT sum(d.progreso) from tickets as d where MONTH(d.fecha) = MONTH(CURRENT_DATE)-1 and d.responsable = u.id and d.estado_id=3 ))  ) as completados,
 ((SELECT count(*) from tickets as d where MONTH(d.fecha) = MONTH(CURRENT_DATE)-1 and d.responsable = u.id )) as total


FROM `tickets` as t inner join users as u on u.id = t.responsable GROUP by u.id
        ")->fetchAll('assoc');
        return $trabajos;
    }


 
 



    public function getTicketPorDepartamento(){
         $this->Auth->allow();
        $this->autoRender = false;

       $conn = ConnectionManager::get('default');

       $donaciones = $conn->execute("SELECT count(*)as visits, d.name as country FROM `tickets` as t inner join departamentos as d on d.id = t.departamento_id GROUP by d.id ")->fetchAll('assoc');
        echo json_encode($donaciones,JSON_NUMERIC_CHECK);
    
    }

    public function getTicketPorContratiempos(){
         $this->Auth->allow();
        $this->autoRender = false;

       $conn = ConnectionManager::get('default');

       $contratiempos = $conn->execute("SELECT c.id,c.name,COUNT(*) ,(COUNT(*) *100/ (select COUNT(*) FROM tickets)) as total FROM `tickets` as t inner join contratiempos as c on c.id =t.`contratiempo_id` group by c.id")->fetchAll('assoc');
        echo json_encode($contratiempos,JSON_NUMERIC_CHECK);
    
    }

   public function getTicketPorTiemposFecha(){
         $this->Auth->allow();
        $this->autoRender = false;

       $conn = ConnectionManager::get('default');

       $contratiempos = $conn->execute("SELECT DATE_FORMAT(fecha,'%Y-%m') as date, count(*) as price FROM tickets group by  DATE_FORMAT(fecha,'%Y-%m')  order by DATE_FORMAT(fecha,'%Y-%m') ")->fetchAll('assoc');
        echo json_encode($contratiempos,JSON_NUMERIC_CHECK);
    
    }


    public function getTicketMEnsajesEmisorReceptor(){
         $this->Auth->allow();
        $this->autoRender = false;
        
   if ($this->request->is('post')) {
        $user_id= $this->request->data["usuario"]; 
        $user_actual=$this->Auth->user('id');
       $conn = ConnectionManager::get('default');

          $email = TableRegistry::get("Mensajes");
        $query = $email->query();
            $result = $query->update()
                    ->set(['estado' => '1'])
                    ->where(['emisor_id' =>  $user_id,'receptor_id' => $user_actual])
                    ->execute();


       
       $users = $conn->execute("SELECT m.*, CONCAT_WS(' ',r.nombre,r.apellido) as receptor,CONCAT_WS(' ',e.nombre,e.apellido) as emisor ,r.imagen as imgr, e.imagen as imge  FROM mensajes as m 
      inner join users as r on r.id=m.receptor_id
            inner join users as e on e.id = m.emisor_id
            where (e.id =$user_id and
            r.id = $user_actual) or (e.id =$user_actual and
            r.id = $user_id)  ")->fetchAll('assoc');
   
      


       foreach ($users as $user ) {
         $posicion ="pull-right";
         $imagen =$user["imge"];
         $usuario=$user["emisor"];
         $time = strtotime($user['fecha']);
$date_f = date("Y/m/d ", $time);
$hora = date("H:i:s", $time);
      //   $date = new DateTime($user['fecha']);
       
        
         if($user["receptor_id"]==$user_actual){
          $posicion="pull-left";
      //    $imagen =$user["imgr"];
        //  $usuario=$user["emisor"];

      
         }


       ?>

     
   <div class="chat-box-single-line">
                <abbr class="timestamp"><?php echo  $date_f;//  date_format($date, 'd/m/y'); ?></abbr>
          </div>
          
          
          <!-- Message. Default to the left -->
                    <div class="direct-chat-msg doted-border">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name <?php echo $posicion;?>"><?php echo $usuario?></span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img alt="message user image" src="/img/usuarios/<?php echo $imagen; ?>" class="direct-chat-img"><!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        <?php echo $user["mensaje"]?>
                      </div>
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-timestamp pull-right"><?php echo  $hora;//  date_format($date, 'd/m/y'); ?></span>
                      </div>
          
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->
          
      
      
         
       <?php

         }
       }
       







    }



    public function sendMail(){
      
        $this->Auth->allow();
        $this->autoRender = false;
        $email = new Email();
        $email->transport('mailjet');
        if ($this->request->is('post')) {
          $data=  $this->request->data;
           $mensaje=$data["Message"]."\n";
           $mensaje .="Telefono: ".$data["Phone"];
            try {
                      $res = $email->from($data["Email"])
                      ->to(['dragolex10@gmail.com' => 'Zoológico Rosy Walther'])
                      ->subject($data["Name"])                   
                      ->send($mensaje);
              echo "<script type='text/javascript'>alert('Se envio el mensaje')<script/>";
            } catch (Exception $e) {

                echo 'Exception : ',  $e->getMessage(), "\n";

            }
        }


       return $this->redirect( $this->referer() );

    }


 

  
 
 
}
