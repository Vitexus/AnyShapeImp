<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://vitexsoftware.cz/
 * @since      1.0.0
 *
 * @package    Anyshape_Importer
 * @subpackage Anyshape_Importer/admin/partials
 */
$options = get_option($this->plugin_name);
?>

<div class="wrap">

    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>

    <form method="post" name="cleanup_options" action="options.php">
        <?php settings_fields($this->plugin_name); ?>
        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('SQL Database', $this->plugin_name); ?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-sql-database">
                <input type="text"  id="<?php echo $this->plugin_name; ?>-sql-database" name="<?php echo $this->plugin_name; ?>[sql-database]" value="<?php echo array_key_exists('sql-database', $options) ? $options['sql-database'] : '' ; ?>" />
                <span><?php esc_attr_e('SQL Database', $this->plugin_name); ?></span>
            </label>
        </fieldset>

        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('SQL Login', $this->plugin_name); ?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-sql-login">
                <input type="text"  id="<?php echo $this->plugin_name; ?>-sql-login" name="<?php echo $this->plugin_name; ?>[sql-login]" value="<?php echo array_key_exists('sql-login', $options) ?  $options['sql-login'] : '' ; ?>" />
                <span><?php esc_attr_e('SQL Login', $this->plugin_name); ?></span>
            </label>
        </fieldset>

        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('SQL Passwprd', $this->plugin_name); ?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-sql-password">
                <input type="password"  id="<?php echo $this->plugin_name; ?>-sql-password" name="<?php echo $this->plugin_name; ?>[sql-password]" value="<?php echo array_key_exists('sql-password', $options) ?  $options['sql-password'] : '' ; ?>" />
                <span><?php esc_attr_e('SQL Password', $this->plugin_name); ?></span>
            </label>
        </fieldset>

        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('SQL Host', $this->plugin_name); ?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-sql-host">
                <input type="text"  id="<?php echo $this->plugin_name; ?>-sql-host" name="<?php echo $this->plugin_name; ?>[sql-host]" value="<?php echo array_key_exists('sql-host', $options) ?  $options['sql-host'] : '' ; ?>" />
                <span><?php esc_attr_e('SQL Host', $this->plugin_name); ?></span>
            </label>
        </fieldset>

        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('Image Directory', $this->plugin_name); ?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-image-dir">
                <input type="text"  id="<?php echo $this->plugin_name; ?>-image-dir" name="<?php echo $this->plugin_name; ?>[image-dir]" value="<?php echo array_key_exists('image-dir', $options) ?  $options['image-dir'] : '' ; ?>" />
                <span><?php esc_attr_e('Image Dir', $this->plugin_name); ?></span>
            </label>
        </fieldset>

<?php submit_button('Save all changes', 'primary', 'submit', TRUE); ?>

        

    </form>

    <a href="<?php echo plugins_url($this->plugin_name.'/admin/import.php?action=import');  ?>" class="large"> Trigger IMPORT </a>
    
</div>
