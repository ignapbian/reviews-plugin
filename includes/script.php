<?php 
        $api = (isset($_GET['api']))?$_GET['api']:''; 
        header('Content-Type: application/json'); 
        if (!$api) { 
            $err = new stdClass; $err->code = 404; 
            $err->message = "404 not found"; 
            echo json_encode($err);  return; 
        } 
         
        $basefile = dirname(__FILE__). '/'.$api.'.json'; 
        if (file_exists($basefile)) { 
            $response=file_get_contents($basefile); 
            if($response !== false){
                echo $response;
            }
        } 
        else { 
            $err = new stdClass; 
            $err->code = 404; return; 
        } 
    
?>
