<?php
  if (!current_user_can('manage_options')) {
    wp_die('You do not have sufficient permissions to access this page.');
}

function my_admin_scripts() {
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
}
function my_admin_styles() {
wp_enqueue_style('thickbox');
}
add_action('admin_print_scripts', 'my_admin_scripts');
add_action('admin_print_styles', 'my_admin_styles');
?> 

 <div class="wrap">
        <?php screen_icon('plugins'); ?> <h2>Add Smart App Banner to your website</h2>
<?php
 if (isset($_POST["update_settings"])) {
    // Do the saving
    $appleid = esc_attr($_POST["appleid"]);  
    $playid = esc_attr($_POST["playid"]);   
    $msid = esc_attr($_POST["msid"]);   
    $msname = esc_attr($_POST["msname"]);   
    $dayshidden = esc_attr($_POST["dayshidden"]);
	$daysreminder = esc_attr($_POST["daysreminder"]);   
    $title = esc_attr($_POST["title"]);   
    $author = esc_attr($_POST["author"]);   
    $button = esc_attr($_POST["button"]);   
    $iosprice = esc_attr($_POST["iosprice"]);   
    $playprice = esc_attr($_POST["playprice"]);   
    $msprice = esc_attr($_POST["msprice"]);   
    $image = esc_attr($_POST["upload_image"]);   


update_option('sab_appleid', $appleid);
update_option('sab_playid', $playid);
update_option('sab_msid', $msid);
update_option('sab_msname', $msname);
update_option('sab_dayshidden', $dayshidden);
update_option('sab_daysreminder  ', $daysreminder);
update_option('sab_title', $title );
update_option('sab_author', $author  );
update_option('sab_button', $button);
update_option('sab_iosprice', $iosprice );
update_option('sab_playprice', $playprice );
update_option('sab_msprice', $msprice  );
update_option('sab_image', $image  );




?>
<div id="message" class="updated">Settings saved</div>
<?php
}
$appleid = get_option('sab_appleid');
$playid = get_option('sab_playid');
$msid = get_option('sab_msid');
$msname = get_option('sab_msname');
$dayshidden = get_option('sab_dayshidden');
$daysreminder = get_option('sab_daysreminder');
$title = get_option('sab_title');
$author = get_option('sab_author');
$button = get_option('sab_button');
$iosprice = get_option('sab_iosprice');
$playprice = get_option('sab_playprice');
$msprice = get_option('sab_msprice');
$image = get_option('sab_image');
  
 
?>
        <form method="POST" action="">
          <input type="hidden" name="update_settings" value="Y" />
            <table class="form-table">
              
               <tr valign='top'>
                    <th scope='row'>
                        <label for='appleid'>
                         iOS App ID
                        </label> 
                    </th>
                    <td  >
                        <input type='text' name='appleid'  value='<?php echo $appleid; ?>' size='25' />
                        <p class="description">ex : 502838820</p>
                    </td>
                      <th scope='row'>
                        <label for='iosprice'>
                         iOS Price
                        </label> 
                    </th>
                    <td  >
                        <input type='text' name='iosprice'  value='<?php echo $iosprice; ?>' size='25' />
                    </td>
               </tr>
<tr valign='top'>
                    <th scope='row'>
                        <label for='playid'>
                         Google Play App ID
                        </label> 
                    </th>
                    <td  >
                        <input type='text' name='playid'  value='<?php echo $playid; ?>' size='25' />
                         <p class="description">ex : com.palfbapps.instasave</p>
                    </td>
                     <th scope='row'>
                        <label for='playprice'>
                         Google Play Price
                        </label> 
                    </th>
                    <td  >
                        <input type='text' name='playprice'  value='<?php echo $playprice; ?>' size='25' />
                        <p class="description">ex : com.palfbapps.instasave</p>
                    </td>
               </tr>
<tr valign='top'>
                    <th scope='row'>
                        <label for='msid'>
                         Microsoft App ID
                        </label> 
                    </th>
                    <td  >
                        <input type='text' name='msid'  value='<?php echo $msid; ?>' size='25' />
                      <p class="description">ex : microsoft.build_8wekyb3d8bbwe</p>
                    </td>
                     <th scope='row'>
                        <label for='msprice'>
                         Microsoft Price
                        </label> 
                    </th>
                    <td  >
                        <input type='text' name='msprice'  value='<?php echo $msprice; ?>' size='25' />
                         
                    </td>
               </tr>

<tr valign='top'>
                    <th scope='row'>
                        <label for='dayshidden'>
                         Days Hidden
                        </label> 
                    </th>
                    <td colspan="3">
                        <input type='text' name='dayshidden'  value='<?php echo $dayshidden; ?>' size='25' />
                           <p class="description">days to hide banner after close button is clicked (defaults to 15)</p>
                    </td>
               </tr>
            
<tr valign='top'>
                    <th scope='row'>
                        <label for='daysreminder'>
                         Days Reminder
                        </label> 
                    </th>
                    <td colspan="3">
                        <input type='text' name='daysreminder'  value='<?php echo $daysreminder; ?>' size='25' />
                        <p class="description">days to hide banner after "VIEW" button is clicked (defaults to 90)</p>
                    </td>
               </tr>
             
<tr valign='top'>
                    <th scope='row'>
                        <label for='title'>
                         App Title
                        </label> 
                    </th>
                    <td colspan="3">
                        <input type='text' name='title'  value='<?php echo $title; ?>' size='25' />
                    </td>
               </tr>
<tr valign='top'>
                    <th scope='row'>
                        <label for='author'>
                         Author
                        </label> 
                    </th>
                    <td colspan="3">
                        <input type='text' name='author'  value='<?php echo $author; ?>' size='25' />
                    </td>
               </tr>
<tr valign='top'>
                    <th scope='row'>
                        <label for='button'>
                         Button
                        </label> 
                    </th>
                    <td colspan="3">
                        <input type='text' name='button'  value='<?php echo $button; ?>' size='25' />
                    </td>
               </tr>
<tr valign="top">
<th scope="row">Logo</th>
<td><label for="upload_image">
<input id="upload_image" type="text" size="36" name="upload_image" value="<?php echo $image; ?>" />
<input id="upload_image_button" type="button" value="Upload Image" />
<br />Enter an URL or upload an image for the banner.
</label></td>
</tr>
<tr>

                  <td colspan="2"> <p>
    <input type="submit" value="Save settings" class="button-primary"/>
</p></td>
                </tr>
            </table>
        </form>
    
    

    <br>
   for any help contact me <a href="http://twitter.com/omarnas" target="_blank">@omarnas</a>
    </div>
    <script>
    	jQuery(document).ready(function() {
 
jQuery('#upload_image_button').click(function() {
 formfield = jQuery('#upload_image').attr('name');
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 return false;
});
 
window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#upload_image').val(imgurl);
 tb_remove();
}
 
});
    </script>