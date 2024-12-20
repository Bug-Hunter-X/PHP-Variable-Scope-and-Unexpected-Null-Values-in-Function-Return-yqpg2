In PHP, a common yet subtle error arises when dealing with variable scope within functions and loops.  Consider this example:

```php
function processData(array $data): array {
    $result = [];
    foreach ($data as $item) {
        $value = calculateValue($item);
        $result[] = $value; // Potential error here!
    }
    return $result;
}

function calculateValue($item) {
    $internalValue = $item * 2; // $internalValue only exists inside this function
    return $internalValue;
}
```

This code seems fine. However, if `calculateValue` had an error or was called incorrectly, a `Notice: Undefined variable: internalValue` might occur *outside* `calculateValue`. The issue isn't in `calculateValue` itself, but in how `$value` is handled if `calculateValue` unexpectedly doesn't return a value. It will silently use a null value, which may not always be apparent.

Another similar issue occurs with references, where unintended side effects can appear if references are used incorrectly, especially across function boundaries or in loops.