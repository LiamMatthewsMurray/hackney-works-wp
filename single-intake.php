<?php get_header(); 

$course = get_field("parent_course");
if(have_posts()): while(have_posts()): the_post(); 
?>

<section class="hero hero--with-breadcrumbs" id="main-content">
    <div class="container">
        <div class="hero__content">
            <ul class="breadcrumbs">
                <li class="breadcrumbs__crumb"><a href="/">Home</a></li>
                <li class="breadcrumbs__crumb"><a href="<?php the_permalink($course); ?>"><?php echo get_the_title($course); ?></a></li>
                <li class="breadcrumbs__crumb">Apply</li>
            </ul>
            <h1 class="hero__title">Apply</h1>
        </div>
    </div>
</section>

<article class="page-content">
    <div class="container with-sidebar">
        <main class="panel panel--more-padding" data-course-form>
            <!-- React app mounts here -->
            <img class="spinner" src="<?php echo get_stylesheet_directory_uri() . "/assets/spinner.svg" ?>" alt="" />
            <p class="visually-hidden">Loading...</p>
        </main>
        <aside class="layout-sidebar-right__sidebar">
            <div class="panel">
                <h2 class="panel__title">Your chosen course</h2>

                <a class="panel__name" href="<?php the_permalink($course); ?>"><?php echo get_the_title($course); ?></a>

                <p><?php the_field("intake_code"); ?></p>
                
                <p>
                    <?php the_field("start_date") ?>
                    <?php if(get_field("end_date")): ?>
                        — <?php the_field("end_date") ?>
                    <?php endif; ?>
                </p>

                <p><?php the_field("days") ?></p>

                <p>
                    <?php the_field("start_time") ?> 
                    <?php if(get_field("end_time")): ?>
                        to <?php the_field("end_time") ?>
                    <?php endif; ?>
                </p>

                <?php if(get_field("delivery", $course) === "online"): ?>
                    <p class="panel__important">This course is delivered online using <strong><?php the_field("online_tool", $course); ?></strong>.</p>
                <?php else: ?>
                    <p class="panel__important">This course is at <?php echo get_field('venue')["location"]["address"]; ?>.</p>
                <?php endif; ?>

            </div>
        </aside>
    </div>
</article>

<script>
    __INTAKE_ID__=<?php echo get_the_ID() ?>
</script>

<?php endwhile; endif;
get_footer(); ?>