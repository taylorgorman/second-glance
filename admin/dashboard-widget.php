<?php

namespace SecondGlance\Admin;
use SecondGlance\Config;

add_action( 'wp_dashboard_setup', function(){
  wp_add_dashboard_widget(
    'dashboard-' . Config\NAME,
    Config\TITLE,
    function(){

      $post_types = get_post_types( [], 'objects' );

      ?>
      <style>
        #dashboard-second-glance .inside {
          padding: .5em 1.5em;
        }
        #dashboard-second-glance h3 {
          font-size: 1.35em;
        }
        #dashboard-second-glance .columns {
          display: flex;
        }
        #dashboard-second-glance .columns > div {
          flex-grow: 1;
        }
        #dashboard-second-glance a {
          text-decoration: none;
        }
        #dashboard-second-glance a .dashicons {
          color: #666;
          margin-right: .25em;
        }
      </style>
      <div class="columns">
        <div class="content">
          <h3>Content</h3>
          <?php
          foreach ( $post_types as $post_type ) {
            if ( ! $post_type->show_in_menu ) continue;
            $count_published = wp_count_posts( $post_type->name )->publish
            ?>
            <p>
              <a href="/wp-admin/edit.php?post_type=<?php echo $post_type->name; ?>">
                <span class="dashicons <?php echo $post_type->menu_icon; ?>"></span>
                <strong><?php echo $count_published; ?></strong>
                <?php echo $post_type->label; ?>
              </a>
            </p>
          <?php } ?>
        </div>
        <div>
          <h3>System</h3>
          <p>WordPress <strong><?php bloginfo( 'version' ); ?></strong></p>
          <p><a href="/wp-admin/themes.php">
            <span class="dashicons dashicons-admin-appearance"></span>
            <strong><?php echo wp_get_theme()->get( 'Name' ); ?></strong>
          </a> theme</p>
          <p><a href="/wp-admin/plugins.php">
            <span class="dashicons dashicons-admin-plugins"></span>
            <strong><?php echo count( get_option( 'active_plugins' ) ); ?></strong> Active plugins
          </a></p>
          <p><a href="/wp-admin/users.php">
            <span class="dashicons dashicons-admin-users"></span>
            <strong><?php echo get_user_count(); ?></strong> Users
          </a></p>
        </div>
      </div>
      <p style="text-align:right">
        <span class="dashicons dashicons-admin-generic"></span> Settings
      </p>
      <pre><?php //print_r(); ?></pre>
      <?php

    }
  );
} );
