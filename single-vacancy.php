<?php get_header(); 

$course = get_field("parent_course");
if(have_posts()): while(have_posts()): the_post(); 
?>

<section class="hero hero--with-breadcrumbs" id="main-content">
    <div class="container">
        <div class="hero__content">
            <ul class="breadcrumbs">
                <li class="breadcrumbs__crumb"><a href="/">Home</a></li>
                <li class="breadcrumbs__crumb">Vacancy</li>
            </ul>
            <h1 class="hero__title"><?php the_title(); ?></h1>
        </div>
    </div>
</section>

<article class="page-content">
    <div class="container vacancy-layout">

        <div>
            <div class="panel vacancy-layout__mobile-only">
                <h2 class="panel__title">At a glance</h2>

                <dl class="vacancy-details">
                    <?php if(get_field("employer")){ ?>    
                        <dt><?php the_field("employer") ?></dt>
                        <dd>Employer</dd>
                    <?php } ?>

                    <?php if(get_field("salary")){ ?>
                        <dt><?php the_field("salary") ?></dt>
                        <dd>Salary</dd>
                    <?php } ?>

                    <?php if(get_field("closing_date")){ ?>
                        <dt><?php the_field("closing_date") ?></dt>
                        <dd>Closing date</dd>
                    <?php } ?>

                    <?php if(get_field("contract")){ ?>
                        <dt><?php the_field("contract") ?></dt>
                        <dd>Contract</dd>
                    <?php } ?>

                    <?php if(get_field("hours")){ ?>
                        <dt><?php the_field("hours") ?></dt>
                        <dd>Hours</dd>
                    <?php } ?>

                    <?php if(get_the_terms(null, "sectors")){ ?>
                        <dt>
                            <?php echo join(", ", wp_list_pluck(get_the_terms(null, "sectors"), "name")); ?>
                        </dt>
                        <dd>Sector</dd>
                    <?php } ?>

                    <?php if(get_field("qualifications")){ ?>
                        <dt><?php the_field("qualifications") ?></dt>
                        <dd>Qualifications</dd>
                    <?php } ?>

                </dl>
            </div>


            <article class="panel content-area">
                <?php if(get_field("full_description")):
                the_field("full_description"); 
                else: ?>
                <p><?php the_field("description"); ?></p>
                <?php endif; ?>
            </article>

            <div class="panel">
                <h2 class="panel__title">Apply for this vacancy</h2>

                <form class="vacancy-prep-form" method="get" action="<?php the_permalink(); ?>/apply">
                    <?php $items = get_field("checklist_items");
                    if($items): ?>
                            <p>Check that you're ready to apply.</p>
                            <fieldset class="vacancy-prep-form__items">
                                <?php foreach($items as $item): ?>
                                    <div class="vacancy-prep-form__item">
                                        <input type="checkbox" id="<?php echo $item->ID; ?>" required="true">
                                        <label for="<?php echo $item->ID; ?>">
                                            <h2><?php echo get_the_title($item); ?></h3>
                                            <p><?php echo get_the_content(null, null, $item); ?></p>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </fieldset>
                    <?php endif; ?>

                    <button class="vacancy-prep-form__button">
                        <?php if(get_field("management") === "external"): ?>
                            Apply on external website
                        <?php else: ?>
                            Apply now
                        <?php endif; ?>
                    </button>

                    <p class="vacancy-prep-form__nag">Not ready to apply yet? <a href="https://app.opportunities.hackney.gov.uk/">We can help.</a></p>
                </form>
            </div>
        </div>

        <aside class="vacancy-layout__sidebar">
            <div class="panel vacancy-layout__desktop-only">
                <h2 class="panel__title">At a glance</h2>

                <dl class="vacancy-details">
                    <?php if(get_field("employer")){ ?>    
                        <dt><?php the_field("employer") ?></dt>
                        <dd>Employer</dd>
                    <?php } ?>

                    <?php if(get_field("salary")){ ?>
                        <dt><?php the_field("salary") ?></dt>
                        <dd>Salary</dd>
                    <?php } ?>

                    <?php if(get_field("closing_date")){ ?>
                        <dt><?php the_field("closing_date") ?></dt>
                        <dd>Closing date</dd>
                    <?php } ?>

                    <?php if(get_field("contract")){ ?>
                        <dt><?php the_field("contract") ?></dt>
                        <dd>Contract</dd>
                    <?php } ?>

                    <?php if(get_field("hours")){ ?>
                        <dt><?php the_field("hours") ?></dt>
                        <dd>Hours</dd>
                    <?php } ?>

                    <?php if(get_the_terms(null, "sectors")){ ?>
                        <dt>
                            <?php echo join(", ", wp_list_pluck(get_the_terms(null, "sectors"), "name")); ?>
                        </dt>
                        <dd>Sector</dd>
                    <?php } ?>

                    <?php if(get_field("qualifications")){ ?>
                        <dt><?php the_field("qualifications") ?></dt>
                        <dd>Qualifications</dd>
                    <?php } ?>

                </dl>
            </div>

            <div class="panel">
                <h2 class="panel__title">We can help</h2>
                <p>Our friendly and well-trained advisors can help you get a career, not just a job.</p>
                <a class="panel__button" href="https://opportunities.hackney.gov.uk/support/">Register for support</a>
            </div>

        </aside>

    </div>
</article>

<?php endwhile; endif;
get_footer(); ?>