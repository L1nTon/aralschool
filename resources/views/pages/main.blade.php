@extends('layouts.main')
@section('meta')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Aral School — Ecological Art & Education</title>
    <meta name="description"
        content="Aral School is a place where art, ecology, and technology meet to rethink the future of the Aral Sea region. Join our mission.">
    <meta name="keywords" content="Aral Sea, ecology, school, art, Uzbekistan, sustainability">
    <meta name="author" content="Aral School">

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://aralschool.netlify.app/">
    <meta property="og:title" content="Aral School — Rethinking the Future">
    <meta property="og:description" content="Explore how we address ecological concerns through art and innovation.">
    <meta property="og:image" content="https://aralschool.netlify.app/img/preview.jpg">

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://aralschool.netlify.app/">
    <meta property="twitter:title" content="Aral School">
    <meta property="twitter:description" content="Join our ecological and art laboratory in the Aral Sea region.">
    <meta property="twitter:image" content="https://aralschool.netlify.app/img/preview.jpg">

    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="stylesheet" href="./css/styles.css" />
@endsection

@section('content')

    @if (in_array('hero', $sections))
        <section class="hero">
            <div class="img-cont">
                <img src="storage/{{ $imgs['hero_img']['src'] }}" alt="{{ $imgs['hero_img']['alt'] }}"
                    style="width:100%; height:auto; object-fit:cover;" />
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
    @endif

    @if (in_array('intro', $sections))
        <section class="intro">
            <div class="intro-header">
                <div class="left-side">
                    <div class="square"></div>
                </div>
                <div class="text-box">
                    <h2>
                        <span class="bold">
                            {{ $site_translations->aral_school }}
                        </span>
                        {{ $site_translations->intro_header_txt }}
                    </h2>
                </div>
                <div class="right-side">
                    <div class="square"></div>
                </div>
            </div>
            <div class="intro-body">
                <div class="img-cont">

                    <img src="storage/{{ $imgs['intro_img']['src'] }}" alt="{{ $imgs['intro_img']['alt'] }}"
                        style="width:100%; height:100%; object-fit:cover;" />

                </div>
                <div class="text-box">
                    <div class="deadline">
                        <div>
                            <p class="bold">
                                {{ $site_translations->apply_now }}
                            </p>
                            <p>
                                {{ $site_translations->deadline_text }}
                            </p>
                        </div>
                        <div class="deadline-art">
                            <div class="line"></div>
                            <div class="square"></div>
                        </div>
                    </div>
                    <div class="full-desc">
                        <p>
                            {{ $site_translations->intro_text_1 }}
                        </p>
                        <br>
                        <p>
                            {{ $site_translations->intro_text_2 }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
    @endif


    @if (in_array('programme', $sections))
        <section class="programme" id="programme">
            <h2>
                {{ $site_translations->programme_vision }}
            </h2>
            <div class="programme-grid">
                <div class="d-flex">
                    <article class="about top">
                        <div class="img-cont">
                            <img src="storage/{{ $imgs['programme_card_1']['src'] }}"
                                alt="{{ $imgs['programme_card_1']['alt'] }}"
                                style="width:100%; height:100%; object-fit:cover;" />
                            <div class="title">
                                <h3>
                                    {{ $site_translations->vision_card_1_title }}
                                </h3>
                                <div class="square"></div>
                            </div>
                        </div>
                        <div class="description">
                            <p>
                                {{ $site_translations->vision_card_1_text_1 }}
                            </p>
                            <br>
                            <p>
                                {{ $site_translations->vision_card_1_text_2 }}
                            </p>
                        </div>
                    </article>

                    <article class="free-img">
                        <img src="storage/{{ $imgs['programme_card_2']['src'] }}"
                            alt="{{ $imgs['programme_card_2']['alt'] }}" />
                    </article>

                    <article class="goals bottom">
                        <div class="img-cont">
                            <img src="storage/{{ $imgs['programme_card_3']['src'] }}"
                                alt="{{ $imgs['programme_card_3']['alt'] }}">
                            <div class="title">
                                <h3>{{ $site_translations->vision_card_2_title }}</h3>
                                <div class="square"></div>
                            </div>
                        </div>
                        <div class="description">
                            <p>
                                {{ $site_translations->vision_card_2_text_1 }}
                            </p>
                            <br>
                            <p>
                                {{ $site_translations->vision_card_2_text_2 }}
                            </p>
                        </div>
                    </article>

                </div>

                <div class="spacebar"></div>


                <div class="d-flex programme-row-2">
                    <article class="goals">
                        <div class="img-cont">

                            <img src="storage/{{ $imgs['programme_card_4']['src'] }}"
                                alt="{{ $imgs['programme_card_4']['alt'] }}">

                            <div class="title">
                                <h3>
                                    {{ $site_translations->vision_card_3_title }}
                                </h3>
                                <div class="square"></div>
                            </div>
                        </div>
                        <div class="description">
                            <p>
                                {{ $site_translations->vision_card_3_text_1 }}
                            </p>
                            <br>
                            <p>
                                {{ $site_translations->vision_card_3_text_2 }}
                            </p>
                        </div>
                    </article>

                    <article class="img">
                        <div class="img-cont">
                            <img src="storage/{{ $imgs['programme_card_5']['src'] }}"
                                alt="{{ $imgs['programme_card_5']['alt'] }}" />
                        </div>
                    </article>
                </div>

            </div>
        </section>
    @endif


    @if (in_array('core-research', $sections))
        <section class="core-research">
            <div class="head">
                <h2>
                    {{ $site_translations->core_research }}
                </h2>
                <div class="head-text">
                    <p>
                        {{ $site_translations->core_research_text }}
                    </p>
                </div>
            </div>

            <div class="core-cards">
                <article class="core-card">
                    <div class="img-cont">
                        <img src="storage/{{ $imgs['core_card_1']['src'] }}" alt="{{ $imgs['core_card_1']['alt'] }}" />
                        <h3>
                            {{ $site_translations->core_research_card_1_title }}
                        </h3>
                    </div>
                    <div class="text-box">
                        <p>
                            {{ $site_translations->core_research_card_1_text }}
                        </p>
                    </div>
                </article>

                <article class="core-card">
                    <div class="img-cont">
                        <img src="storage/{{ $imgs['core_card_2']['src'] }}" alt="{{ $imgs['core_card_2']['alt'] }}" />
                        <h3>
                            {{ $site_translations->core_research_card_2_title }}
                        </h3>
                    </div>
                    <div class="text-box">
                        <p>
                            {{ $site_translations->core_research_card_2_text }}
                        </p>
                    </div>
                </article>
            </div>
        </section>
    @endif

    @if (in_array('outcomes', $sections))
        <section class="outcomes">
            <div class="head">
                <h2>
                    {{ $site_translations->programme_outcomes }}
                </h2>
                <div class="square left"></div>
                <div class="square center-left"></div>
                <div class="square center-right"></div>
            </div>
            <div class="outcomes-grid">
                <article>
                    <p>
                        {{ $site_translations->programme_outcomes_card_1 }}
                    </p>
                </article>
                <article>
                    <p>
                        {{ $site_translations->programme_outcomes_card_2 }}
                    </p>
                </article>
                <article>
                    <p>
                        {{ $site_translations->programme_outcomes_card_3 }}
                    </p>
                </article>
                <article>
                    <p>
                        {{ $site_translations->programme_outcomes_card_4 }}
                    </p>
                </article>
            </div>
        </section>
    @endif


    @if (in_array('apply', $sections))
        <section class="apply" id="apply">
            <div class="head">
                <h2>
                    {{ $site_translations->who_apply }}
                </h2>
            </div>
            <div class="apply-content">
                <div class="img-cont">
                    <img src="storage/{{ $imgs['apply_img']['src'] }}" alt="{{ $imgs['apply_img']['alt'] }}" />
                </div>
                <div class="text-box">
                    <p>
                        {{ $site_translations->apply_text_1 }}
                    </p>
                    <p>
                        {{ $site_translations->apply_text_2 }}
                    </p>
                    <p>
                        {{ $site_translations->apply_text_3 }}
                    </p>
                </div>
                <div class="apply-now">
                    <div class="deadline">
                        <div>
                            <h3>
                                {{ $site_translations->apply_now }}
                            </h3>
                            <p>
                                {{ $site_translations->deadline_text }}
                            </p>
                        </div>
                        <div class="line"></div>
                        <div class="square"></div>
                    </div>
                    <div class="apply-steps">
                        @foreach (range(1, 4) as $step)
                            @php
                                $title = $site_translations->{'apply_step_' . $step . '_title'};
                                $text = $site_translations->{'apply_step_' . $step . '_text'};
                                $banner = $site_translations->{'apply_step_' . $step . '_banner'} ?? null;
                            @endphp

                            <x-apply-step-article :step="$step" :title="$title" :text="$text" :list_type="$step === 4 ? 'ol' : 'ul'"
                                :banner="$banner" />
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if (in_array('team', $sections) and !$team->isEmpty())
        <section class="team" id="team">
            <div class="head">
                <h2>The team</h2>
            </div>

            <div class="team-list">


                @foreach ($team as $person)
                    <article class="team-member {{ $person->col_type }}">
                        <div class="member-visual">
                            <div class="photo-wrapper">
                                <img src="storage/{{ $person->img }}" alt="{{ $person->name }}" />
                            </div>
                            <div class="name-box">
                                <h3>
                                    {{ $person->name }}
                                </h3>
                                <p>
                                    {{ $person->who }}
                                </p>
                            </div>
                        </div>
                        <div class="member-info">
                            {!! $person->member_info !!}
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    @endif

    @if (in_array('mentor', $sections) and !$mentors->isEmpty())
        <section class="team mentor">
            <div class="head left">
                <h2>
                    {{ $site_translations->mentor_title }}
                </h2>
            </div>
            <div class="team-list">

                @foreach ($mentors as $mentor)
                    <article class="team-member {{ $mentor->col_type }}">
                        <div class="member-visual">
                            <div class="photo-wrapper">
                                <img src="storage/{{ $mentor->img }}" alt="{{ $mentor->name }}" />
                            </div>
                            <div class="name-box">
                                <h3>
                                    {{ $mentor->name }}
                                </h3>
                            </div>
                        </div>
                        <div class="member-info">
                            {!! $mentor->member_info !!}
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    @endif

    @if (in_array('faq', $sections) and !$faqs->isEmpty())
        <section class="faq" id="faq">
            <div class="faq-content">
                <h2>FAQ</h2>

                <div class="faq-container">
                    <div class="faq-column">
                        @foreach ($faqs as $faq)
                            @if ($faq->position === 'l')
                                <x-faq :faq="$faq"></x-faq>
                            @endif
                        @endforeach
                    </div>
                    <div class="faq-column">
                        @foreach ($faqs as $faq)
                            @if ($faq->position === 'r')
                                <x-faq :faq="$faq"></x-faq>
                            @endif
                        @endforeach
                    </div>

                </div>
            </div>

            <div class="bg-img">
                <img src="storage/{{ $imgs['faq_1']['src'] }}" alt="{{ $imgs['faq_1']['alt'] }}" />
                <img src="storage/{{ $imgs['faq_2']['src'] }}" alt="{{ $imgs['faq_2']['alt'] }}" />
                <img src="storage/{{ $imgs['faq_3']['src'] }}" alt="{{ $imgs['faq_3']['alt'] }}" />
            </div>
        </section>
    @endif


    @if (in_array('about-acdf', $sections))
        <section class="about" id="about">
            <div class="img-wraper" style="background-image: url('storage/{{ $imgs['about_acdf']['src'] }}');"></div>
            <div class="head">
                <h2>
                    {{ $site_translations->about_acdf }}
                </h2>
            </div>
            <div class="text-content">
                <div class="bg-wraper">
                    <div class="title">
                        <h3>
                            {{ $site_translations->acdf_title }}
                        </h3>
                    </div>
                </div>
                <div class="bg-wraper">
                    <div class="info">
                        <p>
                            {{ $site_translations->acdf_text_1 }}
                        </p>
                        <p>
                            {{ $site_translations->acdf_text_2 }}
                        </p>
                        <p>
                            {{ $site_translations->acdf_text_3 }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection
