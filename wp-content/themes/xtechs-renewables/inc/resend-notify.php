<?php
/**
 * Admin notifications via Resend (parity with legacy Next.js: src/lib/email.ts).
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * @return bool True when RESEND_API_KEY is set and non-empty.
 */
function xtechs_resend_is_configured(): bool {
    return defined('RESEND_API_KEY') && is_string(RESEND_API_KEY) && RESEND_API_KEY !== '';
}

function xtechs_resend_admin_email(): string {
    if (defined('ADMIN_EMAIL') && is_string(ADMIN_EMAIL) && ADMIN_EMAIL !== '') {
        return ADMIN_EMAIL;
    }
    return 'inquiries@xtechsrenewables.com.au';
}

function xtechs_resend_from_email(): string {
    if (defined('FROM_EMAIL') && is_string(FROM_EMAIL) && FROM_EMAIL !== '') {
        return FROM_EMAIL;
    }
    return 'noreply@xtechsrenewables.com.au';
}

/**
 * @return string Melbourne-local formatted datetime for email footers.
 */
function xtechs_resend_melbourne_time_string(): string {
    return wp_date('d/m/Y, g:i a', time(), new DateTimeZone('Australia/Melbourne'));
}

/**
 * Stripe checkout URL with client_reference_id and prefilled_email (matches contact.js).
 */
function xtechs_booking_stripe_payment_url(string $booking_id, string $email): string {
    $base = defined('BOOKING_PAYMENT_URL') && is_string(BOOKING_PAYMENT_URL) && BOOKING_PAYMENT_URL !== ''
        ? BOOKING_PAYMENT_URL
        : 'https://buy.stripe.com/00weV61gj1G5gXF5C38Ra03';
    $args = [];
    if ($booking_id !== '') {
        $args['client_reference_id'] = $booking_id;
    }
    if ($email !== '') {
        $args['prefilled_email'] = $email;
    }
    return add_query_arg($args, $base);
}

/**
 * Send HTML email via Resend REST API.
 */
function xtechs_resend_send(string $to, string $subject, string $html): bool {
    if (!xtechs_resend_is_configured()) {
        if (defined('WP_DEBUG') && WP_DEBUG) {
            error_log('xtechs_resend: RESEND_API_KEY not set; skipped: ' . $subject);
        }
        return false;
    }

    $body = [
        'from' => xtechs_resend_from_email(),
        'to' => [$to],
        'subject' => $subject,
        'html' => $html,
    ];

    $response = wp_remote_post('https://api.resend.com/emails', [
        'timeout' => 15,
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . RESEND_API_KEY,
        ],
        'body' => wp_json_encode($body),
    ]);

    if (is_wp_error($response)) {
        error_log('xtechs_resend: request error: ' . $response->get_error_message());
        return false;
    }

    $code = (int) wp_remote_retrieve_response_code($response);
    if ($code < 200 || $code >= 300) {
        error_log('xtechs_resend: HTTP ' . $code . ' body: ' . wp_remote_retrieve_body($response));
        return false;
    }

    return true;
}

/**
 * Contact page style (sendContactNotification).
 *
 * @param array{firstName:string,lastName:string,email:string,subject:string,message:string} $data
 */
function xtechs_resend_send_contact_form_notification(array $data): void {
    $fn = $data['firstName'];
    $ln = $data['lastName'];
    $email = $data['email'];
    $subject = $data['subject'] !== '' ? $data['subject'] : '(no subject)';
    $message = $data['message'];
    $submitted = esc_html(xtechs_resend_melbourne_time_string());

    $html = '<!DOCTYPE html><html><head><style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #059669; color: white; padding: 20px; border-radius: 8px 8px 0 0; }
        .content { background-color: #f9fafb; padding: 20px; border: 1px solid #e5e7eb; }
        .field { margin: 15px 0; }
        .field-label { font-weight: bold; color: #374151; }
        .field-value { margin-top: 5px; color: #6b7280; white-space: pre-wrap; }
        .message-box { background-color: white; padding: 15px; border-radius: 8px; border-left: 4px solid #059669; margin-top: 10px; }
        .footer { margin-top: 30px; padding-top: 20px; border-top: 1px solid #e5e7eb; font-size: 12px; color: #9ca3af; }
    </style></head><body>
    <div class="container">
        <div class="header"><h2 style="margin: 0;">New Contact Form Submission</h2></div>
        <div class="content">
            <h3 style="color: #059669; margin-top: 0;">Contact Information</h3>
            <div class="field"><div class="field-label">Name:</div><div class="field-value">'
        . esc_html($fn . ' ' . $ln)
        . '</div></div>
            <div class="field"><div class="field-label">Email:</div><div class="field-value"><a href="mailto:'
        . esc_attr($email) . '">' . esc_html($email) . '</a></div></div>
            <div class="field"><div class="field-label">Subject:</div><div class="field-value">'
        . esc_html($subject) . '</div></div>
            <h3 style="color: #059669; margin-top: 30px;">Message</h3>
            <div class="message-box"><div class="field-value">' . nl2br(esc_html($message)) . '</div></div>
            <div class="footer">
                <p>This is an automated notification from xTechs Renewables website.</p>
                <p>Submitted at: ' . $submitted . '</p>
                <p><a href="mailto:' . esc_attr($email) . '">Reply to ' . esc_html(trim($fn . ' ' . $ln)) . '</a></p>
            </div>
        </div>
    </div></body></html>';

    xtechs_resend_send(xtechs_resend_admin_email(), 'Contact Form: ' . $subject, $html);
}

/**
 * Partner / generic lead (sendLeadNotification).
 *
 * @param array{leadId:string,name:string,email:string,phone?:string,message?:string,source?:string,tenantId?:string,ip?:string,leadType?:string} $data
 */
function xtechs_resend_send_lead_notification(array $data): void {
    $lead_id = $data['leadId'];
    $name = $data['name'];
    $email = $data['email'];
    $phone = isset($data['phone']) ? (string) $data['phone'] : '';
    $message = isset($data['message']) ? (string) $data['message'] : '';
    $source = isset($data['source']) ? (string) $data['source'] : '';
    $tenant = isset($data['tenantId']) ? (string) $data['tenantId'] : '';
    $ip = isset($data['ip']) ? (string) $data['ip'] : '';
    $lead_type = isset($data['leadType']) ? (string) $data['leadType'] : '';
    $submitted = esc_html(xtechs_resend_melbourne_time_string());

    $phone_block = $phone !== ''
        ? '<div class="field"><div class="field-label">Phone</div><div class="field-value"><a href="tel:'
            . esc_attr(preg_replace('/\s+/', '', $phone)) . '">' . esc_html($phone) . '</a></div></div>'
        : '';
    $msg_block = $message !== ''
        ? '<div class="field"><div class="field-label">Message</div><div class="field-value"><div class="message">'
            . nl2br(esc_html($message)) . '</div></div></div>'
        : '';
    $ip_block = $ip !== ''
        ? '<div class="field"><div class="field-label">IP</div><div class="field-value">' . esc_html($ip) . '</div></div>'
        : '';
    $lt_block = $lead_type !== ''
        ? '<div class="field"><div class="field-label">Lead type</div><div class="field-value">' . esc_html($lead_type) . '</div></div>'
        : '';

    // Local Business Partner pages send source like partner_grounded_grocer (legacy Next.js /api/leads).
    $is_partner_source = strpos($source, 'partner_') === 0;
    $header_title = $is_partner_source ? 'New Local Business Partner Lead' : 'New Lead Submission';
    $header_badge = $is_partner_source
        ? '<span style="display:inline-block;background:rgba(255,255,255,0.25);padding:4px 12px;border-radius:12px;font-size:12px;font-weight:600;margin-left:10px;vertical-align:middle;">'
            . esc_html($source) . '</span>'
        : '';

    $html = '<!DOCTYPE html><html><head><style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #111827; }
        .container { max-width: 680px; margin: 0 auto; padding: 20px; }
        .header { background-color: #0ea5e9; color: white; padding: 18px 20px; border-radius: 10px 10px 0 0; }
        .content { background-color: #f9fafb; padding: 20px; border: 1px solid #e5e7eb; border-top: 0; border-radius: 0 0 10px 10px; }
        .field { margin: 14px 0; }
        .field-label { font-weight: 700; color: #374151; }
        .field-value { margin-top: 4px; color: #111827; }
        .muted { color: #6b7280; }
        .message { background: #ffffff; border: 1px solid #e5e7eb; border-radius: 10px; padding: 14px; white-space: pre-wrap; }
        .meta { font-size: 12px; color: #6b7280; margin-top: 18px; }
    </style></head><body>
    <div class="container">
        <div class="header"><h2 style="margin:0;">' . esc_html($header_title) . $header_badge . '</h2></div>
        <div class="content">
            <div class="field"><div class="field-label">Lead ID</div><div class="field-value">' . esc_html($lead_id) . '</div></div>
            <div class="field"><div class="field-label">Name</div><div class="field-value">' . esc_html($name) . '</div></div>
            <div class="field"><div class="field-label">Email</div><div class="field-value"><a href="mailto:'
        . esc_attr($email) . '">' . esc_html($email) . '</a></div></div>'
        . $phone_block
        . '<div class="field"><div class="field-label">Source</div><div class="field-value">'
        . ($source !== '' ? esc_html($source) : '<span class="muted">(not provided)</span>') . '</div></div>'
        . $lt_block
        . '<div class="field"><div class="field-label">Tenant</div><div class="field-value">'
        . ($tenant !== '' ? esc_html($tenant) : '<span class="muted">(not provided)</span>') . '</div></div>'
        . $ip_block
        . $msg_block
        . '<div class="meta">Submitted at: ' . $submitted . '</div>
        </div>
    </div></body></html>';

    // Same subject pattern as Next.js sendLeadNotification (email.ts).
    $subj = 'New Lead - ' . $name . ($source !== '' ? ' (' . $source . ')' : '');
    xtechs_resend_send(xtechs_resend_admin_email(), $subj, $html);
}

/**
 * Booking created (sendBookingNotification) — payment pending, includes Stripe link.
 *
 * @param array<string, string> $data
 */
function xtechs_resend_send_booking_notification(array $data): void {
    $booking_id = $data['bookingId'] ?? '';
    $first = $data['firstName'] ?? '';
    $last = $data['lastName'] ?? '';
    $email = $data['email'] ?? '';
    $phone = $data['phone'] ?? '';
    $address = $data['address'] ?? '';
    $service = $data['serviceType'] ?? '';
    $date = $data['selectedDate'] ?? '';
    $time = $data['selectedTime'] ?? '';
    $notes = $data['notes'] ?? '';
    $payment_url = $data['paymentUrl'] ?? '';
    $payment_status = strtolower((string) ($data['paymentStatus'] ?? 'pending'));
    $pill = $payment_status === 'paid'
        ? '<span class="pill pill-paid">PAID</span>'
        : ($payment_status === 'pending'
            ? '<span class="pill pill-pending">PENDING</span>'
            : '<span class="pill pill-unknown">UNKNOWN</span>');
    $link_block = $payment_url !== ''
        ? '<div class="field"><div class="field-label">Payment link:</div><div class="field-value"><a href="'
            . esc_url($payment_url) . '">' . esc_html($payment_url) . '</a></div></div>'
        : '';
    $notes_block = $notes !== ''
        ? '<div class="notes"><div class="field-label">Additional Notes:</div><div class="field-value">'
            . nl2br(esc_html($notes)) . '</div></div>'
        : '';
    $id_block = $booking_id !== ''
        ? '<div class="field"><div class="field-label">Booking ID:</div><div class="field-value">' . esc_html($booking_id) . '</div></div>'
        : '';
    $submitted = esc_html(xtechs_resend_melbourne_time_string());

    $html = '<!DOCTYPE html><html><head><style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #059669; color: white; padding: 20px; border-radius: 8px 8px 0 0; }
        .content { background-color: #f9fafb; padding: 20px; border: 1px solid #e5e7eb; }
        .field { margin: 15px 0; }
        .field-label { font-weight: bold; color: #374151; }
        .field-value { margin-top: 5px; color: #6b7280; }
        .notes { background-color: #fef3c7; padding: 15px; border-radius: 8px; margin-top: 20px; }
        .status { background-color: #eef2ff; padding: 15px; border-radius: 8px; margin-top: 20px; border: 1px solid #c7d2fe; }
        .pill { display: inline-block; padding: 4px 10px; border-radius: 999px; font-size: 12px; font-weight: 600; }
        .pill-pending { background: #fff7ed; color: #9a3412; border: 1px solid #fed7aa; }
        .pill-paid { background: #ecfdf5; color: #065f46; border: 1px solid #a7f3d0; }
        .pill-unknown { background: #f3f4f6; color: #374151; border: 1px solid #e5e7eb; }
        .footer { margin-top: 30px; padding-top: 20px; border-top: 1px solid #e5e7eb; font-size: 12px; color: #9ca3af; }
    </style></head><body>
    <div class="container">
        <div class="header"><h2 style="margin: 0;">New Site Assessment Booking</h2></div>
        <div class="content">
            <h3 style="color: #059669; margin-top: 0;">Payment Status</h3>
            <div class="status">
                <div class="field"><div class="field-label">Status:</div><div class="field-value">' . $pill . '</div></div>'
        . $link_block
        . '<div class="field"><div class="field-label">Booking saved in database:</div><div class="field-value">Yes</div></div>'
        . $id_block
        . '</div>
            <h3 style="color: #059669; margin-top: 0;">Customer Details</h3>
            <div class="field"><div class="field-label">Name:</div><div class="field-value">' . esc_html($first . ' ' . $last) . '</div></div>
            <div class="field"><div class="field-label">Email:</div><div class="field-value"><a href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a></div></div>
            <div class="field"><div class="field-label">Phone:</div><div class="field-value"><a href="tel:' . esc_attr($phone) . '">' . esc_html($phone) . '</a></div></div>
            <div class="field"><div class="field-label">Address:</div><div class="field-value">' . esc_html($address) . '</div></div>
            <h3 style="color: #059669; margin-top: 30px;">Appointment Details</h3>
            <div class="field"><div class="field-label">Date:</div><div class="field-value">' . esc_html($date) . '</div></div>
            <div class="field"><div class="field-label">Time:</div><div class="field-value">' . esc_html($time) . '</div></div>
            <div class="field"><div class="field-label">Service Type:</div><div class="field-value">' . esc_html($service) . '</div></div>'
        . $notes_block
        . '<div class="footer">
                <p>This is an automated notification from xTechs Renewables website.</p>
                <p>Booking submitted at: ' . $submitted . '</p>
            </div>
        </div>
    </div></body></html>';

    $status_label = strtoupper($payment_status);
    xtechs_resend_send(
        xtechs_resend_admin_email(),
        'Site Assessment Booking (' . $status_label . ') - ' . $first . ' ' . $last,
        $html
    );
}

/**
 * Dispatch contact API success to the appropriate template.
 *
 * Local Business Partner forms POST here with source partner_* (not contact-form) → lead template + ADMIN_EMAIL.
 */
function xtechs_resend_notify_contact_lead_success(
    string $source,
    string $first_name,
    string $last_name,
    string $name,
    string $email,
    string $phone,
    string $subject,
    string $message,
    string $lead_id,
    string $lead_type,
    string $tenant_id
): void {
    $fn = $first_name;
    $ln = $last_name;
    if ($fn === '' && $ln === '' && $name !== '') {
        $parts = preg_split('/\s+/', trim($name), 2, PREG_SPLIT_NO_EMPTY);
        $fn = $parts[0] ?? '';
        $ln = isset($parts[1]) ? $parts[1] : '';
    }

    if ($source === 'contact-form') {
        xtechs_resend_send_contact_form_notification([
            'firstName' => $fn,
            'lastName' => $ln,
            'email' => $email,
            'subject' => $subject,
            'message' => $message,
        ]);
        return;
    }

    xtechs_resend_send_lead_notification([
        'leadId' => $lead_id,
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'message' => $subject !== '' ? ('Subject: ' . $subject . "\n\n" . $message) : $message,
        'source' => $source,
        'tenantId' => $tenant_id,
        'ip' => sanitize_text_field((string) ($_SERVER['REMOTE_ADDR'] ?? '')),
        'leadType' => $lead_type,
    ]);
}
