<?php

if (!function_exists('view')) {
    /**
     * Load a view file
     */
    function view(string $view, array $data = []): string
    {
        // Start output buffering
        ob_start();
        
        // Include the view file
        $viewFile = APPPATH . 'Views/' . $view . '.php';
        if (file_exists($viewFile)) {
            // Extract data to variables
            extract($data);
            include $viewFile;
        } else {
            echo "View not found: " . $view;
        }
        
        // Get the content and clean buffer
        $content = ob_get_clean();
        
        return $content;
    }
}

if (!function_exists('render')) {
    /**
     * Render a complete page
     */
    function render(string $view, array $data = []): void
    {
        // Set default title if not provided
        if (!isset($data['title'])) {
            $data['title'] = 'CVI Wirotaman';
        }
        
        // Extract data to variables
        extract($data);
        
        // Include the main layout
        include APPPATH . 'Views/layouts/main.php';
    }
}

if (!function_exists('section')) {
    /**
     * Start a section (placeholder function)
     */
    function section(string $name): void
    {
        // This is a placeholder for compatibility
        // In our simple system, we don't need sections
    }
}

if (!function_exists('endSection')) {
    /**
     * End a section (placeholder function)
     */
    function endSection(): void
    {
        // This is a placeholder for compatibility
        // In our simple system, we don't need sections
    }
}
?>
