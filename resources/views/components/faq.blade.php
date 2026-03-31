@props(['faq'])
<details>
    <summary>
        {{ $faq->question }}
    </summary>
    <div class="answer">
        {{ $faq->answer }}
    </div>
</details>
<div class="faq-line"></div>
