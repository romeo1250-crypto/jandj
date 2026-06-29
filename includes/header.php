<!-- includes/header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>J&J Logistics – Dream · Create · Deliver</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Header specific CSS -->
    <link rel="stylesheet" href="assets/css/header.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="assets/images/logo.jpeg" alt="J&J Logistics" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php 
                        // Get current page filename (e.g., "index.php", "about.php")
                        $current = basename($_SERVER['PHP_SELF']);
                    ?>
                    <li class="nav-item"><a class="nav-link <?= ($current=='index.php')?'active':'' ?>" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link <?= ($current=='about.php')?'active':'' ?>" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link <?= ($current=='services.php')?'active':'' ?>" href="services.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link <?= ($current=='catalogue.php')?'active':'' ?>" href="catalogue.php">Catalogue</a></li>
                    <li class="nav-item"><a class="nav-link <?= ($current=='contact.php')?'active':'' ?>" href="contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main wrapper -->
    <main>