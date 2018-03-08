<?php
/**
 * Template Name: Company Detail
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header(); 
?>
<link rel='stylesheet' id='ultimate-style-min-css'  href='/wp-content/plugins/Ultimate_VC_Addons/assets/min-css/ultimate.min.css?ver=3.14.1' type='text/css' media='all' />

<link rel='stylesheet' id='ultimate-style-min-css'  href='/wp-content/plugins/js_composer/assets/css/js_composer.css?ver=4.5.2' type='text/css' media='all' />

<script type='text/javascript' src='/wp-content/plugins/Ultimate_VC_Addons/assets/min-js/ultimate.min.js'></script>
<div class="grid_section company_details_header">
	<div class="section_inner clearfix">
    <section class="map-margin section-company-details">
    	<div class="vc_row wpb_row section vc_inner vc_row-fluid">
        	<div class="vc_col-sm-12">
				<?php
			
				$arr = explode("/",$_SERVER['REQUEST_URI']);
			//	$company_slug =  key($_REQUEST);
				$company_slug =  $arr[2];
				
			

			//	$company_id = $_GET['id'];
				global $table_prefix,$wpdb;
				if($blog_id!=1) {
					$table_prefix = $wpdb->base_prefix;		
				}	
				$pos = strpos($company_slug,"-");
				
				if( $pos === false)	{
					$query = "SELECT * FROM ".$table_prefix."therapists where id='".$company_slug."' limit 0,1";
					$type_val=1;
				} else {
					$query = "SELECT * FROM ".$table_prefix."company where company_slug='".$company_slug."'";
					$type_val=0;
				}
				$rows = $wpdb->get_results($query);
				
				
		
				
	
			
				if($rows){			
					foreach($rows as $row){		}
				?>

				<div class="vc_row wpb_row section vc_inner vc_row-fluid">
					
                    <?php // if($type_val==0) { ?>
						<?php   
						if($row->company_logo) { 
								$mime='image/png';
								$binary_data='data:' . $mime . ';base64,' . $row->company_logo;
								$img_size = getimagesize($binary_data);
								if (empty($img_size)) {
									$binary_data='data:' . $mime . ';base64,' . base64_encode($row->company_logo);
								}
						?>
                        <div class="vc_col-sm-3">
							<div class="contents logo">
								<img src="<?php echo $binary_data ?>" alt="<?php echo $row->company_name; ?>">
                        	</div>				
                    	</div>
                        <div class="vc_col-sm-9">				
						<div class="contents logo">
							<h1><?php 
							    if($type_val==0) { 
									echo $row->company_name; 
									$company_map = $row->company_name; 
								} else {
									echo $row->firstname." ".$row->lastname; 
										$company_map = $row->firstname." ".$row->lastname;

								}
							?></h1>
							<p>
								<strong>
								<?php 
								if(strncmp($row->website, 'https:', 6) === 0) { ?>
									<a href="<?php echo $row->website; ?>" target="_blank">
								<?php } else { ?>
                                	<a href="http://<?php $website =  str_replace("http://","",$row->website); echo rtrim($website,'/\\'); ?>" target="_blank">
								<?php } ?>
										<?php 
											if(strncmp($row->website, 'https:', 6) === 0) {
												echo rtrim($row->website, '/\\'); 
											} else {
												$website =  str_replace("http://","",$row->website); 
											//	$website = str_replace("/","",$website); 
												echo rtrim($website, '/\\');
											}
											
											
											?>
                                    </a>
                                </strong>							
								</p>
							<p><strong>
							<?php
							
							$num = preg_replace('/[^0-9]/', '', $row->office_phone);
								$len = strlen($num);
								if($len == 10) { $phone = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $row->office_phone);} else{
									$phone = $row->office_phone;
								}
		
							echo "<a href='tel:".$phone."'>".$phone."</a>"; ?></strong></p>
							
							<div class="description"><?php echo $content = apply_filters('the_content', $row->company_page_description); ?></div>
						</div>
					</div>
						<?php } else { /* ?> <img src="/wp-content/uploads/2016/02/default-logo.png" alt="<?php echo $row->company_name; ?>"><?php */?> 
                        <div class="vc_col-sm-12">				
						<div class="contents logo">
							<h1><?php 
							    if($type_val==0) { 
									echo $row->company_name; 
									$company_map = $row->company_name; 
								} else {
									echo $row->firstname." ".$row->lastname; 
										$company_map = $row->firstname." ".$row->lastname;

								}
							?></h1>
							<p>
								<strong>
								<?php 
								if(strncmp($row->website, 'https:', 6) === 0) { ?>
									<a href="<?php echo $row->website; ?>" target="_blank">
								<?php } else { ?>
                                	<a href="http://<?php $website =  str_replace("http://","",$row->website); echo str_replace("/","",$website); ?>" target="_blank">
								<?php } ?>
										<?php 
											if(strncmp($row->website, 'https:', 6) === 0) {
												echo $row->website; 
											} else {
											$website =  str_replace("http://","",$row->website); echo str_replace("/","",$website); 
											}
											
											
											?>
                                    </a>
                                </strong>							</p>
							<p><strong>
							<?php
							
							$num = preg_replace('/[^0-9]/', '', $row->office_phone);
								$len = strlen($num);
								if($len == 10) { $phone = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $row->office_phone);} else{
									$phone = $row->office_phone;
								}
		
							echo "<a href='tel:".$phone."'>".$phone."</a>"; ?></strong></p>
							
							<div class="description"><?php echo $content = apply_filters('the_content', $row->company_page_description); ?></div>
						</div>
					</div>
					<?php }					// } ?>	
                </div>
			</div>	
        </div>
        </section>
    </div>
</div>

<div class="grid_section company_details">
	<div class="section_inner clearfix">
		<section id="section-company-details" class="map-margin">
				<div class="vc_row wpb_row section vc_inner vc_row-fluid">
                	
					<div class="vc_col-sm-6" id="map-column">	
                    <h3>Location</h3>					
                        <?php 
						 if($type_val==0) { 
							list($ziplatitude,$ziplongitude) = getLatLong($row->zip." ".$row->address);
						 } else {
								list($ziplatitude,$ziplongitude) = getLatLong($row->zipcode." ".$row->address);
						 }
							if(intval ($ziplatitude)!=0) { ?>
					   		<script src="https://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=AIzaSyC_S3lfXv3egSfp2eNOgsBcTenJob-jCNQ" type="text/javascript"></script>
					   		<div id="map" style="width:500px; margin:0 auto 10px auto; height:500px;border:5px solid #4590C2;"></div>
					   		<script type="text/javascript">
								var map = null;
						  		var SANmarkers = [];
						  		var SANhtml = [];
						  		var geocoder = null;
								
						  		function showMarkerAddress_old(id,last) {
									var i=0;
									for(i=1;i<=last;i++)
									{
										document.getElementById(i).style.background = "";
									}
									//document.getElementById(id).style.background ="#fce59a";
									SANmarkers[id].openInfoWindowHtml(SANhtml[id]);
								}


						 function showMarkerAddress(id,last) {
									/*	var i=1;
									for(i=1;i<=last;i++)
									{
										document.getElementById(i).style.background = "";
									}
									*/
								document.getElementById("gmimap0").style.background ="#fce59a";
								SANmarkers[1].openInfoWindowHtml(SANhtml[1]);
								marker.openInfoWindowHtml(SANhtml[1]);     // This opens the info window automatically

								
							}		
							
								jQuery( document ).ready(function() {      
									//	var detailHeight = jQuery('#list-column').height();
									var detailHeight = 100;
									jQuery('#map').height(detailHeight);
									 setTimeout(function(){ //alert("Hello"); 
									 jQuery("#gmimap0").trigger('click');
									 showMarkerAddress(0,1); }, 3000);
									

								});
								//<![CDATA[
						  	
						  		if (GBrowserIsCompatible()) {
									function createMarker(point,html,i) {
									jQuery("#default_view").show();
									var marker = new GMarker(point);
									GEvent.addListener(marker, "click", function() {
							  		marker.openInfoWindowHtml(html);
								});
							//	alert(i);
								SANmarkers[i] = marker;
								SANhtml[i] = html;
								return marker;
								}
								  var map = new GMap2(document.getElementById("map"));
								  geocoder = new GClientGeocoder();
								  map.addControl(new GSmallMapControl());
								  map.addControl(new GMapTypeControl()); 
								  map.setCenter(new GLatLng(<?php echo $ziplatitude ?>, <?php echo $ziplongitude ?>), 9);
								  function showAddress(address,infoWin,id,last,i) {
									if (geocoder) {
										geocoder.getLatLng(address,function(point) {
											if (!point) {
												//alert(address + " not found");
											} else {					
												var html = '<strong>'+infoWin.name+'</strong><br /><strong>'+infoWin.company+'</strong><br />'+infoWin.address+'<br />'+infoWin.city+", "+infoWin.state+ " "+infoWin.zip+'<br />'+infoWin.phone;
												
												var marker = createMarker(point,html,i);
												GEvent.addListener(marker, "click", function() {
													var i=0;
													for(i=1;i<=last;i++)
													{
														document.getElementById(i).style.background ="";
													}
														document.getElementById(id).style.background ="#fce59a";
													});
												
												map.addOverlay(marker);		
											}
										});
									}
								  }
									<?php
												$address = $row->address." ".$row->city . ", ". $row->state . " " . $row->zip;			
										?>  
									var infoWindow = {
									name :	"",
									company : "<?php echo $company_map; ?>",
									address :"<?php echo $row->address; ?>",
									city : "<?php echo $row->city; ?>",
									state : "<?php echo $row->state; ?>",
									zip : "<?php echo $row->zip; ?>",
									phone : "<?php echo $row->office_phone; ?>"
								  }
								  showAddress("<?php echo $address;?>",infoWindow,1,1,1);		
								  
								  }
								   else {
									 alert("Sorry, the Google Maps API is not compatible with this browser");
								   }
								   
							   </script>
					   			<?php 
						  		
						  		}
						  		?>
					</div>
					
	
					<div class="vc_col-sm-6" id="therapists-column">
						<?php if($type_val==0) { ?>
                        	<h3>Therapists</h3>
						
							<p style="margin:0px; padding:0px; line-height:20px;"><?php 
								// echo getTherapistMatch($_GET['id']);
								/*Therapist matched your search*/	
								  $therapist_match = getTherapistMatch($row->company_id,$row->id);
								  $therapist_count = 0;
								  if(count($therapist_match) > 0 ) { 
								  $therapist_names = '<div class="vc_row"><ul class="vc_col-sm-6 therapist_list">';
								  foreach($therapist_match as $data)
								  {
									if($therapist_count==16) {
										$therapist_names.='</ul><ul class="vc_col-sm-6 therapist_list">';
									}									if($data->credentials) { 
									$therapist_names.= '<li>'.$data->firstname." ".$data->lastname.', '.$data->credentials.'</li>';									} else {									$therapist_names.= '<li>'.$data->firstname." ".$data->lastname.'</li>';									}
								  
								  $therapist_count++;
								  }
									echo $therapist_names."</ul></div>";
								  }
	  						?></p>
						<?php 	} else {
							
							
						?>
                        	<h3>About <?php echo $row->firstname." ".$row->lastname; ?></h3>
							<br>
							<p style="margin:0px; padding:0px; line-height:20px;">
								<?php
									if($row->description!='') {
									echo $row->description; } else {
									echo $row->supervisor_description;
									}
								?>
							</p>
							<br>
							<h4>Credentials:</h4>
							<?php 
							
									 $status_str = str_replace(";",", ",$row->status);
									 
									 if(strpos($status_str,"CMAT Supervisor")!==false) 
									 {
										$status_str = str_replace("CMAT,"," ",$status_str);	
									 }
									 
									 if(strpos($status_str,"CSAT Supervisor")!==false) 
									 {
										$status_str = str_replace("CSAT,"," ",$status_str);	
									 }
									 
									if($status_str) { 
										echo $row->credentials.", ".$status_str;
									} else { 
										echo $row->credentials;
									}
							
							} ?>
						
						
					</div>
				</div>
                <div class="vc_row wpb_row section vc_inner vc_row-fluid five-part">
					<div class="vc_col-sm-12">
                    	<div class="vc_row">
						<ul class="medium-block-grid-5 small-block-grid-1">
						<?php 
			
						 if($type_val==1) { 				
						  $offer_data   = getTherapistData($row->id,'seekinghelpfor');
						} else {
						   $offer_data = getSearchFieldData($row->company_id,$row->id,'seekinghelpfor');
						}
						   if($offer_data!='') { 
						  ?>
                            <li>	
								<div class="contents"><h5>Seeking Help For:</h5>
									<p><?php 
										if($row->company_id=='01d60762-a1a9-46d6-b745-4089973406a9') {
											// We added custom for task #754 as per lead
											echo "Sexual Addiction<br>";
											echo "Chemical Dependency<br>";
											echo "Psychiatry Disorders<br>";
											echo "Dual Diagnosis<br>";
											echo "Co-occurring Eating Disorders<br>";
											echo "Co-dependency<br>";
											echo "Licensed Professionals";
										} else {
										echo ucfirst($offer_data); 
										} ?></p>
								 </div>
							</li>
						   <?php } 
						   
						    if($type_val==1) { 				
								$services_data   = getTherapistData($row->id,'services_provided');
							} else {
								$services_data = getSearchFieldData($row->company_id,$row->id,'services_provided');
							}
							
							
						   if(strlen($services_data) > 1) { 
						   ?>
                            <li>
								<div class="contents"><h5>Services provided:</h5><p>
								<?php 
										if($row->company_id=='01d60762-a1a9-46d6-b745-4089973406a9') {
											// We added custom for task #754 as per lead (pinegrove)
											echo "Inpatient<br>";
											echo "Outpatient<br>";
											echo "Residential<br>";
											echo "Partial Hospitalization<br>";
											echo "Extended Care<br>";
											echo "Intensive Workshops";
										} else {	echo ucfirst($services_data); }
							    ?>
									</p>
								</div>
							</li>
						   <?php } 
						   
						     if($type_val==1) { 				
						  $languages_data = getTherapistData($row->id,'languages');
						} else {
						  $languages_data = getSearchFieldData($row->company_id,$row->id,'languages');
						}
						  if($languages_data!='') { 
						?>
							
							<li>
                            	<div class="contents">
                                	<h5>Languages:</h5>
									<p><?php 
										echo $languages_data; 
										?></p>
								</div>
                            </li>
						  <?php } 
						  
						  if($type_val==1) { 				
						  $treatment_data = getTherapistData($row->id,'plo_treatment_orientation');
						} else {
						  $treatment_data = getSearchFieldData($row->company_id,$row->id,'plo_treatment_orientation');
						}
						  if($treatment_data!='') { 
						?>
							
							<li>
                            	<div class="contents">
                                	<h5>Treatment orientation:</h5>
									<p><?php 
										echo $treatment_data; 
										?></p>
								</div>
                            </li>
						  <?php } 
						  if($type_val==1) { 				
							$diagnosis_data = getTherapistData($row->id,'plo_diagnosis');
							} else {
								$diagnosis_data = getSearchFieldData($row->company_id,$row->id,'plo_diagnosis');
							}
						
							if($diagnosis_data!='') { 
							?>
								<li>
									<div class="contents">	
										<h5>Diagnosis:</h5>
										<p><?php 	
											echo $diagnosis_data;
											?></p>
									</div>
								</li>
							<?php }  ?>
						   
							
                          <!--   <li><div class="contents"><h5>Inclusivity</h5><p><?php // echo getSearchFieldData($row->company_id,$row->id,'plo_inclusivity'); ?></p></div></li> -->
						</ul>
                        </div>
					</div>
                </div>
                <hr />
<!-- Sponsor Ads section -->
<?php /* $the_query = new WP_Query( 'page_id=2648' ); ?>
<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>
	<?php the_excerpt(); ?>
     <?php endwhile; */?>
	 
<?php  



	$query_page_id = "SELECT page_id FROM ".$table_prefix."company where company_id='".$row->company_id."' and page_id!=0 limit 0,1";
    $rows_page_id = $wpdb->get_results($query_page_id);
	

/*	$the_query = new WP_Query( 'page_id='.$rows_page_id[0]->page_id );
while ( $the_query->have_posts() ) :
	$the_query->the_post();
        the_title();
        the_content();
endwhile;
wp_reset_postdata();
*/

		 if($rows_page_id[0]->page_id) { 	
			$my_id = $rows_page_id[0]->page_id;
			$post_id = get_post($my_id);
			$content = $post_id->post_content;
			WPBMap::addAllMappedShortcodes();

			$content = apply_filters('the_content', $content);
		//	$content = str_replace(']]>', ']]>', $content);
			echo $content;	 
	
		
		} 
	 ?>
	 <!-- End -->
	<div class="vc_row wpb_row section vc_inner vc_row-fluid bottom-section">
		<div class="vc_col-sm-6">
			<div class="contents blog">
				<!-- <h3>Blog Posts</h3>
                <ul> -->
				<?php
				global $current_user;
				get_currentuserinfo();  
				
				 if($type_val==0) {

					$user_str='';

				  $therapist_match = getTherapistMatch($row->company_id,$row->id);
				  $therapist_count = 0;
				  if(count($therapist_match) > 0 ) { 
				   foreach($therapist_match as $data)
				   {
						if($data->email!='') 
						{ 
							$query = "SELECT ID FROM ".$table_prefix."users where user_email = '".$data->email."'";
							$rows_user = $wpdb->get_results($query);
							if($rows_user[0]->ID) { 
								$user_str.="'".$rows_user[0]->ID."',";
							}
						}
				    }
					$user_str =  rtrim($user_str, ",");
				
			
				
				if($user_str!='')
				{
				$query = "select  * from ".$table_prefix."posts where  post_status='publish' and post_type='post' and post_author IN('".$current_user->ID."',".$user_str.") order by rand() limit 5";
				} else {
				$query = "select  * from ".$table_prefix."posts where post_status='publish' and post_type='post' and  post_author = '".$current_user->ID."' order by rand() limit 5";
				}
				  
			
				$rows = $wpdb->get_results($query);
				if($rows) { 					echo '<h3>Blog Posts</h3><ul>';
					foreach ($rows as $post)  {
						if($post->post_title!='') { 
							echo "<li><a href='".$post->guid."' target='_blank'>".$post->post_title."</a></li>";
						}
					}					echo '</ul>';
				} else {
					//	echo "No Entries at this time";
				}
			 }
		} else {
			$query = "select  * from ".$table_prefix."posts where post_status='publish' and post_type='post' and  post_author = '".$current_user->ID."' order by rand() limit 5";
			
				$rows = $wpdb->get_results($query);
				if($rows) { 					echo '<h3>Blog Posts</h3><ul>';
					foreach ($rows as $post)  {
						if($post->post_title!='') { 
							echo "<li><a href='".$post->guid."' target='_blank'>".$post->post_title."</a></li>";
						}
					}					echo '</ul>';
				} else {
					//	echo "No Entries at this time";
				}
		}
				?>              <!--  </ul> -->
			</div>
		</div>
        <div class="vc_col-sm-6">
            <div class="contents events">
             <!--   <h3>Events</h3>
                <ul> -->
				<?php 
			 if($type_val==0) {
 
			 if(count($therapist_match) > 0 ) { 
				if($user_str!='')
				{
				$query2 = "select  * from ".$table_prefix."posts where  post_status='publish' and post_type='tribe_events' and post_author IN('".$current_user->ID."',".$user_str.") order by rand() limit 5";
				} else {
				$query2 = "select  * from ".$table_prefix."posts where post_status='publish' and post_type='tribe_events' and  post_author = '".$current_user->ID."' order by rand() limit 5";
				}
				
			
				$rows2 = $wpdb->get_results($query2);
				if($rows2) {						echo '<h3>Events</h3><ul>';
					foreach ($rows2 as $post2)  {
						if($post2->post_title!='') { 
							echo "<li><a href='".$post2->guid."' target='_blank'>".$post2->post_title."</a></li>";
						}
					}					echo '</ul>';
				} else {
					//	echo "No Events at this time";
				}
			}
		 } else {
				$query2 = "select  * from ".$table_prefix."posts where post_status='publish' and post_type='tribe_events' and  post_author = '".$current_user->ID."' order by rand() limit 5";
				
				$rows2 = $wpdb->get_results($query2);
				if($rows2) {						echo '<h3>Events</h3><ul>';
					foreach ($rows2 as $post2)  {
						if($post2->post_title!='') { 
							echo "<li><a href='".$post2->guid."' target='_blank'>".$post2->post_title."</a></li>";
						}
					}					echo '</ul>';
				} else {
					//	echo "No Events at this time";
				}
		 }
				?>
               <!-- </ul> -->
            </div>
		</div>
	</div>	
<?php } ?>

</section>
	</div>
	
</div>
<?php get_footer(); ?>