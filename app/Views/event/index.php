<?php
// Event index page content
?>
<!-- Page Header -->
<section class="hero-section" style="padding: 3rem 0;">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">Events</h1>
            <p class="hero-subtitle">Jelajahi berbagai event menarik dari CVI Wirotaman</p>
        </div>
    </div>
</section>

<!-- Events List -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <?php if (!empty($events)): ?>
                <?php foreach ($events as $event): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card">
                            <img src="<?= base_url('assets/images/events/' . $event['image']) ?>" 
                                 class="card-img-top" 
                                 alt="<?= esc($event['title']) ?>"
                                 onerror="this.src='<?= base_url('assets/images/placeholder.svg') ?>'">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="card-title"><?= esc($event['title']) ?></h5>
                                    <span class="badge bg-<?= $event['status'] === 'upcoming' ? 'success' : ($event['status'] === 'ongoing' ? 'warning' : 'secondary') ?>">
                                        <?= ucfirst($event['status']) ?>
                                    </span>
                                </div>
                                <p class="card-text"><?= esc(substr($event['description'], 0, 120)) ?>...</p>
                                <div class="event-info mb-3">
                                    <p class="text-muted small mb-1">
                                        <i class="fas fa-map-marker-alt me-1"></i><?= esc($event['location']) ?>
                                    </p>
                                    <p class="text-muted small mb-1">
                                        <i class="fas fa-calendar me-1"></i>
                                        <?= date('d M Y', strtotime($event['start_date'])) ?>
                                        <?php if ($event['end_date'] !== $event['start_date']): ?>
                                            - <?= date('d M Y', strtotime($event['end_date'])) ?>
                                        <?php endif; ?>
                                    </p>
                                    <?php if ($event['price'] > 0): ?>
                                        <p class="text-muted small mb-1">
                                            <i class="fas fa-tag me-1"></i>Rp <?= number_format($event['price'], 0, ',', '.') ?>
                                        </p>
                                    <?php else: ?>
                                        <p class="text-success small mb-1">
                                            <i class="fas fa-gift me-1"></i>Gratis
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <a href="<?= base_url('event/detail/' . $event['id']) ?>" class="btn btn-primary">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <div class="py-5">
                        <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                        <h4 class="text-muted">Belum Ada Event</h4>
                        <p class="text-muted">Event akan segera hadir. Pantau terus website kami!</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php
// End of event index page
?>
