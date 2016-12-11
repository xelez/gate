<?php
  /**
   * Gate - Wiki engine and web-interface for WebTester Server
   *
   * Stencil for frames
   *
   * Copyright (c) 2008-2009 Sergey I. Sharybin <g.ulairi@gmail.com>
   *
   * This program can be distributed under the terms of the GNU GPL.
   * See the file COPYING.
   */

  global $IFACE;

  if ($IFACE != "SPAWNING NEW IFACE") {
    print ('HACKERS?');
    die;
  }


    require_once $DOCUMENT_ROOT.'/inc/stencil/anchor.php';
    require_once $DOCUMENT_ROOT.'/inc/stencil/core_page.php';
    require_once $DOCUMENT_ROOT.'/inc/stencil/dd_form.php';
    require_once $DOCUMENT_ROOT.'/inc/stencil/form.php';
    require_once $DOCUMENT_ROOT.'/inc/stencil/frame.php';
    require_once $DOCUMENT_ROOT.'/inc/stencil/imaged_href.php';
    require_once $DOCUMENT_ROOT.'/inc/stencil/message.php';
    require_once $DOCUMENT_ROOT.'/inc/stencil/pages.php';
    require_once $DOCUMENT_ROOT.'/inc/stencil/tabcontrol.php';
    require_once $DOCUMENT_ROOT.'/inc/stencil/wiki_page.php';
    require_once $DOCUMENT_ROOT.'/inc/stencil/button.php';
    require_once $DOCUMENT_ROOT.'/inc/stencil/contents.php';
    require_once $DOCUMENT_ROOT.'/inc/stencil/pagintation.php';
    require_once $DOCUMENT_ROOT.'/inc/stencil/progress.php';

?>
