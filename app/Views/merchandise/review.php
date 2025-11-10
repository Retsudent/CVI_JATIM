<style>
/* Container and card */
.review-wrapper{max-width:920px;margin:0 auto}
.review-card{background:#fff;border:1px solid #e6f2e6;border-radius:16px;box-shadow:0 6px 24px rgba(45,80,22,0.08)}
.review-header{padding:1.25rem 1.25rem 0 1.25rem}
.review-body{padding:1.25rem}
.review-title{color:#2d5016;font-weight:800;letter-spacing:.2px}
.review-hero{background:linear-gradient(135deg,#f0fff4,#e6ffe6);border:1px solid #d9f2d9;border-radius:16px;padding:1.25rem;display:flex;gap:1rem;align-items:center}

/* Inputs */
.form-group{margin-bottom:1.5rem}
.form-group label{font-weight:600;color:#2c3e50;margin-bottom:.5rem;display:block}
.form-control{display:block;width:100%;padding:.75rem 1rem;border:1px solid #d9e6d9;border-radius:12px;background:#fff;font-size:1rem;transition:all .2s ease}
.form-control:focus{outline:none;border-color:#3aa655;box-shadow:0 0 0 3px rgba(58,166,85,.1)}
textarea.form-control{min-height:120px;resize:vertical;font-family:inherit}
.form-help{font-size:.875rem;color:#6c757d;margin-top:.25rem}

/* Star Rating */
.rating-container{margin:.5rem 0}
.rating-stars{display:flex;gap:.5rem;align-items:center}
.rating-stars input{display:none}
.rating-stars label{font-size:2.5rem;cursor:pointer;color:#ddd;transition:all .2s ease;position:relative}
.rating-stars label:hover{color:#ffc107;transform:scale(1.1)}
.rating-stars label.active{color:#ffc107}
.rating-stars label.active:hover{color:#ffb300}

/* Required indicator */
.required{color:#dc3545;font-weight:bold}

/* Buttons */
.btn-green{background:linear-gradient(135deg,#3aa655,#6bbf59);border:none;color:white;padding:.75rem 2rem;border-radius:12px;font-weight:600;transition:all .2s ease}
.btn-green:hover{filter:brightness(.95);transform:translateY(-1px);box-shadow:0 4px 12px rgba(58,166,85,.3)}
.btn-outline{background:transparent;border:2px solid #3aa655;color:#3aa655;padding:.75rem 2rem;border-radius:12px;font-weight:600;text-decoration:none;transition:all .2s ease}
.btn-outline:hover{background:#3aa655;color:white;text-decoration:none}
.form-actions{display:flex;gap:1rem;align-items:center;margin-top:2rem}
</style>

<div class="container py-4 review-wrapper">
    <div class="review-card">
        <div class="review-header">
            <h2 class="review-title mb-1">Berikan Ulasan</h2>
            <p class="subtitle mb-0" style="color:#6b7a6c;">Bagikan pengalaman Anda tentang produk ini</p>
        </div>
        <div class="review-body">
            <div class="review-hero mb-3">
                <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" style="width:84px;height:84px;object-fit:cover;border-radius:12px;border:1px solid #e6f2e6" onerror="this.style.objectFit='contain'" />
                <div>
                    <h4 class="mb-1" style="color:#2c3e50;font-weight:700;"><?= htmlspecialchars($product['name']) ?></h4>
                    <div style="color:#6c757d;">Kategori: <?= htmlspecialchars($product['category']) ?> · <strong style="color:#2d6a4f;">Rp <?= number_format($product['price'],0,',','.') ?></strong></div>
                </div>
            </div>
    
    <form id="reviewForm" onsubmit="return submitReview(event);">
        <?= csrf_field() ?>
        <div class="form-section">
            <h4 class="mb-3" style="color:#2d6a4f;font-weight:700;">Rating & Ulasan</h4>
            
            <div class="form-group">
                <label>Rating <span class="required">*</span></label>
                <div class="rating-container">
                    <div class="rating-stars">
                        <input type="radio" name="rating" value="1" id="star1" required />
                        <label for="star1">★</label>
                        <input type="radio" name="rating" value="2" id="star2" required />
                        <label for="star2">★</label>
                        <input type="radio" name="rating" value="3" id="star3" required />
                        <label for="star3">★</label>
                        <input type="radio" name="rating" value="4" id="star4" required />
                        <label for="star4">★</label>
                        <input type="radio" name="rating" value="5" id="star5" required />
                        <label for="star5">★</label>
                    </div>
                </div>
                <div class="form-help">Pilih rating dari 1 (sangat buruk) sampai 5 (sangat baik)</div>
            </div>
            
            <div class="form-group">
                <label>Nama Anda <span class="required">*</span></label>
                <input type="text" name="customer_name" class="form-control" required placeholder="Masukkan nama lengkap Anda" />
                <div class="form-help">Nama akan ditampilkan di ulasan</div>
            </div>
            
            <div class="form-group">
                <label>Email <span class="required">*</span></label>
                <input type="email" name="customer_email" class="form-control" required placeholder="email@example.com" />
                <div class="form-help">Email tidak akan ditampilkan publik</div>
            </div>
            
            <div class="form-group">
                <label>Komentar/Ulasan <span class="required">*</span></label>
                <textarea name="comment" class="form-control" required placeholder="Bagikan pengalaman Anda menggunakan produk ini..." rows="4"></textarea>
                <div class="form-help">Ceritakan pengalaman Anda, kelebihan, kekurangan, atau saran</div>
            </div>
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn btn-green btn-lg" onclick="console.log('Submit button clicked');">
                📝 Kirim Ulasan
            </button>
            <a href="/merchandise/detail/<?= htmlspecialchars($product['id']) ?>" class="btn btn-outline">
                ← Kembali ke Produk
            </a>
        </div>
    </form>
        </div>
    </div>
</div>

<script>
// Interactive star rating
document.querySelectorAll('input[name="rating"]').forEach((radio, index) => {
    radio.addEventListener('change', function() {
        const labels = document.querySelectorAll('label[for^="star"]');
        labels.forEach(l => l.classList.remove('active'));
        for (let i = 0; i <= index; i++) document.querySelector(`label[for="star${i + 1}"]`).classList.add('active');
    });
    
    // Hover effect
    radio.addEventListener('mouseenter', function() {
        document.querySelectorAll('label[for^="star"]').forEach((label, labelIndex) => {
            if (labelIndex <= index) {
                label.style.color = '#ffc107';
            }
        });
    });
});

// Reset on mouse leave
document.querySelector('.rating-stars').addEventListener('mouseleave', function() {
    const checkedRadio = document.querySelector('input[name="rating"]:checked');
    if (checkedRadio) {
        const index = Array.from(document.querySelectorAll('input[name="rating"]')).indexOf(checkedRadio);
        const labels = document.querySelectorAll('label[for^="star"]');
        labels.forEach((label, labelIndex) => label.classList.toggle('active', labelIndex <= index));
    } else {
        document.querySelectorAll('label[for^="star"]').forEach(label => label.classList.remove('active'));
    }
});

// Custom form submission
function submitReview(event) {
    event.preventDefault();
    console.log('Custom form submission started...');
    
    // Get form data (include CSRF token automatically)
    const formEl = document.getElementById('reviewForm');
    const formData = new FormData(formEl);
    
    console.log('Form data:', {
        customer_name: formData.get('customer_name'),
        customer_email: formData.get('customer_email'),
        rating: formData.get('rating'),
        comment: formData.get('comment')
    });
    
    // Submit via fetch
    const productId = <?= json_encode($product['id']) ?>;
    console.log('Product ID:', productId);
    const url = '/merchandise/review/' + productId;
    console.log('Fetch URL:', url);
    const submitBtn = formEl.querySelector('button[type="submit"]');
    const originalBtnHTML = submitBtn ? submitBtn.innerHTML : null;
    if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.innerHTML = 'Loading...';
    }

    fetch(url, {
        method: 'POST',
        body: formData,
        // Ensure cookies/session are sent for same-origin requests
        credentials: 'same-origin',
        headers: {
            // Ask for JSON where possible; FormData will set its own Content-Type
            'Accept': 'application/json'
        }
    })
    .then(response => response.clone().text().then(text => ({ response, text })))
    .then(({ response, text }) => {
        console.log('Response received:', response);
        console.log('Response status:', response.status);
        console.log('Response body text:', text);

        // Try to parse JSON if present
        let json = null;
        try { json = JSON.parse(text); } catch (e) { /* not JSON */ }

        const isSuccess = (response.status === 201) || (json && (json.success === true || json.id));

        if (isSuccess) {
            console.log('✅ Review berhasil dikirim!', json);
            alert('Review berhasil dikirim! Terima kasih.');
            window.location.href = '/merchandise/detail/' + productId;
        } else {
            console.warn('Unexpected response or validation error', response.status, json);
            // Display error message from server
            const errorMsg = json && json.error ? json.error : 'Terjadi kesalahan. Pastikan semua field wajib telah diisi dengan benar.';
            alert(errorMsg);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error submitting review: ' + error.message);
    })
    .finally(() => {
        if (submitBtn) {
            submitBtn.disabled = false;
            if (originalBtnHTML !== null) submitBtn.innerHTML = originalBtnHTML;
        }
    });

    return false;
}
</script>


