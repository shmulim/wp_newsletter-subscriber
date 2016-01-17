<?php

class Newsletter_Subscriber_Widget extends WP_Widget {

  /**
   * Sets up the widgets name etc
   */
  public function __construct() {
    parent::__construct(
      'newsletter_subscriber_widget', // Base ID
      __( 'Newsletter Subscriber', 'ns_domain' ), // Name
      array( 'description' => __( 'Adds a newsletter subscription form.', 'ns_domain' ), ) // Args
    );
  }

  /**
   * Outputs the content of the widget
   *
   * @param array $args
   * @param array $instance
   */
  public function widget( $args, $instance ) {
    // outputs the content of the widget
    echo $args['before_widget'];
    echo $args['before_title'];
    if (!empty($instance['title'])){
      echo $instance['title'];
    }
    echo $args['after_title'];

    ?>
      <div id="form-msg"></div>
      <form id="subscriber-form" method="post" action="<?php echo plugins_url() . '/newsletter-subscriber/includes/newsletter-subscriber-mailer.php'; ?>">
        <div class="form-group">
          <label for="name">Name: </label>
          <input type="text" id="name" class="form-control" name="name" required>
        </div><br/>
        <div class="form-group">
          <label for="name">Email: </label>
          <input type="text" id="email" class="form-control" name="email" required>
        </div><br/>
        <input type="hidden" name="recipient" value="<?php echo $instance['recipient']; ?>">
        <input type="hidden" name="subject" value="<?php echo $instance['subject']; ?>">
        <input type="submit" class="btn btn-primary" name="subscriber_submit" value="Subscribe">
      </form>
    <?php
    echo $args['after_widget'];
  }

  /**
   * Outputs the options form on admin
   *
   * @param array $instance The widget options
   */
  public function form( $instance ) {
    // outputs the options form on admin
    $title = !empty($instance['title']) ? $instance['title'] : __( 'Newsletter Subscriber', 'ns_domain' );
    $subject = !empty($instance['subject']) ? $instance['subject'] : __( 'New Subscriber', 'ns_domain' );
    $recipient = $instance['recipient'];
    ?>
      <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title', 'ns_domain');?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>">
      </p>
      <p>
        <label for="<?php echo $this->get_field_id('subject'); ?>"><?php _e( 'Subject', 'ns_domain');?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id('subject'); ?>" name="<?php echo $this->get_field_name('subject'); ?>" value="<?php echo esc_attr($subject); ?>">
      </p>
      <p>
        <label for="<?php echo $this->get_field_id('recipient'); ?>"><?php _e( 'Recipient', 'ns_domain');?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id('recipient'); ?>" name="<?php echo $this->get_field_name('recipient'); ?>" value="<?php echo esc_attr($recipient); ?>">
      </p>
    <?php
  }

  /**
   * Processing widget options on save
   *
   * @param array $new_instance The new options
   * @param array $old_instance The previous options
   */
  public function update( $new_instance, $old_instance ) {
      // processes widget options to be saved
    $instance = array(
        'title' => !empty( $new_instance['title']) ? strip_tags($new_instance['title']) : '',
        'subject' => !empty( $new_instance['subject']) ? strip_tags($new_instance['subject']) : '',
        'recipient' => !empty( $new_instance['recipient']) ? strip_tags($new_instance['recipient']) : ''
      );
    return $instance;
  }

}
