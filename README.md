# PHP Variable Scope and Unexpected Null Values

This repository demonstrates a common, yet subtle bug in PHP related to variable scope and unexpected null values returned from functions.

## The Bug
The core issue lies in how PHP handles the absence of a return value in a function.  In the `bug.php` file, the `calculateValue` function *could* potentially fail to return a value if there's an internal error.  The main `processData` function fails to check for null, leading to unexpected behavior when `calculateValue` returns nothing. It silently uses a null value which will cascade into errors later.

## The Solution
The `bugSolution.php` file demonstrates how to resolve this by explicitly checking the return value of `calculateValue` for null before using it.  This makes the code more robust and prevents unexpected behavior.

## How to Run
1. Clone this repository.
2. Run `bug.php` and observe the unexpected behavior.
3. Run `bugSolution.php` and observe the correct behavior.