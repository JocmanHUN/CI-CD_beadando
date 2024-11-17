<?php

/**
 * Cocktail Shaker Sort
 * Rendez egy numerikus tömböt növekvő sorrendbe.
 *
 * @param array $array A rendezendő tömb.
 * @return array A rendezett tömb.
 */
function cocktailShakerSort(array $array): array
{
    $n = count($array);
    $swapped = true;

    while ($swapped) {
        $swapped = false;

        // Balról jobbra iterálás
        for ($i = 0; $i < $n - 1; $i++) {
            if ($array[$i] > $array[$i + 1]) {
                [$array[$i], $array[$i + 1]] = [$array[$i + 1], $array[$i]];
                $swapped = true;
            }
        }

        // Ha nincs csere, a tömb már rendezett
        if (!$swapped) {
            break;
        }

        $swapped = false;

        // Jobbról balra iterálás
        for ($i = $n - 1; $i > 0; $i--) {
            if ($array[$i] < $array[$i - 1]) {
                [$array[$i], $array[$i - 1]] = [$array[$i - 1], $array[$i]];
                $swapped = true;
            }
        }
    }

    return $array;
}

// Példa használat
$array = [5, 3, 8, 4, 2];
echo "Eredeti tömb: " . implode(", ", $array) . PHP_EOL;

$sortedArray = cocktailShakerSort($array);
echo "Rendezett tömb: " . implode(", ", $sortedArray) . PHP_EOL;
