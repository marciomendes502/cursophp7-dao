<?php

class Usuario{

    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    public function getIdusuario(){

        return $this->idusuario;
    }
    public function setIdusuario($value){

        $this->idusuario = $value ;

    }
    public function getDeslogin(){

        return $this->deslogin;
    }
    public function setDeslogin($value){

        $this->deslogin = $value ;

    }
    public function getDessenha(){

        return $this->dessenha;
    }
    public function setDessenha($value){

        $this->dessenha = $value ;

    }
    public function getDtcadastro(){

        return $this->dtcadastro;
    }
    public function setDtcadastro($value){

        $this->dtcadastro = $value ;

    }
    public function __construct($login = "", $senha = "")
    {
        $this->setDeslogin($login);
        $this->setDessenha($senha);
    }


    public function __toString()
    {
        return json_encode(array(
            "idusuario"=>$this->getIdusuario(),
            "deslogin"=>$this->getDeslogin(),
            "dessenha"=>$this->getDessenha(),
            "dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
        ));
    }

    public function loadById($id){

        $sql = new Sql();

        $result = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
            ":ID"=>$id
        ));

        if(count($result) > 0){

            $this->setData($result[0]);
        }
    }
    public static function getList(){
        
        $sql = new Sql();
        
        return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");
    }

    public static function search($login){

        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
            ":SEARCH"=>"%".$login."%"
        ));
    }
    public function setData($data){
        
        $this->setIdusuario($data['idusuario']);
        $this->setDeslogin($data['deslogin']);
        $this->setDessenha($data['dessenha']);
        $this->setDtcadastro(new DateTime($data['dtcadastro']));
    }

    public function insert(){

        if ($this->getdeslogin() != "" AND $this->getdessenha() != ""){
            $sql = new Sql();
            $results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)",array(
                ':LOGIN'=>$this->getDeslogin(),
                ':PASSWORD'=>$this->getDessenha()
            ));
            if(count($results) > 0){
                $this->setData($results[0]);
            }
        } else{
            echo "Usuario e Senha inválidos!";
        }
        

    }

    public function login($login, $password){
        $sql = new Sql();

        $result = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha= :PASSWORD", array(
            ":LOGIN"=>$login, ":PASSWORD"=>$password
        ));

        if(count($result) > 0){
            
            $this->setData($result[0]);
            
        } else{
            throw new Exception("Login e/ou senha inválidos.");
            
        }

    }


}

?>