<div class="header">
    <div class="container">
        <div class="menu">
            <div class="menu-group">
                <a href="/" class="h-main">ГЛАВНАЯ</a>
            </div>
            <div class="menu-group">
                <button type="button" id="open">ДИКИЕ ЖИВОТНЫЕ</button>
                <ul class="btn1">
                    @foreach($wildAnimalsCategory as $item)
                        <li><a href="{{ route('wild_animals', $item->id) }}">{{ $item->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="menu-group">
                <button type="button" id="open2">ДОМАШНИЕ ЖИВОТНЫЕ</button>
                <ul class="btn2">
                    @foreach($homeAnimalsCategory as $item)
                        <li><a href="{{ route('wild_animals', $item->id) }}">{{ $item->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="menu-group">
                <a href="/news">НОВОСТИ</a>
            </div>
        </div>
    </div>
</div>