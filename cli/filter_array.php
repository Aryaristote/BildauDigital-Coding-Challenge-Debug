<?php

/**
 * The expected output is "apple, banana, cherry, tomato"
 * Please modify only the function itself, nothing else
 */

/**
 * Filters the input array to include only elements present in the valid options array.
 *
 * @param array $validOptions - The array containing valid options.
 * @param array $input - The array to be filtered.
 */
function filterArray($validOptions, $input) {
    // Iterate through each element in the input array
    foreach ($input as $key => $value) {
        // Check if the element is not in the valid options array
        if (!in_array($value, $validOptions)) {
            // Remove the element from the input array
            unset($input[$key]);
        }
    }

    // Output the filtered array as a comma-separated string
    echo implode(', ', $input);
}

// Test data
$input = ['apple', 'bear', 'beef', 'banana', 'cherry', 'tomato', 'car'];
$validOptions = ['apple', 'pear', 'banana', 'cherry', 'tomato'];

// Call the function
filterArray($validOptions, $input);
