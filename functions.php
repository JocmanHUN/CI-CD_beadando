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
