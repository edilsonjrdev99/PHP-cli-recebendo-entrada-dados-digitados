<?php

function printMenu($name, $formatBalance) {
  echo "\n*** --- *** --- *** ---\n";
  echo "Olá $name, bem-vindo(a) ao Banco Dev! \n";
  echo "seu saldo é de: R$ $formatBalance reais.\n";
  echo "Deseja fazer alguma operação? \n\n";
  echo "1. Consultar saldo atual. \n2. Sacar valor \n3. Depositar valor \n4. Imprimir comprovante\n5. Sair\n";
}

function getTotalBalance($formatBalance) {
  echo "\nO seu saldo atual é de R$ $formatBalance reais.\n";
}

function withDrawValue(&$balance, &$formatBalance) {
  echo "Digite o valor que deseja sacar... ";
  $value = (float) fgets(STDIN);

  if($value <= 0) {
    echo "\nO valor saque não pode ser uma string, negativo ou igual a 0.\n";
    return;
  }

  if($value > $balance) {
    echo "\nO valor de saque não pode ser maior que seu saldo. Saldo atual é de R$ $formatBalance.\n";
    return;
  }

  $balance       = $balance - $value;
  $formatValue   = number_format($value, 2, ",", ".");
  $formatBalance = number_format($balance, 2, ",", ".");

  echo "\nSaque de R$ $formatValue reais realizado com sucesso! Seu novo saldo é de R$ $formatBalance reais.\n";
}

function depositValue(&$balance, &$formatBalance) {
  echo "Digite o valor que dejesa depositar... ";

  $value = (float) fgets(STDIN);

  if($value <= 0) {
    echo "O valor de depósito não pode ser uma string, negativo ou igual a 0.\n";
    return;
  }

  $balance      += $value;
  $formatValue   = number_format($value, 2, ",", ".");
  $formatBalance = number_format($balance, 2, ",", ".");

  echo "\nSaldo de R$ $formatValue reais depositado com sucesso, seu novo saldo é de R$ $formatBalance reais.\n";
}

function printBalance($name, &$formatBalance) {
  $uuid = uniqid();
  $file = __DIR__ . "/prints/$uuid.json";

  $balanceInformation = [
    'name'    => $name,
    'balance' => $formatBalance
  ];

  file_put_contents($file, json_encode($balanceInformation));

  echo "Extrato impresso com sucesso!";
}