<?php
/* Smarty version 3.1.30, created on 2017-07-11 11:42:53
  from "/home/magento/domains/magento.us.lt/public_html/novaturas/view/airports/item.tpl.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59648f8dc15087_47039056',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2887c30b1439918a7868273ac72189cfd76d0919' => 
    array (
      0 => '/home/magento/domains/magento.us.lt/public_html/novaturas/view/airports/item.tpl.html',
      1 => 1499762571,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59648f8dc15087_47039056 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Oro uosto redagavimas</h1>
<?php if ($_smarty_tpl->tpl_vars['message']->value) {?>
    <div class="row">
        <div class="alert alert-success">
          <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

        </div>        
    </div>
<?php }?>
 <form action="" method="post">
  <div class="form-group">
    <label for="email">Pavadinimas:</label>
    <input type="text" class="form-control" name="title" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
">
  </div>
  <div class="form-group">
    <label for="pwd">Šalis:</label>
    <select name="countryid" class="form-control">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['countries']->value, 'itm');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itm']->value) {
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['itm']->value['id'];?>
" <?php echo $_smarty_tpl->tpl_vars['itm']->value['selected'];?>
><?php echo $_smarty_tpl->tpl_vars['itm']->value['title'];?>
</option>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </select>
  </div>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['airlines']->value, 'itm');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itm']->value) {
?>
    <label class="checkbox-inline"><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['itm']->value['id'];?>
" name="airlineid[]" <?php echo $_smarty_tpl->tpl_vars['itm']->value['checked'];?>
><?php echo $_smarty_tpl->tpl_vars['itm']->value['title'];?>
</label>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

  <div class="clear space"></div>
  <div id="map"></div>
  <input id="longitude" name="longitude" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['longitude'];?>
" />
  <input id="latitude" name="latitude" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['latitude'];?>
" />
  <div class="clear space"></div>
  <button type="submit" class="btn btn-default">Saugoti</button>
  <input type="hidden" name="send" value="1" />
  <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" />
</form> 
<br /><br />
<button type="button" onclick="window.history.back()" class="btn btn-primary">Atgal</button>
<br /><br />
<form action="./?act=airports-list" method="post">
    <button type="submit" class="btn btn-danger" >Ištrinti</button>
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" />
    <input type="hidden" name="send" value="1" /> 
</form>
<br /><br /><?php }
}
