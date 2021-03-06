<?php
/**
 * AlainSchlesser.com Speaking Page Plugin.
 *
 * @package   AlainSchlesser\Speaking
 * @author    Alain Schlesser <alain.schlesser@gmail.com>
 * @license   MIT
 * @link      https://www.alainschlesser.com/
 * @copyright 2017 Alain Schlesser
 */

namespace AlainSchlesser\Speaking\Shortcode;

use AlainSchlesser\Speaking\Assets\StyleAsset;
use AlainSchlesser\Speaking\Model\TalkRepository;

/**
 * Class SpeakingPage.
 *
 * @since   0.1.0
 *
 * @package AlainSchlesser\Speaking
 * @author  Alain Schlesser <alain.schlesser@gmail.com>
 */
final class SpeakingPage extends BaseShortcode {

	const TAG      = 'speaking_page';
	const VIEW_URI = 'views/speaking-page';

	const CSS_HANDLE = 'as-speaking-frontend-css';
	const CSS_URI    = 'assets/styles/as-speaking-frontend';

	/**
	 * Get the tag to use for the shortcode.
	 *
	 * @since 0.1.0
	 */
	protected function get_tag() {
		return self::TAG;
	}

	/**
	 * Get the View URI to use for rendering the shortcode.
	 *
	 * @since 0.1.0
	 */
	protected function get_view_uri() {
		return self::VIEW_URI;
	}

	/**
	 * Get the context to pass onto the view.
	 *
	 * Override to provide data to the view that is not part of the shortcode
	 * attributes.
	 *
	 * @since 0.1.0
	 *
	 * @param array $atts Array of shortcode attributes.
	 *
	 * @return array Context to pass onto view.
	 */
	protected function get_context( $atts ) {
		$talk_repository = new TalkRepository();

		return [
			'talks' => $talk_repository->find_all(),
		];
	}

	/**
	 * Get the array of known assets.
	 *
	 * @since 0.1.0
	 *
	 * @return array<Asset>
	 */
	protected function get_assets() {
		return [
			new StyleAsset(
				self::CSS_HANDLE,
				self::CSS_URI
			),
		];
	}
}
