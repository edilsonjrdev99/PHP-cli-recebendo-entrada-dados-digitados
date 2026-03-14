<?php

function printMenu(string $name, string $formatBalance): void {
  echo "\n*** --- *** --- *** ---\n";
  echo "Olá $name, bem-vindo(a) ao Banco Dev! \n";
  echo "seu saldo é de: R$ $formatBalance reais.\n";
  echo "Deseja fazer alguma operação? \n\n";
  echo "1. Consultar saldo atual. \n2. Sacar valor \n3. Depositar valor \n4. Imprimir extratos\n5. Ver extratos impressos\n6. Sair\n";
}

function getTotalBalance(string $formatBalance): void {
  echo "\nO seu saldo atual é de R$ $formatBalance reais.\n";
}

function withDrawValue(float &$balance, string &$formatBalance): void {
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

function depositValue(float &$balance, string &$formatBalance): void {
  echo "Digite o valor que dejesa depositar... ";

  $value = (float) fgets(STDIN);

  if($value <= 0) {
    echo "\nO valor de depósito não pode ser uma string, negativo ou igual a 0.\n";
    return;
  }

  $balance      += $value;
  $formatValue   = number_format($value, 2, ",", ".");
  $formatBalance = number_format($balance, 2, ",", ".");

  echo "\nSaldo de R$ $formatValue reais depositado com sucesso, seu novo saldo é de R$ $formatBalance reais.\n";
}

function printBalance(string $name, string &$formatBalance): void {
  $uuid = uniqid();
  $file = __DIR__ . "/prints/$uuid.json";

  $balanceInformation = [
    'name'    => $name,
    'balance' => $formatBalance,
    'date'    => date("d/m/Y")
  ];

  file_put_contents($file, json_encode($balanceInformation));

  echo "\nExtrato impresso com sucesso!\n";
}

function getAllBalancePrints() {
  $filesPath = __DIR__ . "/prints/*.json";
  $files     = glob($filesPath);

  if(empty($files)) {
    echo "\nNão possui extratos.\n";
    return;
  }

  foreach($files as $file) {
    echo "\nExtratos retirados\n";
    
    $printBalance = json_decode(file_get_contents($file), true);

    echo "Data - " . $printBalance['date'] . "\n";
    echo "Nome: " . $printBalance['name'] . ", valor R$ " . $printBalance['balance'] . "\n";
  }
}