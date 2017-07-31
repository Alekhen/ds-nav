<?php

$user = $data['UserData'];
$nav = $data['NavData'];

?><div id="header" class="container">

  <section id="utility-bar" class="container" data-user="<?=$user['first_name'].' '.$user['last_name']?>" data-user-first-name="<?=$user['first_name']?>" data-user-last-name="<?=$user['last_name']?>">
    <div id="navigation-icon">
      <button><?=$this->icon('menu', true)?></button>
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

  <section id="navigation" class="container<?= !APP_ICONS_ACTIVE ? ' no-icons' : '' ?>">

    <button id="navigation-close" class="ink"><?=$this->icon('close', true)?></button>

    <div id="navigation-lists" class="container">

      <div id="primary-nav" class="nav-list primary-nav active">
        <ol class="container">
          <?php foreach( $nav as $el => $props ) : ?>
          <li>
            <a class="container primary-nav-link ink<?= isset( $props['sub'] ) ? ' sub-nav-indicator' : '' ?><?= ( isset( $props['auto_expand'] ) && $props['auto_expand'] ) ? ' auto-expand' : '' ?>" href="<?=APP_URL?>" data-p="<?=$el?>" data-has-sub="<?= isset( $props['sub'] ) ? 'true' : 'false' ?>">
              <span class="nav-icon" data-icon="<?=$props['icon']?>"><?=$this->icon($props['icon'])?></span>
              <span class="nav-label text-body-2" data-label="<?=$props['label']?>"><?=$props['label']?></span>
              <?php if( isset( $props['sub'] ) ) : ?>
              <span class="nav-more"><?=$this->icon('chevron-right', true)?></span>
              <?php endif; ?>
            </a>
          </li>
          <?php endforeach; ?>
        </ol>
      </div><!--.level-1-->

      <?php foreach( $nav as $el => $props ) : ?>
      <?php if( isset( $props['sub'] ) ) : ?>
      <div id="secondary-nav-<?=$el?>" class="container nav-list secondary-nav<?= ( isset( $props['auto_expand'] ) && $props['auto_expand'] ) ? ' auto-expand' : '' ?>">
        <ol class="container secondary-nav-list">
          <li class="nav-back">
            <a class="container nav-back ink" href="<?=APP_URL?>" data-p="<?=$el?>" data-has-sub="false">
              <span class="nav-icon" data-icon="arrow-left"><?=$this->icon('arrow-left', true)?></span>
              <span class="nav-label text-subheading"><?=$props['label']?></span>
            </a>
          </li>
          <?php foreach( $props['sub'] as $el_sub => $sub_props ) : ?>
          <li>
            <a class="container secondary-nav-link ink" href="<?=APP_URL?>" data-p="<?=$el?>" data-has-sub="false">
              <span class="nav-icon" data-icon="<?=$sub_props['icon']?>"><?=$this->icon($sub_props['icon'])?></span>
              <span class="nav-label text-body-2" data-label="<?=$sub_props['label']?>"><?=$sub_props['label']?></span>
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
          <a class="container nav-collapse ink" href="<?=APP_URL?>">
            <span class="nav-icon" data-icon="arrow-collapse-left"><?=$this->icon('arrow-collapse-left', true)?></span>
            <span class="nav-label text-body-2" data-label="Collapse">Collapse</span>
          </a>
        </li>
      </ol>
    </div>

  </section><!--#navigation-->

  <section id="content" class="container">

    <div id="navigation-placeholder"></div>

    <div id="content-container" class="container">

      <div id="title-bar" class="container">
        <div id="title">
          <h1 class="text-subheading">Home</h1>
        </div>
      </div><!--#title-bar-->

      <div id="main" class="container">
