<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package countypages
 */
?>
            <!-- WordPress HTML -->
	        </div><!-- #content -->

        <!-- finds.org.uk HTML -->
        </div><!--/.row-fluid-->
</div><!--/.span9-->


	<footer id="colophon" class="site-footer" role="contentinfo">

        <?php
        // Loads a clone of the finds.org.uk footer
        get_template_part('findsorguk', 'footer');
        ?>

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
