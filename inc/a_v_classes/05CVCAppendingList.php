<?php if ($_CVCAppendingList_!='#CVCAppendingList_Included#') {$_CVCAppendingList_='#CVCAppendingList_Included#';
  class CVCAppendingList extends CVCVirtual {
    var $metas;
    var $name;
    var $items;
    var $itemsUsed;
    function CVCAppendingList () { $this->SetClassName ('CVCAppendingList'); }
    function Init ($name='', $settings='') {
      $this->SetDefaultSettings ();
      $this->contents=array ();
      $this->name=$name;
      $this->items=array ();
      $this->itemsUsed=array ();
      $params=unserialize_params ($settings);
      $this->SetSettings (combine_arrays ($this->GetSettings (), $params));
    }
    function AppendItem ($title, $tag) { $this->items[]=array ('title'=>$title, 'tag'=>$tag); }
    function SetDefaultSettings() {$this->SetClassName ('CVCAppendingList');}
    function InnerHTML () {
      global $CORE, $appending_list_script_printed;
      if (!isset ($appending_list_script_printed)) {
        $CORE->AddScript ( 'language=JavaScript;', $this->FromTemplate ('script', array (), false));
        $appending_list_script_printed=true;
      }
      return $this->FromTemplate ('widget', array ('name'=>$this->name, 'settings'=>$this->settings,
        'items'=>$this->items, 'itemsUsed'=>$this->itemsUsed));
    }
    function ReceiveItemsUsed () {
      $s=stripslashes ($_POST['alist_'.$this->name.'_items']);
      $this->itemsUsed=explode ("\n", $s);
    }
    function GetItemsUsed () { return $this->itemsUsed; }
    function SetItemsUsed ($items) { $this->itemsUsed=$items; }

    function SetItems ($arr) { $this->items=$arr; }
  }

  content_Register_VCClass ('CVCAppendingList');
}
?>
