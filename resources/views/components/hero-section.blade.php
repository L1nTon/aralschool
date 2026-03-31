@props(['site_translations'])
<section class="hero">
    <div class="img-cont">
        <img src="img/hero-bg.png" alt="Hero image" style="width:100%; height:auto; object-fit:cover;" />
    </div>
    <div class="text-box">
        <h1>
            <span class="bold">
                {{ $site_translations->hero_h1 }}
            </span>
            {{ $site_translations->hero_p }}
        </h1>
    </div>
</section>
