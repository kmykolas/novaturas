<?php
/* Smarty version 3.1.30, created on 2017-06-30 09:15:04
  from "/home/magento/domains/magento.us.lt/public_html/novaturas/view/airlines/item.tpl.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5955ec680f8be8_13803203',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cba844b913ebcf461aae570b6db7af4906829ef8' => 
    array (
      0 => '/home/magento/domains/magento.us.lt/public_html/novaturas/view/airlines/item.tpl.html',
      1 => 1498803302,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5955ec680f8be8_13803203 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Redagavimas</h1>
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
            <option <?php echo $_smarty_tpl->tpl_vars['itm']->value['selected'];?>
 value="<?php echo $_smarty_tpl->tpl_vars['itm']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['itm']->value['title'];?>
</option>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </select>
  </div>
  <button type="submit" class="btn btn-default">Saugoti</button>
  <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" />
  <input type="hidden" name="send" value="1" />
</form> 
<br /><br />
<button type="button" onclick="window.history.back()" class="btn btn-primary">Atgal</button>
<br /><br />
<form action="./?act=airlines-list" method="post">
    <button type="submit" class="btn btn-danger" >Ištrinti</button>
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" />
    <input type="hidden" name="send" value="1" /> 
</form><?php }
}
