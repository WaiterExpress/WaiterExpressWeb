<!-- Container / Start -->
<div class="container">

	<div class="row">

		<!-- Contact Details -->
		<div class="col-md-4">

			<h4 class="headline margin-bottom-30">Find Us There</h4>

			<!-- Contact Details -->
			<div class="sidebar-textbox">
				<p>Visítenos en Playas del Coco o contáctenos con el siguiente formulario para hablar sobre su consulta.</p>

				<ul class="contact-details">
					<li><i class="im im-icon-Phone-2"></i> <strong>Phone:</strong> <span>(123) 123-456 </span></li>
					<li><i class="im im-icon-Fax"></i> <strong>Fax:</strong> <span>(123) 123-456 </span></li>
					<li><i class="im im-icon-Globe"></i> <strong>Web:</strong> <span><a href="#">www.gaiagetaways.com</a></span></li>
					<li><i class="im im-icon-Envelope"></i> <strong>E-Mail:</strong> <span><a href="#">info@gaiagetaways.com</a></span></li>
				</ul>
			</div>

		</div>

		<!-- Contact Form -->
		<div class="col-md-8">

			<section id="contact">
				<h4 class="headline margin-bottom-35">Contact Form</h4>

					<?php echo form_open(site_url("contact/send")) ?>

						<div>
							<input name="nombre" type="text" id="name" placeholder="Your Name" required="required" />
						</div>

						<div class="row">
							<div class="col-md-6">
								<div>
									<input name="telefono" type="text" id="telefono" placeholder="Your Phone" required="required" />
								</div>
							</div>

							<div class="col-md-6">
								<div>
									<input name="email" type="email" id="email" placeholder="Email Address" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" required="required" />
								</div>
							</div>
						</div>

						<div>
							<input name="asunto" type="text" id="subject" placeholder="Subject" required="required" />
						</div>

						<div>
							<textarea name="mensaje" cols="40" rows="3" id="comments" placeholder="Message" spellcheck="true" required="required"></textarea>
						</div>
						<button type="submit" id="submit" class="submit button"><i class="im im-icon-Mail-withAtSign"></i> Submit Message</button>
					<?php
					echo form_close();
					if($this->session->flashdata('envio')){
						echo $this->session->flashdata('envio');
					}
					?>
			</section>
		</div>
		<!-- Contact Form / End -->

	</div>

</div>
<!-- Container / End -->