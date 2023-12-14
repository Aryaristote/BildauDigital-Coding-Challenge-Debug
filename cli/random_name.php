<?php

/**
 * 1) This script should print  "Here is the name: $name - $name2"
 * $name variables are decided as seen in the code, fix all the bugs whilst keeping the functionality!
 *
 * 2) The print_r should print 5 random names; Please modify only the functions themselves, not the way we invoke them.
 */

$arr = [];

/**
 * Combines two names and prints the result.
 *
 * @param string $str1 - The first name.
 * @param string $str2 - The second name.
 */
function combineNames($str1 = "", $str2 = "")
{
    $params = [$str1, $str2];
    foreach ($params as &$param) {
        if ($param == "") {
            $param = randomHeroName();
        }
    }
    echo implode(" - ", $params);
}

/**
 * Generates random hero names and populates the given array.
 *
 * @param array $arr - The array to store random hero names.
 * @param int $amount - The number of hero names to generate.
 */
function randomGenerate(&$arr, $amount)
{
    for ($i = $amount; $i > 0; $i--) {
        array_push($arr, randomHeroName());
    }
}

/**
 * Generates a random hero name by combining first and last names.
 *
 * @return string - The random hero name.
 */
function randomHeroName()
{
    $hero_firstnames = ["captain", "doctor", "iron", "Hank", "ant", "Wasp", "the", "Hawk", "Spider", "Black"];
    $hero_lastnames = ["America", "Strange", "man", "Pym", "girl", "hulk", "eye", "widow", "panther", "daredevil"];
    $heroes = [$hero_firstnames, $hero_lastnames];
    return $heroes[0][rand(0, 9)] . " " . $heroes[1][rand(0, 9)];
}

echo "Here is the name: ";
combineNames();

echo PHP_EOL . PHP_EOL;

$fiveHeroesHolder = [];
randomGenerate($fiveHeroesHolder, 5);
print_r($fiveHeroesHolder);

?>