# Admin Layout System

Sistem layout admin yang konsisten untuk semua halaman admin.

## Struktur File

```
app/Views/admin/
├── components/
│   ├── navbar.php          # Komponen navbar
│   └── sidebar.php         # Komponen sidebar
├── layouts/
│   └── admin.php           # Layout utama admin
├── helpers/
│   └── layout_helper.php   # Helper functions
└── README.md               # Dokumentasi ini
```

## Komponen

### 1. Navbar (`components/navbar.php`)
- Logo dan title "CVI Jatim Admin"
- User info dan logout button
- Konsisten di semua halaman

### 2. Sidebar (`components/sidebar.php`)
- Navigation menu dengan active state detection
- Sections: Dashboard, Content Management, Website
- Icons dan styling yang konsisten

### 3. Layout Utama (`layouts/admin.php`)
- Layout wrapper untuk semua halaman admin
- Include navbar dan sidebar
- Support custom CSS dan JS

## Penggunaan

### Cara 1: Menggunakan Layout Helper
```php
<?php
$content = '
    <div class="page-header">
        <h1>Page Title</h1>
    </div>
    <div class="content">
        <!-- Your content here -->
    </div>
';

echo admin_layout('Page Title - CVI Jatim', $content);
?>
```

### Cara 2: Menggunakan Include Manual
```php
<!doctype html>
<html lang="id">
<head>
    <title>Page Title - CVI Jatim</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/admin-layout.css') ?>">
</head>
<body>
    <div class="layout">
        <?php include APPPATH . 'Views/admin/components/navbar.php'; ?>
        <?php include APPPATH . 'Views/admin/components/sidebar.php'; ?>
        
        <main class="content">
            <!-- Your content here -->
        </main>
    </div>
</body>
</html>
```

## Helper Functions

### admin_page_header()
```php
echo admin_page_header(
    'Events Management',
    '<svg>...</svg>',
    'Add New Event',
    '/admin/events/create'
);
```

### admin_stats_card()
```php
echo admin_stats_card(
    '12',
    'Total Events',
    '<svg>...</svg>'
);
```

### admin_container()
```php
echo admin_container(
    'Event List',
    $table_content,
    'Search events...'
);
```

## CSS Classes

### Layout
- `.layout` - Main layout container
- `.topbar` - Top navigation bar
- `.sidebar` - Left sidebar
- `.content` - Main content area

### Navigation
- `.nav-item` - Navigation item
- `.nav-item.active` - Active navigation item
- `.nav-icon` - Navigation icon
- `.nav-title` - Section title

### Content
- `.page-header` - Page header
- `.page-title` - Page title
- `.page-icon` - Page icon
- `.add-btn` - Add button
- `.stat-card` - Statistics card
- `.admin-container` - Content container

## Active State Detection

Sidebar secara otomatis mendeteksi halaman aktif berdasarkan URL:
- `/admin` → Dashboard
- `/admin/events` → Events
- `/admin/merchandise` → Products
- `/admin/campground` → Locations
- `/admin/gallery` → Gallery
- `/admin/reviews` → Reviews

## Customization

### Custom CSS
```php
$custom_css = '
    .my-custom-class {
        background: #f0f0f0;
    }
';
echo admin_layout('Title', $content, $custom_css);
```

### Custom JS
```php
$custom_js = '
    document.addEventListener("DOMContentLoaded", function() {
        // Your custom JavaScript here
    });
';
echo admin_layout('Title', $content, '', $custom_js);
```

## Best Practices

1. **Konsistensi**: Selalu gunakan layout system untuk semua halaman admin
2. **Active State**: Biarkan sidebar mendeteksi active state secara otomatis
3. **Helper Functions**: Gunakan helper functions untuk komponen yang sering digunakan
4. **Custom Styling**: Gunakan custom CSS untuk styling khusus halaman
5. **Responsive**: Layout sudah responsive, pastikan konten juga responsive

