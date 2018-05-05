<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Network\Exception\InternalErrorException;
use Cake\Utility\Text;
use Cake\ORM\TableRegistry;
/**
 * Upload component
 */
class UploadComponent extends Component
{

    public $max_files = 1000;


    public function send( $data,$ubicacion )
    {    
        try
        {
         $result=false; 
        
    	if ( !empty( $data ) ) {
    		$file=$data;
            if($file["size"]< 11000000){  
                    $filename = $file['name'];
        			$file_tmp_name = $file['tmp_name'];
        			$dir = WWW_ROOT.'img'.DS.$ubicacion;
        			//$allowed = array('png', 'jpg', 'jpeg','JPG','GIF','PNG','PDF','RAR','ZIP','DOC');
        			//if ( !in_array( substr( strrchr( $filename , '.') , 1 ) , $allowed) ) {
        				//return false;
        			//}else
                    if(is_uploaded_file( $file_tmp_name)){
                        $filename =   $dir.DS.$filename; 
                        move_uploaded_file($file_tmp_name, $filename);
                        return true;   
        			} 
    		} 
    	}
        }catch(Exception $e){


        }
     

    }
}
