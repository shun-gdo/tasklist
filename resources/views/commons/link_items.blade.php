@if (Auth::check())

    <li><a class="link link-hover" href="/">Tasklist</a></li>

    
    <li class="ml-3"><a class="link link-hover" href="{{ route('profile.edit') }}">
        Logging in as {{ Auth::user()->name }}
        <span>({{ Auth::user()->email }})</span>
    </a></li>

    <li class="ml-3"><a class="link link-hover" href="#" onclick="event.preventDefault();this.closest('form').submit();">Logout</a></li>
@else
    {{-- ユーザー登録ページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('register') }}">Signup</a></li>
    <li class="divider lg:hidden"></li>
    {{-- ログインページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('login') }}">Login</a></li>
@endif