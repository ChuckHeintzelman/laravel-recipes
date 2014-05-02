<?php

/**
 * Split the array into three
 */
function index3way(array $array, $key)
{
    $columns = [[],[],[]];

    // Count weight
    $total_weight = 0;
    foreach ($array as $id => $info)
    {
        $total_weight += 2;
        $total_weight += count($info[$key]);
    }
    $column = 0;
    $end = ($total_weight / 3) * ($column + 1);
    $curr_weight = 0;
    foreach ($array as $id => $info)
    {
        $columns[$column][$id] = $info;
        $curr_weight += 1.5;
        $curr_weight += count($info[$key]);
        if ($curr_weight > $end)
        {
            $column++;
            $end = ($total_weight / 3) * ($column + 1);
        }
    }
    return $columns;
}

/**
 * Return a slug for a web page path
 */
function pageSlug($path)
{
    if ($path != '/')
    {
        return 'page-' . Str::slug(str_replace('/', '-', $path));
    }
    return 'page-home';
}

/**
 * Are we on a recipe route?
 */
function onRecipeRoute()
{
    return false;
}

/**
 * Convert an integer to roman
 */
function numberToRoman($num)
{
    // Make sure that we only use the integer portion of the value
    $n = intval($num);
    $result = '';

    // Declare a lookup array that we will use to traverse the number:
    $lookup = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400,
        'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10,
        'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);

    foreach ($lookup as $roman => $value)
    {
        // Determine the number of matches
        $matches = intval($n / $value);

        // Store that many characters
        $result .= str_repeat($roman, $matches);

        // Substract that from the number
        $n = $n % $value;
    }

    // The Roman numeral should be built, return it
    return $result;
}