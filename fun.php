<?php

$valio = 'Valio';
$kitas = 'KITAS';


// deklaracija

function fun($v, $kkk) {
   // global $valio; // BAD BAD VERY BAD
    echo '<h1>FUN!!!</h1>';
    echo "<h1>$v</h1>";
    echo "<h1>$kkk</h1>";
    $atgal = 123;

    // grazinti galima tiktai viena kintamaji, galime grazinti viena masyva kuriame daug elementu
    return $atgal;
}

/*function daugiklis($a, $b, $c) {
    $rez = $a * $b * $c;
    return "<h2>$rez</h2>";
}*/

/*function daugiklis(...$m) {
    $rez = $m[0] * $m[1] * $m[2];
    return "<h2>$rez</h2>";
}*/

function daugiklis($a, ...$m) {
    $rez = $m[0] * $m[1] * $a;
    return "<h2>$rez</h2>";
}
$mas = [5, 5, 10];

echo daugiklis(...$mas);

//statinis kintamasis

function kelintas() {
    static $k = 0;
    $k++;
    return $k;
}

 echo kelintas();
 echo kelintas();
 echo kelintas();
 echo kelintas();

// kvietimas
$belenkas = fun($valio, $kitas);

echo $belenkas;
$BR = '<br>';
// anonimine funkcija

$bevardo = function() {
    echo 'As neturiu vardo';
};

$bevardo();

echo '<pre>';

$string = md5(time());

$rez = preg_replace_callback('/[0-9]+/', 'h1', $string);

// arrow function fn($m) => '<h1 style="display: inline;">'.$m[0].'</h1>',

function h1($m) {
    print_r($m);
    return '<h1 style="display: inline;">'.$m[0].'</h1>';
}

echo$BR;
echo $string;


function funSum($a, $b) {
    return $b($a);
}

function meska($c) {
    return $c * 10;
}

echo $BR;
echo funSum(5, fn($x) => $x * 3);
echo$BR;
echo funSum(5, fn($x) => ++$x);
echo $BR;
echo funSum(5, 'meska');

$zuikis = fn() => fn() => 123;

//function zuikis() {
   // return fn() => 123;
//}

echo$BR;
echo $zuikis()();
echo $BR;

$masyvas = [$zuikis];

echo $masyvas[0]()();
echo $BR;

//rekursine funkcija

function recursive($num) {
    echo 'IN' . $num, '<br>';
    if($num < 3) {
        recursive($num + 1);
    }
    echo 'OUT' . $num, '<br>';
}


$startNum = 1;
recursive($startNum);

$rm = [
    3,
    [6, 4, [
        8, 1, [
            7, 1
        ], 7
    ], 9]
];

print_r($rm);


function arraySum($mas) {
    $suma = 0;
    foreach($mas as $value) {
        if (!is_array($value)) {
            $suma += $value;
        } else {
            $suma +=  arraySum($value);
        }
    }
    return $suma;
}

echo arraySum($rm);


$masyvax =  [
    ['a', 'd'],
    ['v', 'e'],
    ['a', 'c'],
    ['s', 'r'],
];

// arrow usort($masyvax, fn($a, $b) => )
usort($masyvax, function($a, $b) {
    return $a[0] <=> $b[0];
});

print_r($masyvax);

echo $BR;



?>