<?php
session_start();
error_reporting(0);
include('includes/config.php');
 include ('includes/header.php');
?>
<!-- END nav -->

<section>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/s2.jpg" alt="First slide">
	   <div class="carousel-caption d-none d-md-block text-lg">
		<p class="text-uppercase fs-1 font-weight-bold">Featured Properties</p>
		<a href="contact.php" class="nav-link">
        <button class="btn btn-warning btn-lg">Enquiry Now</button>
        </a>
	  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/s3.jpeg" alt="Second slide">
	   <div class="carousel-caption d-none d-md-block">
		<p>Featured Properties</p>
		<a href="contact.php" class="nav-link">
        <button class="btn btn-primary">Enquiry Now</button>
        </a>		
	  </div>
	  
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/s4.jpg" alt="Third slide">
	   <div class="carousel-caption d-none d-md-block">
		<p>Featured Properties</p>
		<a href="contact.php" class="nav-link">
        <button class="btn btn-primary">Enquiry Now</button>
        </a>		
	  </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</section>
 <script>
 $('.carousel').carousel({
  interval: 2000
})
 </script>
<section class="ftco-section">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-12 heading-section text-center ftco-animate mb-5">
            <span class="subheading">What we offer</span>
            <h2 class="mb-2">Featured Project</h2>
         </div>
      </div>
      <div class="row ftco-animate">
	  
	  
	  
            <?php
                                            $query=mysqli_query($con,"SELECT tbl_property.`id`,
                                                                           tbl_property.property_for,
                                                                           tbl_property.unique,
                                                                           tbl_property.property_name,
                                                                           tbl_property.description,
                                                                           tbl_property.price,
                                                                           tbl_property.sale_price,
                                                                           tbl_property.years_built,
                                                                           tbl_property.date,
                                                                           tbl_property.number_of_rooms,
                                                                           tbl_property.number_of_rooms,
                                                                           tbl_property.number_of_beds,
                                                                           tbl_property.number_of_baths,
                                                                           tbl_property.number_of_kitchen,
                                                                           tbl_property.number_of_hall,
                                                                           tbl_property.sqft,
                                                                           tbl_property.floor_title,
                                                                           tbl_property.swimming_pool,
                                                                           tbl_property.location,
                                                                           tbl_property.pincode,
                                                                           tbl_property.city,
                                                                           tbl_property.state,
                                                                           tbl_property_image.postimage,
                                                                           `tbl_property_type`.`property_type`
                                                                           FROM tbl_property 
                                                                           INNER JOIN `tbl_property_type` ON tbl_property_type.`id` = tbl_property.`property_type`
                                                                           INNER JOIN `tbl_property_image` ON tbl_property_image.`unique` = tbl_property.`unique`
                                                                           INNER JOIN `tbl_property_amenities` ON tbl_property_amenities.`unique` = tbl_property.`unique` GROUP BY tbl_property.`unique`  
                                                                           limit 8 
											");
											$rowcount=mysqli_num_rows($query);
											if($rowcount==0)
											{
											?>
            <p style="color: red;">No record found</p>
            <?php 
											} else {
											while($row=mysqli_fetch_array($query))
											{
											?>
            <div class="col-md-6 cardrow">
                <div class="container">
                    <div class="row cardbg">
                        <div class="col-md-6 property-wrap pbgimg" style="background-image: url(postimages/<?php echo $row['postimage'];?>);">
                            <a href="properties-single.php?unique=<?php echo $row['unique'];?>&&property=<?php echo $row['property_name'];?>" class="img">
                                <div class="rent-sale">
                                    <span class="rent"><?php echo $row['property_type'];?></span>
							
                                </div>
                                <p class="price">
                                    <span class="orig-price">
                                        <?php echo $row['sale_price'];?>
                                        <i class="fa fa-inr" aria-hidden="true"></i><small></small>
                                    </span>
                                </p>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-title"><?php echo $row['property_name'];?></h5>
                            <div class="d-flex bd-highlight">
                                <div class="p-2 flex-fill bd-highlight">
                                    <i class="fa fa-home" aria-hidden="true">
                                        <?php echo $row['number_of_rooms'];?>
                                        Rooms
                                    </i>
                                </div>
                                <div class="p-2 flex-fill bd-highlight">
                                    <i class="fa fa-bed" aria-hidden="true">
                                        <?php echo $row['number_of_beds'];?>
                                        Bedroom
                                    </i>
                                </div>
                            </div>
                            <div class="d-flex bd-highlight">
                                <div class="p-2 flex-fill bd-highlight">
                                    <i class="fa fa-bath" aria-hidden="true">
                                        <?php echo $row['number_of_baths'];?>
                                        Bathroom
                                    </i>
                                </div>
                                <div class="p-2 flex-fill bd-highlight">
                                    <i class="fa fa-cutlery" aria-hidden="true">
                                        <?php echo $row['number_of_kitchen'];?>
                                        Kichin
                                    </i>
                                </div>
                            </div>
                            <h5 class="card-title">
                                <span class="price">
                                    <?php echo $row['sale_price'];?>
                                    <i class="fa fa-inr" aria-hidden="true"></i>
                                </span>
                                <del>
                                    <?php echo $row['price'];?>
                                    <i class="fa fa-inr" aria-hidden="true"></i>
                                </del>
                               <button type="button" class="btn btn-enquiry btn-sm" data-toggle="modal" data-target="#exampleModal">
								  Enquire Now
                              </button>
                            </h5>

								
                        </div>
                    </div>
                </div>
            </div>

            <?php } } ?>	  

      </div>
   </div>
</section>
<section class="ftco-section">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-12 heading-section text-center ftco-animate mb-5">
            <span class="subheading">Services </span>
            <h2 class="mb-2">Services Offered</h2>
         </div>
      </div>
      <div class="row">
         <div class="col-md-4 servicediv">
            <div class="container ss">
               <div class="row">
                  <div class="col-md-3">
                     <i class="fa fa-braille seriveicon" aria-hidden="true"></i>
                  </div>
                  <div class="col-md-9">
                     <h6 class="servicetitle">Plot Development</h6>
                     <p>We offers Plot with different - different sizes at Chromepet, Chennai.</p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-4 servicediv">
            <div class="container ss">
               <div class="row">
                  <div class="col-md-3">
                     <i class="fa fa-building-o seriveicon" aria-hidden="true"></i>
                  </div>
                  <div class="col-md-9">
                     <h6 class="servicetitle">Villa Construction</h6>
                     <p>We offers Villa with different - different sizes at Chromepet, Chennai.</p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-4 servicediv">
            <div class="container ss">
               <div class="row">
                  <div class="col-md-3">
                     <i class="fa fa-university seriveicon" aria-hidden="true"></i>
                  </div>
                  <div class="col-md-9">
                     <h6 class="servicetitle">Bank Loan Facility</h6>
                     <p>Provides an extensive range of non home loan products like Loan for Purchase & Construction.</p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-4 servicediv">
            <div class="container ss">
               <div class="row">
                  <div class="col-md-3">
                     <i class="fa fa-commenting-o seriveicon" aria-hidden="true"></i>
                  </div>
                  <div class="col-md-9">
                     <h6 class="servicetitle">Legal Service</h6>
                     <p>Our tax and legal advisors offer support in the following areas  real estate transactions, security instruments, development and construction</p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-4 servicediv">
            <div class="container ss">
               <div class="row">
                  <div class="col-md-3">
                     <i class="fa fa-address-card-o seriveicon" aria-hidden="true"></i>
                  </div>
                  <div class="col-md-9">
                     <h6 class="servicetitle">Consultants</h6>
                     <p>Our real estate consultants' experience gives us broad perspective and expertise on the many factors that influence investment </p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-4 servicediv">
            <div class="container ss">
               <div class="row">
                  <div class="col-md-3">
                     <i class="fa fa-gg seriveicon" aria-hidden="true"></i>
                  </div>
                  <div class="col-md-9">
                     <h6 class="servicetitle">Building materials </h6>
                     <p>Today, we are introducing you some of the innovative building materials that would be responsible for shaping the future of real estate construction.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="ftco-section ftco-no-pt">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-12 heading-section text-center ftco-animate mb-5">
            <span class="subheading">Properties</span>
            <h2 class="mb-2">Make It Our Business</h2>
         </div>
      </div>
      <div class="row">
	  
 	  
	  
                                                      <div class="col-lg-3 col-md-6 col-sm-12 archive-post__content">
                                                         <div class="archive-post_content">
                                                             
                                                               <div class="citydiv">
 
																  <img width="100%" src="images/d.jpg" class="cityimg" />
													 
                                                               </div>
                                                               <div class="cityname">
 
                                                                  <span class="post-date">Real estate development</span>
                                                               
                                                               </div>
                                                    
                                                         </div>
                                                      </div>
                                                       <div class="col-lg-3 col-md-6 col-sm-12 archive-post__content">
                                                         <div class="archive-post_content">
                                                             
                                                               <div class="citydiv">
 
																 <img width="100%" src="images/building.jpg" class="cityimg" />
													 
                                                               </div>
                                                               <div class="cityname">
 
                                                                  <span class="post-date">Construction</span>
                                                               
                                                               </div>
                                                    
                                                         </div>
                                                      </div>
                                                      <div class="col-lg-3 col-md-6 col-sm-12 archive-post__content">
                                                         <div class="archive-post_content">
                                                             
                                                               <div class="citydiv">
 
																  <img width="100%" src="images/Consultancy.jpg" class="cityimg" />
													 
                                                               </div>
                                                               <div class="cityname">
 
                                                                  <span class="post-date">Consultancy</span>
                                                               
                                                               </div>
                                                    
                                                         </div>
                                                      </div>
                                                      <div class="col-lg-3 col-md-6 col-sm-12 archive-post__content">
                                                         <div class="archive-post_content">
                                                             
                                                               <div class="citydiv">
 
																  <img width="100%" src="images/transport.jpg" class="cityimg" />
																  
                                                               </div>
                                                               <div class="cityname">
 
                                                                  <span class="post-date">Transport</span>
                                                               
                                                               </div>
                                                    
                                                         </div>
                                                      </div>													  
      </div>
   </div>
</section>
<section class="ftco-section services-section bg-darken">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-12 text-center heading-section heading-section-white ftco-animate">
            <span class="subheading">Offer</span>
            <h2 class="mb-3">Our Offer</h2>
         </div>
      </div>
      <div class="row">
         <div class="col-md-3">
		 <img src="images/b0.jpg" alt="..." class="img-thumbnail">
         <h3 class="offerh">Buy Back Guarantee</h3>
         </div>
         <div class="col-md-3">
		 <img src="images/b3.jpg" alt="..." class="img-thumbnail">
         <h3 class="offerh">Free Building meterial</h3>
         </div>
         <div class="col-md-3">
		 <img src="images/b2.jpg" alt="..." class="img-thumbnail">
         <h3 class="offerh">Free Maintenance</h3>
         </div>
         <div class="col-md-3">
		 <img src="images/b1.jpeg" alt="..." class="img-thumbnail">
         <h3 class="offerh">Joint venture</h3>
         </div>
      </div>
   </div>
</section>
<section class="ftco-section ftco-no-pb ftco-no-pt">
   <div class="container">
      <div class="row">
         <div class="col-md-7 order-md-last d-flex align-items-stretch">
             <img class="img-fluid" src="images/home.jpg"> 
         </div>
         <div class="col-md-5 wrap-about py-md-5 ftco-animate">
            <div class="heading-section pr-md-5">
               <h2 class="mb-4">VSBN GROUP</h2>
               <p>VSBN Group  is one of the prominent residential and commercial real estate developers in Chennai. One of the most admired and trusted brands, VSBN Group has been growing from strength to strength over the past two decades marking its presence over the skylines of Chennai. VSBN Group so far has delivered over 8 million sft of projects while approximately 16 million sft of projects are under construction and planning stages. From being prominently a Villa developer, VSBN Group has expanded its horizons into Commercial, Coliving, Plotted Development and other real estate verticals.</p>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="ftco-counter img" id="section-counter">
   <div class="container">
      <div class="row pt-md-5">
         <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18 py-5 mb-4">
               <div class="text text-border d-flex align-items-center">
                  <strong class="number" data-number="600">0</strong>
                  <span>Customers   </span>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18 py-5 mb-4">
               <div class="text text-border d-flex align-items-center">
                  <strong class="number" data-number="800">0</strong>
                  <span>Plots </span>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18 py-5 mb-4">
               <div class="text text-border d-flex align-items-center">
                  <strong class="number" data-number="250">0</strong>
                  <span>Villas </span>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18 py-5 mb-4">
               <div class="text d-flex align-items-center">
                  <strong class="number" data-number="50">0</strong>
                  <span>Projects</span>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="ftco-section testimony-section bg-light">
   <div class="container">
      <div class="row justify-content-center mb-5">
         <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">Testimonial</span>
            <h2 class="mb-3">Happy Clients</h2>
         </div>
      </div>
      <div class="row ftco-animate">
         <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
               <div class="item">
                  <div class="testimony-wrap py-4">
                     <div class="text">
                        <span class="fa fa-quote-left"></span>
                        <p class="mb-4">VSBN Group I am also purchasing beak city layout (Kandikai ) Good performance and guidelines,Thanks for response Raja sir and Arun sir.<br><br></p>
                        <div class="d-flex align-items-center">
                          <div class="user-img" style="background-image: url(images/user-profile-150x150.png)"></div>
                           <div class="pl-3">
                                <p class="name">B Rajanbabu</p>
                              
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="item">
                  <div class="testimony-wrap py-4">
                     <div class="text">
                        <span class="fa fa-quote-left"></span>
                        <p class="mb-4">VSBN Group If anyone plan to buy any plot or house I highly recommend them because, recently i bought plot which is 6 month back and i became one of the happy & satisfied customer.</p>
                        <div class="d-flex align-items-center">
                           <div class="user-img" style="background-image: url(images/user-profile-150x150.png)"></div>
                           <div class="pl-3">
                                <p class="name">Ambika devi</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="item">
                  <div class="testimony-wrap py-4">
                     <div class="text">
                        <span class="fa fa-quote-left"></span>
                        <p class="mb-4">VSBN Group I am also purchasing beak city layout (Kandikai ) Good performance and guidelines,Thanks for response Raja sir and Arun sir.<br><br></p>
                        <div class="d-flex align-items-center">
                          <div class="user-img" style="background-image: url(images/user-profile-150x150.png)"></div>
                           <div class="pl-3">
                                <p class="name">B Rajanbabu</p>
                              
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="item">
                  <div class="testimony-wrap py-4">
                     <div class="text">
                        <span class="fa fa-quote-left"></span>
                        <p class="mb-4">VSBN Group Thanks in advance! This is Dr. udesh from nungambakkam. Am happy to inform here. i was purchased plot near SP koil at 2012 from ASP promoters. With comit to provide patta.</p>
                        <div class="d-flex align-items-center">
                          <div class="user-img" style="background-image: url(images/user-profile-150x150.png)"></div>
                           <div class="pl-3">
                              <p class="name">Gresh Kutty</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
   
            </div>
         </div>
      </div>
   </div>
</section>
 
<section class="ftco-section ftco-no-pt">
   <div class="container">
      <div class="row justify-content-center mb-5">
         <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">News</span>
            <h2>Latest News</h2>
         </div>
      </div>
      <div class="row d-flex">
	                <?php

						$query_post=mysqli_query($con,"SELECT * FROM `tbl_posts`ORDER BY id DESC  LIMIT 4 ");
						while($rowpost=mysqli_fetch_array($query_post))
						{
						?> 
          <div class="col-md-3 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <div class="text">
                <a href="blog-single.php?id=<?php echo $rowpost['id'];?>" class="block-20 img" style="background-image: url('news-photo/<?php echo $rowpost['postimage'];?>');">
	              </a>
	              <div class="meta">
                  <div><a href="#"><?php echo date( "M d, Y - h:i a", strtotime($rowpost["date"]));?></a></div>
                  
                </div>
	              <p><h6 class="blogtitle"><?php echo $rowpost['PostTitle'];?><h6> 
				  <?php echo substr_replace($rowpost['PostDetails'], "...", 120);?></p>
              </div>
            </div>
          </div>
		  
          <?php } ?>
 
      </div>
   </div>
</section>
<?php
   include ('enquiry-popup.php');
   
?>
   
   
<?php
   include ('includes/footer.php');
   
?>