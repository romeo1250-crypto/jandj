<?php include 'includes/header.php'; ?>

<div class="container py-5">
    <h2 class="text-center mb-5">Our Services</h2>
    <div class="row g-4">
        <?php
        $services = [
            ['icon' => 'fa-search', 'title' => 'Sourcing & Procurement', 'desc' => 'Find the exact cars or parts you need at competitive factory prices.'],
            ['icon' => 'fa-check-circle', 'title' => 'Quality Inspection', 'desc' => 'Pre‑shipment inspections with photo/video reports for your peace of mind.'],
            ['icon' => 'fa-ship', 'title' => 'Shipping & Freight', 'desc' => 'Sea, air or rail – we choose the most cost‑effective route for your timeline.'],
            ['icon' => 'fa-file-contract', 'title' => 'Customs Clearance', 'desc' => 'Full documentation and handling of Kenyan import procedures.'],
            ['icon' => 'fa-tools', 'title' => 'After‑Sales Support', 'desc' => 'Warranty claims, replacement parts, and technical troubleshooting.'],
            ['icon' => 'fa-chart-line', 'title' => 'Market Intelligence', 'desc' => 'Insights on vehicle demand, pricing trends, and new models.'],
        ];
        foreach ($services as $s): ?>
            <div class="col-md-4">
                <div class="card h-100 text-center shadow-sm">
                    <div class="card-body">
                        <i class="fas <?= $s['icon'] ?> service-icon"></i>
                        <h5 class="card-title"><?= $s['title'] ?></h5>
                        <p class="card-text"><?= $s['desc'] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>