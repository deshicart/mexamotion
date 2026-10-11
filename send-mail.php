<?php
/**
 * Mexa Motion - Contact Form Handler
 * Processes AJAX form submissions and sends emails via PHPMailer
 */

// Set response header
header('Content-Type: application/json');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Get raw input
$input = json_decode(file_get_contents('php://input'), true);

// Validate required fields
$required = ['name', 'email', 'whatsapp', 'service', 'description'];
$errors = [];

foreach ($required as $field) {
    if (empty($input[$field]) || !is_string($input[$field])) {
        $errors[$field] = ucfirst(str_replace('-', ' ', $field)) . ' is required';
    }
}

// Validate email format
if (!empty($input['email']) && !filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Please enter a valid email address';
}

// Validate whatsapp (basic check)
if (!empty($input['whatsapp']) && !preg_match('/^[\+]?[\d\s\-\(\)]{10,}$/', $input['whatsapp'])) {
    $errors['whatsapp'] = 'Please enter a valid phone number';
}

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Validation failed', 'errors' => $errors]);
    exit;
}

// Sanitize inputs
$name = htmlspecialchars(trim($input['name']));
$email = htmlspecialchars(trim($input['email']));
$whatsapp = htmlspecialchars(trim($input['whatsapp']));
$service = htmlspecialchars(trim($input['service']));
$budget = !empty($input['budget']) ? htmlspecialchars(trim($input['budget'])) : 'Not specified';
$description = htmlspecialchars(trim($input['description']));

// Service label mapping
$serviceLabels = [
    'video-editing' => 'Video Editing — YouTube & Social Media',
    'motion-graphics' => 'Motion Graphics — Animation & Visual Effects',
    'thumbnail-design' => 'Thumbnail Design — High-CTR Thumbnails',
    'brand-videos' => 'Brand Videos — Promotional & Corporate',
    'youtube-content' => 'YouTube Content — Long & Short Form',
    'social-media-ads' => 'Social Media Ads — Reels, TikTok & More',
    'product-videos' => 'Product Videos — Showcase Your Products',
    'custom' => 'Custom / Multiple Services'
];

$serviceLabel = $serviceLabels[$service] ?? $service;

// Email configuration
$to = 'hello@mexamotion.com'; // Replace with actual email
$subject = "New Project Inquiry: $serviceLabel";

// Email body (HTML)
$message = "
<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <style>
    body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; line-height: 1.6; color: #1e293b; max-width: 600px; margin: 0 auto; padding: 20px; }
    .header { background: linear-gradient(135deg, #1152DF, #3B82F6); color: white; padding: 30px; border-radius: 12px 12px 0 0; }
    .header h1 { margin: 0; font-size: 24px; }
    .content { background: #f8fafc; padding: 30px; border: 1px solid #e2e8f0; border-top: none; border-radius: 0 0 12px 12px; }
    .field { margin-bottom: 20px; }
    .label { font-size: 12px; text-transform: uppercase; letter-spacing: 0.05em; color: #64748b; font-weight: 600; margin-bottom: 6px; }
    .value { font-size: 16px; color: #0f172a; }
    .description { background: white; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; white-space: pre-wrap; }
    .footer { text-align: center; padding: 20px; color: #94a3b8; font-size: 13px; }
  </style>
</head>
<body>
  <div class='header'>
    <h1>🎬 New Project Inquiry</h1>
    <p style='margin: 10px 0 0; opacity: 0.9;'>Mexa Motion — Contact Form Submission</p>
  </div>
  <div class='content'>
    <div class='field'>
      <div class='label'>Service Requested</div>
      <div class='value'>$serviceLabel</div>
    </div>
    <div class='field'>
      <div class='label'>Name</div>
      <div class='value'>$name</div>
    </div>
    <div class='field'>
      <div class='label'>Email</div>
      <div class='value'><a href='mailto:$email' style='color: #1152DF; text-decoration: none;'>$email</a></div>
    </div>
    <div class='field'>
      <div class='label'>WhatsApp</div>
      <div class='value'><a href='https://wa.me/" . preg_replace('/[^0-9]/', '', $whatsapp) . "' style='color: #1152DF; text-decoration: none;'>$whatsapp</a></div>
    </div>
    <div class='field'>
      <div class='label'>Budget Range</div>
      <div class='value'>$budget</div>
    </div>
    <div class='field'>
      <div class='label'>Project Description</div>
      <div class='value description'>$description</div>
    </div>
  </div>
  <div class='footer'>
    <p>This inquiry was submitted via the Mexa Motion website contact form.</p>
    <p>Reply directly to this email to respond to the client.</p>
  </div>
</body>
</html>
";

// Plain text fallback
$plainMessage = "
New Project Inquiry - Mexa Motion

Service: $serviceLabel
Name: $name
Email: $email
WhatsApp: $whatsapp
Budget: $budget

Description:
$description

---
Submitted via Mexa Motion website contact form.
";

// Headers
$headers = [
    'MIME-Version: 1.0',
    'Content-type: text/html; charset=UTF-8',
    'From: Mexa Motion Website <noreply@mexamotion.com>',
    'Reply-To: ' . $email,
    'X-Mailer: PHP/' . phpversion()
];

// Send email
$sent = mail($to, $subject, $message, implode("\r\n", $headers));

if ($sent) {
    // Send auto-reply to client
    $clientSubject = "Thanks for contacting Mexa Motion — We've received your inquiry";
    $clientMessage = "
    <!DOCTYPE html>
    <html>
    <head>
      <meta charset='UTF-8'>
      <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; line-height: 1.6; color: #1e293b; max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #1152DF, #3B82F6); color: white; padding: 30px; border-radius: 12px 12px 0 0; text-align: center; }
        .header h1 { margin: 0; font-size: 24px; }
        .content { background: #f8fafc; padding: 30px; border: 1px solid #e2e8f0; border-top: none; border-radius: 0 0 12px 12px; }
        .btn { display: inline-block; background: linear-gradient(135deg, #1152DF, #3B82F6); color: white; padding: 14px 28px; border-radius: 50px; text-decoration: none; font-weight: 600; margin-top: 20px; }
        .footer { text-align: center; padding: 20px; color: #94a3b8; font-size: 13px; }
      </style>
    </head>
    <body>
      <div class='header'>
        <h1>Thanks for reaching out, $name! 🎬</h1>
      </div>
      <div class='content'>
        <p>We've received your inquiry about <strong>$serviceLabel</strong> and our team is already reviewing it.</p>
        <p>Here's what happens next:</p>
        <ul style='padding-left: 20px;'>
          <li style='margin-bottom: 10px;'><strong>Within 2 hours:</strong> Our producer Sadia will reach out via WhatsApp/Email to clarify details</li>
          <li style='margin-bottom: 10px;'><strong>Within 24 hours:</strong> You'll receive a custom proposal with timeline, pricing, and creative approach</li>
          <li style='margin-bottom: 10px;'><strong>Upon agreement:</strong> We'll kick off with a brief call and get started immediately</li>
        </ul>
        <p>In the meantime, feel free to explore our <a href='https://mexamotion.com/portfolio.php' style='color: #1152DF;'>portfolio</a> or check out our <a href='https://mexamotion.com/services.php' style='color: #1152DF;'>services</a>.</p>
        <a href='https://wa.me/8801XXXXXXXXX' class='btn'>Chat on WhatsApp</a>
      </div>
      <div class='footer'>
        <p>Mexa Motion — Creative Video & Motion Design Studio</p>
        <p>Dhaka, Bangladesh | Serving Globally</p>
      </div>
    </body>
    </html>
    ";

    $clientHeaders = [
        'MIME-Version: 1.0',
        'Content-type: text/html; charset=UTF-8',
        'From: Mexa Motion <hello@mexamotion.com>',
        'X-Mailer: PHP/' . phpversion()
    ];

    @mail($email, $clientSubject, $clientMessage, implode("\r\n", $clientHeaders));

    echo json_encode([
        'success' => true,
        'message' => 'Thank you! Your inquiry has been sent. We\'ll get back to you within 2 hours.'
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Failed to send email. Please try again or contact us directly at hello@mexamotion.com'
    ]);
}