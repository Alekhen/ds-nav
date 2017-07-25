<?php
/**
 * App shell
 *
 * @param p: active page/parent
 * @param sub: active sub/child page
 * @param nav: 1 = collapsed nav bar
 * @param icon: 1 = no icons
 */

global $Route;

$query_p = ( !empty( $Route->query['p'] ) && array_key_exists( $Route->query['p'], NAV_DATA ) ) ? $Route->query['p'] : 'home';
$query_sub = ( !empty( $Route->query['sub'] ) && array_key_exists( $Route->query['sub'], NAV_DATA[$query_p]['sub'] ) ) ? $Route->query['sub'] : NULL;
$nav_collapsed = ( !empty( $Route->query['nav'] ) && $Route->query['nav'] === '1' ) ? true : false;
$no_icons = ( !empty( $Route->query['icon'] ) && $Route->query['icon'] === '1' ) ? true : false;
$nav_query = $nav_collapsed ? 'nav=1' : 'nav=0';

?><div id="header" class="container">

  <section id="utility-bar" class="container" data-user="<?= USER_DATA['first_name'] . ' ' . USER_DATA['last_name'] ?>" data-user-first-name="<?= USER_DATA['first_name'] ?>" data-user-last-name="<?= USER_DATA['last_name'] ?>">
    <div id="brand">
      <a href="<?= SITE_URL ?>" class="text-headline">Logo</a>
    </div>
    <div id="user-menu">
      <span class="text-subheading"><?= USER_DATA['first_name'] . ' ' . USER_DATA['last_name'] ?></span>
    </div>
  </section><!--#utility-bar-->

</div><!--#header-->

<div id="page" class="container">

  <section id="navigation" class="container<?= $nav_collapsed ? ' collapsed' : '' ?>">

    <div id="navigation-lists" class="container">

      <div id="primary-nav" class="nav-list primary-nav<?= $query_sub === NULL ? ' active' : '' ?>">
        <ol class="container">
          <?php foreach( NAV_DATA as $el => $props ) : ?>
          <li class="<?= $query_p === $el ? 'active' : '' ?>">
            <a class="container primary-nav-link ink<?= isset( $props['sub'] ) ? ' sub-nav-indicator' : '' ?><?= ( isset( $props['auto_expand'] ) && $props['auto_expand'] ) ? ' auto-expand' : '' ?>" href="<?= SITE_URL . '?p=' . $el . '&' . $nav_query ?>" data-p="<?= $el ?>" data-has-sub="<?= isset( $props['sub'] ) ? 'true' : 'false' ?>">
              <span class="nav-icon" data-icon="<?= $no_icons ? 'square' : $props['icon'] ?>"><?php $no_icons ? include ICON_DIR . '/square.svg' : include ICON_DIR . '/' . $props['icon'] . '.svg'; ?></span>
              <span class="nav-label text-body-2" data-label="<?= $props['label'] ?>"><?= $props['label'] ?></span>
              <?php if( isset( $props['sub'] ) ) : ?>
              <span class="nav-more"><?php include ICON_DIR . '/chevron-right.svg'; ?></span>
              <?php endif; ?>
            </a>
          </li>
          <?php endforeach; ?>
        </ol>
      </div><!--.level-1-->

      <?php foreach( NAV_DATA as $el => $props ) : ?>
      <?php if( isset( $props['sub'] ) ) : ?>
      <div id="secondary-nav-<?= $el ?>" class="container nav-list secondary-nav<?= ( isset( $props['auto_expand'] ) && $props['auto_expand'] ) ? ' auto-expand' : '' ?><?= ( $query_sub !== NULL && array_key_exists( $query_sub, $props['sub'] ) ) ? ' active' : '' ?>">
        <ol class="container secondary-nav-list">
          <li class="nav-back">
            <a class="container nav-back ink" href="<?= SITE_URL . '?p=' . $el . '&' . $nav_query ?>" data-p="<?= $el ?>" data-has-sub="false">
              <span class="nav-icon" data-icon="arrow-left"><?php include ICON_DIR . '/arrow-left.svg'; ?></span>
              <span class="nav-label text-subheading"><?= $props['label'] ?></span>
            </a>
          </li>
          <?php foreach( $props['sub'] as $el_sub => $sub_props ) : ?>
          <li class="<?= ( $query_p === $el ) && ( $query_sub === $el_sub ) ? 'active' : '' ?>">
            <a class="container secondary-nav-link ink" href="<?= SITE_URL . '?p=' . $el . '&' . $nav_query . '&sub=' . $el_sub ?>" data-p="<?= $el ?>" data-has-sub="false">
              <span class="nav-icon" data-icon="<?= $no_icons ? 'square' : $sub_props['icon'] ?>"><?php $no_icons ? include ICON_DIR . '/square.svg' : include ICON_DIR . '/' . $sub_props['icon'] . '.svg'; ?></span>
              <span class="nav-label text-body-2" data-label="<?= $sub_props['label'] ?>"><?= $sub_props['label'] ?></span>
            </a>
          </li>
          <?php endforeach; ?>
        </ol>
      </div><!--.level-2-->
      <?php endif; ?>
      <?php endforeach; ?>

    </div><!--#navigation-lists-->

    <div id="navigation-controls" class="container">
      <ol class="container">
        <li>
          <a class="container nav-collapse ink" href="<?= SITE_URL . '&' . !$nav_query ?>">
            <span class="nav-icon" data-icon="arrow-collapse-left"><?php include ICON_DIR . '/arrow-collapse-left.svg' ?></span>
            <span class="nav-label text-body-2" data-label="Collapse">Collapse</span>
          </a>
        </li>
      </ol>
    </div>

  </section><!--#navigation-->

  <section id="content" class="container">

    <div id="title-bar" class="container">
      <div id="title">
        <h1 class="text-subheading"><?= NAV_DATA[$query_p]['label'] ?></h1>
      </div>
    </div><!--#title-bar-->

    <div id="main" class="container">
