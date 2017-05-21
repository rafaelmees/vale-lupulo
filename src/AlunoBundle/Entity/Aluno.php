<?php

namespace AlunoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aluno
 *
 * @ORM\Table(name="aluno")
 * @ORM\Entity(repositoryClass="AlunoBundle\Repository\AlunoRepository")
 */
class Aluno {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var boolean
     *
     * @ORM\Column(name="american_pale_ale", type="boolean", nullable=true)
     */
    private $american_pale_ale;

    /**
     * @var boolean
     *
     * @ORM\Column(name="catarina_sour", type="boolean", nullable=true)
     */
    private $catarina_sour;

    /**
     * @var string
     *
     * @ORM\Column(name="cpf", type="string", length=255, unique=true)
     */
    private $cpf;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone", type="string", length=255)
     */
    private $telefone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_nascimento", type="date")
     */
    private $dataNascimento;

    /**
     * @var string
     *
     * @ORM\Column(name="cep", type="string", length=255)
     */
    private $cep;

    /**
     * @var string
     *
     * @ORM\Column(name="rua", type="string", length=255)
     */
    private $rua;

    /**
     * @var int
     *
     * @ORM\Column(name="numero", type="integer")
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="bairro", type="string", length=255)
     */
    private $bairro;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=255)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="cidade", type="string", length=255)
     */
    private $cidade;

    /**
     * @var string
     *
     * @ORM\Column(name="complemento", type="string", length=255, nullable=true)
     */
    private $complemento;


    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Aluno
     */
    public function setNome($nome) {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Aluno
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set american_pale_ale
     *
     * @param string $american_pale_ale
     *
     * @return Aluno
     */
    public function setAmericanPaleAle($american_pale_ale) {
        $this->american_pale_ale = $american_pale_ale;

        return $this;
    }

    /**
     * Get american_pale_ale
     *
     * @return string
     */
    public function getAmericanPaleAle() {
        return $this->american_pale_ale;
    }

    /**
     * Set catarina_sour
     *
     * @param string $catarina_sour
     *
     * @return Aluno
     */
    public function setCatarinaSour($catarina_sour) {
        $this->catarina_sour = $catarina_sour;

        return $this;
    }

    /**
     * Get catarina_sour
     *
     * @return string
     */
    public function getCatarinaSour() {
        return $this->catarina_sour;
    }

    /**
     * Set cpf
     *
     * @param string $cpf
     *
     * @return Aluno
     */
    public function setCpf($cpf) {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get cpf
     *
     * @return string
     */
    public function getCpf() {
        return $this->cpf;
    }

    /**
     * Set telefone
     *
     * @param string $telefone
     *
     * @return Aluno
     */
    public function setTelefone($telefone) {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get telefone
     *
     * @return string
     */
    public function getTelefone() {
        return $this->telefone;
    }

    /**
     * Set dataNascimento
     *
     * @param \DateTime $dataNascimento
     *
     * @return Aluno
     */
    public function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;

        return $this;
    }

    /**
     * Get dataNascimento
     *
     * @return \DateTime
     */
    public function getDataNascimento() {
        return $this->dataNascimento;
    }

    /**
     * Set cep
     *
     * @param string $cep
     *
     * @return Aluno
     */
    public function setCep($cep) {
        $this->cep = $cep;

        return $this;
    }

    /**
     * Get cep
     *
     * @return string
     */
    public function getCep() {
        return $this->cep;
    }

    /**
     * Set rua
     *
     * @param string $rua
     *
     * @return Aluno
     */
    public function setRua($rua) {
        $this->rua = $rua;

        return $this;
    }

    /**
     * Get rua
     *
     * @return string
     */
    public function getRua() {
        return $this->rua;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     *
     * @return Aluno
     */
    public function setNumero($numero) {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return int
     */
    public function getNumero() {
        return $this->numero;
    }

    /**
     * Set bairro
     *
     * @param string $bairro
     *
     * @return Aluno
     */
    public function setBairro($bairro) {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Get bairro
     *
     * @return string
     */
    public function getBairro() {
        return $this->bairro;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return Aluno
     */
    public function setEstado($estado) {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado() {
        return $this->estado;
    }

    /**
     * Set cidade
     *
     * @param string $cidade
     *
     * @return Aluno
     */
    public function setCidade($cidade) {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get cidade
     *
     * @return string
     */
    public function getCidade() {
        return $this->cidade;
    }

    /**
     * Set complemento
     *
     * @param string $complemento
     *
     * @return Aluno
     */
    public function setComplemento($complemento) {
        $this->complemento = $complemento;

        return $this;
    }

    /**
     * Get complemento
     *
     * @return string
     */
    public function getComplemento() {
        return $this->complemento;
    }
}

