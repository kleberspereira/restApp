<?php class Server{

    function Start($dts,$data){
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                if($data->id){
                    $dts->GetID($data);
                    break;
                }                
                $dts->GetAll();
                break;
            case 'POST':
                if($data->id){
                    $dts->AddData($data);
                    break;
                }
                break;
            case 'PUT':
                if($data->id){
                    $dts->updateData($data);
                    break;
                }
                break;
           case 'DELETE':
                if($data->id){
                    $dts->deleteData($data);
                    break;
                }
                break;
            default:
                header("HTTP/1.0 404 Not Found");  
                break;
        }
    }
}

?>