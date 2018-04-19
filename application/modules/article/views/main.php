<?php 
	if (strtolower($subcategory['article_subcategory_name']) == 'our teams') { 
	$description = explode('=========',$detail['article_description']);
	$total_explode = count($description);
?>
	<section id="team" class="team">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="title-box">
					<p class="section-subtitle">Introduce To</p>
					<h2 class="section-title"><?=$detail['article_name'];?></h2>
				</div>
				<div class="col-sm-9">
					<center>
					<img src="<?php echo base_url();?>adminuicon/assets/elFinder-2.1.24/<?php echo $detail['article_image'];?>" alt="<?=$detail['article_name'];?>" class="img-rounded">
					</center>
					<?php echo $description[0];?>
					<?php echo $description[1];?>
				</div>
				<div class="col-sm-3">
					<?php for($i=2;$i<$total_explode;$i++) { ?>
						<div class="panel panel-default">
							<div class="panel-body">
								<?php echo $description[$i]; ?>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>	
		</div>
	</div>
	</section>
<?php } else { ?>
<section id ="feature" class="section-padding">
	<div class="container">
		<div class="row">
			<div class="header-section">
				<h1 class=" text-left"><?=$detail['article_name'];?></h1>
				<hr>
				<?=$detail['article_description'];?>
			</div>
        </div>
	</div>
</section>
<?php } ?>