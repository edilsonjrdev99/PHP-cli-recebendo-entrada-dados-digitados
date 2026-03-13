<?php

// Exercício final do curso

echo "Olá, para iniciar você deve informar seu nome! \n";
echo "Digite seu nome... ";

$name          = trim(fgets(STDIN));
$balance       = 0;
$formatBalance = number_format($balance, 2, ",", ".");

function printMenu($name, $formatBalance) {
  echo "\n*** --- *** --- *** ---\n";
  echo "Olá $name, bem-vindo(a) ao Banco Dev! \n";
  echo "seu saldo é de: R$ $formatBalance \n";
  echo "Deseja fazer alguma operação? \n\n";
  echo "1. Consultar saldo atual. \n2. Sacar valor \n3. Depositar valor \n4. Sair\n";
}

function getTotalBalance($formatBalance) {
  echo "\nO seu saldo atual é de R$ $formatBalance reais.\n";
}

function depositValue($balance, $formatBalance) {
  echo "Digite o valor que dejesa depositar... ";

  $value         = (float) fgets(STDIN);
  $balance      += $value;
  $formatValue   = number_format($value, 2, ",", ".");
  $formatBalance = number_format($balance, 2, ",", ".");

  echo "\nSaldo de R$ $formatValue depositado com sucesso, seu novo saldo é de R$ $formatBalance reais.\n";
}

while(true) {
  printMenu($name, $formatBalance);

  // Ação
  echo "Digite o número da operação... ";
  $action = (int) fgets(STDIN);

  switch($action) {
    case 1:
      getTotalBalance($formatBalance);
    break;

    case 3:
      depositValue($balance, $formatBalance);
    break;

    case 4:
      echo "Adeus.\n";
      return;
  
    default:
      echo "Opção inválida. \n";
    break;
  }
}
