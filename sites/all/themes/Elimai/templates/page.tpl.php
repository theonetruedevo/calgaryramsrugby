<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>

  <div id="page-wrapper" class="container"><div id="page">

    <div id="header"><div class="section clearfix row">
      <div class="brand-wrapper span4">
        <?php if ($logo): ?>
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
            <img src="<?php print $logo; ?>" width="100px" height="100px" alt="<?php print t('Home'); ?>" />
          </a>
        <?php endif; ?>

        <?php if ($site_name || $site_slogan): ?>
          <div id="name-and-slogan">
            <?php if ($site_name): ?>
              <?php if ($title): ?>
                <h1 id="site-name"><strong>
                  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                </strong></h1>
              <?php else: /* Use h1 when the content title is empty */ ?>
                <h1 id="site-name">
                  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                </h1>
              <?php endif; ?>
            <?php endif; ?>

            <?php if ($site_slogan): ?>
              <div id="site-slogan"><?php print $site_slogan; ?></div>
            <?php endif; ?>
          </div> <!-- /#name-and-slogan -->
        <?php endif; ?>
      </div>
      <div class="social-block span2 pull-right">
                <?php if (theme_get_setting('social_block', 'elimai')): ?>
                    <ul class="social">
                        <?php if ($facebook_url): ?><li>
                            <a target="_blank" title="<?php print $site_name; ?> in Facebook" href="<?php print $facebook_url; ?>"><img alt="Facebook" src="<?php print $path . '/images/icons/icon-facebook.png'; ?>" /> </a>
                            </li><?php endif; ?>
                        <?php if ($twitter_url): ?><li>
                            <a target="_blank" title="<?php print $site_name; ?> in Twitter" href="<?php print $twitter_url; ?>"><img alt="Twitter" src="<?php print $path . '/images/icons/icon-twitter.png'; ?>" /> </a>
                            </li><?php endif; ?>
                        <?php if ($gplus_url): ?><li>
                            <a target="_blank" title="<?php print $site_name; ?> in Google+" href="<?php print $gplus_url; ?>"><img alt="Google+" src="<?php print $path . '/images/icons/icon-google.png'; ?>" /> </a>
                            </li><?php endif; ?>
                        <?php if ($pinterest_url): ?><li>
                            <a target="_blank" title="<?php print $site_name; ?> in Pinterest" href="<?php print $pinterest_url; ?>"><img alt="Pinterest" src="<?php print $path . '/images/icons/icon-pinterest.png'; ?>" /> </a>
                            </li><?php endif; ?>
                    </ul>
                <?php endif; ?>
            </div> <!-- social-block -->
      <?php print render($page['header']); ?>

    </div></div> <!-- /.section, /#header -->


          <div id="sidr-close"><a href="#sidr-close" class="toggle-sidr-close"></a></div>
          <div id="site-navigation-wrap">
              <a href="#sidr-main" id="navigation-toggle"><span class="fa fa-bars"></span>Menu</a>
              <nav id="site-navigation" class="navigation main-navigation clr" role="navigation">
                  <div id="main-menu" class="menu-main-container">
                      <?php
                      $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
                      print drupal_render($main_menu_tree);
                      ?>
                  </div>
              </nav>
          </div>
    <?php if ($breadcrumb): ?>
      <div id="breadcrumb"><?php print $breadcrumb; ?></div>
    <?php endif; ?>
      <div id="main" class="site-main clr">
    <?php print $messages; ?>

    <?php if ($is_front): ?>
      <?php if (isset($bootstrap_carousel)): ?>
        <?php print $bootstrap_carousel; ?>
      <?php endif; ?>
        <div class="row">
            <div class="span4">
                <h2>Who We Are</h2>
              <p class="lead">Founded in 1959, the Calgary Rams Rugby Club is one of the oldest clubs in Calgary. The Rams are well known to be tenacious on the field, and very social off the pitch.</p>
              <p class="lead">Our club consists of Men’s 2nd Division (2014 City Champions), and 3rd Division, as well as Women’s SW1 (2012 Provincial Champions) and SW2.</p>
              <p class="lead"> Whether you have years of experience, or are new to the sport, we are always looking for new players, and welcome all that are interested in the rugby culture and joining our club.</p>

            </div>

            <div class="span4">
              <h2>Train With Us</h2>
              <p class="lead">Join us for pre-season indoor training throughout the months of January to April.</p>
              <p class="lead"> Contact the <a href="mailto:vpmen@calgaryramsrugby.com">VP Men</a> or the <a href="mailto:vpwomen@calgaryramsrugby.com">VP Women</a> for information on dates, times, and locations.</p>

              <p class="lead">Outdoor training will commence in April, weather permitting, and is held on Tuesday and Thursday evenings from 6:15 – 8:00pm at Bishop Carroll High School fields (4624 Richard Road SW Calgary).</p>
            </div>
            <div class="span4">


              <h2>Play With Us</h2>
              <p class="lead">The rugby season begins at the beginning of may, weather permitting, and runs until early October with provincial championships. </p>
              <p class="lead">Games in Calgary are played at the <a href="http://www.calgaryrugby.com/">Calgary Rugby Union</a>, with away games in Banff, Lethbridge, &amp; Red Deer.</p>
              <p class="lead">If you have chosen to join the Calgary Rams Rugby Club please <?php print l('Register Here', 'https://gw.itsportsnet.com/memberArea.php?scriptName=MEMBERLOCKERHOME&leagueID=5204&menuItem=MAhome&cache=update');?></p>
            </div>
        </div>
    <?php else:?>

    <div id="main-wrapper" class="row"><div id="main" class="clearfix">

      <div id="content" class="column span8"><div class="section">
        <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
        <a id="main-content"></a>
        <?php print render($title_prefix); ?>
        <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        <?php print render($page['content']); ?>
      </div></div> <!-- /.section, /#content -->

      <?php if ($page['sidebar_first']): ?>
        <div id="sidebar" class="column sidebar span4"><div class="section">
          <?php print render($page['sidebar_first']); ?>
        </div></div> <!-- /.section, /#sidebar-first -->
      <?php endif; ?>

    </div></div> <!-- /#main, /#main-wrapper -->

    <?php endif; ?>
    </div>
    <div id="footer">
      <div class="row">
        <div class="span12">
          <div class="span1"></div>
          <div class="span2">
            <ul><li><?php print l('About Us', 'about-us');?></li></ul>
          </div>
          <div class="span2">
            <ul><li><?php print l('Contact Us', 'contact-us');?></li></ul>
          </div>
          <div class="span2">
            <ul><li><?php print l('Our Sponsors', 'sponsors');?></li></ul>
          </div>
          <div class="span2">
            <ul><li><?php print l('Fundraising Policy', 'fundraising-policy');?></li></ul>
          </div>
          <div class="span2">
            <ul><li><?php print l('Links', 'links');?></li></ul>
          </div>
          <div class="span1"></div>
        </div>
      </div>
      <?php if ($page['footer']): ?>
        <?php print render($page['footer']); ?>
      <?php endif; ?>
    </div>
      <p class="copyright">
        <?php print t('Copyright'); ?> &copy; <?php echo date("Y"); ?>, <a href="<?php print $front_page; ?>">
      </p>
<!--    </div></div> <!-- /.section, /#footer -->

  </div></div> <!-- /#page, /#page-wrapper -->
