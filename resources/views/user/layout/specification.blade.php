
		<!-- SPECIFICATION AREA START -->
		<div class="specification-area">
			<div class="container">
				<div class="row">
					<div class="specification-owl">
						<?php foreach ($special_items as $key => $value): ?>
							<div class="items specification_item">
								<div class="col-md-4 col-sm-4">
									<div class="single-specification spcei-mrbtm">
										<h3>Chất liệu</h3>
										<p>
											<?php foreach ($value->composition as $k => $v): ?>
												<?php echo $v->name . ', ' ?>
											<?php endforeach ?>
										</p>
									</div>
									<div class="single-specification">
										<h3>Phong Cách</h3>
										<p>
											<?php foreach ($value->style as $k => $v): ?>
												<?php echo $v->name . ', ' ?>
											<?php endforeach ?>
										</p>
									</div>
									<div class="single-specification">
										<h3>Thuộc tính</h3>
										<p>
											<?php foreach ($value->property as $k => $v): ?>
												<?php echo $v->name . ', ' ?>
											<?php endforeach ?>
										</p>
									</div>
								</div>
								<div class="col-md-4 col-sm-4">
									<div class="spcei-img">
										<img src="{{ asset($value->image_url) }}" alt="" />
									</div>
								</div>
								<div class="col-md-4 col-sm-4">
									<div class="single-specification right spcei-mrbtm mt-xs-speci">
										<h3>Màu sắc</h3>
										<p>
											<?php foreach ($value->color as $k => $v): ?>
												<?php echo $v->name . ', ' ?>
											<?php endforeach ?>
										</p>
									</div>
									<div class="single-specification right">
										<h3>Kích thước</h3>
										<p>
											<?php foreach ($value->size as $k => $v): ?>
												<?php echo $v->name . ', ' ?>
											<?php endforeach ?>
										</p>
									</div> 
									<div class="single-specification right">
										<h3>Machine Wash</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
									</div>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
		<!-- SPECIFICATION AREA START -->