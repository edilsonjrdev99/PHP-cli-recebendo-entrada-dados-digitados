<?php

// Exercício final do curso
require_once __DIR__ . "/bank-account-functions.php";

echo "Olá, para iniciar você deve informar seu nome! \n";
echo "Digite seu nome... ";

$name          = trim(fgets(STDIN));
$balance       = 0;
$formatBalance = number_format($balance, 2, ",", ".");

while(true) {
  
  printMenu($name, $formatBalance);

  // Ação
  echo "Digite o número da operação... ";
  $action = (int) fgets(STDIN);

  switch($action) {
    case 1:
      getTotalBalance($formatBalance);
    break;

    case 2:
      withDrawValue($balance, $formatBalance);
    break;

    case 3:
      depositValue($balance, $formatBalance);
    break;

    case 4:
      echo printBalance($name, $formatBalance);
      return;

    case 5:
      echo "Adeus.\n";
      return;
  
    default:
      echo "Opção inválida. \n";
    break;
  }
}
