<?php

echo "Bem-Vindo(a)! \n";

$name          = $argv[1] ?? "Top Gun - Maverick";
$age           = $argv[2] ?? 2026;
$isPremiumPlan = true;
$movieOnlyInThePremiumPlan = $isPremiumPlan && $age > 2020
  ? 'sim' : 'não';

// $argc - 3 porque o argv das notas começa na 4 posição
// 0 nome do arquivo, 1 nome e 2 ano do filme.
$quantityRantings = $argc - 3;
$sumRating = 0;

for($i = 1; $i < $argc; $i ++) {
  if($i > 2)
    $sumRating += $argv[$i];
}
    
$rating = number_format($sumRating / $quantityRantings, 2, ",", ".");
$gender = match($name) {
  "Top Gun - Maverick" => "ação",
  default              => "não informado"
};

echo "O nome do filme é $name, foi lançado em $age e sua avaliação é $rating / 10. Seu gênero é $gender\n";
echo "Está somente no plano premium? $movieOnlyInThePremiumPlan \n";

print_r($argv);
