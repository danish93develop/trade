<!-- Hero section starts here -->
<section class="Hero">
	<video autoplay muted loop id="myVideo">
		<source src="<?= base_url(); ?>assets/front/images/stocksloop.mp4" type="video/mp4">
	</video>
	<div class="container">
		<div class="herodiv">

			<div class="row">
				<div class="col-md-8 padding">
					<div class="herotext">

						<h2>Guaranteed 25%-55% Profit</h2>
						<h2>on US Stocks, Every Year.</h2>
						<a class="btn  StartNowLinkLink" href="#plans">START NOW</a>
					</div>
				</div>
				<?php if ($this->session->userdata('trade_session')) {
					redirect("/", "");
				}
				?>
				<div class="col-md-4 padding">
					<div class="formstyle">
						<form action="<?= base_url(); ?>home/userVerify" method="post">
							<h4><strong>Sign In</strong></h4>
							<?php if ($this->session->flashdata('message')) { ?>
								<div class="alets-pop">
									<div class="alert alert-<?= $this->session->flashdata('type'); ?>">
										<strong><?= ucfirst($this->session->flashdata('type')); ?>!</strong> <?= $this->session->flashdata('message'); ?>
									</div>
								</div>
							<?php } ?>

							<?php if (validation_errors()) { ?>
								<div class="alets-pop">
									<div class="alert alert-danger">
										<strong>Error!</strong> <?php echo validation_errors(); ?>
									</div>
								</div>
							<?php } ?>
							<div class="form-group">
								<input type="email" name="email" class="form-control txtstyle" placeholder="Email" required>
							</div>
							<div class="form-group">
							<input type="password" name="password" class="form-control txtstyle" placeholder="Password" required>
							</div>
							<input type="hidden" name="type" value="user" class="form-control">

							<button type="submit" name="submit" class="btn btn-default btnstyle">Login Now</button>
							
				            <div class="card-footer bg-white">
								<div class="d-flex justify-content-center links">
									Not a member yet? <a href="#plans">Register Now</a>
								</div>
								<div class="d-flex justify-content-center">
									<a href="<?=base_url();?>auth/forgot-password">Forgot your password?</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
</section>
<div class="clearfix"></div>
<!-- Hero section end here -->

<!-- Reason section starts here -->
<section class="reason">

	<h3>Before You Begin</h3>
	<p class="TradingPara">Trading is like a Marathon, not a 100 meter Sprint. Just like you need to run slow & preserve your energy in Marathon, similarly you need to stay safe & preserve your equity at every cost. You need to have following 4 things in order to be a successful trader.</p>
	<div class="container">
		<div class="row">
			<div class="col-md-3 padding">
				<div class="circle1divNew">
					<i class="fa fa-pencil" aria-hidden="true"></i>
				</div>
				<h1>Patience</h1>
				<p>
					Trades are opened from 5days-12months.Be prepared for delayed gartification.We don't offer get rich quick scheme.
				</p>
			</div>
			<div class="col-md-3 padding">
				<div class="circle1divNew">
					<i class="fa fa-handshake-o" aria-hidden="true"></i>
				</div>
				<h1>Discipline</h1>
				<p>
					Never open trades with margin.If you plan to invest 25% of your equity with us,only then you can take risk of 2x margin.
				</p>
			</div>
			<div class="col-md-3 padding">
				<div class="circle1divNew">
					<i class="fa fa-heart-o" aria-hidden="true"></i>
				</div>
				<h1>Allocation</h1>
				<p>
					Maximum allocation should never cross 5% for a stock.This way you will make good portfolio like Institutional Traders.
				</p>
			</div>

			<div class="col-md-3 padding">
				<div class="circle1divNew">
					<i class="fa fa-usd" aria-hidden="true"></i>
				</div>
				<h1>Your Broker</h1>
				<p>
					Our analysts study every stock that comes in our radar.You should have account with a bank that gives access to all US stocks.
				</p>
			</div>

		</div>
	</div>
</section>
<div class="clearfix"></div>
<!-- Reason section end here -->


<section class="reason Access-Detailed" id="plans">

	<h3>access detailed research
		from our dedicated team</h3>

	<div class="container">
		<div class="row">

			<?php foreach ($rowData as $row) { ?>
				<form method="post" action="<?= base_url(); ?>register">
					<div class="col-md-3 padding Access-DetailedDiv">
						<h1><?= $row->plan_title; ?></h1>
						<?= $row->description; ?>
						<h5><?= '$' . $row->price . '.00'; ?> per month</h5>
						<input type="hidden" value="<?= $row->id; ?>" name="subs_id">
						<div class="TryForFreeDiv">
							<!-- <a class="TryForFreeLink" href="">Try for Free</a> -->
							<button type="submit" name="submit" class="btn btn-primary btn-block TryForFreeLink">Try for Free</button>
						</div>
					</div>
				</form>
			<?php } ?>

		</div>
	</div>
</section>