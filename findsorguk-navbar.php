<?php
/**
 * The navbar from finds.org.uk that sticks to the top of the window
 *
 * This does not automatically pull changes from finds.org.uk
 * but must be updated manually
 *
 * @package countypages
 */
?>
<div class="navbar navbar-fixed-top">

        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="nav-collapse">
                    <ul class="nav">
                        <li><a href="/"
                               title="The Scheme's homepage" accesskey="1">Home <i class="icon-home icon-white"></i></a></li>
                        <li><a href="<?= get_base_url(); ?>/contacts"
                               title="Who to contact at the Scheme">Contacts</a></li>
                        <li><a href="<?= get_base_url(); ?>/getinvolved"
                               title="How to get involved with the largest public archaeology project">Get Involved</a></li>
                        <li><a href="<?= get_base_url(); ?>/database"
                               title="Search our database for artefacts and coins">Database</a></li>
                        <li><a href="<?= get_base_url(); ?>/treasure"
                               title="Learn about the Treasure Act">Treasure</a></li>

                        <li><a href="<?= get_base_url(); ?>/guides"
                               title="View guides to artefacts, coins and periods">Guides</a></li>
                        <li><a href="<?= get_base_url(); ?>/news"
                               title="Keep up to date with the latest news and events">News &amp; Events</a></li>
                        <li><a href="<?= get_base_url(); ?>/publications"
                               title="Publications and reports">Publications</a></li>
                        <li><a href="<?= get_base_url(); ?>/research"
                               title="Academic research using our data">Research</a></li>
                        <li><a class="active" href="/counties"
                               title="Finds in your local community">Counties</a></li>
                        <li><a href="http://forum.finds.org.uk/" title="Go to our support forum">Forum</a></li>
                    </ul>                            </div>
                <!--/.nav-collapse -->
            </div>

        </div>


    </div>