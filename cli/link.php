<?php

/**
 * This script should print 'Success'. Please keep the function invocations, modify only the function itself!
 */

/**
 * Checks if the given link is valid based on a set of unacceptable patterns.
 *
 * @param string $link - The link to be checked.
 *
 * @return bool - True if the link is valid, false otherwise.
 */
function isTheLinkValid(string $link)
{
    // List of unacceptable patterns in the link
    $unacceptables = array('https:', '.doc', '.pdf', '.jpg', '.jpeg', '.gif', '.bmp', '.png');

    // Check if the link contains any of the unacceptable patterns
    foreach ($unacceptables as $unacceptable) {
        if (strpos($link, $unacceptable) !== false) {
            return false;
        }
    }

    // If no unacceptable patterns are found, the link is considered valid
    return true;
}

// Test cases
echo isTheLinkValid('http://www.bildau.de/hack.pdf') === false
    && isTheLinkValid('https://bildau.de') === false
    && isTheLinkValid('http://bildau.de') === true
    && isTheLinkValid('http://bildau.de/test.txt') === true
    ? 'Success!' : 'Failure!';
