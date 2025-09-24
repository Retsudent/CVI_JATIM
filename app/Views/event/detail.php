<?php
// Event data based on ID
$event_id = $event_id ?? 'camping-ramadhan';

$events = [
    'camping-ramadhan' => [
        'title' => 'Camping Menyambut Ramadhan CVI WIROTAMAN 2025',
        'location' => 'Danau Telaga Ngebel, Ponorogo, Jawa Timur',
        'date' => '22-23 Februari 2025',
        'price' => 'Rp 75.000',
        'capacity' => 'Max 40 peserta',
        'status' => 'upcoming',
        'badge_text' => 'Upcoming',
        'badge_class' => 'bg-success',
        'image' => 'https://cviwirotaman.web.id/assets/img/event/camping-ramadhan.jpg',
        'description' => 'Bergabunglah dengan kami dalam acara camping khusus menyambut bulan suci Ramadhan 2025. Event ini akan diadakan di Danau Telaga Ngebel, Ponorogo dengan pemandangan danau yang menakjubkan dan udara yang sejuk.',
        'activities' => [
            'Camping malam di tepi danau',
            'Stargazing dan storytelling',
            'Sharing session tentang persiapan Ramadhan',
            'Morning walk mengelilingi danau',
            'Foto bersama dan dokumentasi'
        ],
        'facilities' => [
            'Tenda camping (2-3 orang per tenda)',
            'Makan 3x (dinner, breakfast, lunch)',
            'Snack dan minuman',
            'Peralatan camping lengkap',
            'Asuransi kegiatan',
            'Guide berpengalaman'
        ]
    ],
    'anniversary-2nd' => [
        'title' => 'Anniversary CVI Wirotaman 2nd',
        'location' => 'Wonder Park - Tawangmangu, Magetan',
        'date' => '10-11 Mei 2025',
        'price' => 'Rp 150.000',
        'capacity' => 'Max 100 peserta',
        'status' => 'upcoming',
        'badge_text' => 'Upcoming',
        'badge_class' => 'bg-success',
        'image' => 'https://cviwirotaman.web.id/assets/img/event/anniversary-2nd.jpg',
        'description' => 'Perayaan ulang tahun ke-2 CVI Wirotaman di Wonder Park Tawangmangu. Acara spesial dengan berbagai kegiatan seru, merchandise eksklusif, dan momen kebersamaan yang tak terlupakan.',
        'activities' => [
            'Upacara pembukaan anniversary',
            'Games dan kompetisi seru',
            'Sharing session pengalaman',
            'Merchandise launching',
            'Foto bersama dan dokumentasi',
            'Malam keakraban dengan api unggun'
        ],
        'facilities' => [
            'Tenda camping premium',
            'Makan 4x (dinner, breakfast, lunch, snack)',
            'Merchandise eksklusif anniversary',
            'Peralatan camping lengkap',
            'Asuransi kegiatan',
            'Guide berpengalaman',
            'Fotografer profesional'
        ]
    ],
    'halal-bi-halal' => [
        'title' => 'Halal Bi Halal CVI WIROTAMAN 2025',
        'location' => 'Bumi Perkemahan Gunung Kendil, Magetan',
        'date' => '12-13 April 2025',
        'price' => 'Rp 100.000',
        'capacity' => 'Max 60 peserta',
        'status' => 'upcoming',
        'badge_text' => 'Upcoming',
        'badge_class' => 'bg-success',
        'image' => 'https://cviwirotaman.web.id/assets/img/event/halal-bi-halal.jpg',
        'description' => 'Acara Halal Bi Halal komunitas CVI Wirotaman di Bumi Perkemahan Gunung Kendil. Momen silaturahmi dan kebersamaan setelah Ramadhan dengan suasana alam yang menenangkan.',
        'activities' => [
            'Shalat Idul Fitri berjamaah',
            'Halal bi halal dan silaturahmi',
            'Games dan hiburan',
            'Sharing session pengalaman Ramadhan',
            'Foto bersama keluarga besar CVI',
            'Makan bersama hidangan lebaran'
        ],
        'facilities' => [
            'Tenda camping (2-3 orang per tenda)',
            'Makan 3x (dinner, breakfast, lunch)',
            'Snack dan minuman',
            'Peralatan camping lengkap',
            'Asuransi kegiatan',
            'Guide berpengalaman',
            'Sound system untuk acara'
        ]
    ],
    'happy-camp' => [
        'title' => 'Happy Camp KOPDAR CVI JATIM',
        'location' => 'Bumi Perkemahan Karanganyar, Ngawi',
        'date' => '02-03 Maret 2024',
        'price' => 'Rp 200.000',
        'capacity' => 'Max 80 peserta',
        'status' => 'completed',
        'badge_text' => 'Completed',
        'badge_class' => 'bg-secondary',
        'image' => 'https://cviwirotaman.web.id/assets/img/event/happy-camp.jpg',
        'description' => 'Kopdar dan camping bersama komunitas CVI Jawa Timur di Bumi Perkemahan Karanganyar. Acara yang telah berhasil dilaksanakan dengan antusiasme tinggi dari seluruh anggota komunitas.',
        'activities' => [
            'Kopdar anggota CVI Jatim',
            'Sharing session dan networking',
            'Games dan kompetisi seru',
            'Camping malam bersama',
            'Foto bersama dan dokumentasi',
            'Malam keakraban dengan musik'
        ],
        'facilities' => [
            'Tenda camping (2-3 orang per tenda)',
            'Makan 4x (dinner, breakfast, lunch, snack)',
            'Snack dan minuman',
            'Peralatan camping lengkap',
            'Asuransi kegiatan',
            'Guide berpengalaman',
            'Sound system dan musik'
        ]
    ]
];

$event = $events[$event_id] ?? $events['camping-ramadhan'];

// Prefer local assets if available (public/assets/images/events or event)
$bannerSrc    = $event['image'];
$localGallery = [];
try {
    $candidateDirs = [
        FCPATH . 'assets/images/events/',
        FCPATH . 'assets/images/event/'
    ];
    foreach ($candidateDirs as $dir) {
        if (!is_dir($dir)) continue;
        // files that start with event_id, fallback to any
        $matchesId  = glob($dir . $event_id . '*.{jpg,jpeg,png,webp}', GLOB_BRACE) ?: [];
        $matchesAny = glob($dir . '*.{jpg,jpeg,png,webp}', GLOB_BRACE) ?: [];
        if (!empty($matchesId)) {
            $bannerSrc = base_url(str_replace(FCPATH, '', $matchesId[0]));
        } elseif (!empty($matchesAny) && $bannerSrc === $event['image']) {
            $bannerSrc = base_url(str_replace(FCPATH, '', $matchesAny[0]));
        }
        foreach ($matchesAny as $p) {
            $localGallery[] = base_url(str_replace(FCPATH, '', $p));
        }
        // If found in one dir, no need to check others for banner
        if (!empty($matchesId) || !empty($matchesAny)) {
            // keep collecting gallery from other dirs too
            continue;
        }
    }
} catch (Throwable $e) {
    // ignore and fallback to remote urls
}
?>

<!-- Page Header -->
<section class="hero-section" data-animate="zoom-in">
    <div class="container">
        <div class="hero-content text-center">
            <!-- Page Icon Above Title -->
            <div class="mb-3">
                <i class="fas fa-calendar-alt fa-4x" style="color: var(--accent-green);"></i>
            </div>
            
            <!-- Page Title Below Icon -->
            <h1 class="hero-title">
                Detail Event
            </h1>
            <p class="hero-subtitle">
                Informasi lengkap tentang event CVI Wirotaman
            </p>
        </div>
    </div>
</section>

<!-- Event Detail Content -->
<section class="py-5" data-animate="fade-up">
    <div class="container">
        <!-- Event Header -->
        <div class="card mb-4" style="background: linear-gradient(135deg, #f8fff8 0%, #e6ffe6 100%); border: none;">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <span class="badge <?= $event['badge_class'] ?> fs-6 px-3 py-2"><?= $event['badge_text'] ?></span>
                    <small class="text-muted fs-6"><?= $event['date'] ?></small>
                        </div>
                        
                <h2 class="card-title mb-4" style="color: var(--primary-green);"><?= $event['title'] ?></h2>
                
                <div class="mb-4">
                    <div class="position-relative" style="cursor: pointer;" onclick="openBannerModal()">
                        <img src="<?= $bannerSrc ?>" alt="<?= htmlspecialchars($event['title']) ?>" class="img-fluid rounded-3 shadow" style="width:100%; max-height:420px; object-fit:cover;">
                        <div class="position-absolute top-50 start-50 translate-middle">
                            <i class="fas fa-search-plus fa-3x text-white" style="opacity: 0.7;"></i>
                        </div>
                    </div>
                    <small class="text-muted d-block mt-2"><i class="fas fa-image me-1"></i>Banner event - klik gambar untuk memperbesar</small>
                </div>
                        
                <!-- Event Info Cards -->
                <div class="row g-3 mb-4">
                    <div class="col-md-3">
                        <div class="card h-100" style="background: rgba(255,255,255,0.8); border: 1px solid var(--accent-green);">
                            <div class="card-body text-center p-3">
                                <i class="fas fa-map-marker-alt mb-2" style="color: var(--accent-green); font-size: 1.5rem;"></i>
                                <h6 class="card-title mb-1" style="color: var(--primary-green);">Lokasi</h6>
                                <small class="text-muted"><?= $event['location'] ?></small>
                            </div>
                                    </div>
                                </div>
                    <div class="col-md-3">
                        <div class="card h-100" style="background: rgba(255,255,255,0.8); border: 1px solid var(--accent-green);">
                            <div class="card-body text-center p-3">
                                <i class="fas fa-calendar mb-2" style="color: var(--accent-green); font-size: 1.5rem;"></i>
                                <h6 class="card-title mb-1" style="color: var(--primary-green);">Tanggal</h6>
                                <small class="text-muted"><?= $event['date'] ?></small>
                            </div>
                                    </div>
                                </div>
                    <div class="col-md-3">
                        <div class="card h-100" style="background: rgba(255,255,255,0.8); border: 1px solid var(--accent-green);">
                            <div class="card-body text-center p-3">
                                <i class="fas fa-users mb-2" style="color: var(--accent-green); font-size: 1.5rem;"></i>
                                <h6 class="card-title mb-1" style="color: var(--primary-green);">Kapasitas</h6>
                                <small class="text-muted"><?= $event['capacity'] ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card h-100" style="background: rgba(255,255,255,0.8); border: 1px solid var(--accent-green);">
                            <div class="card-body text-center p-3">
                                <i class="fas fa-tag mb-2" style="color: var(--accent-green); font-size: 1.5rem;"></i>
                                <h6 class="card-title mb-1" style="color: var(--primary-green);">Harga</h6>
                                <small class="text-success fw-bold"><?= $event['price'] ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                <!-- Description -->
                <div class="mb-4">
                    <h5 style="color: var(--primary-green);">Deskripsi Event</h5>
                        <p class="card-text">
                            <?= $event['description'] ?>
                        </p>
                </div>
                
                <!-- WhatsApp Button -->
                <div class="text-center">
                    <a href="https://wa.me/083134846000?text=Halo, saya tertarik dengan event <?= urlencode($event['title']) ?>" 
                       class="btn btn-success btn-lg px-4 py-3" 
                       target="_blank" 
                       style="background: linear-gradient(135deg, #25D366, #128C7E); border: none; border-radius: 25px;">
                        <i class="fab fa-whatsapp me-2"></i>Daftar via WhatsApp
                    </a>
                                </div>
                            </div>
                        </div>
                        
        <!-- Activities and Facilities -->
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card h-100" style="background: rgba(255,255,255,0.9); border: 1px solid var(--accent-green);">
                    <div class="card-body">
                        <h5 class="card-title mb-3" style="color: var(--primary-green);">
                            <i class="fas fa-list me-2"></i>Aktivitas yang Akan Dilakukan
                        </h5>
                        <ul class="list-unstyled">
                            <?php foreach ($event['activities'] as $activity): ?>
                            <li class="mb-2">
                                <i class="fas fa-check me-2" style="color: var(--accent-green);"></i>
                                <?= $activity ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100" style="background: rgba(255,255,255,0.9); border: 1px solid var(--accent-green);">
                    <div class="card-body">
                        <h5 class="card-title mb-3" style="color: var(--primary-green);">
                            <i class="fas fa-tent me-2"></i>Fasilitas yang Disediakan
                        </h5>
                        <ul class="list-unstyled">
                            <?php foreach ($event['facilities'] as $facility): ?>
                            <li class="mb-2">
                                <i class="fas fa-check me-2" style="color: var(--accent-green);"></i>
                                <?= $facility ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Events -->
<section class="py-5" style="background: linear-gradient(135deg, #f8fff8 0%, #e6ffe6 100%);">
    <div class="container">
        <div class="section-title">
            <h2>Event Lainnya</h2>
            <p>Jelajahi event menarik lainnya dari CVI Wirotaman</p>
        </div>
        
        <div class="row g-4">
            <?php 
            $related_events = array_filter($events, function($key) use ($event_id) {
                return $key !== $event_id;
            }, ARRAY_FILTER_USE_KEY);
            
            $count = 0;
            foreach ($related_events as $key => $related_event): 
                if ($count >= 3) break;
            ?>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge <?= $related_event['badge_class'] ?>"><?= $related_event['badge_text'] ?></span>
                            <small class="text-muted"><?= $related_event['date'] ?></small>
                        </div>
                        <h5 class="card-title"><?= $related_event['title'] ?></h5>
                        <p class="card-text">
                            <?= substr($related_event['description'], 0, 100) ?>...
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="fas fa-map-marker-alt me-1"></i><?= $related_event['location'] ?>
                            </small>
                            <a href="<?= base_url('event/' . $key) ?>" class="btn btn-outline-primary btn-sm">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
            $count++;
            endforeach; 
            ?>
        </div>
    </div>
</section>

<script>
document.getElementById('eventRegistrationForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mendaftar...';
    submitBtn.disabled = true;
    
    // Simulate form submission
    setTimeout(() => {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
        
        // Show success message
        alert('Pendaftaran berhasil! Kami akan menghubungi Anda untuk konfirmasi lebih lanjut.');
        
        // Reset form
        this.reset();
    }, 2000);
});

// Banner modal function
function openBannerModal() {
    const bannerSrc = '<?= $bannerSrc ?>';
    const eventTitle = '<?= htmlspecialchars($event['title']) ?>';
    
    console.log('Opening banner modal:', { bannerSrc, eventTitle });
    
    // Remove existing modal if any
    const existingModal = document.getElementById('bannerModal');
    if (existingModal) {
        existingModal.remove();
    }
    
    const modalHtml = `
    <div class="modal fade" id="bannerModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">${eventTitle}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
            <img src="${bannerSrc}" alt="${eventTitle}" class="img-fluid" style="max-height: 80vh; border-radius: 8px;">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>`;
    
    document.body.insertAdjacentHTML('beforeend', modalHtml);
    
    // Check if Bootstrap is available
    if (typeof bootstrap === 'undefined') {
        console.error('Bootstrap is not loaded');
        alert('Bootstrap tidak tersedia. Modal tidak dapat dibuka.');
        return;
    }
    
    const modal = new bootstrap.Modal(document.getElementById('bannerModal'));
    modal.show();
    
    // Clean up modal when hidden
    document.getElementById('bannerModal').addEventListener('hidden.bs.modal', function() {
        this.remove();
    });
}

</script>