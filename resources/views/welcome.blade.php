<x-layouts.app>
    <x-ui.alerts/>
    <x-home.hero/>
    <x-home.latest-articles :articles="$articles"/>
    @guest
        <x-home.funziona-home/>
    @endguest
</x-layouts.app>
