<header class="header">
    <nav class="header__nav">
        <ul class="header__list">
            <li class="header__item header__item--site-name">
                <a href="{{ route('products.index') }}" class="header__link">
                    サイト名
                </a>
            </li>

            <li class="header__item">
                <a href="{{ route('products.index') }}" class="header__link">
                    Home
                </a>
            </li>

            <li class="header__item">
                <a href="{{ route('mypage.show') }}" class="header__link">
                    マイページ
                </a>
            </li>

            <li class="header__item header__item--user-name">
                {{ Auth::user()->name }}
            </li>

            <li class="header__item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="header__logout-button">
                        ログアウト
                    </button>
                </form>
            </li>
            @guest
            <li class="header__item">
    　　　　　　<a href="{{ route('login') }}" class="header__link">ログイン</a>
　　　　　　　</li>
　　　　　　　<li class="header__item">
    　　　　　　<a href="{{ route('register') }}" class="header__link">新規登録</a>
　　　　　　　</li>
　　　　　　　@endguest
        </ul>
    </nav>
</header>
