<?php class FakeData{
    private $data = NULL;
    private $file = NULL;
    public $return = NULL;

    function Start($file){
        $this->file = $file;
        $json = file_get_contents($file);
        $this->data = json_decode($json);        
    }

    function GetAll(){
        $this->return = json_encode($this->data );
    }

    function GetID($data){
        foreach ($this->data as $key => $value) {
            if($data->id == $value->id){
                $this->return = json_encode($value);
                break;
            }
        }
    }

    function AddData($data){
        $id = 1;
        foreach ($this->data as $key => $value) {
            $id++;
        }
        $data->id = $id;
        array_push($this->data, $data);
        file_put_contents($this->file, json_encode($this->data));
    }

    function updateData($data){
        foreach ($this->data as $key => $value) {
            if($data->id == $value->id){
                $value->nome     = $data->nome;
                $value->telefone = $data->telefone;
                $value->email    = $data->email;
                file_put_contents($this->file, json_encode($this->data));
                break;
            }
        }
    }

    function deleteData($data){
        foreach ($this->data as $key => $value) {
            if($data->id == $value->id){
                unset($this->data[$key]);
                file_put_contents($this->file, json_encode($this->data));
                break;
            }
        }
    }
}

?>