<?php
/**
 * Mexa Motion — project inquiry form (Book Now)
 *
 * A four-step inquiry flow. Submitting this form prepares an inquiry; it does
 * not confirm a booking, accept a project or guarantee a delivery date.
 *
 * Works without JavaScript: every step is visible and the form submits
 * normally. JavaScript enhances it into a step-by-step wizard.
 *
 * @package MexaMotion
 */

require_once __DIR__ . '/includes/validation.php';

$page_meta = [
    'title'       => 'Book Now — Project Inquiry | Mexa Motion',
    'description' => 'Tell Mexa Motion about your video editing, motion graphics or content project and request a quote. Send your brief through WhatsApp, phone or email.',
    'path'        => 'book-now.php',
    'og'          => 'assets/images/brand/logo-square.png',
];

$page_nav   = 'book';
$body_class = 'page-book';

$options    = mm_data('form_options');
$services   = mm_services();

/* Restore server-side errors and values from a failed submission. */
mm_session_start();
$errors    = isset($_SESSION['mm_errors']) ? $_SESSION['mm_errors'] : [];
$old       = isset($_SESSION['mm_old']) ? $_SESSION['mm_old'] : [];
$formError = isset($_SESSION['mm_form_error']) ? $_SESSION['mm_form_error'] : '';
$startStep = isset($_SESSION['mm_step']) ? (int) $_SESSION['mm_step'] : 1;

unset($_SESSION['mm_errors'], $_SESSION['mm_old'], $_SESSION['mm_form_error'], $_SESSION['mm_step']);

$token       = mm_form_token();
$formStarted = time();

/** Helper: did the server flag this field? */
$mm_has_error = static function ($key) use ($errors) {
    return isset($errors[$key]);
};
$mm_err_class = static function ($key) use ($errors) {
    return isset($errors[$key]) ? ' has-error' : '';
};

require __DIR__ . '/includes/header.php';
?>

<section class="page-hero" style="padding-bottom:clamp(1.5rem,1rem+2vw,2.5rem)">
    <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="index.php">Home</a><span aria-hidden="true">/</span>
            <span aria-current="page">Book Now</span>
        </nav>
        <div class="page-hero__inner">
            <div data-reveal="hero">
                <p class="eyebrow">
                    <span class="eyebrow__dot" aria-hidden="true"></span>
                    Project Inquiry
                </p>
                <h1 class="page-hero__title" style="max-width:22ch">Tell Us About Your Project</h1>
                <p class="page-hero__lead">
                    Describe what you are making and we will reply with an honest view of scope,
                    approach and timing. Sending an inquiry does not confirm a booking or accept a project.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section" style="padding-top:0">
    <div class="container">
        <div class="book-layout">

            <!-- =========================================================== -->
            <!-- FORM                                                       -->
            <!-- =========================================================== -->
            <div>
                <ol class="book-steps" data-book-step-list aria-label="Form progress">
                    <li class="book-step is-active" data-book-step><span class="book-step__num">1</span> Service</li>
                    <li class="book-steps__sep" aria-hidden="true"></li>
                    <li class="book-step" data-book-step><span class="book-step__num">2</span> Project</li>
                    <li class="book-steps__sep" aria-hidden="true"></li>
                    <li class="book-step" data-book-step><span class="book-step__num">3</span> Contact</li>
                    <li class="book-steps__sep" aria-hidden="true"></li>
                    <li class="book-step" data-book-step><span class="book-step__num">4</span> Review</li>
                </ol>

                <div class="book-card">
                    <form class="book-card__body"
                          method="post"
                          action="process-inquiry.php"
                          data-book-form
                          data-start-step="<?= (int) $startStep ?>"
                          novalidate>

                        <input type="hidden" name="mm_token" value="<?= e($token) ?>">
                        <input type="hidden" name="mm_started" value="<?= (int) $formStarted ?>">
                        <input type="hidden" name="mm_step" value="4" id="mm-current-step">

                        <!-- Honeypot: hidden from people, tempting for bots -->
                        <div class="hp-field" aria-hidden="true">
                            <label for="mm_website">Leave this field empty</label>
                            <input type="text" id="mm_website" name="mm_website" tabindex="-1" autocomplete="off" value="">
                        </div>

                        <?php if (!empty($formError)) : ?>
                        <div class="form-alert form-alert--error" role="alert" data-form-alert>
                            <?= mm_icon('shield', 18) ?>
                            <span><?= e($formError) ?></span>
                        </div>
                        <?php endif; ?>

                        <?php if (mm_config('contact.is_placeholder')) : ?>
                        <div class="form-alert form-alert--info" role="note">
                            <?= mm_icon('shield', 18) ?>
                            <span>
                                <strong>Development build.</strong> The WhatsApp number and email address
                                used by this form are placeholders. They will be replaced with Mexa
                                Motion&rsquo;s real contact details before launch.
                            </span>
                        </div>
                        <?php endif; ?>

                        <!-- ============================= STEP 1 : SERVICE ======== -->
                        <section class="book-panel" data-book-panel aria-labelledby="step1-title">
                            <div class="book-card__head" style="background:none;border:0;padding:0 0 1.25rem">
                                <h2 class="book-card__title" id="step1-title">Step 1 — Select a service</h2>
                                <p class="book-card__hint">Choose the closest match. You can describe anything else in the next step.</p>
                            </div>

                            <div class="field<?= $mm_err_class('service') ?>">
                                <span class="field__label" id="service-label">Primary service <span class="field__req" aria-hidden="true">*</span></span>
                                <div class="option-grid" role="radiogroup" aria-labelledby="service-label" aria-describedby="service-error">
                                    <?php foreach ($options['services'] as $slug) : ?>
                                    <?php
                                    $service    = mm_service($slug);
                                    $label      = $service ? $service['title'] : 'Other / Custom Project';
                                    $sub        = $service ? $service['tagline'] : 'Something not listed here';
                                    $icon       = $service ? $service['icon'] : 'chat';
                                    $checked    = isset($old['service']) && $old['service'] === $slug;
                                    ?>
                                    <label class="option">
                                        <input type="radio" name="service" value="<?= e($slug) ?>"
                                               data-label="<?= e($label) ?>"
                                               data-required
                                               <?= $checked ? 'checked' : '' ?>>
                                        <span class="option__box" aria-hidden="true"></span>
                                        <span class="option__icon"><?= mm_icon($icon, 18) ?></span>
                                        <span class="option__text">
                                            <?= e($label) ?>
                                            <span class="option__sub"><?= e($sub) ?></span>
                                        </span>
                                    </label>
                                    <?php endforeach; ?>
                                </div>
                                <p class="field__error" id="service-error">
                                    <?= mm_icon('shield', 14) ?><span>Please choose a service.</span>
                                </p>
                            </div>

                            <div class="book-nav">
                                <p class="field__hint">Not sure which service fits? Choose &ldquo;Other / Custom Project&rdquo;.</p>
                                <div class="book-nav__right">
                                    <button class="btn btn--primary" type="button" data-book-next>Continue <?= mm_icon('arrow-right', 16) ?></button>
                                </div>
                            </div>
                        </section>

                        <!-- ============================= STEP 2 : DETAILS ======= -->
                        <section class="book-panel" data-book-panel hidden aria-labelledby="step2-title">
                            <div class="book-card__head" style="background:none;border:0;padding:0 0 1.25rem">
                                <h2 class="book-card__title" id="step2-title">Step 2 — Project details</h2>
                                <p class="book-card__hint">The more context you give, the more useful our first reply will be.</p>
                            </div>

                            <div class="field-grid">
                                <div class="field">
                                    <label class="field__label" for="mm-project-title">
                                        Project title or short name <span class="field__optional">(optional)</span>
                                    </label>
                                    <input class="input" type="text" id="mm-project-title" name="project_title"
                                           maxlength="120" placeholder="e.g. Spring product launch"
                                           value="<?= e($old['project_title'] ?? '') ?>">
                                </div>

                                <div class="field<?= $mm_err_class('platform') ?>">
                                    <label class="field__label" for="mm-platform">Platform or intended use</label>
                                    <select class="select" id="mm-platform" name="platform">
                                        <option value="">Select a platform…</option>
                                        <?php foreach ($options['platforms'] as $platform) : ?>
                                        <option value="<?= e($platform) ?>" <?= ($old['platform'] ?? '') === $platform ? 'selected' : '' ?>>
                                            <?= e($platform) ?>
                                        </option>
                                        <?php endforeach; ?>
                                        <option value="Other" <?= ($old['platform'] ?? '') === 'Other' ? 'selected' : '' ?>>Other</option>
                                    </select>
                                </div>

                                <div class="field<?= $mm_err_class('description') ?>" style="grid-column:1/-1">
                                    <label class="field__label" for="mm-description">
                                        Project description <span class="field__req" aria-hidden="true">*</span>
                                    </label>
                                    <textarea class="textarea" id="mm-description" name="description"
                                              maxlength="1200" required
                                              data-required data-validate="text" data-minlength="20"
                                              aria-describedby="description-help description-error"
                                              placeholder="What are you making, who is it for, and what should it achieve?"><?= e($old['description'] ?? '') ?></textarea>
                                    <p class="field__hint" id="description-help">
                                        Please avoid sharing passwords, payment details or other sensitive information.
                                    </p>
                                    <p class="counter" data-counter aria-live="off">0 / 1200 characters</p>
                                    <p class="field__error" id="description-error">
                                        <?= mm_icon('shield', 14) ?><span>Please describe your project in at least 20 characters.</span>
                                    </p>
                                </div>

                                <div class="field<?= $mm_err_class('budget') ?>">
                                    <label class="field__label" for="mm-budget">
                                        Estimated budget <span class="field__optional">(optional)</span>
                                    </label>
                                    <select class="select" id="mm-budget" name="budget">
                                        <option value="">Prefer not to say</option>
                                        <?php foreach ($options['budgets'] as $budget) : ?>
                                        <option value="<?= e($budget) ?>" <?= ($old['budget'] ?? '') === $budget ? 'selected' : '' ?>>
                                            <?= e($budget) ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <p class="field__hint">Indicative ranges for qualification only &mdash; not official prices.</p>
                                </div>

                                <div class="field<?= $mm_err_class('deadline') ?>">
                                    <label class="field__label" for="mm-deadline">
                                        Desired deadline <span class="field__optional">(optional)</span>
                                    </label>
                                    <select class="select" id="mm-deadline" name="deadline">
                                        <option value="">No fixed deadline</option>
                                        <?php foreach ($options['deadlines'] as $deadline) : ?>
                                        <option value="<?= e($deadline) ?>" <?= ($old['deadline'] ?? '') === $deadline ? 'selected' : '' ?>>
                                            <?= e($deadline) ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <p class="field__hint">A preferred date is not a confirmed delivery date.</p>
                                </div>
                            </div>

                            <div class="book-nav">
                                <button class="btn btn--ghost" type="button" data-book-prev><?= mm_icon('arrow-left', 16) ?> Back</button>
                                <div class="book-nav__right">
                                    <button class="btn btn--primary" type="button" data-book-next>Continue <?= mm_icon('arrow-right', 16) ?></button>
                                </div>
                            </div>
                        </section>

                        <!-- ============================= STEP 3 : CONTACT ======== -->
                        <section class="book-panel" data-book-panel hidden aria-labelledby="step3-title">
                            <div class="book-card__head" style="background:none;border:0;padding:0 0 1.25rem">
                                <h2 class="book-card__title" id="step3-title">Step 3 — Contact details</h2>
                                <p class="book-card__hint">How should we reply to you?</p>
                            </div>

                            <div class="field-grid">
                                <div class="field<?= $mm_err_class('full_name') ?>">
                                    <label class="field__label" for="mm-name">
                                        Full name <span class="field__req" aria-hidden="true">*</span>
                                    </label>
                                    <input class="input" type="text" id="mm-name" name="full_name"
                                           autocomplete="name" maxlength="80" required data-required
                                           value="<?= e($old['full_name'] ?? '') ?>">
                                    <p class="field__error">
                                        <?= mm_icon('shield', 14) ?><span>Please enter your name.</span>
                                    </p>
                                </div>

                                <div class="field<?= $mm_err_class('phone') ?>">
                                    <label class="field__label" for="mm-phone">
                                        Phone / WhatsApp <span class="field__req" aria-hidden="true">*</span>
                                    </label>
                                    <input class="input" type="tel" id="mm-phone" name="phone"
                                           autocomplete="tel" inputmode="tel" maxlength="24"
                                           required data-required data-validate="phone"
                                           placeholder="+8801XXXXXXXXX"
                                           value="<?= e($old['phone'] ?? '') ?>">
                                    <p class="field__error">
                                        <?= mm_icon('shield', 14) ?><span>Please enter a valid phone or WhatsApp number.</span>
                                    </p>
                                </div>

                                <div class="field<?= $mm_err_class('email') ?>">
                                    <label class="field__label" for="mm-email">
                                        Email address <span class="field__optional">(optional)</span>
                                    </label>
                                    <input class="input" type="email" id="mm-email" name="email"
                                           autocomplete="email" maxlength="120"
                                           placeholder="you@example.com"
                                           value="<?= e($old['email'] ?? '') ?>">
                                    <p class="field__hint">Add an email if you would like the details in writing.</p>
                                    <p class="field__error">
                                        <?= mm_icon('shield', 14) ?><span>Please enter a valid email address.</span>
                                    </p>
                                </div>

                                <div class="field<?= $mm_err_class('contact_method') ?>" style="grid-column:1/-1">
                                    <span class="field__label" id="contact-method-label">
                                        Preferred contact method <span class="field__req" aria-hidden="true">*</span>
                                    </span>
                                    <div class="option-grid" role="radiogroup" aria-labelledby="contact-method-label">
                                        <?php foreach ($options['contact_methods'] as $value => $label) : ?>
                                        <?php $icon = $value === 'whatsapp' ? 'whatsapp' : ($value === 'phone' ? 'phone' : 'mail'); ?>
                                        <label class="option">
                                            <input type="radio" name="contact_method" value="<?= e($value) ?>"
                                                   data-label="<?= e($label) ?>" data-required
                                                   <?= ($old['contact_method'] ?? '') === $value ? 'checked' : '' ?>>
                                            <span class="option__box" aria-hidden="true"></span>
                                            <span class="option__icon"><?= mm_icon($icon, 18) ?></span>
                                            <span class="option__text"><?= e($label) ?></span>
                                        </label>
                                        <?php endforeach; ?>
                                    </div>
                                    <p class="field__error">
                                        <?= mm_icon('shield', 14) ?><span>Please choose how you would prefer to be contacted.</span>
                                    </p>
                                </div>
                            </div>

                            <div class="book-nav">
                                <button class="btn btn--ghost" type="button" data-book-prev><?= mm_icon('arrow-left', 16) ?> Back</button>
                                <div class="book-nav__right">
                                    <button class="btn btn--primary" type="button" data-book-next>Review inquiry <?= mm_icon('arrow-right', 16) ?></button>
                                </div>
                            </div>
                        </section>

                        <!-- ============================= STEP 4 : REVIEW ======== -->
                        <section class="book-panel" data-book-panel hidden aria-labelledby="step4-title">
                            <div class="book-card__head" style="background:none;border:0;padding:0 0 1.25rem">
                                <h2 class="book-card__title" id="step4-title">Step 4 — Review and submit</h2>
                                <p class="book-card__hint">Check the details below, then send your inquiry.</p>
                            </div>

                            <dl class="summary-list">
                                <div class="summary-list__row">
                                    <dt>Service</dt>
                                    <dd data-summary="service">Not provided</dd>
                                </div>
                                <div class="summary-list__row">
                                    <dt>Project</dt>
                                    <dd data-summary="project_title">Not provided</dd>
                                </div>
                                <div class="summary-list__row">
                                    <dt>Platform</dt>
                                    <dd data-summary="platform">Not provided</dd>
                                </div>
                                <div class="summary-list__row" style="align-items:flex-start">
                                    <dt>Description</dt>
                                    <dd data-summary="description">Not provided</dd>
                                </div>
                                <div class="summary-list__row">
                                    <dt>Budget</dt>
                                    <dd data-summary="budget">Not provided</dd>
                                </div>
                                <div class="summary-list__row">
                                    <dt>Deadline</dt>
                                    <dd data-summary="deadline">Not provided</dd>
                                </div>
                                <div class="summary-list__row">
                                    <dt>Name</dt>
                                    <dd data-summary="full_name">Not provided</dd>
                                </div>
                                <div class="summary-list__row">
                                    <dt>Phone / WhatsApp</dt>
                                    <dd data-summary="phone">Not provided</dd>
                                </div>
                                <div class="summary-list__row">
                                    <dt>Email</dt>
                                    <dd data-summary="email">Not provided</dd>
                                </div>
                                <div class="summary-list__row">
                                    <dt>Contact via</dt>
                                    <dd data-summary="contact_method">Not provided</dd>
                                </div>
                            </dl>

                            <div class="consent consent-wrap<?= $mm_err_class('consent') ?>">
                                <input type="checkbox" id="mm-consent" name="consent" value="1" data-consent data-required
                                       aria-describedby="consent-error">
                                <label for="mm-consent">
                                    I understand that submitting this form prepares a project inquiry that I send to
                                    Mexa Motion through my chosen contact method. I have read the
                                    <a href="privacy.php">privacy notice</a>.
                                    <span class="field__error" id="consent-error">
                                        <?= mm_icon('shield', 14) ?><span>Please confirm before submitting.</span>
                                    </span>
                                </label>
                            </div>

                            <p class="field__hint" style="margin-top:1rem">
                                <?= e(mm_config('inquiry.terms_note')) ?>
                            </p>

                            <div class="book-nav">
                                <button class="btn btn--ghost" type="button" data-book-goto="3"><?= mm_icon('arrow-left', 16) ?> Edit details</button>
                                <div class="book-nav__right">
                                    <button class="btn btn--primary btn--lg" type="submit" data-book-submit>
                                        Submit Inquiry <?= mm_icon('arrow-right', 18) ?>
                                    </button>
                                </div>
                            </div>
                        </section>

                    </form>
                </div>
            </div>

            <!-- =========================================================== -->
            <!-- ASIDE                                                       -->
            <!-- =========================================================== -->
            <aside class="book-aside" aria-label="Booking information">
                <div class="aside-card">
                    <h2 class="aside-card__title">How sending works</h2>
                    <ul>
                        <li><?= mm_icon('check', 16) ?><span>Your details are checked on our server before anything is sent.</span></li>
                        <li><?= mm_icon('check', 16) ?><span>Your inquiry is formatted into a readable message for you to send.</span></li>
                        <li><?= mm_icon('check', 16) ?><span>You stay in control &mdash; nothing reaches us until you send it.</span></li>
                    </ul>
                    <p style="margin-top:1rem;font-size:var(--fs-xs);color:var(--ink-2)">
                        <?= e(mm_config('inquiry.privacy_note')) ?>
                    </p>
                </div>

                <div class="aside-card aside-card--blue">
                    <h2 class="aside-card__title">Prefer to talk first?</h2>
                    <ul>
                        <li>
                            <a href="<?= e(mm_whatsapp_link('Hello Mexa Motion, I have a question before sending an inquiry.')) ?>"
                               rel="noopener" target="_blank">
                                <?= mm_icon('whatsapp', 16) ?><span><?= e(mm_config('contact.whatsapp_label')) ?> (WhatsApp)</span>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:<?= e(mm_config('contact.email')) ?>">
                                <?= mm_icon('mail', 16) ?><span><?= e(mm_config('contact.email_label')) ?></span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="aside-card">
                    <h2 class="aside-card__title">What happens next</h2>
                    <ul>
                        <li><?= mm_icon('chat', 16) ?><span>We read the brief and check it against the services we offer.</span></li>
                        <li><?= mm_icon('clipboard', 16) ?><span>We reply with scope questions, an approach and an estimate.</span></li>
                        <li><?= mm_icon('check', 16) ?><span>Nothing is booked until both sides agree the terms in writing.</span></li>
                    </ul>
                </div>
            </aside>

        </div>
    </div>
</section>

<?php
$cta_title   = 'Not ready to send an inquiry?';
$cta_text    = 'Browse the services, look through the portfolio, or read how the workflow works.';
$cta_variant = 'light';
require __DIR__ . '/includes/cta-banner.php';
?>

<?php require __DIR__ . '/includes/footer.php'; ?>