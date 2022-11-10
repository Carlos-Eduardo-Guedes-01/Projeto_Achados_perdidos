<?php
class reserva{
    private $situacao;
    public function setSituacao($situacao){
        $this->situacao=$situacao;
    }
    public function getSituacao(){
        return $this->situacao;
    }
    public function ateraAnalise($id){
        $localhost='localhost';
        $usuario='root';
        $pass='123456';
        $db='projeto_int';
        $conexao=new mysqli($localhost,$usuario,$pass,$db);
    }
}