<?php

$query_p = '';
// $query_p = ( !empty( $Route->query['p'] ) && array_key_exists( $Route->query['p'], NAV_DATA ) ) ? $Route->query['p'] : 'home';

$query_sub = '';
// $query_sub = ( !empty( $Route->query['sub'] ) && array_key_exists( $Route->query['sub'], NAV_DATA[$query_p]['sub'] ) ) ? $Route->query['sub'] : NULL;

$nav_collapsed = false;
// $nav_collapsed = ( !empty( $Route->query['nav'] ) && $Route->query['nav'] === '1' ) ? true : false;

$no_icons = false;
// $no_icons = ( !empty( $Route->query['icon'] ) && $Route->query['icon'] === '1' ) ? true : false;

$nav_query = $nav_collapsed ? 'nav=1' : 'nav=0';

$user = $data['UserData'];
$nav = $data['NavData'];

$icon_path = '../assets/icons/';

?><div id="header" class="container">

  <section id="utility-bar" class="container" data-user="<?=$user['first_name'].' '.$user['last_name']?>" data-user-first-name="<?=$user['first_name']?>" data-user-last-name="<?=$user['last_name']?>">
    <div id="navigation-icon">
      <button><?php include $icon_path . 'menu.svg'; ?></button>
    </div>
    <div id="brand">
      <a href="<?=APP_URL?>" class="text-headline">Logo</a>
    </div>
    <div id="user-menu">
      <span class="text-subheading"><?=$user['first_name'].' '.$user['last_name'] ?></span>
    </div>
  </section><!--#utility-bar-->

</div><!--#header-->

<div id="page" class="container">

  <section id="navigation" class="container<?= $nav_collapsed ? ' collapsed' : '' ?>">

    <button id="navigation-close" class="ink"><?php include $icon_path . 'close.svg' ?></button>

    <div id="navigation-lists" class="container">

      <div id="primary-nav" class="nav-list primary-nav<?= $query_sub === NULL ? ' active' : '' ?>">
        <ol class="container">
          <?php foreach( $nav as $el => $props ) : ?>
          <li class="<?= $query_p === $el ? 'active' : '' ?>">
            <a class="container primary-nav-link ink<?= isset( $props['sub'] ) ? ' sub-nav-indicator' : '' ?><?= ( isset( $props['auto_expand'] ) && $props['auto_expand'] ) ? ' auto-expand' : '' ?>" href="<?= APP_URL . '?p=' . $el . '&' . $nav_query ?>" data-p="<?= $el ?>" data-has-sub="<?= isset( $props['sub'] ) ? 'true' : 'false' ?>">
              <span class="nav-icon" data-icon="<?= $no_icons ? 'square' : $props['icon'] ?>"><?php $no_icons ? include $icon_path . 'square.svg' : include $icon_path . $props['icon'] . '.svg'; ?></span>
              <span class="nav-label text-body-2" data-label="<?= $props['label'] ?>"><?= $props['label'] ?></span>
              <?php if( isset( $props['sub'] ) ) : ?>
              <span class="nav-more"><?php include $icon_path . 'chevron-right.svg'; ?></span>
              <?php endif; ?>
            </a>
          </li>
          <?php endforeach; ?>
        </ol>
      </div><!--.level-1-->

      <?php foreach( $nav as $el => $props ) : ?>
      <?php if( isset( $props['sub'] ) ) : ?>
      <div id="secondary-nav-<?= $el ?>" class="container nav-list secondary-nav<?= ( isset( $props['auto_expand'] ) && $props['auto_expand'] ) ? ' auto-expand' : '' ?><?= ( $query_sub !== NULL && array_key_exists( $query_sub, $props['sub'] ) ) ? ' active' : '' ?>">
        <ol class="container secondary-nav-list">
          <li class="nav-back">
            <a class="container nav-back ink" href="<?= APP_URL . '?p=' . $el . '&' . $nav_query ?>" data-p="<?= $el ?>" data-has-sub="false">
              <span class="nav-icon" data-icon="arrow-left"><?php include $icon_path . 'arrow-left.svg'; ?></span>
              <span class="nav-label text-subheading"><?= $props['label'] ?></span>
            </a>
          </li>
          <?php foreach( $props['sub'] as $el_sub => $sub_props ) : ?>
          <li class="<?= ( $query_p === $el ) && ( $query_sub === $el_sub ) ? 'active' : '' ?>">
            <a class="container secondary-nav-link ink" href="<?= APP_URL . '?p=' . $el . '&' . $nav_query . '&sub=' . $el_sub ?>" data-p="<?= $el ?>" data-has-sub="false">
              <span class="nav-icon" data-icon="<?= $no_icons ? 'square' : $sub_props['icon'] ?>"><?php $no_icons ? include $icon_path . 'square.svg' : include $icon_path . $sub_props['icon'] . '.svg'; ?></span>
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
          <a class="container nav-collapse ink" href="<?= APP_URL . '&' . !$nav_query ?>">
            <span class="nav-icon" data-icon="arrow-collapse-left"><?php include $icon_path . 'arrow-collapse-left.svg' ?></span>
            <span class="nav-label text-body-2" data-label="Collapse">Collapse</span>
          </a>
        </li>
      </ol>
    </div>

  </section><!--#navigation-->

  <section id="content" class="container">

    <div id="navigation-placeholder" class="<?= $nav_collapsed ? 'collapsed' : '' ?>"></div>

    <div id="content-container" class="container">

      <div id="title-bar" class="container">
        <div id="title">
          <h1 class="text-subheading"><?php // $nav[$query_p]['label'] ?></h1>
        </div>
      </div><!--#title-bar-->

      <div id="main" class="container">
