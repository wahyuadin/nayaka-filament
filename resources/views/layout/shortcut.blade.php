<div class="shortcut">
    @foreach (\App\Models\Shortcut::showData() as $shortcut)
    <a href="{{ url($shortcut->link) }}" class="link-shortcut {{ $shortcut->class }}">
        <i class="{{ $shortcut->icon }}"></i>
        <span>{{ $shortcut->title }}</span>
    </a>
    @endforeach
    {{-- <a href="https://new.nayakaerahusada.com/layanan/provider" class="link-shortcut network">
        <i class="bi bi-geo-alt-fill"></i>
        <span>Jaringan Kami</span>
    </a>
    <a href="https://new.nayakaerahusada.com/kontak" class="link-shortcut contact">
        <i class="bi bi-telephone-fill"></i>
        <span>Kontak Nayaka</span>
    </a>
    <a href="#faqu" class="link-shortcut faq">
        <i class="bi bi-question-circle-fill"></i>
        <span>FAQ</span>
    </a> --}}
</div>
