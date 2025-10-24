<?php
/**
 * Admin Layout Helper
 * Helper functions for admin layout management
 */

if (!function_exists('admin_layout')) {
    /**
     * Render admin layout with content
     */
    function admin_layout($page_title, $content, $custom_css = '', $custom_js = '') {
        $data = [
            'page_title' => $page_title,
            'content' => $content,
            'custom_css' => $custom_css,
            'custom_js' => $custom_js
        ];
        
        return view('admin/layouts/admin', $data);
    }
}

if (!function_exists('admin_page_header')) {
    /**
     * Generate admin page header
     */
    function admin_page_header($title, $icon, $action_text = '', $action_url = '') {
        $html = '<div class="page-header">';
        $html .= '<div class="page-title">';
        $html .= '<div class="page-icon">' . $icon . '</div>';
        $html .= '<span>' . htmlspecialchars($title) . '</span>';
        $html .= '</div>';
        
        if ($action_text && $action_url) {
            $html .= '<a href="' . htmlspecialchars($action_url) . '" class="add-btn">';
            $html .= '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">';
            $html .= '<line x1="12" y1="5" x2="12" y2="19"></line>';
            $html .= '<line x1="5" y1="12" x2="19" y2="12"></line>';
            $html .= '</svg>';
            $html .= '<span>' . htmlspecialchars($action_text) . '</span>';
            $html .= '</a>';
        }
        
        $html .= '</div>';
        return $html;
    }
}

if (!function_exists('admin_stats_card')) {
    /**
     * Generate admin stats card
     */
    function admin_stats_card($value, $label, $icon) {
        $html = '<div class="stat-card">';
        $html .= '<div class="stat-header">';
        $html .= '<div class="stat-icon">' . $icon . '</div>';
        $html .= '</div>';
        $html .= '<div class="stat-value">' . htmlspecialchars($value) . '</div>';
        $html .= '<div class="stat-label">' . htmlspecialchars($label) . '</div>';
        $html .= '</div>';
        return $html;
    }
}

if (!function_exists('admin_container')) {
    /**
     * Generate admin container
     */
    function admin_container($title, $content, $search_placeholder = '') {
        $html = '<div class="admin-container">';
        $html .= '<div class="table-header">';
        $html .= '<h3>' . htmlspecialchars($title) . '</h3>';
        
        if ($search_placeholder) {
            $html .= '<div class="search-box">';
            $html .= '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">';
            $html .= '<circle cx="11" cy="11" r="8"></circle>';
            $html .= '<path d="M21 21l-4.35-4.35"></path>';
            $html .= '</svg>';
            $html .= '<input type="text" placeholder="' . htmlspecialchars($search_placeholder) . '">';
            $html .= '</div>';
        }
        
        $html .= '</div>';
        $html .= $content;
        $html .= '</div>';
        return $html;
    }
}
?>

