<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:11:10
  from '/var/www/vhosts/dreamsat.online/matar/modules/doofinder/views/templates/admin/onboarding_tab.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b4666ed56d67_26777501',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6cac5f0ea766c734784c012f845dbcd3b916b06d' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/doofinder/views/templates/admin/onboarding_tab.tpl',
      1 => 1655988946,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b4666ed56d67_26777501 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="panel">
	<div class="doofinder-content">
		<div class="row">
			<div class="col-12">
				<p style="font-size:8px;">
				<?php if ($_smarty_tpl->tpl_vars['checkConnection']->value) {?>
					<span class="connection-ball green"></span> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Connection with Doofinder successful.','mod'=>'doofinder'),$_smarty_tpl ) );?>

				<?php } else { ?> 
					<span class="connection-ball red"></span> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You cannot connect with Doofinder. Please contact your server provider to check your web server internet connection or firewall.','mod'=>'doofinder'),$_smarty_tpl ) );?>

				<?php }?>
				</p>
			</div>
			<div class="bootstrap message-popup" style="display:none;">
				<div class="module_warning alert alert-warning" >
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You don\'t receive the Api Key or you close too quickly the popup window. Please try again. If you think this is an error, please contact our support or try the module manual configuration option.','mod'=>'doofinder'),$_smarty_tpl ) );?>

				</div>
			</div>
			<div class="bootstrap message-error" style="display:none;">
				<div class="module_warning alert alert-danger" >
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'An error occurred during the installation process. Please contact our support team on','mod'=>'doofinder'),$_smarty_tpl ) );?>
 support@doofinder.com
				</div>
			</div>
			<div class="col-12 text-center loading-installer" style="display:none;">
				<img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'html','UTF-8' ));?>
views/img/doofinder_logo.png" />
				<br>
				<ul>
					<li class="active"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Please be patient, we are autoinstalling your definitive search solution...','mod'=>'doofinder'),$_smarty_tpl ) );?>
</li>
					<li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Creating search engines...','mod'=>'doofinder'),$_smarty_tpl ) );?>
</li>
					<li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Recover data feed of your products...','mod'=>'doofinder'),$_smarty_tpl ) );?>
</li>
					<li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Creating index to search on your site...','mod'=>'doofinder'),$_smarty_tpl ) );?>
</li>
					<li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Giving a final magic touch...','mod'=>'doofinder'),$_smarty_tpl ) );?>
</li>
					<li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Reloading page, please wait...','mod'=>'doofinder'),$_smarty_tpl ) );?>
</li>
				</ul>
			</div>
			<div class="col-md-6 text-center choose-installer">
				<img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'html','UTF-8' ));?>
views/img/doofinder_logo.png" />
				<br/>
				<img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'html','UTF-8' ));?>
views/img/doofinder_mac.png" />
				<div class="col-md-12">
					<a onclick="javascript:popupDoofinder('signup')" href="#" class="btn btn-primary btn-lg btn-doofinder" id="create-account-btn"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Use your free trial now!','mod'=>'doofinder'),$_smarty_tpl ) );?>
</a>
				</div>
				<div class="col-md-12" style="margin-top:15px">
					<a onclick="javascript:popupDoofinder('login')" href="#" class="btn btn-primary btn-lg btn-doofinder" id="login-account-btn"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'I have an account','mod'=>'doofinder'),$_smarty_tpl ) );?>
</a>
				</div>
			</div>
			<div class="col-md-6 choose-installer">
				<div class="col-md-8">
				<h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add a smart search engine to your e-commerce in 5 minutes and with no programming','mod'=>'doofinder'),$_smarty_tpl ) );?>
</h2>
				<hr />
				<br />
				<p><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'ABOUT DOOFINDER','mod'=>'doofinder'),$_smarty_tpl ) );?>
:</strong></p>
				<br />
				<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Doofinder provides you with an instant search layer to display your products when your visitors use the search bar','mod'=>'doofinder'),$_smarty_tpl ) );?>
.</p>
				<br />
				<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your customers then have the opportunity to preview your products, filter them and choose the desired product. Upon hitting enter, doofinder will also power the results page','mod'=>'doofinder'),$_smarty_tpl ) );?>
.</p>
				<br />
				<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Among our features are','mod'=>'doofinder'),$_smarty_tpl ) );?>
:</p>
				<br />
				<dl>
					<dd>&middot; <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Detailed reports on visitor search behaviour','mod'=>'doofinder'),$_smarty_tpl ) );?>
.</dd>
					<dd>&middot; <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Faceted search option','mod'=>'doofinder'),$_smarty_tpl ) );?>
.</dd>
					<dd>&middot; <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Learning behaviour','mod'=>'doofinder'),$_smarty_tpl ) );?>
.</dd>
					<dd>&middot; <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Merchandising power to set a products positioning','mod'=>'doofinder'),$_smarty_tpl ) );?>
.</dd>
					<dd>&middot; <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Banner feature for advertising and promoting products, brands and events','mod'=>'doofinder'),$_smarty_tpl ) );?>
.</dd>
					<dd>&middot; <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Options to redirect users to content pages','mod'=>'doofinder'),$_smarty_tpl ) );?>
.</dd>
					<dd>&middot; <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Held on our servers for a faster page load time','mod'=>'doofinder'),$_smarty_tpl ) );?>
.</dd>
				</dl>
				<br />
				<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'More than 5000 e-commerce sites over 35 countries are already using it','mod'=>'doofinder'),$_smarty_tpl ) );?>
.</p>
				<br />
				<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'What are you waiting for?','mod'=>'doofinder'),$_smarty_tpl ) );?>
</p>
				<br />
				<p><a onclick="javascript:popupDoofinder('signup')" href="#"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Test our solution for 30 days, for free!','mod'=>'doofinder'),$_smarty_tpl ) );?>
</a></p>
				</div>
			</div>
		</div>
		<hr />
	</div>
</div>
<style type="text/css">
span.connection-ball {
    width: 8px;
    height: 8px;
    display: inline-block;
    border-radius: 100px;
}
.red{
	background-color:#ff0000;
}
.green{
	background-color:#00ff37;
}

li.active{
	display:block!important;
}
.loading-installer ul li{
	font-size: 20px;
    font-weight: bold;
	display:none;
}
.btn-doofinder{
	font-size: 20px!important;
    padding: 20px!important;
    font-weight: bold!important;
    white-space: normal!important;
	border-radius: 50px!important;
}
#create-account-btn{
    color: #1b1851;
    background-color: #fff031;
    border-color: #fff031;
}
#create-account-btn:hover{
    color: #fff031;
    background-color: #1b1851;
    border-color: #1b1851;
}
#login-account-btn{
	color: #ffffff;
    background-color: #4842c1;
	border-color: #4842c1;
}
#login-account-btn:hover{
	color: #fff031;
    background-color: #1b1851;
	border-color: #1b1851;
}
</style>
<?php echo '<script'; ?>
 type="text/javascript">
	function popupDoofinder(type){
		var params = '?<?php echo html_entity_decode(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['paramsPopup']->value,'htmlall','UTF-8' )));?>
&mktcod=PSHOP&utm_source=prestashop_module&utm_campaing=freetrial&utm_content=autoinstaller';
		var domain = 'https://app.doofinder.com/plugins/'+type+'/prestashop';
		var winObj = popupCenter( domain+params, 'Doofinder', 400,  850);
		
		var loop = setInterval(function() {   
			if(winObj.closed) {  
				clearInterval(loop);
				installingLoop();  
			}  
		}, 1000); 

	}

	function installingLoop(){
		var shopDomain = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '');
		$.post(shopDomain+'/modules/doofinder/doofinder-ajax.php', {
			'check_api_key':1
		}, function(data){
			if(data == 'OK') {
				$('.choose-installer').hide();
				$('.loading-installer').show();
				launchAutoinstaller();				
			} else {
				$('.message-popup').show();
				setTimeout(function(){
					$('.message-popup').hide();
				} ,10000);
			}
		});

		
	}

	function launchAutoinstaller(){
		var shopDomain = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '');
		var token = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['tokenAjax']->value,'htmlall','UTF-8' ));?>
';
		$.post(shopDomain+'/modules/doofinder/doofinder-ajax.php', {
			'autoinstaller':1,
			'token':token
		}, function(data){
			if(data == 'OK') {
				var loop = setInterval(function() {
					$('.loading-installer ul li.active').removeClass('active').next().addClass('active');  
					if($('.loading-installer ul li.active').index() < 0) {  
						clearInterval(loop);
						location.reload();
					}  
				}, 3000);
			} else {
				$('.message-error').show();
			}
		})
		.fail(function() {
		    location.reload();
		});
	}

	function popupCenter(url, title, w, h){
		const dualScreenLeft = window.screenLeft !==  undefined ? window.screenLeft : window.screenX;
		const dualScreenTop = window.screenTop !==  undefined   ? window.screenTop  : window.screenY;

		const width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
		const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

		const systemZoom = width / window.screen.availWidth;
		const left = (width - w) / 2 / systemZoom + dualScreenLeft
		const top = (height - h) / 2 / systemZoom + dualScreenTop
		
		const newWindow = window.open(url, title, 
		`
		scrollbars=yes,
		width=${w / systemZoom}, 
		height=${h / systemZoom}, 
		top=${top}, 
		left=${left},
		status=0,
		toolbar=0,
		location=0
		`
		)
		
		if (window.focus) newWindow.focus();
		return newWindow;
	}
<?php echo '</script'; ?>
>
<?php }
}
