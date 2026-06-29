<?php 
include 'includes/header.php';

$success = false;
$error = false;
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect and sanitize
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['phone'] ?? '');
    $subject = htmlspecialchars($_POST['subject'] ?? '');
    $msg = htmlspecialchars($_POST['message'] ?? '');

    // Validate
    if (empty($name) || empty($email) || empty($msg)) {
        $error = true;
        $message = 'Please fill in name, email and message.';
    } else {
        // Insert into DB
        try {
            require_once 'api/config.php';
            $stmt = $pdo->prepare("INSERT INTO inquiries (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$name, $email, $phone, $subject, $msg]);
            
            // Send email (optional – you can also use mail() or PHPMailer)
            $to = 'ceo@jandjlogistics.com';
            $emailSubject = "New Inquiry from $name";
            $body = "Name: $name\nEmail: $email\nPhone: $phone\nSubject: $subject\n\nMessage:\n$msg";
            mail($to, $emailSubject, $body, "From: noreply@jandjlogistics.com\r\nReply-To: $email");
            
            $success = true;
            $message = '✅ Inquiry sent! We\'ll get back to you within 24 hours.';
        } catch (PDOException $e) {
            $error = true;
            $message = '❌ Database error: ' . $e->getMessage();
        }
    }
}
?>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <h2 class="text-center mb-4">Get in Touch</h2>
            <p class="text-center text-muted">Send us a message and we'll reply within 24 hours.</p>
            
            <?php if ($message): ?>
                <div class="alert <?= $success ? 'alert-success' : 'alert-danger' ?>"><?= $message ?></div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="mb-3">
                    <label class="form-label">Full Name *</label>
                    <input type="text" name="name" class="form-control" required value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email *</label>
                    <input type="email" name="email" class="form-control" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone (optional)</label>
                    <input type="tel" name="phone" class="form-control" value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Subject</label>
                    <input type="text" name="subject" class="form-control" value="<?= htmlspecialchars($_POST['subject'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Message *</label>
                    <textarea name="message" class="form-control" rows="5" required><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                </div>
                <button type="submit" class="btn btn-warning w-100 py-2 fw-bold">Send Inquiry</button>
            </form>
            <div class="mt-4 text-center">
                <p class="mb-1"><i class="fab fa-whatsapp"></i> WhatsApp: <a href="https://wa.me/861234567890"t class="text-decoration-none">+86 123 4567 890</a></p>
                <p class="mb-0"><i class="fas fa-envelope"></i> info@jandjlogistics.com</p>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>