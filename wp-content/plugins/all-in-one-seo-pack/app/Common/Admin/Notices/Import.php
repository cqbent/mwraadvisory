<?php
namespace AIOSEO\Plugin\Common\Admin\Notices;

/**
 * Plugin import notice.
 *
 * @since 4.0.0
 */
class Import {

	/**
	 * Go through all the checks to see if we should show the notice.
	 *
	 * @since 4.0.0
	 *
	 * @return void
	 */
	public function maybeShowNotice() {
		$transients = aioseo()->db
			->start( 'options' )
			->select( 'option_name as name' )
			->whereRaw( "`option_name` LIKE '_aioseo_cache_%'" )
			->run()
			->result();

		$foundImportTransient = false;
		foreach ( $transients as $transient ) {
			if ( preg_match( '#import_.*_meta_.*#', $transient->name ) ) {
				$foundImportTransient = true;
				break;
			}
		}

		if ( ! $foundImportTransient ) {
			return;
		}

		$this->showNotice();
	}

	/**
	 * Register the notice so that it appears.
	 *
	 * @since 4.0.0
	 *
	 * @return void
	 */
	public function showNotice() {
		$string1 = __( 'SEO Meta Import In Progress', 'all-in-one-seo-pack' );
		// Translators: 1 - The plugin name ("All in One SEO").
		$string2 = sprintf( __( '%1$s is importing your existing SEO data in the background.', 'all-in-one-seo-pack' ), AIOSEO_PLUGIN_NAME );
		$string3 = __( 'This notice will automatically disappear as soon as the import has completed. Meanwhile, everything should continue to work as expected.', 'all-in-one-seo-pack' );
		?>
		<div class="notice notice-info aioseo-migration">
			<p><strong><?php echo esc_html( $string1 ); ?></strong></p>
			<p><?php echo esc_html( $string2 ); ?></p>
			<p><?php echo esc_html( $string3 ); ?></p>
		</div>
		<style>
		</style>
		<?php
	}
}