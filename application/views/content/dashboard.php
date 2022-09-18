<style>
	.m-portlet__head {
		background: #fff !important;
	}
</style>

<div class="m-content">







	<!--begin:: Widgets/Stats-->
	<div class="m-portlet ">
		<div class="m-portlet__body  m-portlet__body--no-padding">
			<div class="row m-row--no-padding m-row--col-separator-xl">
				<div class="col-md-12 col-lg-6 col-xl-3">
					<!--begin::Total Profit-->
					<a href="<?php echo site_url('App/contracts/pr'); ?>">
						<div class="m-widget24">
							<div class="m-widget24__item">
								<h4 class="m-widget24__title">
									Pending Review
								</h4>
								<br>
								<span class="m-widget24__desc">
									Contracts to be reviewed
								</span>
								<span class="m-widget24__stats m--font-brand">
									<?php echo $pendingReviewCount; ?>
								</span>
								<div class="m--space-10"></div>
								<div class="progress m-progress--sm">
									<div class="progress-bar m--bg-brand" role="progressbar" style="width: <?php echo $pendingReviewCount; ?>%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<span class="m-widget24__change">
									<!-- Change -->
								</span>
								<span class="m-widget24__number">
									78%
								</span>
							</div>
						</div>
					</a>
					<!--end::Total Profit-->
				</div>
				<div class="col-md-12 col-lg-6 col-xl-3">
					<!--begin::New Feedbacks-->
					<a href="<?php echo site_url('App/contracts/pv'); ?>">
						<div class="m-widget24">
							<div class="m-widget24__item">
								<h4 class="m-widget24__title">
									Pending Creation
								</h4>
								<br>
								<span class="m-widget24__desc">
									Contracts to be created
								</span>
								<span class="m-widget24__stats m--font-info">
									<?php echo $pendingValidationCount; ?>
								</span>
								<div class="m--space-10"></div>
								<div class="progress m-progress--sm">
									<div class="progress-bar m--bg-info" role="progressbar" style="width: <?php echo $pendingValidationCount; ?>%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<span class="m-widget24__change">
									<!-- Change -->
								</span>
								<span class="m-widget24__number">
									<!--84%-->
								</span>
							</div>
						</div>
					</a>
					<!--end::New Feedbacks-->
				</div>
				<div class="col-md-12 col-lg-6 col-xl-3">
					<!--begin::New Orders-->
					<a href="<?php echo site_url('App/contracts/ps'); ?>">
						<div class="m-widget24">
							<div class="m-widget24__item">
								<h4 class="m-widget24__title">
									Pending Sign-off
								</h4>
								<br>
								<span class="m-widget24__desc">
									Contracts to be signed-off
								</span>
								<span class="m-widget24__stats m--font-danger">
									<?php echo $pendingSignoffCount; ?>
								</span>
								<div class="m--space-10"></div>
								<div class="progress m-progress--sm">
									<div class="progress-bar m--bg-danger" role="progressbar" style="width: <?php echo $pendingSignoffCount; ?>%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<span class="m-widget24__change">
									<!-- Change -->
								</span>
								<span class="m-widget24__number">
									<!--69%-->
								</span>
							</div>
						</div>
					</a>
					<!--end::New Orders-->
				</div>
				<div class="col-md-12 col-lg-6 col-xl-3">
					<!--begin::New Users-->
					<div class="m-widget24">
						<div class="m-widget24__item">
							<h4 class="m-widget24__title">
								Pending Renewals
							</h4>
							<br>
							<span class="m-widget24__desc">
								Due for renewals
							</span>
							<span class="m-widget24__stats m--font-success">
								<?php echo $expiredCount ?> %
							</span>
							<div class="m--space-10"></div>
							<div class="progress m-progress--sm">
								<div class="progress-bar m--bg-success" role="progressbar" style="width: 0%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<span class="m-widget24__change">
								<!-- Change -->
							</span>
							<span class="m-widget24__number">
								<!--90%-->
							</span>
						</div>
					</div>
					<!--end::New Users-->
				</div>
			</div>
		</div>
	</div>
	<!--end:: Widgets/Stats-->
















	<!--Begin::Main Portlet-->
	<div class="row">
		<div class="col-xl-6">







			<!--begin:: Widgets/Product Sales-->
			<div class="m-portlet m-portlet--bordered-semi m-portlet--space m-portlet--full-height ">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text">
								Contract Summary
								<span class="m-portlet__head-desc">
									By status
								</span>
							</h3>
						</div>
					</div>
					<div class="m-portlet__head-tools">

					</div>
				</div>
				<div class="m-portlet__body">
					<div class="m-widget25">
						<span class="m-widget25__price m--font-brand">
							<?php echo $totalCount; ?>
						</span>
						<span class="m-widget25__desc">
							Total Contracts
						</span>
						<div class="m-widget25--progress">
							<div class="m-widget25__progress">
								<span class="m-widget25__progress-number">
									<?php
									$ongoingCount = ($signedoffCount / $totalCount) * 100;

									if (is_nan($ongoingCount))
										echo 0;
									else
										echo round($ongoingCount);

									?> %
								</span>
								<div class="m--space-10"></div>
								<div class="progress m-progress--sm">
									<div class="progress-bar m--bg-danger" role="progressbar" style="width: <?php echo $ongoingCount ?>%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<span class="m-widget25__progress-sub">
									On-going
								</span>
							</div>
							<div class="m-widget25__progress">
								<span class="m-widget25__progress-number">
									<?php

									$totalPendingCount = $pendingReviewCount + $pendingValidationCount + $pendingSignoffCount + $failValidationCount + $failReviewCount + $failSignoffCount;
									$processingCount = ($totalPendingCount / $totalCount) * 100;

									if (is_nan($processingCount))
										echo 0;
									else
										echo round($processingCount);


									?> %
								</span>
								<div class="m--space-10"></div>
								<div class="progress m-progress--sm">
									<div class="progress-bar m--bg-accent" role="progressbar" style="width: <?php echo $processingCount ?>%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<span class="m-widget25__progress-sub">
									In Processing
								</span>
							</div>
							<div class="m-widget25__progress">
								<span class="m-widget25__progress-number">
									<?php
									$expiredCount_ = ($expiredCount / $totalCount) * 100;

									if (is_nan($expiredCount_))
										echo 0;
									else
										echo $expiredCount_;

									?> %
								</span>
								<div class="m--space-10"></div>
								<div class="progress m-progress--sm">
									<div class="progress-bar m--bg-warning" role="progressbar" style="width: <?php echo $expiredCount_ ?>%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<span class="m-widget25__progress-sub">
									Expired
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end:: Widgets/Product Sales-->







		</div>
		<div class="col-xl-6">
			<!--begin:: Widgets/Quick Stats-->
			<div class="row m-row--full-height">
				<div class="col-sm-12 col-md-12 col-lg-6">
					<a href="<?php echo site_url('App/contracts/so'); ?>">
						<div class="m-portlet m-portlet--half-height m-portlet--border-bottom-brand ">
							<div class="m-portlet__body">
								<div class="m-widget26">
									<div class="m-widget26__number">
										<?php echo $signedoffCount; ?>
										<small>
											Signed-off
										</small>
									</div>
									<div class="m-widget26__chart" style="height:90px; width: 220px;">
										<canvas id="m_chart_quick_stats_1"></canvas>
									</div>
								</div>
							</div>
						</div>
					</a>
					<div class="m--space-30"></div>
					<a href="<?php echo site_url('App/contracts/fv'); ?>">
						<div class="m-portlet m-portlet--half-height m-portlet--border-bottom-danger ">
							<div class="m-portlet__body">
								<div class="m-widget26">
									<div class="m-widget26__number">
										<?php echo $failValidationCount; ?>
										<small>
											Fail Creation
										</small>
									</div>
									<div class="m-widget26__chart" style="height:90px; width: 220px;">
										<canvas id="m_chart_quick_stats_2"></canvas>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-6">
					<a href="<?php echo site_url('App/contracts/fr'); ?>">
						<div class="m-portlet m-portlet--half-height m-portlet--border-bottom-success ">
							<div class="m-portlet__body">
								<div class="m-widget26">
									<div class="m-widget26__number">
										<?php echo $failReviewCount; ?>
										<small>
											Fail Review
										</small>
									</div>
									<div class="m-widget26__chart" style="height:90px; width: 220px;">
										<canvas id="m_chart_quick_stats_3"></canvas>
									</div>
								</div>
							</div>
						</div>
					</a>
					<div class="m--space-30"></div>
					<a href="<?php echo site_url('App/contracts/fs'); ?>">
						<div class="m-portlet m-portlet--half-height m-portlet--border-bottom-accent ">
							<div class="m-portlet__body">
								<div class="m-widget26">
									<div class="m-widget26__number">
										<?php echo $failSignoffCount; ?>
										<small>
											Fail Signoff
										</small>
									</div>
									<div class="m-widget26__chart" style="height:90px; width: 220px;">
										<canvas id="m_chart_quick_stats_4"></canvas>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
			<!--end:: Widgets/Quick Stats-->
		</div>
	</div>
	<!--End::Main Portlet-->













</div>