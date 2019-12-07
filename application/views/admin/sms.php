<div class="row">
	<div class="col s12 m6 offset-m3">
		<div class="card">
			<div class="card-content black-text"><span class="card-title center blue-grey-text"><?php echo ucfirst($title);?></span>
				<div class="divider"></div>
				<?php echo form_open('send_sms','class =""');?>
				<div class="row">
					<div class="input-field col s12">
						<i class="material-icons prefix">phone</i>
						<input type="text" name="sms_recipient" id="sms_recipient" class="validate">
						<label for="icon_prefix">Receiver Number <span class="red-text">*<span></label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<i class="material-icons prefix">mail_outline</i>
						<textarea name="sms_message" id="" cols="30" rows="10" class="validate" placeholder="Put your message here"></textarea>
					</div>
				</div>

					<input id="icon_btn" type="submit" class="btn waves-light search" value="Envoyer">
				</form>
			</div>
		</div>
	</div>
</div>
