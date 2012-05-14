<ul class="global-menu">
	<li class="home"><a href="/"><span class="icon"></span></a></li>
	<?php if ($user AND $user->account->loaded()): ?>
		<li class="search">
			<a href="<?php echo URL::site('search/main'); ?>" class="modal-trigger" title="<?php echo __("Search"); ?>">
				<span class="icon"></span>
			</a>
		</li>
	<?php endif; ?>
</ul>
</div>

<div class="col_8">
	<ul class="user-menu">	
		<!-- hide parts of the header menu in the login page and for non registered users -->
		<?php if ($user AND ! $anonymous): ?>
			<?php if ($user->account->loaded()): ?>
				<li class="rivers"><a href="#"><span class="icon"></span><span class="label"><?php echo __("Rivers"); ?></span></a></li>
				<li class="bucket"><a href="#"><span class="icon"></span><span class="label"><?php echo __("Buckets"); ?></span></a></li>
				<li class="user popover">
					<a href="#" class="popover-trigger">
						<span class="dropdown-arrow"></span>
						<span class="avatar-wrap">
							<?php if ($num_notifications): ?>
								<span class="notification"><?php echo $num_notifications; ?></span>
							<?php endif ?>
							<img src="<?php echo Swiftriver_Users::gravatar($user->email, 80); ?>" />
						</span>
						<span class="nodisplay"><?php echo $user->name; ?></span>
					</a>
					<ul class="popover-window base header-toolbar">
						<li>
							<a href="<?php echo URL::site().$user->account->account_path; ?>">
								<?php echo __('ui.nav.dashboard');?>
							</a>
						</li>
						<li class="group">
							<a href="<?php echo URL::site().$account->account_path.'/settings'; ?>">
								<?php echo __("ui.nav.settings.account"); ?>
							</a>
						</li>
						<?php if ($admin): ?>
							<li>
								<a href="<?php echo URL::site().'settings/main'; ?>">
									<?php echo __("ui.nav.settings.website"); ?>
								</a>
							</li>
						<?php endif; ?>
						<li>
							<a href="<?php echo URL::site().'login/done'; ?>">
								<em><?php echo __('ui.nav.logout');?></em>
							</a>
						</li>
					</ul>
				</li>
			<?php endif; ?>
		<?php elseif ($controller != 'login'): ?>
			<li class="login">
				<a href="<?php echo URL::site('login'); ?>" class="modal-trigger">
					<span class="label"><?php echo __("ui.nav.login"); ?></span>
				</a>
			</li>
		<?php endif; ?>
	</ul>
</div>

<?php if ($user): ?>
<script type="text/template" id="header-rivers-modal-template">
	<hgroup class="page-title cf">
		<div class="page-h1 col_9">
			<h1><?php echo __("ui.nav.rivers"); ?></h1>
		</div>
		<div class="page-actions col_3">
			<h2 class="close">
				<a href="#">
					<span class="icon"></span>
					<?php echo __('ui.button.close'); ?>
				</a>
			</h2>
		</div>
	</hgroup>

	<div class="modal-body link-list" style="display:none">
		<p class="category own-title" style="display:none">
			<?php echo __('ui.user.rivers.mine'); ?>
		</p>
		<ul class="own"></ul>

		<p class="category collaborating-title" style="display:none">
			<?php echo __('ui.user.rivers.collaborate'); ?>
		</p>
		<ul class="collaborating"></ul>

		<p class="category following-title" style="display:none">
			<?php echo __('ui.user.rivers.follow'); ?>
		</p>
		<ul class="following"></ul>
	</div>

	<div class="modal-body create-new">
		<p class="button-blue">
			<a href="<?php echo URL::site().$user->account->account_path.'/river/create'; ?>">
				<?php echo __('ui.river.create'); ?>
			</a>
		</p>
	</div>
</script>

<script type="text/template" id="header-buckets-modal-template">
	<hgroup class="page-title cf">
		<div class="page-h1 col_9">
			<h1><?php echo __("ui.nav.buckets"); ?></h1>
		</div>
		<div class="page-actions col_3">
			<h2 class="close">
				<a href="#">
					<span class="icon"></span>
					<?php echo __('ui.button.close'); ?>
				</a>
			</h2>
		</div>
	</hgroup>

	<div class="modal-body link-list" style="display:none">
		<p class="category own-title" style="display:none">
			<?php echo __('ui.user.buckets.mine'); ?>
		</p>
		<ul class="own"></ul>

		<p class="category collaborating-title" style="display:none">
			<?php echo __('ui.user.buckets.collaborate'); ?>
		</p>
		<ul class="collaborating"></ul>

		<p class="category following-title" style="display:none">
			<?php echo __('ui.user.buckets.follow'); ?>
		</p>
		<ul class="following"></ul>
	</div>

	<div class="modal-body create-new">
		<form>
			<h2><?php echo __('ui.bucket.create'); ?></h2>
			<div class="field">
				<input type="text" placeholder="Name your new bucket" class="name" name="new_bucket" />
				<p class="button-blue"><a href="#">Save</a></p>
			</div>
		</form>
	</div>
</script>

<script type="text/template" id="header-asset-template">
	<a href="<%= url %>"><%= display_name %></a>
</script>
<?php endif; ?>

<script type="text/template" id="confirm-window-template">
	<hgroup class="page-title cf">
		<div class="page-h1 col_9">
			<h1><%= message %></h1>
		</div>
		<div class="page-actions col_3">
			<h2 class="close">
				<a href="#">
					<span class="icon"></span>
					<?php echo __('ui.button.close'); ?>
				</a>
			</h2>
		</div>
	</hgroup>

	<div class="modal-body">
		<div class="settings-toolbar">
			<p class="button-blue"><a href="#">Yes</a></p>
			<p class="button-blank close"><a href="#">Nope, nevermind</a></p>
		</div>
	</div>
</script>