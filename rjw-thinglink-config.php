<div class="wrap">
	<?php if ($_GET['settings-updated']) { ?>
		<div id="message" class="updated fade" style="margin: 15px 0 10px;"><p>Your settings have been <strong>saved</strong>.</p></div>
	<?php } ?>

		   <h2><?php echo($plugin_name) ?></h2>

   <form method="post" action="options.php">
   <?php settings_fields( 'rjw-thinglink-group' ); ?>
   <?php do_settings_sections( 'rjw-thinglink-group' ); ?>
   

    <div id="login_notification" style="margin: 20px; border: 2px solid black;width: 320px;padding:10px; text-align:center;">
    	You can find out your ID by logging on to <a href="http://www.thinglink.com">Thinglink</a>.
    </div>
   
    <table class="form-table">
        <tr valign="top">
        <th scope="row"><b>Your Thinglink ID:</b></th>
        <td><input type="text" id="thinglink_id_input" name="thinglink_id" value="<?php echo(get_option('thinglink_id')); ?>" style="width:150px;"/></td>
        </tr>
    </table>
    
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>

	<div id="save-reminder" style="margin: 20px; border: 2px solid black;width: 320px;padding:10px; text-align:center;">
		Your Thinglink Id is currently <?php echo(get_option('thinglink_id') ? ("<b>" + get_option('thinglink_id') + "</b>") : "not set"); ?>. You have changed your settings and you must press the save button in order for it to take effect.
	</div>
   </form>
   
   <script type="text/javascript">
   function showReminder() { jQuery('#save-reminder').toggle( jQuery('#thinglink_id_input').val() != '<?php echo(get_option('thinglink_id')); ?>'); }
   jQuery('#thinglink_id_input').change(showReminder);
   function prefill(obj) {
	   if(obj["name"] && jQuery('#thinglink_id_input').val() == "") {
		   jQuery('#thinglink_id_input').val(obj["embedCode"]);
	   }

	   if(obj["name"]) {
		   jQuery("#login_notification").html("You're currently logged on to <a href='http://www.thinglink.com'>Thinglink</a> as <b>" + obj["name"]+ "</b> with Thinglink ID <b>" + obj["embedCode"]+ "</b>");
	   }
   }
   </script>

   <script type="text/javascript" src="http://www.thinglink.com/api/me?callback=prefill" > </script>
   <script type="text/javascript">
	   showReminder();
   </script>
   
</div>