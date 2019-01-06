<?php

require_once "../db/db.php";

class Lead{
    private $db;

    private $nome;
    private $dataNascimento;
    private $email;
    private $telefone;
    private $regiao;
    private $unidade;
    private $score = 10;

    public function __construct($nome, $dataNascimento, $email, $telefone, $regiao, $unidade){
        $this->db = new DB();

        if(strlen($nome) > 0 && strlen($nome) < 255){
            $this->nome = $nome;
        }
        else{
            $this->nome = substr($nome, 0, 255);
        }

        if(strlen($email) > 0 && strlen($email) < 100){
            $this->email = $email;
        }
        else{
            $this->email = substr($email, 0, 100);
        }

        if(strlen($telefone) > 0 && strlen($telefone) < 15){
            $this->telefone = $telefone;
        }
        else{
            $this->telefone = substr($telefone, 0, 15);
        }

        if(strlen($regiao) > 0 && strlen($regiao) < 13){
            $this->regiao = $regiao;
        }
        else{
            $this->regiao = substr($regiao, 0, 13);
        }

        if(strlen($unidade) > 0 && strlen($unidade) < 100){
            $this->unidade = $unidade;
        }
        else{
            $this->unidade = substr($unidade, 0, 100);
        }

        $this->dataNascimento = $dataNascimento;

        // Cálculo do Score
        # Por região
        if($this->regiao == "Norte"){
            $this->score -= 5;
        }
        else if($this->regiao == "Nordeste"){
            $this->score -= 4;
        }
        else if($this->regiao == "Centro-Oeste"){
            $this->score -= 3;
        }
        else if($this->regiao == "Sul"){
            $this->score -= 2;
        }
        else if($this->regiao == "Sudeste" && $this->unidade != "São Paulo"){
            $this->score -= 1;
        }

        # Por idade
        $data1 = date_create("2018-11-01");
        $data2 = date_create($this->dataNascimento);
        $idade = date_diff($data1, $data2)->format('%y');

        if($idade < 18 || $idade > 100){
            $this->score -=5;
        }
        else if($idade >= 40 && $idade <= 99){
            $this->score -= 3;
        }
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        if(strlen($nome) > 0 && strlen($nome) < 255){
            $this->nome = $nome;
        }
        else{
            $this->nome = substr($nome, 0, 255);
        }
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        if(strlen($email) > 0 && strlen($email) < 100){
            $this->email = $email;
        }
        else{
            $this->email = substr($email, 0, 100);
        }
    }


    public function getTelefone()
    {
        return $this->telefone;
    }
    public function setTelefone($telefone)
    {
        if(strlen($telefone) > 0 && strlen($telefone) < 15){
            $this->telefone = $telefone;
        }
        else{
            $this->telefone = substr($telefone, 0, 15);
        }
    }

    public function getRegiao()
    {
        return $this->regiao;
    }
    public function setRegiao($regiao)
    {
        if(strlen($regiao) > 0 && strlen($regiao) < 13){
            $this->regiao = $regiao;
        }
        else{
            $this->regiao = substr($regiao, 0, 13);
        }
    }

    public function getUnidade()
    {
        return $this->unidade;
    }
    public function setUnidade($unidade)
    {
        if(strlen($unidade) > 0 && strlen($unidade) < 100){
            $this->unidade = $unidade;
        }
        else{
            $this->unidade = substr($unidade, 0, 100);
        }
    }

    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }
    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }

    public function getScore(){
        return $this->score;
    }

    public function inserirLead(){
        try{
            $sql = "
                INSERT INTO leads(nome, email, telefone, regiao, unidade, data_nascimento, score, data_registro) VALUES
                (
                    '".$this->getNome()."',
                    '".$this->getEmail()."',
                    '".$this->getTelefone()."',
                    '".$this->getRegiao()."',
                    '".$this->getUnidade()."',
                    '".$this->getDataNascimento()."',
                    ".$this->getScore().",
                    NOW()
                );
            ";

            $this->db->query($sql);
            if(!$this->db->execute()){
                echo "Falhou :( <br />";
            }
            else{
                echo "<b>A operação foi realizada com sucesso!</b><br /><br />
                    Se você não for redirecionado para a página inicial 
                    <a href='../index.html'> clique aqui</a>!
                ";
            }
        }catch(Exception $e){
            echo "Erro de conexão com o banco: ".$e->getMessage();
        }
    }
}
?>