<?php 

class Usuario{

	private $id;
	private $nome;
	private $email;
	private $senha;
	private $cpf;
	private $telefone;
	private $permissao;
	private $data;
	private $altdata;


	public function setId($id){
		$this->id = $id;
	}
	public function getId(){
		return $this->id;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}
	public function getNome(){
		return $this->nome;
	}

	public function setEmail($email){
		$this->email = $email;
	}
	public function getEmail(){
		return $this->email;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}
	public function getSenha(){
		return $this->senha;
	}

	public function setCpf($cpf){
		$this->cpf = $cpf;
	}
	public function getCpf(){
		return $this->cpf;
	}

	public function setTelefone($telefone){
		$this->telefone = $telefone;
	}
	public function getTelefone(){
		return $this->telefone;
	}

	public function setPermissao($permissao){
		$this->permissao = $permissao;
	}
	public function getPermissao(){
		return $this->permissao;
	}

	public function setData($data){
		$this->data = $data;
	}
	public function getData(){
		return $this->data;
	}

	public function setAltdata($altdata){
		$this->altdata = $altdata;
	}
	public function getAltdata(){
		return $this->altdata;
	}

public static function select(){
	$sql = new Sql();
	return $sql->select("SELECT * FROM tb_usuarios");
}


/*-----------Pesquisar usuario-----------------*/
public static function search($email){
	$sql = new Sql();
	return $sql->select("SELECT * FROM tb_usuarios WHERE email LIKE :SEARCH ORDER BY email", array(
			':SEARCH'=>"%".$email."%"
	));
} 

/*---------------delete Usuario----------------------------*/
public function delete($dados = array()){
	$this->setId($dados['id']);
	$sql = new Sql();
	$sql->query("DELETE FROM tb_usuarios WHERE id=:ID",array(
		":ID"=>$this->getId()
	));
}

/*----------------select id Usuario-------------------------*/
public function selectUserId($dados = array()){
	$this->setId($dados['id']);
	$sql = new Sql();
	$result = $sql->select("SELECT nome, email, senha, cpf, telefone, permissao, data, altdata FROM tb_usuarios where id=:ID",array(
		":ID"=>$this->getId()
	));

	if (count($result) > 0) {
		$this->setRetorno($result[0]);
	}
}

/*--------------Inserir usuario -------------------------*/
	public function insert($dados = array()){
		//$this->setId($dados['id']);
		$this->setNome($dados['nome']);
		$this->setEmail($dados['email']);
		$this->setSenha($dados['senha']);
		$this->setCpf($dados['cpf']);
		$this->setTelefone($dados['telefone']);
		$this->setPermissao($dados['permissao']);
		$this->setData(date('2018-06-21 00:00:00'));
		//$this->setAltdata($dados['altdata']);
		$sql = new Sql();
		$result = $sql->query("INSERT INTO tb_usuarios (nome, email, senha, cpf, telefone, permissao, data) VALUES (:NOME, :EMAIL, :SENHA, :CPF, :TELEFONE, :PERMISSAO, :DATA)", array(
				":NOME"=>$this->getNome(),
				":EMAIL"=>$this->getEmail(),
				":SENHA"=>$this->getSenha(),
				":CPF"=>$this->getCpf(),
				":TELEFONE"=>$this->getTelefone(),
				":PERMISSAO"=>$this->getPermissao(),
				":DATA"=>$this->getData()
				//":ALTDATA"=>$this->getAltdata()
				//":ID"=>$this->getId();
			));
	}

/*-------------------update usuario-----------------------------------*/
	public function update($dados = array()){
			$this->setId($dados['id']);
			$this->setNome($dados['nome']);
			$this->setEmail($dados['email']);
			$this->setSenha($dados['senha']);
			$this->setCpf($dados['cpf']);
			$this->setTelefone($dados['telefone']);
			$this->setPermissao($dados['permissao']);
			//$this->setData(date('Y-m-d H:i:s'));
			$this->setAltdata(date('Y-m-d H:i:s'));
			$sql = new Sql();
			$sql->query("UPDATE tb_usuarios SET nome=:NOME, email=:EMAIL, senha=:SENHA, cpf=:CPF, telefone=:TELEFONE, permissao=:PERMISSAO, altdata=:ALTDATA WHERE id=:ID", array(
					":NOME"=>$this->getNome(),
					":EMAIL"=>$this->getEmail(),
					":SENHA"=>$this->getSenha(),
					":CPF"=>$this->getCpf(),
					":TELEFONE"=>$this->getTelefone(),
					":PERMISSAO"=>$this->getPermissao(),
					//":DATA"=>$this->getData()
					":ALTDATA"=>$this->getAltdata(),
					":ID"=>$this->getId()
				));
		}

	/*----------------retorno do select------------------*/
	public function setRetorno($value){
			//$this->setId($value['id']);
			$this->setNome($value['nome']);
			$this->setEmail($value['email']);
			$this->setSenha($value['senha']);
			$this->setCpf($value['cpf']);
			$this->setTelefone($value['telefone']);
			$this->setPermissao($value['permissao']);
			$this->setData($value['data']);
			$this->setAltdata($value['altdata']);
	}

	/*---------------------retorno em json------------------------*/
	public function __toString(){

			return json_encode(array(
					":ID"=>$this->getId(),
					":NOME"=>$this->getNome(),
					":EMAIL"=>$this->getEmail(),
					":SENHA"=>$this->getSenha(),
					":CPF"=>$this->getCpf(),
					":TELEFONE"=>$this->getTelefone(),
					":PERMISSAO"=>$this->getPermissao(),
					":DATA"=>$this->getData(),
					":ALTDATA"=>$this->getAltdata()
			));

	}

}






 ?>