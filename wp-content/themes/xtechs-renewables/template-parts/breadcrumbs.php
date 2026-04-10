<?php
if (!defined('ABSPATH')) {
    exit;
}
/**
 * Populated by get_template_part( …, [ 'trail' => $trail ] ) via extract().
 *
 * @var list<array{0: string, 1: string}>|null $trail
 */
if (!isset($trail) || !is_array($trail)) {
    $trail = [];
}
if (count($trail) < 2) {
    return;
}
$last = count($trail) - 1;
?>
<nav class="xt-breadcrumbs xt-container" aria-label="<?php esc_attr_e('Breadcrumb', 'xtechs-renewables'); ?>">
    <ol class="xt-breadcrumbs-list">
        <?php foreach ($trail as $i => $pair) : ?>
            <?php
            $name = $pair[0] ?? '';
            $url = $pair[1] ?? '';
            ?>
            <li class="xt-breadcrumbs-item">
                <?php if ($i === $last) : ?>
                    <span class="xt-breadcrumbs-current" aria-current="page"><?php echo esc_html($name); ?></span>
                <?php else : ?>
                    <a class="xt-breadcrumbs-link" href="<?php echo esc_url($url); ?>"><?php echo esc_html($name); ?></a>
                    <span class="xt-breadcrumbs-sep" aria-hidden="true">/</span>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ol>
</nav>
