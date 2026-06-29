<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services</title>
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <!-- Google Fonts (optional) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        /* ---------- RESET & BASE ---------- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f8faff;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .services-container {
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
        }

        /* ---------- HEADER ---------- */
        .services-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .services-header h2 {
            font-size: 2.8rem;
            font-weight: 800;
            color: #1a1a2e;
            margin-bottom: 12px;
            letter-spacing: -0.5px;
        }

        .services-header p {
            font-size: 1.15rem;
            color: #555;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* ---------- SERVICES GRID ---------- */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
        }

        /* ---------- SERVICE CARD ---------- */
        .service-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 40px 30px 35px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.06);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(0, 0, 0, 0.04);
        }

        .service-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.10);
        }

        /* subtle gradient line on top */
        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #2563eb, #7c3aed);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .service-card:hover::before {
            opacity: 1;
        }

        /* ---------- ICON ---------- */
        .service-icon {
            width: 68px;
            height: 68px;
            background: linear-gradient(135deg, #eef2ff, #e0e7ff);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: #2563eb;
            margin-bottom: 22px;
            transition: background 0.3s ease, color 0.3s ease;
        }

        .service-card:hover .service-icon {
            background: linear-gradient(135deg, #2563eb, #4f46e5);
            color: #ffffff;
        }

        /* ---------- CONTENT ---------- */
        .service-card h3 {
            font-size: 1.35rem;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 10px;
        }

        .service-card .badge {
            display: inline-block;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            background: #dbeafe;
            color: #2563eb;
            padding: 4px 14px;
            border-radius: 50px;
            margin-bottom: 14px;
        }

        .service-card p {
            font-size: 0.98rem;
            color: #555;
            line-height: 1.7;
            margin-bottom: 22px;
        }

        /* ---------- BUTTON ---------- */
        .btn-service {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            font-size: 0.95rem;
            color: #2563eb;
            text-decoration: none;
            padding: 8px 0;
            border-bottom: 2px solid transparent;
            transition: border-color 0.25s ease, gap 0.25s ease;
        }

        .btn-service i {
            font-size: 0.85rem;
            transition: transform 0.25s ease;
        }

        .btn-service:hover {
            border-bottom-color: #2563eb;
            gap: 14px;
        }

        .btn-service:hover i {
            transform: translateX(4px);
        }

        /* ---------- RESPONSIVE ---------- */
        @media (max-width: 768px) {
            .services-header h2 {
                font-size: 2.2rem;
            }
            .services-header p {
                font-size: 1rem;
                padding: 0 10px;
            }
            .services-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            .service-card {
                padding: 30px 22px 28px;
            }
        }

        @media (max-width: 480px) {
            .services-header h2 {
                font-size: 1.8rem;
            }
            .service-icon {
                width: 56px;
                height: 56px;
                font-size: 1.6rem;
            }
        }
    </style>
</head>
<body>

    <div class="services-container">
        <!-- Header -->
        <div class="services-header">
            <h2>Our Services</h2>
            <p>We offer tailored career support to help you stand out and succeed in today's competitive job market.</p>
        </div>

        <!-- Services Grid -->
        <div class="services-grid">

            <!-- Card 1 – CV Writing -->
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <h3>CV Writing &amp; Revamp <span style="font-weight:400;font-size:0.8rem;color:#888;">(ATS Ready)</span></h3>
                <span class="badge">ATS Optimized</span>
                <p>Get professionally crafted CVs optimized for Applicant Tracking Systems.</p>
                <a href="#" class="btn-service">
                    See More <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Card 2 – International Resumes -->
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-globe-americas"></i>
                </div>
                <h3>International Resumes</h3>
                <span class="badge">Global Standard</span>
                <p>Build globally accepted resumes that meet international standards.</p>
                <a href="#" class="btn-service">
                    See More <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Card 3 – Extra (optional – you can remove if you only need 2) -->
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Career Coaching</h3>
                <span class="badge">1-on-1</span>
                <p>Personalized coaching to help you ace interviews and negotiate offers.</p>
                <a href="#" class="btn-service">
                    See More <i class="fas fa-arrow-right"></i>
                </a>
            </div>

        </div>
    </div>

    <!-- ---------- JAVASCRIPT (optional interactions) ---------- -->
    <script>
        // Wait for the page to load
        document.addEventListener('DOMContentLoaded', function() {

            // 1. Smooth "See More" button clicks – you can replace # with actual links later
            const buttons = document.querySelectorAll('.btn-service');
            buttons.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    // If you want to prevent default for demo, uncomment:
                    // e.preventDefault();
                    // console.log('Clicked: ' + this.textContent.trim());
                    
                    // Example: show a simple alert (remove this in production)
                    // alert('You clicked: ' + this.textContent.trim());
                });
            });

            // 2. Optional: Add a subtle entrance animation on scroll
            const cards = document.querySelectorAll('.service-card');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.15 });

            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = `opacity 0.6s ease ${index * 0.15}s, transform 0.6s ease ${index * 0.15}s`;
                observer.observe(card);
            });

        });
    </script>

</body>
</html>