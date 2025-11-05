# Template

## Hero slider module

The home templates load hero sliders through `php/slider-loader.php`. Each home page defines a `$heroVariant` value before including the header:

```php
$heroVariant  = 'hero-b';
require __DIR__ . '/../php/slider-loader.php';
$heroSlider       = nova_slider_prepare($heroVariant);
$extraHeroStyles  = $heroSlider['styles'];
$extraHeroScripts = $heroSlider['scripts'];
```

Call `nova_slider_render($heroSlider);` after the header to output the requested layout. Available variants are:

- `hero-a`: static hero with background image and highlights.
- `hero-b`: autoplay slider powered by Swiper.
- `hero-c`: fade slider matching the theme’s Hero 4 presentation with captions.

Home 2 is configured to use `hero-c`, which renders the Hero 4 layout wired to the shared `text.php` data (`$HomeIntro`, `$HeroImages`, `$HeroSlides`). To switch variants on any home template, update the `$heroVariant` string and ensure the loader block remains before the header include so the required CSS/JS assets are injected automatically.
