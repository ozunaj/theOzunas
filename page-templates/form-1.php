<?php
/*
Template Name: Form 1
*/
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>

<div class="main-wrap full-width" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
		
<script src="jquery-3.2.0.min.js"></script>
<script src="form1.js"></script>
<link rel="stylesheet" type="text/css" href="fancybox-3.0/dist/jquery.fancybox.min.css">
<body>

<div id="main">
        <div class="header">
            <h1>Submit Data</h1>
        </div>

<?php
include ('default_data.php');
$justEnt = $_GET['justEnt'];
?>

<form action="form2.php" method="post" class="pure-form">   
<section class="grid-containter">
    <fieldset class="grid-x grid-margin-x">
         <div class="cell large-3">
            Enter your <button style="text-decoration: underline;" class="hover" type="button" data-toggle="example-dropdown" aria-controls="example-dropdown" data-is-focus="false" data-yeti-box="example-dropdown" aria-haspopup="true" aria-expanded="true">organization code </button>
         </div>
        <div class="dropdown-pane" id="example-dropdown" data-dropdown="" aria-hidden="false" data-yeti-box="example-dropdown" data-resize="example-dropdown" aria-labelledby="r97248-dd-anchor" data-e="cce694-e" style="top: 5852.48px; left: 317.5px;" data-events="resize">
            The organization code is emailed to you when you agree to contribute to ROHDEO. There is only one per organization. If you cannot find your code or if you need help, contact us at rohdeo@uthscsa.edu.
        </div>  
        <div class="cell large-9"><input id="org_code" name="org_code" type="text" value="<?php echo ($justEnt=='yes'?$_GET['orgcode']:''); ?>" onkeyup="showCounties(this.value)">
        </div>
         <!-- End of Box 1 -->
        <div class="cell large-3">
            <button style="text-decoration: underline;" class="hover" type="button" data-toggle="collection-year" aria-controls="collection-year" data-is-focus="false" data-yeti-box="collection-years" aria-haspopup="true" aria-expanded="true">Collection year</button>
         </div>
        <div class="dropdown-pane" id="collection-year" data-dropdown="" aria-hidden="false" data-yeti-box="collection-year" data-resize="collection-year" aria-labelledby="r97248-dd-anchor" data-e="cce694-e" style="top: 5852.48px; left: 317.5px;" data-events="resize">
           The data collection period is from July 1, 2016 to June 30, 2017. It is defaulted to collect the most current year of data. Do not include data that do not fall within the set timeframe.
        </div> 
        <div class="cell large-9">
            <input id="collectionyear" name="collectionyear" type="text" value="<?php echo $collectionyear; ?>" readonly>
        </div>
        <!-- End of Box 2 -->
        <div class="cell large-3">
            <button style="text-decoration: underline;" class="hover" type="button" data-toggle="age-cat" aria-controls="age-cat" data-is-focus="false" data-yeti-box="age-cat" aria-haspopup="true" aria-expanded="true">Age Category</button>
         </div>
        <div class="dropdown-pane" id="age-cat" data-dropdown="" aria-hidden="false" data-yeti-box="age-cat" data-resize="age-cat" aria-labelledby="r97248-dd-anchor" data-e="cce694-e" style="top: 5852.48px; left: 317.5px;" data-events="resize">
           You must submit your data aggregated/summarized by county and by age. You will enter each county and age group one at a time.
        </div> 
        <div class="cell large-9">
            <select id="agegroup" name="agegroup">
                <option selected>- Select -</option>
                <option>Preschool aged (0-5)</option>
                <option>School aged (6-18)</option>
                <option>Adult (19-44)</option>
                <option>Adult (45-64)</option>
                <option>Adult (65 and up)</option>
            </select>
        </div>
        <!-- End of Box 3 -->
        <div class="cell large-3">
            <button style="text-decoration: underline;" class="hover" type="button" data-toggle="total_seen" aria-controls="total_seen" data-is-focus="false" data-yeti-box="total_seen" aria-haspopup="true" aria-expanded="true">Total number of individuals seen </button>
         </div>
        <div class="dropdown-pane" id="total_seen" data-dropdown="" aria-hidden="false" data-yeti-box="total_seen" data-resize="total_seen" aria-labelledby="r97248-dd-anchor" data-e="cce694-e" style="top: 5852.48px; left: 317.5px;" data-events="resize">
           The data collection period is from July 1, 2016 to June 30, 2017. It is defaulted to collect the most current year of data. Do not include data that do not fall within the set timeframe.
        </div> 
        <div class="cell large-9">
            <input id="total_seen" name="total_seen" type="text">
        </div>
        <!-- Edit after -->
    </fieldset>
</section>

<br />
<button type="submit" class="button" onclick="return check_form1();">Continue</button>
</div>
</form>

<div class="pure-g">
    <div class="pure-u-2-5">
            <a data-fancybox data-src="data_entry_help.html" href="javascript:;"><img src="images/help.png" /></a>
    </div>
</div>
	</article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>

</div>

<?php get_footer();
