<?php if($title == 'client') { ?>
<section id="clients" class="clients">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="title-box">
					<p class="section-subtitle">Some of our</p>
					<h2 class="section-title">Satisfied clients</h2>
				</div>
			</div>
		</div>

		<div class="row">
			<?php 
				//Columns must be a factor of 12 (1,2,3,4,6,12)
				$numOfCols = 6;
				$rowCount = 0;
				$bootstrapColWidth = 12 / $numOfCols;

				foreach($subcategory_article as $k=>$v){ 
			?>
		   <div class="col-sm-2"> 
				<div class="client-box">
					<a href="<?php echo $v['article_description'];?>">
						<img class="img-responsive img-full" src="<?php echo base_url();?>adminuicon/assets/elFinder-2.1.24/<?php echo $v['article_image'];?>" alt="com">
					</a>
				</div>
			</div>
			<?php $rowCount++;
				if($rowCount % $numOfCols == 0) echo '</div><div class="row">';}
			?>
		</div>
	</div>
</section>
<?php } ?>

<?php if($title == 'our-teams') { ?>
<!-- Team -->
<section id="team" class="team">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="title-box">
					<p class="section-subtitle">You may want to</p>
					<h2 class="section-title">Know the attorneys</h2>
				</div>
			</div>
		</div>

		<div class="row">
			<?php 
				foreach($subcategory_article as $k=>$v){ 
				$explode_text = explode('=========',$v['article_description']);
			?>
			<a href="<?php echo site_url('article/index/' . $v['id'] . '/' . url_title($v['article_name'], 'dash', TRUE));?>">	
				<div class="col-sm-4">
					<div class="team-box">
						<img class="img-responsive img-full" src="<?php echo base_url();?>adminuicon/assets/elFinder-2.1.24/<?php echo $v['article_image'];?>" alt="team">
						<div class="team-detail">
							<h3 class="text-center"><?php echo $v['article_name'];?></h3>
							<?php echo $explode_text[0];?>
						</div>
					</div>
				</div>
			</a>
			<?php } ?>
		</div>
	</div>
</section>
<?php } ?>

<?php if($title == 'news') { ?>
<!-- Team -->
<section id="team" class="team">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="title-box">
					<p class="section-subtitle">You may want to</p>
					<h2 class="section-title">Know the latest thinking</h2>
				</div>
			</div>
		</div>

		<div class="row">
			<?php 
				foreach($subcategory_article as $k=>$v){ 
			?>	
			<div class="col-sm-offset-1 col-sm-11">
				<div class="team-box">
					<div class="team-detail">
						<div class="row">
							<div class="col-sm-2">
								<h5 class="text-right"><?php echo tanggalan($v['sys_create_date']);?> &nbsp;| </h5>
							</div>
							<div class="col-sm-10">
								<a href="<?php echo site_url('article/index/' . $v['id'] . '/' . url_title($v['article_name'], 'dash', TRUE));?>"><h5 class="text-left"><?php echo $v['article_name'];?></h5></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</section>
<?php } ?>

<?php if($title == 'download-page') { ?>
<!-- Team -->
<section id="team" class="team">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="title-box">
					<p class="section-subtitle">You may want to</p>
					<h2 class="section-title">Know the latest thinking</h2>
				</div>
			</div>
		</div>

		<div class="row">
			<?php 
				foreach($subcategory_article as $k=>$v){ 
			?>	
			<div class="col-sm-offset-1 col-sm-11">
				<div class="team-box">
					<div class="team-detail">
						<div class="row">
							<div class="col-sm-2">
								<h5 class="text-right"><?php echo tanggalan($v['sys_create_date']);?> &nbsp;| </h5>
							</div>
							<div class="col-sm-10">
								<a href="<?php echo site_url('article/index/' . $v['id'] . '/' . url_title($v['article_name'], 'dash', TRUE));?>"><h5 class="text-left"><?php echo $v['article_name'];?></h5></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</section>
<?php } ?>