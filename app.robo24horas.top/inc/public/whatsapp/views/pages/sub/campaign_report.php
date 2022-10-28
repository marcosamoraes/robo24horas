<div class="wa-bulk-schedules container p-25">
	<h4 class="mb-4 d-flex fs-30">
		<div class="d-block d-lg-none mr-2">
			<a href="javascript:void(0);" class="user-chat-remove wa-back-submenu text-muted fs-16 p-2">
				<i class="ri-arrow-left-s-line"></i>
			</a>
		</div>
		<div><?php _e("Campaign reports")?></div>
	</h4>
	<div class="row">
		
		<div class="col-md-12 offset-md-0">
			<div class="card">
				<div class="card-body">
					<div class="box-avatar text-center">
						<img src="<?php _e( get_url($account->avatar) )?>" class="mb-4">
						<h4><?php _e( $account->name )?></h4>
						<div><?php _e( $account->pid )?></div>
					</div>

					<div class="row m-t-30">
						<div class="col-md-4 m-b-25">
							<div class="p-25 bg-solid-info rounded">
					            <div class="wrap-m">
					                <div>
					                    <h3 class="success w-100"><?php _e( $report->sent )?></h3>
					                    <div><?php _e("Successed")?></div>
					                </div>
					                <div class="wrap-c">
					                    <i class="fas fa-paper-plane float-right text-info fs-45"></i>
					                </div>
					            </div>
					        </div>
						</div>
						<div class="col-md-4 m-b-25">
							<div class="p-25 bg-solid-warning rounded">
					            <div class="wrap-m">
					                <div>
					                    <h3 class="danger"><?php _e( $report->failed )?></h3>
					                    <span><?php _e("Failed")?></span>
					                </div>
					                <div class="wrap-c">
					                    <i class="fas fa-exclamation-triangle float-right text-warning fs-45"></i>
					                </div>
					            </div>
					        </div>
						</div>
						<div class="col-md-4 m-b-25">
							<div class="p-25 bg-solid-success rounded">
					            <div class="wrap-m">
					                <div>
					                    <h3 class="primary"><?php _e( $report->total )?></h3>
					                    <span><?php _e("Total")?></span>
					                </div>
					                <div class="wrap-c">
					                    <i class="fas fa-calendar-check float-right text-success fs-45"></i>
					                </div>
					            </div>
					        </div>
						</div>
					</div>
					<form action="<?php _e( get_module_url('bulk_report_by_day') )?>" method="POST">
						<input type="hidden" name="account" value="<?php _e( $account->id )?>">
						<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
						<div class="row m-t-30">
							<div class="col-6">
								<div class="form-group">
									<label>From</label>
									<input type="text" class="form-control date" autocomplete="off" name="from_day" >
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>To</label>
									<input type="text" class="form-control date" autocomplete="off" name="to_day" >
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block"><?php _e("Download report")?></button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="m-t-30">
				

				<div class="m-t-50 table-mod table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">
									<?php _e("Campaign name")?>
								</th>
								<th scope="col">
									<?php _e("Sent")?>
								</th>
								<th scope="col">
									<?php _e("Failed")?>
								</th>
								<th scope="col">
								</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($schedules['result'] as $key => $value): ?>
							<tr class="item">
								<td scope="row">
									<?php _e($value->name)?>
								</td>
								<td scope="row">
									<?php _e($value->sent)?>
								</td>
								<td scope="row">
									<?php _e($value->failed)?>
								</td>
								<td scope="row text-right">
									<a href="<?php _e( get_module_url('bulk_report/'.$value->ids) )?>" class="d-block text-right">
										<?php _e("Export")?>
									</a>
								</td>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
	
	<nav class="m-t-30">
	    <?php _e( $schedules['pagination'], false)?>
	    </nav>
	</div>
</div>


<script type="text/javascript">
	$(function(){
		$(".page-link").addClass("wa-action-item").attr('data-result-content', 'wa-content');
	});
</script>