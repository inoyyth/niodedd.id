 <!-- FAQ -->
 <section id="faq" class="faq overlay-light">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="title-box">
					<p class="section-subtitle">You may want to know</p>
					<h2 class="section-title">frequently asked questions</h2>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
 					<?php foreach($faq as $k=>$v) { ?>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="heading<?php echo $k;?>">
							<h4 class="panel-title">
								<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $k;?>" aria-expanded="true" aria-controls="collapse<?php echo $k;?>">
								<?php echo $v['question'];?>
								</a>
							</h4>
						</div>
						<div id="collapse<?php echo $k;?>" class="panel-collapse collapse <?php echo $k==0 ? 'in' : ''; ?>" role="tabpanel" aria-labelledby="heading<?php echo $k;?>">
							<div class="panel-body">
								<?php echo $v['answered'];?>
							</div>
						</div>
					</div>
					 <?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>