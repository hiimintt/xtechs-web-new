<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('xtechs_xc_format_relative_date')) {
    /**
     * Match xtechs-website src/lib/xclasses.ts formatRelativeDate().
     */
    function xtechs_xc_format_relative_date(string $date_string): string
    {
        try {
            $tz = function_exists('wp_timezone') ? wp_timezone() : new DateTimeZone('UTC');
            $date = new DateTimeImmutable($date_string, $tz);
            $now = new DateTimeImmutable('now', $tz);
        } catch (Exception $e) {
            return '';
        }

        $diff_in_days = (int) floor(($now->getTimestamp() - $date->getTimestamp()) / 86400);
        if ($diff_in_days < 0) {
            $diff_in_days = 0;
        }

        if ($diff_in_days === 0) {
            return 'Today';
        }
        if ($diff_in_days === 1) {
            return 'Yesterday';
        }
        if ($diff_in_days < 7) {
            return sprintf('%d days ago', $diff_in_days);
        }
        if ($diff_in_days < 30) {
            return sprintf('%d weeks ago', (int) floor($diff_in_days / 7));
        }
        if ($diff_in_days < 365) {
            return sprintf('%d months ago', (int) floor($diff_in_days / 30));
        }

        return sprintf('%d years ago', (int) floor($diff_in_days / 365));
    }
}

$videos = [
    [
        'id' => 'company-podcast',
        'title' => 'Company Podcast - Renewable Energy Insights',
        'description' => 'Join us for an insightful discussion about the latest trends and innovations in renewable energy technology.',
        'category' => 'Release Highlights',
        'youtube' => 'yTGwyprrWeo',
    ],
    [
        'id' => 'company-competition',
        'title' => 'Company Competition - Innovation Challenge',
        'description' => 'Watch our exciting competition showcasing cutting-edge renewable energy solutions and innovative projects.',
        'category' => 'Release Highlights',
        'youtube' => 'hDGqzp1-E9c',
    ],
    [
        'id' => 'new-video-gaRlbufKnkE',
        'title' => 'New Video - xTechs Renewable Energy Solutions',
        'description' => 'Learn about xTechs innovative renewable energy solutions and how we are transforming the clean energy landscape.',
        'category' => 'Getting Started',
        'youtube' => 'gaRlbufKnkE',
    ],
];

$announcements = [
    [
        'title' => 'X-Vrything Beta Program Now Open',
        'body' => 'We are excited to announce that our beta program is now open! Join early access to X-Vrything and help shape the future of our platform. Limited spots available.',
        'published_at' => '2024-04-08T12:00:00',
    ],
    [
        'title' => 'February Community Challenge',
        'body' => 'This month challenge: Build the most creative workflow using X-Vrything! Winners get early access to new features and exclusive swag.',
        'published_at' => '2024-04-08T14:00:00',
    ],
    [
        'title' => 'Scheduled Maintenance - March 1st',
        'body' => 'We will be performing scheduled maintenance. During this time, some features may be temporarily unavailable.',
        'published_at' => '2024-04-08T16:00:00',
    ],
];

$faq = [
    ['q' => 'How do I get started with X-Vrything?', 'a' => 'Start by watching our Getting Started videos. We also have documentation and a supportive community ready to help.'],
    ['q' => 'When will X-Vrything be available?', 'a' => 'We are targeting a Q2 release for public beta. Early access will be available to community members first.'],
    ['q' => 'How can I join the beta program?', 'a' => 'Subscribe to our newsletter and join the community Discord for announcements.'],
    ['q' => 'What makes X-Vrything different?', 'a' => 'It combines powerful automation with an intuitive interface focused on real operational workflows.'],
];
?>

<section class="xt-xc-hero">
    <div class="xt-container xt-xc-shell">
        <div class="xt-xc-hero-grid">
            <div>
                <h1>X-Classes</h1>
                <p>Learn, stay updated, and connect with the community.</p>
            </div>
            <div class="xt-xc-hero-right">
                <span class="xt-xc-pill">X-Vrything / X-verything &mdash; Coming Soon</span>
                <div class="xt-xc-hero-actions">
                    <button type="button" class="xt-btn xt-btn-primary">Subscribe</button>
                    <a class="xt-btn xt-btn-outline" href="https://discord.gg/QPw8VrSc" target="_blank" rel="noopener noreferrer">Join Community</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="xt-xc-main">
    <div class="xt-container xt-xc-shell">
        <div class="xt-xc-tabbar xt-xc-desktop-tabs" role="tablist" aria-label="X-Classes tabs">
            <button type="button" class="xt-xc-tab is-active" data-tab-target="videos">
                <span class="xt-xc-tab-ic" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polygon points="8 5 19 12 8 19 8 5"></polygon>
                    </svg>
                </span>
                <span>Videos</span>
            </button>
            <button type="button" class="xt-xc-tab" data-tab-target="community">
                <span class="xt-xc-tab-ic" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="8.5" cy="7" r="4"></circle>
                        <path d="M20 8v6"></path>
                        <path d="M23 11h-6"></path>
                    </svg>
                </span>
                <span>Community</span>
            </button>
        </div>

        <div class="xt-xc-mobile-select-wrap">
            <select class="xt-xc-mobile-select" id="xt-xc-mobile-select" aria-label="X-Classes tab selector">
                <option value="videos">Videos</option>
                <option value="community">Community</option>
            </select>
        </div>

        <div class="xt-xc-tab-panel is-active" data-tab-panel="videos">
            <div class="xt-xc-video-grid">
                <?php foreach ($videos as $video) : ?>
                    <article class="xt-xc-video-card" data-category="<?php echo esc_attr($video['category']); ?>">
                        <a class="xt-xc-video-thumb" href="<?php echo esc_url('https://www.youtube.com/watch?v=' . $video['youtube']); ?>" target="_blank" rel="noopener noreferrer">
                            <img src="<?php echo esc_url('https://img.youtube.com/vi/' . $video['youtube'] . '/maxresdefault.jpg'); ?>" alt="<?php echo esc_attr($video['title']); ?>" />
                        </a>
                        <div class="xt-xc-video-body">
                            <span class="xt-xc-badge"><?php echo esc_html($video['category']); ?></span>
                            <h3><?php echo esc_html($video['title']); ?></h3>
                            <p><?php echo esc_html($video['description']); ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="xt-xc-tab-panel" data-tab-panel="community">
            <div class="xt-xc-community-grid">
                <div class="xt-xc-col">
                    <article class="xt-xc-box">
                        <h3>Start Here</h3>
                        <div class="xt-xc-faq">
                            <?php foreach ($faq as $i => $item) : ?>
                                <details <?php echo $i === 0 ? 'open' : ''; ?>>
                                    <summary><?php echo esc_html($item['q']); ?></summary>
                                    <p><?php echo esc_html($item['a']); ?></p>
                                </details>
                            <?php endforeach; ?>
                        </div>
                    </article>

                    <article class="xt-xc-box">
                        <h3>Quick Links</h3>
                        <div class="xt-xc-quick-grid">
                            <a href="#" class="xt-xc-quick-link">Getting Started</a>
                            <a href="#" class="xt-xc-quick-link">Roadmap</a>
                            <a href="#" class="xt-xc-quick-link">Report an issue</a>
                            <a href="#" class="xt-xc-quick-link">Request a feature</a>
                        </div>
                    </article>
                </div>

                <div class="xt-xc-col">
                    <article class="xt-xc-box">
                        <h3>Join Our Community</h3>
                        <p>Connect with other users, get help, and stay updated on the latest developments.</p>
                        <a class="xt-btn xt-btn-primary xt-btn-block" href="https://discord.gg/QPw8VrSc" target="_blank" rel="noopener noreferrer">Join Discord</a>
                    </article>

                    <article class="xt-xc-box">
                        <h3>Latest Announcements</h3>
                        <div class="xt-xc-announcements">
                            <?php foreach ($announcements as $item) : ?>
                                <?php
                                $published = $item['published_at'];
                                if (is_string($published) && $published !== '' && $published[0] === '-') {
                                    $tz = function_exists('wp_timezone') ? wp_timezone() : new DateTimeZone('UTC');
                                    $published = (new DateTimeImmutable('now', $tz))->modify($published)->format('Y-m-d\TH:i:s');
                                }
                                $rel = xtechs_xc_format_relative_date($published);
                                ?>
                                <div class="xt-xc-ann-item">
                                    <div class="xt-xc-ann-date-row">
                                        <span class="xt-xc-ann-date"><?php echo esc_html($rel); ?></span>
                                    </div>
                                    <h4><?php echo esc_html($item['title']); ?></h4>
                                    <p><?php echo esc_html($item['body']); ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
  var tabs = document.querySelectorAll('.xt-xc-tab');
  var panels = document.querySelectorAll('.xt-xc-tab-panel');
  var mobileSelect = document.getElementById('xt-xc-mobile-select');
  var activatePanel = function (panel) {
    if (!panel) return;
    panel.classList.add('is-active');
    requestAnimationFrame(function () {
      requestAnimationFrame(function () {
        panel.classList.add('is-entered');
      });
    });
  };
  var deactivatePanel = function (panel) {
    if (!panel) return;
    panel.classList.remove('is-entered');
    panel.classList.remove('is-active');
  };

  var initial = document.querySelector('.xt-xc-tab-panel.is-active');
  activatePanel(initial);

  tabs.forEach(function (tab) {
    tab.addEventListener('click', function () {
      if (tab.classList.contains('is-active')) return;
      var target = tab.getAttribute('data-tab-target');
      tabs.forEach(function (t) { t.classList.remove('is-active'); });
      panels.forEach(function (p) { deactivatePanel(p); });
      tab.classList.add('is-active');
      var panel = document.querySelector('.xt-xc-tab-panel[data-tab-panel="' + target + '"]');
      activatePanel(panel);
    });
  });

  if (mobileSelect) {
    mobileSelect.addEventListener('change', function () {
      var target = mobileSelect.value;
      tabs.forEach(function (t) {
        t.classList.toggle('is-active', t.getAttribute('data-tab-target') === target);
      });
      panels.forEach(function (p) { deactivatePanel(p); });
      var panel = document.querySelector('.xt-xc-tab-panel[data-tab-panel="' + target + '"]');
      activatePanel(panel);
    });
  }

});
</script>
