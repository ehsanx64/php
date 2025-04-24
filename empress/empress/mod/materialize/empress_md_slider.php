<?php
namespace empress\mod\materialize;

class empress_md_slider {
    public $name = 'empress_md_slider';
    public $handleClass = "empress-md-slider";
    public $className;
    public $duration = 2000;
    public $slides;
    public $linked = false;

	public function __construct() {
	    $this->className = $this->handleClass . " carousel carousel-slider";
		add_shortcode($this->name, [$this, 'render']);
		add_action('wp_head', [$this, 'renderHeaderCode']);
		add_action('wp_footer', [$this, 'renderFooterCode'], PHP_INT_MAX);
	}

	public function render($args, $content) {
	    // Remove <br /> Tags from contents
	    $cnt = str_replace('<br />', '', $content);
	    // Chop the lines
	    $imageList = explode("\n", $cnt);
	    // This array is checked imageList
	    $items = [];
	    // This array contains the slides
	    $this->slides = [];

	    // If linked parameter is supplied use it
		if (isset($args['linked'])) {
			$this->linked = $args['linked'] == 'true' ? true : false;
		}

		// If slides are linked (with links) then we take 2 step per loop iteration
	    $step = $this->linked ? 2 : 1;

		// Append non-empty items in imageList to items[]
	    foreach ($imageList as $i) {
	        if (!empty($i)) {
	            $items[] = $i;
            }
        }

        // We check for and set slide's image and links according to step value
        for ($i = 0; $i < count($items); $i += $step) {
	        $r = [];
	        if ($step == 2) {
				$r['link'] = $items[$i];
				$r['image'] = $items[$i + 1];
            } else {
				$r['image'] = $items[$i];
            }
            $this->slides[] = $r;
        }

        // Check for duration parameter and if set use it afterward
		if (isset($args['duration']) && !empty($args['duration'])) {
		    $this->duration = $args['duration'];
        }

		ob_start();
		?>
		<div class="<?php echo $this->className; ?>">
            <?php foreach ($this->slides as $slide): ?>
				<?php if ($this->linked): ?>
					<a class="carousel-item" href="<?php echo $slide['link']; ?>">
                <?php else: ?>
                    <div class="carousel-item">
				<?php endif; ?>

					<img src="<?php echo $slide['image']; ?>">

				<?php if ($this->linked): ?>
                    </a>
                <?php else: ?>
					</div>
				<?php endif; ?>
            <?php endforeach; ?>
		</div>
		<?php
		return ob_get_clean();
	}

	public function renderHeaderCode() {
	}

	public function renderFooterCode() {
		?>
        <style>
            .<?php echo $this->getSliderTargetClasses(); ?> .indicators {
                padding: 0;
            }
        </style>

        <script>
			(function ($) {
				var className = "<?php echo $this->getSliderTargetClasses(); ?>";
				var duration = <?php echo $this->duration; ?>;

				var theSlider = $(className).carousel({
					fullWidth: true,
					indicators: true
                });

                var nextSlide = function () {
					theSlider.carousel('next');
                };

				var timer = setInterval(nextSlide, duration);

				$(className).hover(function () {
					clearInterval(timer);
                }, function () {
					timer = setInterval(nextSlide, duration);
                });
            })(jQuery);
        </script>
        <?php
	}

	public function getSliderTargetClasses() {
	    return '.' . str_replace(' ', '.', $this->className);
    }
}

new empress_md_slider();