<?php


$pattern = 'GA0a!b1|cBdN@efg2hCiH3`jkD#lP4OmM%n^JVo\Q5pRE_<q=)SIK9rs6&tT*uUF,L-(vZ/7w~Wx+8yX>zY';

$lenght = strlen($pattern);
$password = [];
for($i = 0; $i < 10; $i++){
    $index = rand(0, 83);
    $password[] = $pattern[$index];
}

echo implode($password);



?>