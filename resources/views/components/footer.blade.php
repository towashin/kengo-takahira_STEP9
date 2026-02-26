<footer class="footer">
    <nav class="footer__nav">
        <ul class="footer__list">
            <li class="footer__item">
                <a href="{{ route('contact.create') }}" class="footer__link">
                    お問い合わせ
                </a>
            </li>

            <li class="footer__item">
                <a href="{{ route('products.index') }}" class="footer__link">
                    Home
                </a>
            </li>

            <li class="footer__item">
                <a href="{{ route('mypage.index') }}" class="footer__link">
                    マイページ
                </a>
            </li>
        </ul>
    </nav>

    <div class="footer__copyright">
        © 2024 Company, Inc
    </div>
</footer>
