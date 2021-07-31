<?php
namespace Banco\Modelo\Conta;

use Banco\Modelo\Conta\Titular;
use InvalidArgumentException;

abstract class Conta
{
    private Titular $titular;
    protected Float $saldo;
    private static Int $numeroDeContas = 0;

    public function __construct(Titular $titular)
    {
        $this->titular = $titular;
        $this->saldo = 0;

        self::$numeroDeContas++;
    }

    public function __destruct()
    {
        self::$numeroDeContas--;
    }

    abstract protected function percentualTarifa():float;

    public function sacar(float $valorASacar): void
    {
        $tarifaSaque = $valorASacar * $this->percentualTarifa();
        $valorSaque  = $valorASacar + $tarifaSaque;

        if ($valorSaque > $this->saldo) {
            throw new SaldoInsuficienteException($valorSaque, $this->saldo);
            
        }

        $this->saldo -= $valorSaque;
    }

    public function depositar(float $valorADepositar): void
    {
        if ($valorADepositar < 0) {
            throw new InvalidArgumentException();
        }

        $this->saldo += $valorADepositar;
    }

    public function recuperaSaldo(): float
    {
        return $this->saldo;
    }

    public function recuperaNomeTitular(): string
    {
        return $this->titular->recuperaNome();
    }

    public function recuperaCpfTitular(): string
    {
        return $this->titular->recuperaCpf();
    }

    public static function recuperaNumeroDeContas(): int
    {
        return self::$numeroDeContas;
    }

}
