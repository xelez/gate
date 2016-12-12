<?php
  /**
   * Gate - Wiki engine and web-interface for WebTester Server
   *
   * Anchor Wiki page class
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


    class CCAnchor extends CCVirtual {
      function CCAnchor () { $this->SetClassName ('CCAnchor'); }
    }

    content_Register_CClass ('CCAnchor', 'Якорь', false);

?>
