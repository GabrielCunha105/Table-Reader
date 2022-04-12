<?php

class FormResponse {

    public DateTime $timestamp;
    public string $email;
    public string $tipo;
    public string $linkSIGA;
    public ?string $tituloCurto;
    public string $publicoAlvo;
    public string $contatoResponsavel;
    public ?string $telefoneAtendimento;
    public ?string $emailAtendimento;
    public string $descricao;
    public string $modalidade;
    public ?string $local;
    public DateTime $realizacaoInicio;
    public DateTime $realizacaoFim;
    public array $frequencia;
    public ?string $observacoesDiaHorario;
    public ?string $linkTransmissao;
    public ?int $vagasInternas;
    public ?int $vagasExternas;
    public ?string $linkInscricoes;
    public ?string $emailInscricoes;
    public ?DateTime $inicioInscricoes;
    public ?DateTime $fimInscricoes;
    public ?string $linkRedesSociais;
    public ?string $linkImagem;
    public ?string $linkArquivosComplementares;
    public ?string $observacoesFinais;

    function __construct($row)
    {
        $this->timestamp = DateTime::createFromFormat("m/d/Y H:i:s", $row[0]);
        $this->email = $row[1];
        $this->tipo = $row[3];
        $this->linkSIGA = $row[4];
        $this->tituloCurto = $row[5]? $row[5] : null;
        $this->publicoAlvo = $row[6];
        $this->contatoResponsavel = $row[7];
        $this->telefoneAtendimento = $row[8]? $row[8] : null;
        $this->emailAtendimento = $row[9]? $row[9] : null;
        $this->descricao = $row[10];
        $this->modalidade = $row[11];
        $this->local = $row[12]? $row[12] : null;
        $this->realizacaoInicio = DateTime::createFromFormat("m/d/Y", $row[13]);
        $this->realizacaoFim = DateTime::createFromFormat("m/d/Y", $row[14]);
        $this->frequencia["segunda"] = $row[15]? explode(", ", $row[15]) : [];
        $this->frequencia["terca"] = $row[16]? explode(", ", $row[16]) : [];
        $this->frequencia["quarta"] = $row[17]? explode(", ", $row[17]) : [];
        $this->frequencia["quinta"] = $row[18]? explode(", ", $row[18]) : [];
        $this->frequencia["sexta"] = $row[19]? explode(", ", $row[19]) : [];
        $this->frequencia["sabado"] = $row[20]? explode(", ", $row[20]) : [];
        $this->frequencia["domingo"] = $row[21]? explode(", ", $row[21]) : [];
        $this->frequencia["assincronas"] = $row[22]? explode(", ", $row[22]) : [];
        $this->observacoesDiaHorario = $row[23]? $row[23] : null;
        $this->linkTransmissao = $row[24]? $row[24] : null;
        $this->vagasInternas = $row[25]? intval($row[25]) : null;
        $this->vagasExternas = $row[26]? intval($row[26]) : null;
        $this->linkInscricoes = $row[27]? $row[27] : null;
        $this->emailInscricoes = $row[28]? $row[28] : null;
        $this->inicioInscricoes = $row[29]? DateTime::createFromFormat("m/d/Y H:i:s", $row[29]) : null;
        $this->fimInscricoes = $row[30]? DateTime::createFromFormat("m/d/Y H:i:s", $row[30]) : null;
        $this->linkRedesSociais = $row[31]? $row[31] : null;
        $this->linkImagem = $row[32]? $row[32] : null;
        $this->linkArquivosComplementares = $row[33]? $row[33] : null;
        $this->observacoesFinais = $row[34];
    }

}

?>