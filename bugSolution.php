```php
<?php
function processData(array $data): array {
    $result = [];
    foreach ($data as $item) {
        $value = calculateValue($item);
        if ($value === null) { // Explicit null check
            // Handle the null value appropriately, e.g., log an error or use a default value
            $value = 0; // Example: Use 0 as a default value
            error_log('calculateValue returned NULL for item: ' . $item);
        }
        $result[] = $value;
    }
    return $result;
}

function calculateValue($item) {
    //Simulate potential error
    if ($item < 0) return null;
    $internalValue = $item * 2; 
    return $internalValue;
}

$data = [1, 2, 3, -1, 4, 5];
$result = processData($data);
print_r($result);
?>
```