<?php
/* Smarty version 3.1.30, created on 2017-07-03 10:13:11
  from "/home/magento/domains/magento.us.lt/public_html/novaturas/view/airlines/create.tpl.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5959ee87ad8da9_73192005',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9775cbbcbcc8ef0dea06272c003c2991f5c07e21' => 
    array (
      0 => '/home/magento/domains/magento.us.lt/public_html/novaturas/view/airlines/create.tpl.html',
      1 => 1499065983,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5959ee87ad8da9_73192005 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Avialinijos sukūrimas</h1>
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
  <button type="submit" class="btn btn-default">Saugoti</button>
  <input type="hidden" name="send" value="1" />
</form> 
<br /><br />
<button type="button" onclick="window.history.back()" class="btn btn-primary">Atgal</button><?php }
}
