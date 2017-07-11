<?php
/* Smarty version 3.1.30, created on 2017-07-10 21:13:43
  from "/home/magento/domains/magento.us.lt/public_html/novaturas/view/airports/create.tpl.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5963c3d79a9123_87904372',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e4277fc50d0b4f449e538d55f40069d33468125c' => 
    array (
      0 => '/home/magento/domains/magento.us.lt/public_html/novaturas/view/airports/create.tpl.html',
      1 => 1499710417,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5963c3d79a9123_87904372 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Oro uosto sukūrimas</h1>
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
"><?php echo $_smarty_tpl->tpl_vars['itm']->value['title'];?>
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
" name="airlineid[]"><?php echo $_smarty_tpl->tpl_vars['itm']->value['title'];?>
</label>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

  <div class="clear space"></div>
  <div id="map"></div>
  <input id="longitude" name="longitude" type="hidden" />
  <input id="latitude" name="latitude" type="hidden" />
  <div class="clear space"></div>
  <button type="submit" class="btn btn-default">Saugoti</button>
  <input type="hidden" name="send" value="1" />
</form> 
<br /><br />
<button type="button" onclick="window.history.back()" class="btn btn-primary">Atgal</button><?php }
}
