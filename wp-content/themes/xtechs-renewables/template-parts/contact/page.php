<?php
if (!defined('ABSPATH')) {
    exit;
}

$today = new DateTimeImmutable('today');
$dates = [];
$cursor = $today;
while (count($dates) < 24) {
    $weekday = (int) $cursor->format('N'); // 1..7
    if ($weekday <= 5) {
        $dates[] = $cursor;
    }
    $cursor = $cursor->modify('+1 day');
}
?>
<section class="xt-contact">
    <div class="xt-container xt-contact-inner">
        <header class="xt-contact-head">
            <h1>Get in Touch</h1>
            <p>
                Ready to start your clean energy journey? Book a site assessment for a detailed quote,
                or contact us for a consultation. We're here to help you make the switch to renewable energy.
            </p>
        </header>

        <form class="xt-contact-unified" action="#" method="post" novalidate data-xt-unified-form>
            <section class="xt-contact-one">
                <div class="xt-contact-booking-card">
                    <h2 data-xt-contact-title>Book Site Assessment</h2>
                    <p data-xt-contact-sub>Schedule a professional site assessment for your solar, battery, or electrical project.</p>

                    <section class="xt-contact-step xt-contact-step-intent">
                        <p class="xt-contact-step-title">What would you like to do?</p>
                        <div class="xt-contact-intent-options" role="radiogroup" aria-label="What would you like to do?">
                            <label class="xt-contact-intent-option">
                                <input type="radio" name="intent" value="site-assessment" required data-xt-intent-option />
                                <span class="xt-contact-intent-body">
                                    <span class="xt-contact-intent-check" aria-hidden="true"></span>
                                    <span class="xt-contact-intent-text">Book site assessment</span>
                                </span>
                            </label>
                            <label class="xt-contact-intent-option">
                                <input type="radio" name="intent" value="message" required data-xt-intent-option />
                                <span class="xt-contact-intent-body">
                                    <span class="xt-contact-intent-check" aria-hidden="true"></span>
                                    <span class="xt-contact-intent-text">Send a message</span>
                                </span>
                            </label>
                        </div>
                    </section>

                    <section class="xt-contact-step" data-xt-booking-step>
                        <h3 class="xt-contact-step-title">
                            <?php echo xtechs_pv_clone_icon('calendar', 'xt-contact-step-ic'); ?>
                            Select Date
                        </h3>
                        <div class="xt-contact-dates" data-xt-booking-dates>
                            <?php foreach ($dates as $d) : ?>
                                <?php
                                $iso = $d->format('Y-m-d');
                                $is_today = $iso === $today->format('Y-m-d');
                                $cls = $is_today ? 'xt-contact-date is-today' : 'xt-contact-date';
                                ?>
                                <button type="button"
                                    class="<?php echo esc_attr($cls); ?>"
                                    data-xt-date="<?php echo esc_attr($iso); ?>"
                                    aria-pressed="false">
                                    <span class="xt-contact-date-dow"><?php echo esc_html($d->format('D')); ?></span>
                                    <span class="xt-contact-date-dm"><?php echo esc_html($d->format('j/n')); ?></span>
                                    <?php if ($is_today) : ?><span class="xt-contact-date-today">Today</span><?php endif; ?>
                                </button>
                            <?php endforeach; ?>
                        </div>
                    </section>

                    <section class="xt-contact-step" hidden data-xt-booking-times data-xt-booking-step>
                        <h3 class="xt-contact-step-title">
                            <?php echo xtechs_pv_clone_icon('clock', 'xt-contact-step-ic'); ?>
                            Select Time
                        </h3>
                        <div class="xt-contact-times" data-xt-time-grid></div>
                    </section>

                    <section class="xt-contact-step" hidden data-xt-booking-form>
                        <h3 class="xt-contact-step-title">Contact Information</h3>
                        <div class="xt-contact-form-grid2">
                            <label class="xt-contact-field">
                                <span>First Name *</span>
                                <input type="text" name="firstName" required />
                            </label>
                            <label class="xt-contact-field">
                                <span>Last Name *</span>
                                <input type="text" name="lastName" required />
                            </label>
                        </div>
                        <div class="xt-contact-form-grid2">
                            <label class="xt-contact-field">
                                <span>Email *</span>
                                <input type="email" name="email" required />
                            </label>
                            <label class="xt-contact-field">
                                <span>Phone *</span>
                                <input type="tel" name="phone" required />
                            </label>
                        </div>
                        <label class="xt-contact-field" data-xt-booking-field>
                            <span>Property Address *</span>
                            <input type="text" name="address" placeholder="Full address for site assessment" required />
                        </label>
                        <label class="xt-contact-field" data-xt-booking-field>
                            <span>Service Type *</span>
                            <select name="serviceType" required>
                                <option value="">Select a service</option>
                                <option>Solar Panel Installation</option>
                                <option>Battery Storage</option>
                                <option>EV Charger Installation</option>
                                <option>Electrical Services</option>
                                <option>Home Automation</option>
                                <option>Off-Grid System</option>
                                <option>Commercial Solar</option>
                                <option>Builder Services</option>
                            </select>
                        </label>
                        <label class="xt-contact-field">
                            <span>Subject</span>
                            <input type="text" name="subject" placeholder="Subject (optional for bookings)" data-xt-subject />
                        </label>
                        <label class="xt-contact-field">
                            <span>Message / Notes *</span>
                            <textarea name="message" rows="4" placeholder="Tell us what you need..." required data-xt-message></textarea>
                        </label>

                        <div class="xt-contact-note" hidden data-xt-booking-note>
                            <div class="xt-contact-note-ic" aria-hidden="true"><?php echo xtechs_pv_clone_icon('map-pin', 'xt-contact-note-svg'); ?></div>
                            <div>
                                <p class="xt-contact-note-title">Site Assessment Details</p>
                                <p class="xt-contact-note-body">
                                    Our technician will visit your property on <span data-xt-booking-date-label></span> at <span data-xt-booking-time-label></span> to assess your site for the best solar or electrical solution.
                                    Assessment fees apply and will be discussed during the visit.
                                </p>
                            </div>
                        </div>

                        <div class="xt-contact-upload">
                            <p class="xt-contact-upload-title">Upload Photos (Optional)</p>
                            <p class="xt-contact-upload-sub">Help us provide a better quote by sharing:</p>
                            <ul>
                                <li>Photos of your meter box and switchboard</li>
                                <li>Recent power bills for usage analysis</li>
                                <li>Roof photos showing available space</li>
                                <li>Any existing solar equipment</li>
                            </ul>
                            <div class="xt-contact-file-row">
                                <label class="xt-contact-file-btn">
                                    Choose Files
                                    <input type="file" name="files[]" multiple accept="image/*,.pdf" />
                                </label>
                                <span class="xt-contact-file-name" data-xt-files-label>No file chosen</span>
                            </div>
                        </div>

                        <div class="xt-contact-captcha">
                            <p class="xt-contact-captcha-title">Security Verification</p>
                            <p class="xt-contact-captcha-desc">Please complete the CAPTCHA verification</p>
                            <div class="xt-contact-turnstile" data-xt-turnstile></div>
                        </div>

                        <p class="xt-contact-form-msg" data-xt-msg aria-live="polite"></p>
                        <button class="xt-contact-submit" type="submit" disabled data-xt-submit>Submit</button>
                    </section>
                </div>
            </section>
        </form>
    </div>
</section>
