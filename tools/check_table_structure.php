<?php
require '../app/Config/Database.php';

try {
    $db = \Config\Database::connect();
    
    // Get table structure
    $fields = $db->getFieldData('merchandise_reviews');
    
    echo "Table structure for merchandise_reviews:\n";
    foreach ($fields as $field) {
        printf("Column: %s\n", $field->name);
        printf("Type: %s\n", $field->type);
        printf("Max Length: %d\n", $field->max_length);
        printf("Nullable: %s\n", $field->nullable ? 'YES' : 'NO');
        printf("Default: %s\n", $field->default);
        printf("Primary key: %s\n", $field->primary_key ? 'YES' : 'NO');
        echo "-------------------\n";
    }
    
    // Check specific review
    $review = $db->query("SELECT * FROM merchandise_reviews WHERE id = 11")->getRowArray();
    echo "\nFull review record #11:\n";
    print_r($review);

} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
}